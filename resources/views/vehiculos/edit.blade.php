<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
    <style>
        .form-group { margin-bottom: 15px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
        .error { color: red; font-size: 12px; margin-top: 5px; }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-50">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold">Editar Vehículo</h1>
        <form action="{{ route('vehiculos.update', $vehiculo->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="placa" class="block">Placa:</label>
                <input type="text" name="placa" id="placa" maxlength="10" class="w-full border p-2 rounded" value="{{ old('placa', $vehiculo->placa) }}" required>
                @error('placa') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="monto" class="block">Monto:</label>
                <input type="number" name="Monto" id="Monto" step="0.01" class="w-full border p-2 rounded" value="{{ old('Monto', $vehiculo->Monto) }}" required>
                @error('monto') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="fecha" class="block">Fecha:</label>
                <input type="date" name="Fecha" id="Fecha" class="w-full border p-2 rounded" value="{{ old('fecha', $vehiculo->Fecha) }}" required>
                @error('fecha') <div class="error">{{ $message }}</div> @enderror
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar Vehículo</button>
            <a href="{{ route('vehiculos.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Cancelar</a>
        </form>
    </div>
</body>
</html>
