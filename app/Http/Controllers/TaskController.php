<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Task::class, 'task');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('category')
            ->where('user_id', auth()->id())
            ->orderBy('due_date')
            ->get();
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        Task::create($data);

        return redirect()->route('tasks.index')
            ->with('success', 'Task criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $categories = Category::all();
        return view('edit', compact('task', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $data = $request->validated();
        $data['user_id'] = $task->user_id;

        $task->update($data);

        return redirect()->route('tasks.index')
            ->with('success', 'Task atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task eliminada com sucesso!');
    }
}
