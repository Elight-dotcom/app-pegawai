@extends('admin.master')
@section('title', 'Report')
@section('content')
<div class="container mx-auto px-4 max-w-7xl mt-4 md:mt-10">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Laporan Data</h1>
            <p class="text-sm text-gray-600 mt-1">Kelola dan unduh laporan data karyawan</p>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Filter Laporan</h2>
            </div>
        </div>
        <form action="{{ route('reports.index') }}" method="GET" class="p-4 md:p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Jenis Laporan -->
                <div class="space-y-2">
                    <label for="report_type" class="block text-sm font-medium text-gray-700">
                        Jenis Laporan
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <select name="report_type" id="report_type" class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 appearance-none">
                            <option value="all" {{ request('report_type') == 'all' ? 'selected' : '' }}>Semua Data</option>
                            <option value="employees" {{ request('report_type') == 'employees' ? 'selected' : '' }}>Data Karyawan</option>
                            <option value="salaries" {{ request('report_type') == 'salaries' ? 'selected' : '' }}>Data Gaji</option>
                            <option value="attendances" {{ request('report_type') == 'attendances' ? 'selected' : '' }}>Data Kehadiran</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Bulan -->
                <div class="space-y-2">
                    <label for="month" class="block text-sm font-medium text-gray-700">
                        Bulan (Opsional)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="month" name="month" id="month" value="{{ request('month') }}" class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800">
                    </div>
                </div>

                <!-- Department -->
                <div class="space-y-2">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">
                        Department (Opsional)
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <select name="department_id" id="department_id" class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 appearance-none">
                            <option value="">Semua Department</option>
                            @foreach($departments as $dept)
                            <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->nama_departemen }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 mt-6">
                <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Terapkan Filter
                </button>
                <a href="{{ route('reports.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Reset Filter
                </a>
            </div>
        </form>
    </div>

    <!-- Download Section -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Download Laporan</h2>
            </div>
        </div>
        <div class="p-4 md:p-6">
            <div class="grid grid-cols-1 gap-4">
                <!-- Download Excel -->
                <a href="{{ route('reports.download', request()->all()) }}" class="bg-green-50 hover:bg-green-100 border-2 border-green-200 rounded-lg p-4 transition-colors duration-200">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Excel</p>
                            <p class="text-xs text-gray-600">Format .xlsx</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Data Tables -->
    @if(in_array(request('report_type', 'all'), ['all', 'employees']))
    <!-- Tabel Karyawan -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Data Karyawan</h2>
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs font-semibold px-3 py-1 rounded-full">{{ $employees->count() }} Data</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Email</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Telepon</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Department</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Jabatan</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($employees as $index => $employee)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-gray-700 font-medium">{{ $employee->nama_lengkap }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $employee->email }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $employee->nomor_telepon }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $employee->department->nama_departemen }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $employee->jabatan->nama_jabatan }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $employee->status == 'aktif' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">Tidak ada data karyawan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if(in_array(request('report_type', 'all'), ['all', 'salaries']))
    <!-- Tabel Gaji -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Data Gaji</h2>
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs font-semibold px-3 py-1 rounded-full">{{ $salaries->count() }} Data</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Karyawan</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Bulan</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Gaji Pokok</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Tunjangan</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Potongan</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($salaries as $index => $salary)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-gray-700 font-medium">{{ $salary->employee->nama_lengkap }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $salary->bulan }}</td>
                        <td class="px-4 py-3 text-right text-gray-600">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right text-green-600">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right text-red-600">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                        <td class="px-4 py-3 text-right font-semibold text-gray-800">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">Tidak ada data gaji</td>
                    </tr>
                    @endforelse
                </tbody>
                @if($salaries->count() > 0)
                <tfoot class="bg-gray-50 border-t-2 border-gray-200">
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-right font-bold text-gray-700">Total Keseluruhan:</td>
                        <td class="px-4 py-3 text-right font-bold text-gray-800">Rp {{ number_format($salaries->sum('total_gaji'), 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
    @endif

    @if(in_array(request('report_type', 'all'), ['all', 'attendances']))
    <!-- Tabel Kehadiran -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Data Kehadiran</h2>
                <span class="ml-auto bg-gray-700 text-gray-300 text-xs font-semibold px-3 py-1 rounded-full">{{ $attendances->count() }} Data</span>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">No</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Karyawan</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Tanggal</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Status</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Waktu Masuk</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Waktu Keluar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($attendances as $index => $attendance)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-gray-700">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 text-gray-700 font-medium">{{ $attendance->karyawan->nama_lengkap }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ \Carbon\Carbon::parse($attendance->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-xs font-semibold capitalize
                                @if($attendance->status_absensi == 'hadir') bg-green-100 text-green-700
                                @elseif($attendance->status_absensi == 'izin') bg-blue-100 text-blue-700
                                @elseif($attendance->status_absensi == 'sakit') bg-yellow-100 text-yellow-700
                                @else bg-red-100 text-red-700
                                @endif">
                                {{ $attendance->status_absensi }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-600">{{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">Tidak ada data kehadiran</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<!-- Print Styles -->
<style>
    @media print {
        .no-print {
            display: none !important;
        }

        body {
            print-color-adjust: exact;
            -webkit-print-color-adjust: exact;
        }

        .container {
            max-width: 100% !important;
            padding: 0 !important;
        }
    }
</style>
@endsection