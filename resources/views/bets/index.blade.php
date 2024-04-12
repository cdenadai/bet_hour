@extends('app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Relógio</h1>
        <div id="clock" class="text-3xl font-bold"></div>
    </div>

    <table class="min-w-full table-auto">
        <thead>
            <tr>
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Usuário</th>
                <th class="py-3 px-6 text-left">Hora</th>
                <th class="py-3 px-6 text-left">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($bets as $bet)
                <tr>
                    <td class="py-3 px-6 text-left">{{ $bet->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $bet->user }}</td>
                    <td class="py-3 px-6 text-left">{{ date('H:i', strtotime($bet->hour)) }}</td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ route('bets.edit', $bet->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Editar</a>
                        <form action="{{ route('bets.destroy', $bet->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="py-3 px-6 text-center" colspan="3">Nenhum registro encontrado</td>
                </tr>
            @endforelse


            <script>
                setInterval(function(){
                    location.reload();
                }, 30000); // 30 segundos
            </script>
        </tbody>
    </table>

    <div class="flex justify-center">
    <a href="{{ route('bets.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Criar Nova Aposta
        </a>
    </div>
@endsection

@push('scripts')
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('clock').innerText = `${hours}:${minutes}:${seconds}`;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
@endpush
