<?php

namespace App\Http\Controllers;

use App\Mail\SendEmployeePasswordMail;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $employees = Employee::with(['jabatan', 'department', 'user'])
            ->when($search, function ($query, $search) {
                $query->where('nama_lengkap', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        $employees->appends(['search' => $search]);

        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('admin.employees.create', compact('departments', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'jabatan_id' => 'required|exists:positions,id',
            'department_id' => 'required|exists:departments,id',
        ], [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute field must be a valid email address.',
            'max' => 'The :attribute field must not exceed :max characters.',
            'date' => 'The :attribute field must be a valid date.',
        ]);

        if (Employee::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Email already exists.']);
        }

        Employee::create($request->all());

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::with(['jabatan', 'department'])->findOrFail($id);

        return view('admin.employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        $positions = Position::all();

        return view('admin.employees.edit', compact('employee', 'departments', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
        ], [
            'required' => 'The :attribute field is required.',
            'email' => 'The :attribute field must be a valid email address.',
            'max' => 'The :attribute field must not exceed :max characters.',
            'date' => 'The :attribute field must be a valid date.',
        ]);

        $employee = Employee::find($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
        ]));

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $user = User::where('email', $employee->email)->first();

        if ($user) {
            $user->delete();
        }
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
