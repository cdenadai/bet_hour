@extends('app')


@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Editar Aposta</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Erro!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bets.update', $bet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user" class="block text-sm font-medium text-gray-700">Usuário</label>
                <input type="text" name="user" id="user" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('user', $bet->user) }}" required>
                @error('user')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="hour" class="block text-sm font-medium text-gray-700">Hora (HH:mm)</label>
                <input type="text" name="hour" id="hour" class="mt-1 p-2 border border-gray-300 rounded-md w-full" value="{{ old('hour', date('H:i', strtotime($bet->hour))) }}" required>
                @error('hour')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Atualizar Aposta</button>
        </form>
    </div>
@endsection