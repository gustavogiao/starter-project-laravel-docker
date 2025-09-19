<?php

use App\Models\Task;

test('A lista de Tasks abre em 200', function () {
    $response = $this->get(route('tasks.index'));
    $response->assertOk();
});

test('Consigo criar uma Task', function () {
    $payload = [
        'title' => 'Estudar Docker',
        'description' => 'Aprender a rodar Laravel no Docker',
        'is_completed' => false,
        'due_date' => '2025-09-19',
    ];

    $response = $this->post(route('tasks.store'), $payload);
    $response->assertRedirect(route('tasks.index'));
    $this->assertDatabaseHas('tasks', ['title' => 'Estudar Docker']);
});

test('Consigo atualizar uma Task', function () {
    $task = Task::factory()->create(['title' => 'Antigo título']);

    $response = $this->put(route('tasks.update', $task), [
        'title' => 'Novo título',
        'description' => $task->description,
        'is_completed' => true,
        'due_date' => optional($task->due_date)?->format('Y-m-d') ?? '2025-12-31',
    ]);

    $response->assertRedirect(route('tasks.index'));
    $this->assertDatabaseHas('tasks', ['id' => $task->id, 'title' => 'Novo título', 'is_completed' => true]);
});

test('Consigo eliminar uma Task', function () {
    $task = Task::factory()->create();

    $response = $this->delete(route('tasks.destroy', $task));

    $response->assertRedirect(route('tasks.index'));
    $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
});
