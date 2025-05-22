<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_loads_correctly()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
        $response->assertViewIs('dashboard');
        $response->assertViewHas('tasks');
    }

    public function test_can_create_task()
    {
        $taskData = [
            'item' => 'Test Task',
        ];

        $response = $this->post('/item', $taskData);

        $response->assertRedirect(200);
        $this->assertDatabaseHas('tasks', [
            'name' => 'New Test Task',
        ]);
    }

    public function test_can_delete_task()
    {
        $task = Task::create([
            'name' => 'Task to Delete'
        ]);

        $reponse = $this->delete('/item/' . $task->id);

        $reponse->assertRedirect(200);
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }

    public function test_dashboard_displays_tasks()
    {
        $task1 = Task::create(['name' => 'Task 1']);
        $task2 = Task::create(['name' => 'Task 2']);

        $response = $this->get('/dashboard');

        $response->assertSee('Task 1');
        $response->assertSee('Task 2');
    }

    public function test_empty_task_name_validation()
    {
        $taskData = [
            'item' => ''
        ];

        $response = $this->post('/item', $taskData);

        $response->assertStatus(302);
        $this->assertDatabaseHasMissing('item', [
            'name' => ''
        ]);
    }

    public function test_delete_nonexistent_task()
    {
        $response = $this->delete('/item/999');

        $response->assertStatus(404);
    }
}
