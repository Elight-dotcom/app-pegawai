<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        $attendances = Attendance::with('karyawan')
            ->when($search, function ($query) use ($search) {
                $query->whereHas('karyawan', function ($q) use ($search) {
                    $q->where('nama_lengkap', 'like', '%' . $search . '%');
                });
            })
            ->when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                $query->whereBetween('tanggal', [$startDate, $endDate]);
            })
            ->when($startDate && !$endDate, function ($query) use ($startDate) {
                $query->whereDate('tanggal', '>=', $startDate);
            })
            ->when(!$startDate && $endDate, function ($query) use ($endDate) {
                $query->whereDate('tanggal', '<=', $endDate);
            })
            ->orderBy('tanggal', 'desc')
            ->paginate(5);

        return view('admin.attendances.index', compact('attendances'));
    }

    public function show(string $id)
    {
        $attendance = Attendance::with('karyawan')->findOrFail($id);
        return view('admin.attendances.show', compact('attendance'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('admin.attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
            'status_absensi' => 'required',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index');
    }

    public function edit(string $id)
    {
        $attendance = Attendance::with('karyawan')->findOrFail($id);
        return view('admin.attendances.edit', compact('attendance'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required',
            'waktu_masuk' => 'required',
            'waktu_keluar' => 'required',
            'status_absensi' => 'required',
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->update($request->all());
        return redirect()->route('attendances.index');
    }

    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index');
    }
}
