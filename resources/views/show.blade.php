@extends('layouts.app')

@section('title', 'Detalhes da Task')

@section('content')
    <div class="max-w-xl mx-auto py-5">
        <h1 class="mb-6 text-2xl font-bold text-gray-800">Detalhes da Task</h1>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-3 text-indigo-700">{{ $task->title }}</h3>
            <p class="mb-2"><span class="font-semibold text-gray-700">Descrição:</span> {{ $task->description ?? '-' }}</p>
            <p class="mb-2">
                <span class="font-semibold text-gray-700">Concluída:</span>
                @if($task->is_completed)
                    <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">Sim</span>
                @else
                    <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-200 text-gray-700 rounded">Não</span>
                @endif
            </p>
            <p class="mb-2">
                <span class="font-semibold text-gray-700">Data Limite:</span>
                {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : '-' }}
            </p>
            <a href="{{ route('tasks.index') }}"
               class="inline-block mt-4 px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                Voltar
            </a>
        </div>
    </div>
@endsection
