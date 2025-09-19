@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Criar Nova Task</h1>
        @include('tasks._form', [
            'action' => route('tasks.store'),
            'method' => 'POST',
            'buttonText' => 'Salvar',
            'task' => new \App\Models\Task()
        ])
    </div>
@endsection
