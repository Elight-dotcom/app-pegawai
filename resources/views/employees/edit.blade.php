@extends('master')
@section('content')
<div class="container mx-auto md:px-4 max-w-4xl mt-4 md:mt-8 mb-4 md:mb-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Employee</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Form Data Karyawan</h2>
            </div>
        </div>

        <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="p-4 md:p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">
                <!-- Nama Lengkap -->
                <div class="space-y-2">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <input type="text"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('nama_lengkap') border-red-500 @enderror"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                            placeholder="Masukkan nama lengkap">
                    </div>
                    @error('nama_lengkap')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="email"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('email') border-red-500 @enderror"
                            id="email"
                            name="email"
                            value="{{ old('email', $employee->email) }}"
                            placeholder="email@example.com">
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div class="space-y-2">
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">
                        Nomor Telepon <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <input type="text"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('nomor_telepon') border-red-500 @enderror"
                            id="nomor_telepon"
                            name="nomor_telepon"
                            value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                            placeholder="08123456789">
                    </div>
                    @error('nomor_telepon')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div class="space-y-2">
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">
                        Tanggal Lahir <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="date"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tanggal_lahir') border-red-500 @enderror"
                            id="tanggal_lahir"
                            name="tanggal_lahir"
                            value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
                    </div>
                    @error('tanggal_lahir')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Masuk -->
                <div class="space-y-2">
                    <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">
                        Tanggal Masuk <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="date"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('tanggal_masuk') border-red-500 @enderror"
                            id="tanggal_masuk"
                            name="tanggal_masuk"
                            value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}">
                    </div>
                    @error('tanggal_masuk')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <select name="status"
                            id="status"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('status') border-red-500 @enderror">
                            <option value="aktif" {{ old('status') || $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="nonaktif" {{ old('status') || $employee->status == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('status')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department -->
                <div class="space-y-2">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">
                        Department <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <select name="department_id"
                            id="department_id"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('department_id') border-red-500 @enderror">
                            <option value="">Pilih Department</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') || $employee->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->nama_departemen }}
                            </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('department_id')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jabatan -->
                <div class="space-y-2">
                    <label for="jabatan_id" class="block text-sm font-medium text-gray-700">
                        Jabatan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                            </svg>
                        </div>
                        <select name="jabatan_id"
                            id="jabatan_id"
                            class="w-full pl-10 pr-10 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none @error('jabatan_id') border-red-500 @enderror">
                            <option value="">Pilih Jabatan</option>
                            @foreach ($positions as $position)
                            <option value="{{ $position->id }}" {{ old('jabatan_id') || $employee->jabatan_id == $position->id ? 'selected' : '' }}>
                                {{ $position->nama_jabatan }}
                            </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('jabatan_id')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Alamat (Full Width) -->
            <div class="space-y-2 mt-4 md:mt-6">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                    Alamat <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <textarea
                        name="alamat"
                        id="alamat"
                        rows="3"
                        class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('alamat') border-red-500 @enderror"
                        placeholder="Masukkan alamat lengkap">{{ old('alamat') ?? $employee->alamat }}</textarea>
                </div>
                @error('alamat')
                <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6 md:mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('employees.index') }}"
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