@extends('master')
@section('content')
<div class="container mx-auto md:px-4 max-w-4xl mt-4 md:mt-8 mb-4 md:mb-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Edit Departemen</h1>
    </div>
    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Form Data Departemen</h2>
            </div>
        </div>

        <form action="{{ route('departments.update', $department->id) }}" method="POST" class="p-4 md:p-6">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 gap-4 md:gap-6">
                <!-- Nama Departemen -->
                <div class="space-y-2">
                    <label for="nama_departemen" class="block text-sm font-medium text-gray-700">
                        Nama Departemen <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <input type="text"
                            class="w-full pl-10 pr-3 py-2.5 text-sm md:text-base border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent @error('nama_lengkap') border-red-500 @enderror"
                            id="nama_departemen"
                            name="nama_departemen"
                            value="{{ old('nama_departemen', $department->nama_departemen) }}"
                            placeholder="Masukkan nama departemen">
                    </div>
                    @error('nama_departemen')
                    <p class="text-red-500 text-xs md:text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6 md:mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('departments.index') }}"
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