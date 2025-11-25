<?php

namespace App\Http\Controllers;

use App\Exports\EmployeesFullExport;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reportType = $request->get('report_type', 'all');
        $month = $request->get('month');
        $departmentId = $request->get('department_id');

        $employees = Employee::with(['department', 'jabatan'])
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->where('department_id', $departmentId);
            })
            ->get();

        $salaries = Salary::with(['employee.department', 'employee.jabatan'])
            ->when($month, function ($query) use ($month) {
                $monthName = \Carbon\Carbon::parse($month)->locale('id')->isoFormat('MMMM');
                return $query->where('bulan', $monthName);
            })
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->whereHas('employee', function ($q) use ($departmentId) {
                    $q->where('department_id', $departmentId);
                });
            })
            ->get();

        $attendances = Attendance::with(['karyawan.department', 'karyawan.jabatan'])
            ->when($month, function ($query) use ($month) {
                return $query->whereYear('tanggal', \Carbon\Carbon::parse($month)->year)
                    ->whereMonth('tanggal', \Carbon\Carbon::parse($month)->month);
            })
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->whereHas('karyawan', function ($q) use ($departmentId) {
                    $q->where('department_id', $departmentId);
                });
            })
            ->get();

        $departments = Department::all();

        return view('admin.reports.index', compact(
            'employees',
            'salaries',
            'attendances',
            'departments'
        ));
    }

    public function downloadExcel()
    {
        $report_type = request('report_type', 'all');
        $month = request('month');
        $departmentId = request('department_id');

        // Get data based on filters (same logic as index)
        $employees = Employee::with(['department', 'jabatan'])
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->where('department_id', $departmentId);
            })
            ->get();

        $salaries = Salary::with(['employee.department', 'employee.jabatan'])
            ->when($month, function ($query) use ($month) {
                $monthName = \Carbon\Carbon::parse($month)->locale('id')->isoFormat('MMMM');
                return $query->where('bulan', $monthName);
            })
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->whereHas('employee', function ($q) use ($departmentId) {
                    $q->where('department_id', $departmentId);
                });
            })
            ->get();

        $attendances = Attendance::with(['karyawan.department', 'karyawan.jabatan'])
            ->when($month, function ($query) use ($month) {
                return $query->whereYear('tanggal', \Carbon\Carbon::parse($month)->year)
                    ->whereMonth('tanggal', \Carbon\Carbon::parse($month)->month);
            })
            ->when($departmentId, function ($query) use ($departmentId) {
                return $query->whereHas('karyawan', function ($q) use ($departmentId) {
                    $q->where('department_id', $departmentId);
                });
            })
            ->get();

        $data = compact('employees', 'salaries', 'attendances', 'report_type');

        $filename = 'Laporan_' . date('Y-m-d') . '.xlsx';
        return Excel::download(new EmployeesFullExport($data), $filename);
    }
}
