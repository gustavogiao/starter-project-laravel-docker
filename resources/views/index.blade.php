@extends('layouts.app')

@section('title', 'Lista de Tasks')

@section('content')
    <div class="min-h-screen">
        <div class="max-w-6xl mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                            As Minhas Tasks
                        </h1>
                        <p class="text-gray-600 mt-2">Gere as tuas tarefas de forma eficiente</p>
                    </div>
                    <a href="{{ route('tasks.create') }}"
                       class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <i class="bi bi-plus-circle"></i>
                        Nova Task
                    </a>
                </div>
            </div>

            @if($tasks->count() > 0)
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-blue-100 rounded-xl">
                                <i class="bi bi-list-task text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-900">{{ $tasks->count() }}</p>
                                <p class="text-gray-600 text-sm">Total Tasks</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-green-100 rounded-xl">
                                <i class="bi bi-check-circle text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-900">{{ $tasks->where('is_completed', true)->count() }}</p>
                                <p class="text-gray-600 text-sm">Concluídas</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white/60 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg">
                        <div class="flex items-center gap-3">
                            <div class="p-3 bg-orange-100 rounded-xl">
                                <i class="bi bi-hourglass-split text-orange-600 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-gray-900">{{ $tasks->where('is_completed', false)->count() }}</p>
                                <p class="text-gray-600 text-sm">Pendentes</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tasks Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($tasks as $task)
                        <div class="group bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                            <!-- Status Badge -->
                            <div class="flex items-start justify-between mb-4">
                                @if($task->is_completed)
                                    <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Concluída
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-3 py-1 text-xs font-semibold bg-orange-100 text-orange-700 rounded-full">
                                        <i class="bi bi-hourglass-split"></i>
                                        Pendente
                                    </span>
                                @endif
                            </div>

                            <!-- Task Title -->
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-indigo-600 transition-colors">
                                <a href="{{ route('tasks.show', $task->id) }}" class="hover:underline">
                                    {{ $task->title }}
                                </a>
                            </h3>

                            <!-- Task Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $task->description ?: 'Sem descrição' }}
                            </p>

                            <!-- Due Date -->
                            @if($task->due_date)
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                                    <i class="bi bi-calendar-event"></i>
                                    Prazo: {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                                </div>
                            @endif

                            <!-- Actions -->
                            <div class="flex gap-2 pt-4 border-t border-gray-100">
                                <a href="{{ route('tasks.edit', $task->id) }}"
                                   class="flex-1 text-center px-3 py-2 bg-yellow-100 text-yellow-700 rounded-lg hover:bg-yellow-200 transition-colors text-sm font-medium">
                                    Editar
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta task?');" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-full px-3 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors text-sm font-medium">
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <i class="bi bi-inbox text-gray-400 text-4xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Nenhuma tarefa encontrada</h3>
                    <p class="text-gray-500 mb-6">Podes começar por criar a tua primeira tarefa!</p>
                    <a href="{{ route('tasks.create') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <i class="bi bi-plus-circle"></i>
                        Criar Primeira Task
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
