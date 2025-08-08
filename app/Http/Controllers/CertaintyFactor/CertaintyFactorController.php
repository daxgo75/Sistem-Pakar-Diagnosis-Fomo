<?php

namespace App\Http\Controllers\CertaintyFactor;

use App\Http\Controllers\Controller;
use App\Models\CertaintyFactor\CertaintyFactor;
use App\Models\Gejala;
use Illuminate\Http\Request;

class CertaintyFactorController extends Controller
{
    public function index()
    {
        $certaintyFactors = CertaintyFactor::with('gejala')->get();
        return view('admin.certainty-factor.index', compact('certaintyFactors'));
    }

    public function create()
    {
        $gejalas = Gejala::all();
        return view('admin.certainty-factor.create', compact('gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);
        
        CertaintyFactor::create($request->all());
        return redirect()->route('admin.certainty-factor.index')
            ->with('success', 'Certainty Factor berhasil ditambahkan.');
    }

    public function edit(CertaintyFactor $certaintyFactor)
    {
        $gejalas = Gejala::all();
        return view('admin.certainty-factor.edit', compact('certaintyFactor', 'gejalas'));
    }

    public function update(Request $request, CertaintyFactor $certaintyFactor)
    {
        $request->validate([
            'gejala_id' => 'required|exists:gejalas,id',
            'cf_pakar' => 'required|numeric|between:0,1',
        ]);
        
        $certaintyFactor->update($request->all());

        return redirect()->route('admin.certainty-factor.index')
            ->with('success', 'Certainty Factor berhasil diperbarui.');
    }

    public function destroy(CertaintyFactor $certaintyFactor)
    {
        $certaintyFactor->delete();
        return redirect()->route('admin.certainty-factor.index')
            ->with('success', 'Certainty Factor berhasil dihapus.');
    }
}
