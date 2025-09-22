@extends('layouts.app')

@section('title', 'Detalhes da Task')

@section('content')
    <div class="max-w-3xl mx-auto px-4 py-8">
        <!-- Header with Back Button -->
        <div class="flex items-center gap-4 mb-8">
            <a href="{{ route('tasks.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                <i class="bi bi-arrow-left"></i>
                Voltar
            </a>
            <h1 class="text-2xl font-bold text-gray-900">Detalhes da Task</h1>
        </div>

        <!-- Task Card -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Task Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-start justify-between">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $task->title }}</h2>
                    @if($task->is_completed)
                        <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                            <i class="bi bi-check-circle-fill"></i>
                            Concluída
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1 px-3 py-1 text-sm font-medium bg-gray-100 text-gray-700 rounded-full">
                            <i class="bi bi-hourglass-split"></i>
                            Pendente
                        </span>
                    @endif
                </div>
            </div>

            <!-- Task Details -->
            <div class="px-6 py-6">
                <div class="space-y-4">
                    <!-- Description -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Descrição</h3>
                        <p class="text-gray-900">{{ $task->description ?: 'Nenhuma descrição fornecida' }}</p>
                    </div>

                    <!-- Due Date -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Data Limite</h3>
                        <p class="text-gray-900">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : 'Não definida' }}
                        </p>
                    </div>

                    <!-- Category -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Categoria</h3>
                        <p class="text-gray-900">{{ $task->category->name ?: 'Nenhuma categoria atribuída' }}</p>
                    </div>

                    <!-- Created Date -->
                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Criada em</h3>
                        <p class="text-gray-900">{{ $task->created_at->format('d/m/Y \à\s H:i') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
