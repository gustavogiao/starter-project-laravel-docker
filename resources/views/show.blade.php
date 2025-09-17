<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="mb-4">Detalhes da Task</h1>
    <div class="card bg-white p-4 rounded shadow-sm">
        <h3 class="card-title mb-3">{{ $task->title }}</h3>
        <p><strong>Descrição:</strong> {{ $task->description ?? '-' }}</p>
        <p>
            <strong>Concluída:</strong>
            @if($task->is_completed)
                <span class="badge bg-success">Sim</span>
            @else
                <span class="badge bg-secondary">Não</span>
            @endif
        </p>
        <p>
            <strong>Data Limite:</strong>
            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') : '-' }}
        </p>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
</div>
</body>
</html>
