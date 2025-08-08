<?php

namespace App\Http\Controllers\CertaintyFactor;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\CertaintyFactor\CertaintyFactor;
use App\Models\CertaintyFactor\DiagnosisResult;
use App\Services\CertaintyFactorService;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    protected $cfService;

    public function __construct(CertaintyFactorService $cfService)
    {
        $this->cfService = $cfService;
    }

    public function index()
    {
        $gejalas = Gejala::all();
        return view('certainty-factor.form', compact('gejalas'));
    }

    public function calculate(Request $request)
    {
        $selectedGejala = [];
        
        foreach ($request->gejala as $gejalaId => $data) {
            if (empty($data['cf_user'])) {
                continue;
            }

            $certaintyFactor = CertaintyFactor::where('gejala_id', $gejalaId)->first();
            
            if ($certaintyFactor) {
                $selectedGejala[] = [
                    'gejala_id' => $gejalaId,
                    'cf_user' => floatval($data['cf_user']),
                    'cf_pakar' => $certaintyFactor->cf_pakar,
                    'nama_gejala' => $certaintyFactor->gejala->nama_gejala,
                    'kode_gejala' => $certaintyFactor->gejala->kode_g
                ];
            }
        }

        if (empty($selectedGejala)) {
            return redirect()->back()->with('error', 'Silahkan pilih minimal satu gejala.');
        }

        $result = $this->cfService->processDiagnosis($selectedGejala);

        return view('certainty-factor.result', [
            'result' => $result,
            'selectedGejala' => $selectedGejala
        ]);
    }

    public function store(Request $request)
    {
        $gejala_terpilih = json_decode($request->selected_gejala, true);

        DiagnosisResult::create([
            'user_id' => auth()->id(),
            'cf_value' => $request->final_cf,
            'gejala_terpilih' => $gejala_terpilih
        ]);

        return redirect()->route('certainty-factor.history')
            ->with('success', 'Hasil diagnosis berhasil disimpan.');
    }

    public function history()
    {
        $histories = DiagnosisResult::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('certainty-factor.history', compact('histories'));
    }
}