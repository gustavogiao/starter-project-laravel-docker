<form action="{{ $action }}" method="POST" class="bg-white p-6 rounded-lg shadow-md space-y-4">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="title" id="title"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               value="{{ old('title', $task->title ?? '') }}" required>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Descrição</label>
        <textarea name="description" id="description" rows="3"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $task->description) }}</textarea>
    </div>

    <div class="flex items-center">
        <input type="hidden" name="is_completed" value="0">
        <input type="checkbox" name="is_completed" id="is_completed" value="1"
               class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500"
            {{ old('is_completed', $task->is_completed ?? false) ? 'checked' : '' }}>
        <label for="is_completed" class="ml-2 block text-sm text-gray-700">Concluída</label>
    </div>

    <div>
        <label for="due_date" class="block text-sm font-medium text-gray-700">Data Limite</label>
        <input type="date" name="due_date" id="due_date"
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
               value="{{ old('due_date', $task->due_date ?? '') }}">
    </div>

    <div class="flex space-x-3">
        <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
            {{ $buttonText }}
        </button>
        <a href="{{ route('tasks.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
            Voltar
        </a>
    </div>
</form>
