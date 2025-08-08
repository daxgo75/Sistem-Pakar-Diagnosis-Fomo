<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\ForwardChaining\Rule;
use App\Models\ForwardChaining\DiagnosisHistory;
use Illuminate\Http\Request;

class ForwardChainingController extends Controller
{
    public function showForm()
    {
        $gejalas = Gejala::all();
        return view('forward-chaining.form', compact('gejalas'));
    }

    public function diagnose(Request $request)
    {
        $request->validate([
            'gejala' => 'required|array',
            'gejala.*' => 'required|in:0,1'
        ]);

        $selectedGejala = collect($request->gejala)
            ->filter(function ($value) {
                return $value == 1;
            })
            ->keys()
            ->toArray();

        // Get all penyakit
        $penyakits = Penyakit::all();
        $matchedPenyakit = [];

        foreach ($penyakits as $penyakit) {
            $rules = Rule::where('penyakit_id', $penyakit->id)->get();
            $requiredGejala = $rules->pluck('gejala_id')->toArray();

            // Ambil jumlah minimal gejala dari field min_gejala (pastikan field ini ada di tabel penyakit)
            $minGejala = $penyakit->min_gejala ?? 1;

            if (!empty($requiredGejala)) {
                $matchCount = count(array_intersect($requiredGejala, $selectedGejala));

                // Diagnosis hanya jika jumlah gejala yang cocok >= min_gejala
                if ($matchCount >= $minGejala) {
                    $matchedPenyakit[] = [
                        'penyakit' => $penyakit,
                        'match_count' => $matchCount,
                        'min_gejala' => $minGejala
                    ];
                }
            }
        }

        // Urutkan berdasarkan jumlah gejala yang cocok terbanyak
        usort($matchedPenyakit, function($a, $b) {
            return $b['match_count'] <=> $a['match_count'];
        });

        $selectedGejalaObjects = Gejala::whereIn('id', $selectedGejala)->get();
        $allGejala = Gejala::all();

        return view('forward-chaining.result', [
            'allGejala' => $allGejala,
            'diagnosis' => $matchedPenyakit,
            'selectedGejala' => $selectedGejalaObjects
        ]);
    }

    public function history()
    {
        $histories = DiagnosisHistory::where('user_id', auth()->id())
            ->with(['penyakit', 'gejala'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('forward-chaining.history', compact('histories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'diagnosis_result' => 'required|json',
            'selected_gejala' => 'required|json'
        ]);

        $diagnosis = json_decode($request->diagnosis_result, true);
        if (!empty($diagnosis)) {
            $topResult = $diagnosis[0];
            
            $history = DiagnosisHistory::create([
                'user_id' => auth()->id(),
                'penyakit_id' => $topResult['penyakit']['id'],
               
            ]);

            $selectedGejala = json_decode($request->selected_gejala, true);
            $history->gejala()->attach(collect($selectedGejala)->pluck('id'));
        }

        return redirect()->route('forward-chaining.history')
            ->with('success', 'Hasil diagnosis berhasil disimpan');
    }
}