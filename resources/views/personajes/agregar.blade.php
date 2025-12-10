@extends('layouts.index')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Agregar Personaje</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('personajes.store') }}" method="POST" class="max-w-lg bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-3">
            <label class="font-semibold">Nombre:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border p-2 rounded" required>
            @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="font-semibold">Rol:</label>
            <input type="text" name="role" value="{{ old('role') }}" class="w-full border p-2 rounded" required>
            @error('role') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="font-semibold">Fruta:</label>
            <input type="text" name="fruit" value="{{ old('fruit') }}" class="w-full border p-2 rounded" required>
            @error('fruit') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="font-semibold">Haki:</label>
            <input type="text" name="haki" value="{{ old('haki') }}" class="w-full border p-2 rounded" required>
            @error('haki') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="font-semibold">Edad:</label>
            <input type="number" name="age" value="{{ old('age') }}" class="w-full border p-2 rounded" required>
            @error('age') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="font-semibold">Recompensa (millones):</label>
            <input type="number" name="bounty" value="{{ old('bounty') }}" class="w-full border p-2 rounded" required>
            @error('bounty') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection
