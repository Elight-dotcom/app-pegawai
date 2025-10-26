@extends('master')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Header dengan Tombol Kembali -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Detail Kehadiran</h1>
        <a href="{{ route('attendances.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </div>

    <!-- Informasi Karyawan -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Informasi Karyawan</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Nama Lengkap</p>
                        <p class="text-base font-semibold text-gray-800">{{ $attendance->karyawan->nama_lengkap }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Jabatan</p>
                        <p class="text-base font-semibold text-gray-800">{{ $attendance->karyawan->jabatan->nama_jabatan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informasi Kehadiran -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Tanggal -->
        <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
            <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-300">Tanggal Kehadiran</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Tanggal</p>
                        <p class="text-xl font-bold text-gray-800">{{ \Carbon\Carbon::parse($attendance->tanggal)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status -->
        <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
            <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h2 class="text-lg font-semibold text-gray-300">Status Kehadiran</h2>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 
                        @if($attendance->status_absensi == 'hadir') bg-green-100
                        @elseif($attendance->status_absensi == 'izin') bg-yellow-100
                        @elseif($attendance->status_absensi == 'sakit') bg-blue-100
                        @else bg-red-100
                        @endif 
                        rounded-lg flex items-center justify-center flex-shrink-0">
                        @if($attendance->status_absensi == 'hadir')
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        @elseif($attendance->status_absensi == 'izin')
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        @elseif($attendance->status_absensi == 'sakit')
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                        @else
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        @endif
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <p class="text-xl font-bold capitalize
                            @if($attendance->status_absensi == 'hadir') text-green-600
                            @elseif($attendance->status_absensi == 'izin') text-yellow-600
                            @elseif($attendance->status_absensi == 'sakit') text-blue-600
                            @else text-red-600
                            @endif">
                            {{ $attendance->status_absensi }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Waktu Masuk dan Waktu Keluar -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden mb-6">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Waktu Masuk dan Keluar</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Jam Masuk</p>
                        <p class="text-xl font-bold text-green-600">
                            {{ $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Jam Keluar</p>
                        <p class="text-xl font-bold text-red-600">
                            {{ $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Back, Edit, dan Hapus -->
    <div class="flex justify-end gap-3 mb-6">
        <!-- Tombol Back -->
        <a href="{{ route('attendances.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Kembali
        </a>

        <!-- Tombol Edit -->
        <a href="{{ route('attendances.edit', $attendance->id) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data kehadiran ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection