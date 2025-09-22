<div class="max-w-2xl mx-auto">
    <form action="{{ $action }}" method="POST" class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
        @csrf
        @if($method === 'PUT')
            @method('PUT')
        @endif

        <!-- Form Header -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
            <h2 class="text-xl font-semibold text-white">
                {{ $task->exists ? 'Editar Task' : 'Nova Task' }}
            </h2>
        </div>

        <!-- Form Content -->
        <div class="p-6 space-y-6">
            <!-- Title Field -->
            <div class="space-y-2">
                <label for="title" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <i class="bi bi-card-text text-gray-400"></i>
                    Título
                </label>
                <input type="text" name="title" id="title"
                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                       placeholder="Digite o título da tarefa..."
                       value="{{ old('title', $task->title ?? '') }}" required>
                @error('title')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="space-y-2">
                <label for="description" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <i class="bi bi-card-text text-gray-400"></i>
                    Descrição
                </label>
                <textarea name="description" id="description" rows="4"
                          class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors resize-none"
                          placeholder="Descreve a tua tarefa...">{{ old('description', $task->description ?? '') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Due Date Field -->
            <div class="space-y-2">
                <label for="due_date" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <i class="bi bi-calendar-event text-gray-400"></i>
                    Data Limite
                </label>
                <input type="date" name="due_date" id="due_date"
                       class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors"
                       value="{{ old('due_date', $task->due_date ?? '') }}">
                @error('due_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="category_id" class="flex items-center gap-2 text-sm font-medium text-gray-700">
                    <i class="bi bi-tags text-gray-400"></i>
                    Categoria
                </label>
                <select name="category_id" id="category_id"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                    <option value="">Selecione uma categoria</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $task->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Completed Checkbox -->
            <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                <input type="hidden" name="is_completed" value="0">
                <input type="checkbox" name="is_completed" id="is_completed" value="1"
                       class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500 focus:ring-2"
                    {{ old('is_completed', $task->is_completed ?? false) ? 'checked' : '' }}>
                <label for="is_completed" class="flex items-center gap-2 text-sm font-medium text-gray-700 cursor-pointer">
                    Marcar como concluída
                </label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
            <button type="submit"
                    class="flex-1 sm:flex-none inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-200 font-medium">
                {{ $buttonText }}
            </button>
            <a href="{{ route('tasks.index') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200 font-medium">
                Cancelar
            </a>
        </div>
    </form>
</div>
