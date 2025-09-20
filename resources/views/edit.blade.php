@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('tasks._form', [
            'action' => route('tasks.update', $task->id),
            'method' => 'PUT',
            'buttonText' => 'Atualizar',
            'task' => $task
        ])
    </div>
@endsection
