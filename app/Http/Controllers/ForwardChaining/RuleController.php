<?php

namespace App\Http\Controllers\ForwardChaining;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\ForwardChaining\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with(['penyakit', 'gejala'])->get();
        return view('admin.forward-chaining.index', compact('rules'));
    }

    public function create()
    {
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        return view('admin.forward-chaining.create', compact('penyakits', 'gejalas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|array',
            'gejala_id.*' => 'exists:gejalas,id'
        ]);

        foreach ($request->gejala_id as $gejala) {
            Rule::create([
                'penyakit_id' => $request->penyakit_id,
                'gejala_id' => $gejala
            ]);
        }

        return redirect()->route('admin.forward-chaining.index')
            ->with('success', 'Rule created successfully');
    }

    public function edit($id)
    {
        $rule = Rule::findOrFail($id);
        $penyakits = Penyakit::all();
        $gejalas = Gejala::all();
        return view('admin.forward-chaining.edit', compact('rule', 'penyakits', 'gejalas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penyakit_id' => 'required|exists:penyakits,id',
            'gejala_id' => 'required|exists:gejalas,id'
        ]);

        $rule = Rule::findOrFail($id);
        $rule->update($request->all());

        return redirect()->route('admin.forward-chaining.index')
            ->with('success', 'Rule updated successfully');
    }

    public function destroy($id)
    {
        $rule = Rule::findOrFail($id);
        $rule->delete();

        return redirect()->route('admin.forward-chaining.index')
            ->with('success', 'Rule deleted successfully');
    }
}