@extends('master')
@section('content')
<div class="container mx-auto px-4 max-w-4xl mt-4 md:mt-10">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Kehadiran</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Form Kehadiran</h2>
            </div>
        </div>

        <form action="{{ route('attendances.store') }}" method="POST" class="p-4 md:p-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
                <!-- Karyawan -->
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
                        <select name="karyawan_id"
                            id="karyawan_id"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('karyawan_id') border-red-500 @enderror">
                            <option value="" disabled selected>Pilih Karyawan</option>
                            @foreach ($employees as $employee)
                            <option class="employee" value="{{ $employee->id }}" data-gaji="{{ $employee->jabatan->gaji_pokok }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('karyawan_id')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
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
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tunjangan') border-red-500 @enderror"
                            id="tanggal"
                            name="tanggal"
                            value="{{ old('tanggal', 0) }}">
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
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('bulan') border-red-500 @enderror">
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('bulan')
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
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tunjangan') border-red-500 @enderror"
                            id="waktu_masuk"
                            name="waktu_masuk"
                            value="{{ old('waktu_masuk') }}"
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
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tunjangan') border-red-500 @enderror"
                            id="waktu_keluar"
                            name="waktu_keluar"
                            value="{{ old('waktu_keluar') }}"
                            placeholder="Masukkan waktu keluar">
                    </div>
                    @error('waktu_keluar')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Info Total Gaji -->
                <div class="lg:col-span-2 mt-4">
                    <div class="bg-yellow-50 border-2 border-yellow-200 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-yellow-800 mb-1">Informasi</p>
                                <p class="text-xs text-yellow-700">Usahakan employee absensi menggunakan aplikasi <strong>Absensi Karyawan</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6 md:mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('salaries.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit"
                    class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection