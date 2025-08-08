<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('admin.gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('admin.gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_g' => 'required|unique:gejalas,kode_g',  // Changed from kode_gejala
            'nama_gejala' => 'required'
        ]);

        Gejala::create($request->all());
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil ditambahkan');
    }

    public function edit(Gejala $gejala)
    {
        return view('admin.gejala.edit', compact('gejala'));
    }

    public function update(Request $request, Gejala $gejala)
    {
        // Validate based on what fields were changed
        $validationRules = [
            'nama_gejala' => 'required',
        ];

        // Only validate kode_g if it was changed
        if ($request->kode_g != $gejala->kode_g) {
            $validationRules['kode_g'] = 'required|unique:gejalas,kode_g,'.$gejala->id;
        }

        $request->validate($validationRules);

        $gejala->update($request->all());
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil diperbarui');
    }

    public function destroy(Gejala $gejala)
    {
        $gejala->delete();
        return redirect()->route('admin.gejala.index')->with('success', 'Gejala berhasil dihapus');
    }
}
