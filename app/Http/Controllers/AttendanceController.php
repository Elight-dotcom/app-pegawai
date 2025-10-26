<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAttendance()
    {
        $employee_id = session('employee_id');
        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $attendances = Attendance::where('karyawan_id', $employee_id)->paginate(5);

        return view('user.components.attendance', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        $employee_id = session('employee_id');
        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $today = Carbon::today();

        $existingAttendance = Attendance::where('karyawan_id', $employee_id)
            ->whereDate('tanggal', $today)
            ->first();

        if ($existingAttendance) {
            return back()->with('error', 'Anda sudah melakukan absensi hari ini.');
        }

        Attendance::create([
            'tanggal' => $today,
            'karyawan_id' => $employee_id,
            'waktu_masuk' => Carbon::now()
        ]);

        return back()->with('success', 'Absensi masuk berhasil.');
    }

    public function checkOut(Request $request)
    {
        $employee_id = session('employee_id');
        if (!$employee_id) {
            return redirect()->route('show.login');
        }

        $today = Carbon::today();

        $existingAttendance = Attendance::where('karyawan_id', $employee_id)
            ->whereDate('tanggal', $today)
            ->first();

        if (!$existingAttendance) {
            return back()->with('error', 'Anda belum melakukan absensi hari ini.');
        }

        if ($existingAttendance->waktu_keluar) {
            return back()->with('error', 'Anda sudah melakukan absensi keluar hari ini.');
        }

        $existingAttendance->waktu_keluar = Carbon::now();
        $existingAttendance->save();

        return back()->with('success', 'Absensi keluar berhasil.');
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $attendances = Attendance::with('karyawan')->whereHas('karyawan', function ($query) use ($search) {
            $query->where('nama_lengkap', 'like', '%' . $search . '%');
        })->paginate(5);

        return view('attendances.index', compact('attendances'));
    }

    public function show(string $id)
    {
        $attendance = Attendance::with('karyawan')->findOrFail($id);
        return view('attendances.show', compact('attendance'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
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
        return view('attendances.edit', compact('attendance'));
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
