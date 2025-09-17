<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Minhas Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Nova Task</a>
    <table class="table table-bordered bg-white">
        <thead>
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Concluída</th>
            <th>Data Limite</th>
            <th>Operações</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tasks as $task)
            <tr>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="text-decoration-none">
                        {{ $task->title }}
                    </a>
                </td>
                <td>{{ $task->description }}</td>
                <td>
                    @if($task->is_completed)
                        <span class="badge bg-success">Sim</span>
                    @else
                        <span class="badge bg-secondary">Não</span>
                    @endif
                </td>
                <td>{{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : '-' }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm me-1">Editar</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir esta task?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Nenhuma task encontrada.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
