@extends('app')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Criar Nova Aposta</h1>

    <form action="{{ route('bets.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="user" class="block text-sm font-medium text-gray-700">Usuário</label>
            <input type="text" name="user" id="user" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
        </div>
        <div class="mb-4">
            <label for="hour" class="block text-sm font-medium text-gray-700">Hora</label>
            <input type="time" name="hour" id="hour" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Criar Aposta</button>
    </form>
@endsection
