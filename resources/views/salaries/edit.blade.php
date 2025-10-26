@extends('master')
@section('content')
<div class="container mx-auto px-4 max-w-4xl mt-4 md:mt-10">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Salary</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Edit Data Gaji</h2>
            </div>
        </div>

        <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="p-4 md:p-6">
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
                        <select name="karyawan_id"
                            id="karyawan_id"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg bg-gray-50 cursor-not-allowed appearance-none @error('karyawan_id') border-red-500 @enderror"
                            disabled>
                            <option value="{{ $salary->karyawan_id }}" selected>
                                {{ $salary->employee->nama_lengkap }} - {{ $salary->employee->jabatan->nama_jabatan }}
                            </option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                    </div>
                    <!-- Hidden input untuk submit -->
                    <input type="hidden" name="karyawan_id" value="{{ $salary->karyawan_id }}">
                    <p class="text-xs text-gray-500">Karyawan tidak dapat diubah saat edit</p>
                    @error('karyawan_id')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bulan -->
                <div class="space-y-2">
                    <label for="bulan" class="block text-sm font-medium text-gray-700">
                        Bulan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <select id="bulan"
                            name="bulan"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('bulan') border-red-500 @enderror">
                            <option value="" disabled>Pilih Bulan</option>
                            <option value="Januari" {{ old('bulan', $salary->bulan) == 'Januari' ? 'selected' : '' }}>Januari</option>
                            <option value="Februari" {{ old('bulan', $salary->bulan) == 'Februari' ? 'selected' : '' }}>Februari</option>
                            <option value="Maret" {{ old('bulan', $salary->bulan) == 'Maret' ? 'selected' : '' }}>Maret</option>
                            <option value="April" {{ old('bulan', $salary->bulan) == 'April' ? 'selected' : '' }}>April</option>
                            <option value="Mei" {{ old('bulan', $salary->bulan) == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ old('bulan', $salary->bulan) == 'Juni' ? 'selected' : '' }}>Juni</option>
                            <option value="Juli" {{ old('bulan', $salary->bulan) == 'Juli' ? 'selected' : '' }}>Juli</option>
                            <option value="Agustus" {{ old('bulan', $salary->bulan) == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                            <option value="September" {{ old('bulan', $salary->bulan) == 'September' ? 'selected' : '' }}>September</option>
                            <option value="Oktober" {{ old('bulan', $salary->bulan) == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ old('bulan', $salary->bulan) == 'November' ? 'selected' : '' }}>November</option>
                            <option value="Desember" {{ old('bulan', $salary->bulan) == 'Desember' ? 'selected' : '' }}>Desember</option>
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

                <!-- Gaji Pokok (Readonly) -->
                <div class="space-y-2">
                    <label for="gaji_pokok" class="block text-sm font-medium text-gray-700">
                        Gaji Pokok <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <input type="number"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 bg-gray-50 cursor-not-allowed @error('gaji_pokok') border-red-500 @enderror"
                            id="gaji_pokok"
                            name="gaji_pokok"
                            value="{{ old('gaji_pokok', $salary->gaji_pokok) }}"
                            readonly>
                    </div>
                    <p class="text-xs text-gray-500">Gaji pokok tidak dapat diubah</p>
                    @error('gaji_pokok')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tunjangan -->
                <div class="space-y-2">
                    <label for="tunjangan" class="block text-sm font-medium text-gray-700">
                        Tunjangan
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <input type="number"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tunjangan') border-red-500 @enderror"
                            id="tunjangan"
                            name="tunjangan"
                            value="{{ old('tunjangan', $salary->tunjangan) }}"
                            placeholder="Masukkan tunjangan">
                    </div>
                    @error('tunjangan')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Potongan -->
                <div class="space-y-2">
                    <label for="potongan" class="block text-sm font-medium text-gray-700">
                        Potongan
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                            </svg>
                        </div>
                        <input type="number"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('potongan') border-red-500 @enderror"
                            id="potongan"
                            name="potongan"
                            value="{{ old('potongan', $salary->potongan) }}"
                            placeholder="Masukkan potongan">
                    </div>
                    @error('potongan')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Info Total Gaji -->
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
                                    <li>• Karyawan dan Gaji Pokok tidak dapat diubah</li>
                                    <li>• Total Gaji akan dihitung ulang: <strong>Gaji Pokok + Tunjangan - Potongan</strong></li>
                                    <li>• Total Gaji Saat Ini: <strong class="text-blue-900">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></li>
                                </ul>
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