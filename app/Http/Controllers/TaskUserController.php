<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskUserController extends Controller
{
    public function index()
    {
        $employee_id = session('employee_id');
        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $department_id = Employee::where('id', $employee_id)->value('department_id');

        $tasks = Task::with('employee', 'department')
            ->where('department_id', $department_id)
            ->orderBy('id', 'ASC')
            ->paginate(5);
        return view('user.components.task', compact('tasks'));
    }

    public function create()
    {
        return view('user.components.create_task');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
            'subtasks' => 'array',
        ]);

        $employee_id = session('employee_id');
        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $department_id = Employee::where('id', $employee_id)->value('department_id');

        $task = Task::create([
            'employee_id' => $employee_id,
            'department_id' => $department_id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
            'priority' => $validated['priority'],
            'status' => $validated['status'],
        ]);

        if (isset($validated['subtasks'])) {
            foreach ($validated['subtasks'] as $subtaskTitle) {
                $task->subtasks()->create(['title' => $subtaskTitle]);
            }
        }

        return redirect()->route('user.tasks.index')->with('success', 'Task created successfully.');
    }

    public function updateStatus(Request $request, $task_id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::findOrFail($task_id);
        $task->status = $validated['status'];
        $task->save();

        return redirect()->route('user.tasks.index')->with('success', 'Task status updated successfully.');
    }

    public function edit($task_id)
    {
        $task = Task::with('subtasks')->findOrFail($task_id);
        return view('user.components.edit_task', compact('task'));
    }

    public function update(Request $request, $task_id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::findOrFail($task_id);
        $task->update($validated);

        return redirect()->route('user.tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('user.tasks.index')->with('success', 'Task deleted successfully.');
    }
}
