<?php

namespace App\Http\Controllers;

use App\Models\Egreso;
use Illuminate\Http\Request;

class EgresoController extends Controller
{
    public function index() {
        $egresos = Egreso::orderBy('fecha', 'desc')->get();
        return view('egresos.index', compact('egresos'));
    }

    public function create() {
        return view('egresos.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'Detalle' => 'required|string|max:255',
            'Monto'   => 'required|numeric|min:0',
            'Fecha'   => 'required|date',
        ]);
        Egreso::create($data);
        return redirect()->route('egresos.index')->with('success', 'Egreso registrado.');
    }

    public function edit(Egreso $egreso) {
        return view('egresos.edit', compact('egreso'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'Detalle' => 'required|string|max:255',
            'Monto'   => 'required|numeric|min:0',
            'Fecha'   => 'required|date',
        ]);
        $egreso = Egreso::findOrFail($id);
        $egreso->update($data);
        return redirect()->route('egresos.index')->with('success', 'Egreso actualizado.');
    }

    public function destroy(Egreso $egreso) {
        $egreso->delete();
        return redirect()->route('egresos.index')->with('success', 'Egreso eliminado.');
    }
}
