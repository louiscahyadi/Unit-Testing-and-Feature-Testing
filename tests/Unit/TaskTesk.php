<?php

namespace Tests\Unit;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_task()
    {
        $taskData = [
            'name' => 'Test Task',
        ];

        $task = Task::create($taskData);

        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Test Task', $task->name);
    }

    public function test_task_has_timestamps()
    {
        $task = Task::create([
            'name' => 'Test Task'
        ]);

        $this->assertNotNull($task->created_at);
        $this->assertNotNull($task->updated_at);
    }

    public function test_can_delete_task()
    {
        $task = Task::create([
            'name' => 'Test Task'
        ]);

        $deleted = $task->delete();
        $this->assertDatabaseMissing('tasks', [
            'id' => $task->id,
        ]);
    }
}
