<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakits'));
    }

    public function create()
    {
        return view('admin.penyakit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_p' => 'required|unique:penyakits',
            'nama_penyakit' => 'required'
        ]);

        Penyakit::create($request->all());
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil ditambahkan');
    }

    public function edit(Penyakit $penyakit)
    {
        return view('admin.penyakit.edit', compact('penyakit'));
    }

    public function update(Request $request, Penyakit $penyakit)
    {
        $request->validate([
            'kode_p' => 'required|unique:penyakits,kode_p,' . $penyakit->id,
            'nama_penyakit' => 'required'
        ]);

        $penyakit->update($request->all());
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil diperbarui');
    }

    public function destroy(Penyakit $penyakit)
    {
        $penyakit->delete();
        return redirect()->route('admin.penyakit.index')->with('success', 'Penyakit berhasil dihapus');
    }
}
