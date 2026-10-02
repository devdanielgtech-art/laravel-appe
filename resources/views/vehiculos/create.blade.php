<body class="p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Registrar Vehículo</h2>
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block">Placa</label>
                <input type="text" name="placa" maxlength="10" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Monto</label>
                <input type="number" step="0.01" name="Monto" class="w-full border p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block">Fecha</label>
                <input type="date" name="Fecha" class="w-full border p-2 rounded" value="{{ date('Y-m-d') }}" required>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('vehiculos.index') }}" class="ml-2 text-gray-600">Cancelar</a>
        </form>
    </div>
</body>
