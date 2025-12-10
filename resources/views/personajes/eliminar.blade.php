@extends('layouts.index')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6 text-red-600">Eliminar Personaje</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('personajes.destroy') }}" method="POST" class="max-w-lg bg-white p-6 rounded shadow" onsubmit="return confirm('¿Seguro que quieres eliminar este personaje?')">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">ID del personaje:</label>
            <input type="number" name="id" class="w-full border p-2 rounded" required>
            @error('id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Eliminar</button>
    </form>
</div>
@endsection
