@extends('admin.master')
@section('title', 'Salary')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
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
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500 mb-1">Nama Lengkap</p>
                    <p class="text-xl font-bold text-gray-800">{{ $salary->employee->nama_lengkap }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Gaji -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden mb-6">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Gaji</h2>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Bulan</p>
                        <p class="text-xl font-bold text-gray-800">{{ $salary->bulan }}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Gaji Pokok</p>
                        <p class="text-xl font-bold text-blue-600">$ {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Tunjangan</p>
                        <p class="text-xl font-bold text-green-600">+ $ {{ number_format($salary->tunjangan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Potongan</p>
                        <p class="text-xl font-bold text-red-600">- $ {{ number_format($salary->potongan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Gaji -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Total Gaji</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-5 0a3 3 0 110 6H9l3 3m-3-6h6m6 1a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500 mb-1">Total Gaji Bersih</p>
                    <p class="text-2xl font-bold text-yellow-600">Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Back, Edit, dan Hapus -->
    <div class="flex justify-end gap-3 mb-6">
        <!-- Tombol Kembali -->
        <a href="{{ route('salaries.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Kembali
        </a>

        <!-- Tombol Edit -->
        <a href="{{ route('salaries.edit', $salary->id) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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