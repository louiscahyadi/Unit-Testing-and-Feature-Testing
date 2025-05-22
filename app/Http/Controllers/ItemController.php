<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function insert(Request $requst)
    {
        $request->validate([
            'item' => 'required|min:1',
        ]);

        $task = new Task();
        $task->name = $request->item;
        $task->save();

        return redirect('/dashboard');
    }

    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/dashboard');
    }
}
