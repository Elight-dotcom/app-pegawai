<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $positions = Position::orderBy('id', 'ASC')
            ->when($search, function ($query, $search) {
                $query->where('nama_jabatan', 'like', '%' . $search . '%');
            })
            ->paginate(5);

        $positions->appends(['search' => $search]);

        return view('admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must not exceed :max characters.',
            'numeric' => 'The :attribute field must be a number.',
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = Position::find($id);
        $employees = Employee::where('jabatan_id', $id)->paginate(5);

        return view('admin.positions.show', compact('position', 'employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::find($id);

        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok' => 'required|numeric',
        ], [
            'required' => 'The :attribute field is required.',
            'max' => 'The :attribute field must not exceed :max characters.',
            'numeric' => 'The :attribute field must be a number.',
        ]);

        $position = Position::find($id);
        $position->update($request->all());

        return redirect()->route('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::find($id);
        $position->delete();

        return redirect()->route('positions.index');
    }
}
