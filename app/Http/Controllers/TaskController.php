<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\SubTask;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $tasks = Task::orderBy('id', 'ASC')
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        $tasks->appends(['search' => $search]);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function show($id)
    {
        $task = Task::with('subtasks')->findOrFail($id);

        return view('admin.tasks.show', compact('task'));
    }

    public function create()
    {
        $employees = Employee::with(['department', 'jabatan'])->get();
        $departments = Department::all();

        return view('admin.tasks.create', compact('employees', 'departments'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,done',
            'subtasks' => 'array',
        ]);

        $task = Task::create([
            'employee_id' => $validated['employee_id'],
            'department_id' => $validated['department_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? '',
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'completion' => 0,
        ]);

        if (!empty($validated['subtasks'])) {
            foreach ($validated['subtasks'] as $title) {
                if (trim($title) !== '') {
                    SubTask::create([
                        'task_id' => $task->id,
                        'title' => $title,
                        'is_completed' => false,
                    ]);
                }
            }
        }

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit($id)
    {
        $task = Task::with('subtasks')->findOrFail($id);
        $employees = Employee::with(['department', 'jabatan'])->get();
        $departments = Department::all();

        return view('admin.tasks.edit', compact('task', 'employees', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'employee_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => 'required|in:low,medium,high',
            'status' => 'required|in:pending,in_progress,done',
            'subtasks' => 'array',
        ]);

        $task->update($validated);

        $task->subtasks()->delete();
        if (!empty($validated['subtasks'])) {
            foreach ($validated['subtasks'] as $title) {
                if (trim($title) !== '') {
                    Subtask::create([
                        'task_id' => $task->id,
                        'title' => $title,
                        'is_completed' => false,
                    ]);
                }
            }
        }

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->subtasks()->delete();
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
