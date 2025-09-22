<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Task::class, 'task');
    }

    /**
     * Listar todas as tasks do utilizador autenticado.
     */
    public function index()
    {
        return Task::with('category')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(10);
    }

    /**
     * Criar uma nova task.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $task = Task::create($data);

        return response()->json($task->load('category'), 201);
    }

    /**
     * Mostrar uma task específica.
     */
    public function show(Task $task)
    {
        return response()->json($task->load('category'));
    }

    /**
     * Atualizar uma task existente.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $data['user_id'] = $task->user_id; // não deixar mudar o dono

        $task->update($data);

        return response()->json($task->load('category'));
    }

    /**
     * Apagar uma task.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(null, 204);
    }
}
