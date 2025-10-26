<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $bulan = $request->query('bulan');

        $salaries = Salary::with('employee')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('employee', function ($query) use ($search) {
                    $query->where('nama_lengkap', 'like', '%' . $search . '%');
                });
            })
            ->when($bulan, function ($query) use ($bulan) {
                $query->where('bulan', $bulan);
            })
            ->paginate(5);

        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with('jabatan')->get();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ], [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute field must be a number.',
            'min' => 'The :attribute field must be at least :min.',
        ]);

        if (Salary::where('karyawan_id', $request->karyawan_id)->where('bulan', $request->bulan)->exists()) {
            return back()->withErrors(['bulan' => 'Salary for this employee already exists for this month.']);
        }

        $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Salary::create([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $salary = Salary::with('employee')->findOrFail($id);

        return view('salaries.edit', compact('salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
        ], [
            'required' => 'The :attribute field is required.',
            'numeric' => 'The :attribute field must be a number.',
            'min' => 'The :attribute field must be at least :min.',
        ]);

        if (Salary::where('karyawan_id', $request->karyawan_id)
            ->where('bulan', $request->bulan)
            ->where('id', '!=', $id)
            ->exists()
        ) {
            return back()->withErrors(['bulan' => 'Salary for this employee already exists for this month.']);
        }

        $total_gaji = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        $salary = Salary::findOrFail($id);
        $salary->update([
            'karyawan_id' => $request->karyawan_id,
            'bulan' => $request->bulan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan,
            'potongan' => $request->potongan,
            'total_gaji' => $total_gaji,
        ]);

        return redirect()->route('salaries.index')->with('success', 'Salary updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $salary = Salary::findOrFail($id);
        $salary->delete();

        return redirect()->route('salaries.index')->with('success', 'Salary deleted successfully.');
    }
}
