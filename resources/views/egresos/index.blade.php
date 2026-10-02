<!DOCTYPE html>
<html lang="es">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de Egresos</title>
</head>
<body class="p-8 bg-gray-50">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between mb-6">
            <h1 class="text-2xl font-bold">Egresos</h1>
            <a href="{{ route('egresos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Egreso</a>
        </div>
        <table class="w-full bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-3 text-left">Detalle</th>
                    <th class="p-3 text-left">Monto</th>
                    <th class="p-3 text-left">Fecha</th>
                    <th class="p-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($egresos as $egreso)
                <tr class="border-b">
                    <td class="p-3">{{ $egreso->Detalle }}</td>
                    <td class="p-3">Bs. {{ number_format($egreso->Monto, 2) }}</td>
                    <td class="p-3">{{ $egreso->Fecha }}</td>
                    <td class="p-3 flex justify-center gap-2">
                        <a href="{{ route('egresos.edit', $egreso) }}" class="text-yellow-600">Editar</a>
                        <form action="{{ route('egresos.destroy', $egreso) }}" method="POST">
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
