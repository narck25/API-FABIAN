@extends('layouts.index')

@section('content')
<div class="container mx-auto p-8">
    <h1 class="text-4xl font-bold mb-8 text-center">Tripulación Mugiwara</h1>

    <!-- ACCIONES -->
    <div class="flex gap-4 justify-center mb-6">
        <a href="{{ route('personajes.agregar') }}" class="bg-green-600 text-white px-4 py-2 rounded shadow">Agregar personaje</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- TABLA -->
    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Nombre</th>
                    <th class="p-3">Rol</th>
                    <th class="p-3">Fruta</th>
                    <th class="p-3">Haki</th>
                    <th class="p-3">Edad</th>
                    <th class="p-3">Bounty</th>
                    <th class="p-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($personajes ?? [] as $p)
                    <tr class="border-b">
                        <td class="p-3">{{ $p['id'] }}</td>
                        <td class="p-3">{{ $p['name'] }}</td>
                        <td class="p-3">{{ $p['role'] }}</td>
                        <td class="p-3">{{ $p['fruit'] }}</td>
                        <td class="p-3">{{ $p['haki'] }}</td>
                        <td class="p-3">{{ $p['age'] }}</td>
                        <td class="p-3">${{ $p['bounty'] }} M</td>
                        <td class="p-3">
                            <a href="{{ route('personajes.modificar', $p['id']) }}" class="text-blue-600">Editar</a>
                            <form action="{{ route('personajes.destroy') }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar?')">
                                @csrf
                                <input type="hidden" name="id" value="{{ $p['id'] }}">
                                <button type="submit" class="text-red-600 ml-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="p-3 text-center">No hay personajes</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
