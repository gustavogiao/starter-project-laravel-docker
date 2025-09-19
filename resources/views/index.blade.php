@extends('layouts.app')

@section('title', 'Lista de Tasks')

@section('content')
    <div class="max-w-4xl mx-auto py-5">
        <h1 class="mb-6 text-2xl font-bold text-gray-800">Minhas Tasks</h1>
        <a href="{{ route('tasks.create') }}"
           class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            Nova Task
        </a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Título</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Descrição</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Concluída</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Data Limite</th>
                    <th class="px-4 py-2 text-left font-semibold text-gray-700">Operações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tasks as $task)
                    <tr class="border-b">
                        <td class="px-4 py-2">
                            <a href="{{ route('tasks.show', $task->id) }}" class="text-indigo-600 hover:underline">
                                {{ $task->title }}
                            </a>
                        </td>
                        <td class="px-4 py-2">{{ $task->description }}</td>
                        <td class="px-4 py-2">
                            @if($task->is_completed)
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-green-100 text-green-800 rounded">Sim</span>
                            @else
                                <span class="inline-block px-2 py-1 text-xs font-semibold bg-gray-200 text-gray-700 rounded">Não</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : '-' }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('tasks.edit', $task->id) }}"
                               class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500 text-sm transition">Editar</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta task?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">Nenhuma task encontrada.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
