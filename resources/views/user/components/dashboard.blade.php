@extends('user.master')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-b-2xl p-6 sm:p-8 text-white shadow-xl">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-blue-100 text-sm sm:text-base">{{ now()->format('l, d F Y') }}</p>
            </div>
            <div class="bg-white/20 backdrop-blur-sm rounded-xl px-6 py-3">
                <p class="text-sm text-blue-100">Status</p>
                <p class="text-xl font-bold">Aktif</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Total Karyawan -->
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">+12%</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Total Karyawan</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalEmployees ?? 245 }}</p>
        </div>

        <!-- Departemen -->
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Active</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Departemen</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $totalDepartments ?? 12 }}</p>
        </div>

        <!-- Kehadiran Hari Ini -->
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                        <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">98%</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Kehadiran Hari Ini</h3>
            <p class="text-3xl font-bold text-gray-800">{{ $todayAttendance ?? 240 }}/245</p>
        </div>

        <!-- Total Gaji Bulan Ini -->
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-orange-600" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">Bulan Ini</span>
            </div>
            <h3 class="text-gray-600 text-sm font-medium mb-1">Total Payroll</h3>
            <p class="text-3xl font-bold text-gray-800">Rp {{ number_format($totalSalary ?? 245000000, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Charts and Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kehadiran Chart -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Grafik Kehadiran (7 Hari Terakhir)</h2>
                <button class="text-sm text-blue-600 hover:text-blue-700 font-semibold">Lihat Semua</button>
            </div>
            <div class="h-64 flex items-end justify-between gap-2">
                @php
                $attendanceData = [95, 98, 92, 97, 99, 96, 98];
                $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                @endphp
                @foreach($attendanceData as $index => $percentage)
                <div class="flex-1 flex flex-col items-center gap-2">
                    <div class="w-full bg-gradient-to-t from-blue-600 to-blue-400 rounded-t-lg hover:from-blue-700 hover:to-blue-500 transition-all duration-300 cursor-pointer relative group"
                        style="height: {{ $percentage }}%">
                        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2 bg-gray-800 text-white text-xs px-2 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity">
                            {{ $percentage }}%
                        </div>
                    </div>
                    <span class="text-xs font-medium text-gray-600">{{ $days[$index] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Statistik Cepat</h2>
            <div class="space-y-4">
                <!-- Hadir -->
                <div class="flex items-center justify-between p-4 bg-green-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Hadir</p>
                            <p class="text-xl font-bold text-gray-800">{{ $presentToday ?? 240 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Izin -->
                <div class="flex items-center justify-between p-4 bg-yellow-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Izin</p>
                            <p class="text-xl font-bold text-gray-800">{{ $leaveToday ?? 3 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sakit -->
                <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Sakit</p>
                            <p class="text-xl font-bold text-gray-800">{{ $sickToday ?? 2 }}</p>
                        </div>
                    </div>
                </div>

                <!-- Alpa -->
                <div class="flex items-center justify-between p-4 bg-red-50 rounded-xl">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-600">Alpa</p>
                            <p class="text-xl font-bold text-gray-800">{{ $absentToday ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities & Top Departments -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activities -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Aktivitas Terbaru</h2>
                <button class="text-sm text-blue-600 hover:text-blue-700 font-semibold">Lihat Semua</button>
            </div>
            <div class="space-y-4">
                @php
                $activities = [
                ['name' => 'Ahmad Fauzi', 'action' => 'Clock In', 'time' => '08:00 AM', 'color' => 'green'],
                ['name' => 'Siti Nurhaliza', 'action' => 'Clock In', 'time' => '08:15 AM', 'color' => 'green'],
                ['name' => 'Budi Santoso', 'action' => 'Izin Sakit', 'time' => '09:00 AM', 'color' => 'blue'],
                ['name' => 'Rina Wijaya', 'action' => 'Clock Out', 'time' => '05:30 PM', 'color' => 'orange'],
                ['name' => 'Dedi Kurniawan', 'action' => 'Clock In', 'time' => '08:05 AM', 'color' => 'green'],
                ];
                @endphp
                @foreach($activities as $activity)
                <div class="flex items-center gap-4 p-4 hover:bg-gray-50 rounded-xl transition-colors duration-200">
                    <div class="w-10 h-10 bg-{{ $activity['color'] }}-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-bold text-{{ $activity['color'] }}-600">{{ substr($activity['name'], 0, 1) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $activity['name'] }}</p>
                        <p class="text-xs text-gray-500">{{ $activity['action'] }}</p>
                    </div>
                    <span class="text-xs text-gray-500 whitespace-nowrap">{{ $activity['time'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top Departments -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-bold text-gray-800">Departemen Teratas</h2>
                <button class="text-sm text-blue-600 hover:text-blue-700 font-semibold">Lihat Semua</button>
            </div>
            <div class="space-y-4">
                @php
                $departments = [
                ['name' => 'IT & Development', 'employees' => 45, 'percentage' => 92],
                ['name' => 'Marketing', 'employees' => 38, 'percentage' => 88],
                ['name' => 'Finance', 'employees' => 32, 'percentage' => 95],
                ['name' => 'Human Resources', 'employees' => 28, 'percentage' => 90],
                ['name' => 'Operations', 'employees' => 52, 'percentage' => 87],
                ];
                @endphp
                @foreach($departments as $dept)
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
                                <span class="text-sm font-bold text-white">{{ $dept['employees'] }}</span>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $dept['name'] }}</p>
                                <p class="text-xs text-gray-500">{{ $dept['employees'] }} Karyawan</p>
                            </div>
                        </div>
                        <span class="text-sm font-bold text-blue-600">{{ $dept['percentage'] }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-500"
                            style="width: {{ $dept['percentage'] }}%"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Aksi Cepat</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <a href="{{ route('employees.create') }}" class="flex flex-col items-center gap-3 p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 text-center">Tambah Karyawan</span>
            </a>

            <a href="{{ url('/attendances') }}" class="flex flex-col items-center gap-3 p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                        <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 text-center">Kehadiran</span>
            </a>

            <a href="{{ url('/salaries') }}" class="flex flex-col items-center gap-3 p-6 bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-orange-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 text-center">Payroll</span>
            </a>

            <a href="{{ url('/reports') }}" class="flex flex-col items-center gap-3 p-6 bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8Z" clip-rule="evenodd" />
                        <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                    </svg>
                </div>
                <span class="text-sm font-semibold text-gray-700 text-center">Laporan</span>
            </a>
        </div>
    </div>
</div>
@endsection