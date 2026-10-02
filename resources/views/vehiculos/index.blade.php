<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de Vehículos</title>
</head>
<body class="p-8 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Vehículos</h1>
            <a href="{{ route('vehiculos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Vehículo</a>
        </div>
        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">Placa</th>
                    <th class="p-3 text-left">Monto</th>
                    <th class="p-3 text-left">Fecha</th>
                    <th class="p-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vehiculos as $vehiculo)
                <tr class="border-b">
                    <td class="p-3">{{ $vehiculo->placa }}</td>
                    <td class="p-3">Bs. {{ number_format($vehiculo->Monto, 2) }}</td>
                    <td class="p-3">{{ $vehiculo->Fecha }}</td>
                    <td class="p-3 flex justify-center gap-2">
                        <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="text-yellow-600">Editar</a>
                        <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-600" onclick="return confirm('¿Eliminar?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
