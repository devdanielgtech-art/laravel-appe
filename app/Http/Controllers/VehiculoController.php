<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    public function index() {
        $vehiculos = Vehiculo::orderBy('fecha', 'desc')->get();
        return view('vehiculos.index', compact('vehiculos'));
    }

    public function create() {
        return view('vehiculos.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'placa' => 'required|string|max:10',
            'Monto' => 'required|numeric|min:0',
            'Fecha' => 'required|date',
        ]);
        Vehiculo::create($data);
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo registrado.');
    }

    public function edit(Vehiculo $vehiculo) {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'placa' => 'required|string|max:10',
            'Monto' => 'required|numeric|min:0',
            'Fecha' => 'required|date',
        ]);
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->update($data);
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo actualizado.');
    }

    public function destroy(Vehiculo $vehiculo) {
        $vehiculo->delete();
        return redirect()->route('vehiculos.index')->with('success', 'Vehículo eliminado.');
    }
}
