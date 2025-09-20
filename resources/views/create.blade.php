@extends('layouts.app')

@section('content')
    <div class="container py-5">
        @include('tasks._form', [
            'action' => route('tasks.store'),
            'method' => 'POST',
            'buttonText' => 'Guardar',
            'task' => new \App\Models\Task()
        ])
    </div>
@endsection
