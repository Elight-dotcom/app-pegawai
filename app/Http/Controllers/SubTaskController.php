<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function update(Request $request, $subtask_id)
    {
        $validated = $request->validate([
            'is_completed' => 'required|boolean',
        ]);

        $subtask = SubTask::findOrFail($subtask_id);

        $subtask->is_completed = $validated['is_completed'];
        $subtask->save();

        $task = $subtask->task;
        $total = $task->subtasks()->count();
        $done = $task->subtasks()->where('is_completed', true)->count();
        $task->progress = $total > 0 ? round(($done / $total) * 100) : 0;
        $task->save();

        return response()->json(['success' => true]);
    }
}
