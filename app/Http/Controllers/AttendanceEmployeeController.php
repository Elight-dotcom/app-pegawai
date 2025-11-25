<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceEmployeeController extends Controller
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
}
