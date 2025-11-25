@extends('admin.master')
@section('title', 'Attendance')
@section('content')
<div class="container mx-auto px-4 max-w-4xl mt-4 md:mt-10">
    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Edit Data Kehadiran</h2>
            </div>
        </div>

        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="p-4 md:p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
                <!-- Karyawan (Disabled) -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="karyawan_id" class="block text-sm font-medium text-gray-700">
                        Karyawan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <select name="karyawan_id_display"
                            id="karyawan_id"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed appearance-none"
                            disabled>
                            <option value="{{ $attendance->karyawan_id }}" selected>
                                {{ $attendance->karyawan->nama_lengkap }}
                            </option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- Hidden input untuk submit -->
                    <input type="hidden" name="karyawan_id" value="{{ $attendance->karyawan_id }}">
                    <p class="text-xs text-gray-500">Karyawan tidak dapat diubah saat edit</p>
                </div>

                <!-- Tanggal -->
                <div class="space-y-2">
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="date"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tanggal') border-red-500 @enderror"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', $attendance->tanggal) }}">
                    </div>
                    @error('tanggal')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="status_absensi" class="block text-sm font-medium text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 21-5-4-5 4V3.889a.92.92 0 0 1 .244-.629.808.808 0 0 1 .59-.26h8.333a.81.81 0 0 1 .589.26.92.92 0 0 1 .244.63V21Z" />
                            </svg>
                        </div>
                        <select id="status_absensi"
                            name="status_absensi"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('status_absensi') border-red-500 @enderror">
                            <option value="" disabled>Pilih Status</option>
                            <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('status_absensi')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Masuk -->
                <div class="space-y-2">
                    <label for="waktu_masuk" class="block text-sm font-medium text-gray-700">
                        Waktu Masuk
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <input type="time"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('waktu_masuk') border-red-500 @enderror"
                            id="waktu_masuk"
                            name="waktu_masuk"
                            value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                            placeholder="Masukkan waktu masuk">
                    </div>
                    @error('waktu_masuk')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Waktu Keluar -->
                <div class="space-y-2">
                    <label for="waktu_keluar" class="block text-sm font-medium text-gray-700">
                        Waktu Keluar
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </div>
                        <input type="time"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('waktu_keluar') border-red-500 @enderror"
                            id="waktu_keluar"
                            name="waktu_keluar"
                            value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                            placeholder="Masukkan waktu keluar">
                    </div>
                    @error('waktu_keluar')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Info Edit -->
                <div class="lg:col-span-2 mt-4">
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-blue-800 mb-1">Informasi Edit</p>
                                <ul class="text-xs text-blue-700 space-y-1">
                                    <li>• Karyawan tidak dapat diubah saat edit</li>
                                    <li>• Anda dapat mengubah tanggal, status_absensi, dan waktu kehadiran</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6 md:mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('attendances.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection