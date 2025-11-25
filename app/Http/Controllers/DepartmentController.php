<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $departments = Department::orderBy('id', 'ASC')
            ->when($search, function ($query, $search) {
                $query->where('nama_departemen', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        $departments->appends(['search' => $search]);

        return view('admin.departments.index', compact('departments'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must not exceed :max characters.',
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $department = Department::find($id);
        $employees = Employee::where('department_id', $id)->paginate(5);

        return view('admin.departments.show', compact('department', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $department = Department::find($id);

        return view('admin.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must not exceed :max characters.',
        ]);

        $department = Department::find($id);
        $department->update($request->all());

        return redirect()->route('departments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::find($id);
        $department->delete();

        return redirect()->route('departments.index');
    }
}
