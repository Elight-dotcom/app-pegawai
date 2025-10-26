@extends('master')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Jabatan -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden mb-6">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Jabatan</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Posisi</p>
                        <p class="text-xl font-bold text-gray-800">{{ $position->nama_jabatan }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Gaji Pokok</p>
                        <p class="text-xl font-bold text-green-600">$ {{ $position->gaji_pokok }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Back, Edit, dan Hapus -->
    <div class="flex justify-end gap-3 mb-6">
        <!-- Tombol Kembali -->
        <a href="{{ route('positions.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Kembali
        </a>

        <!-- Tombol Edit -->
        <a href="{{ route('positions.edit', $position->id) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                Hapus
            </button>
        </form>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-x-auto border-2 border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800 text-gray-300">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Nama Lengkap
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Departemen
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        No Telepon
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody id="products-table" class="bg-white divide-y divide-gray-200 text-sm">
                @foreach($employees as $employee)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $employee->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $employee->nama_lengkap }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $employee->department->nama_departemen }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{ $employee->email }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap telepon">
                        {{ $employee->nomor_telepon }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($employee->status == 'aktif')
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Aktif
                        </span>
                        @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            Tidak Aktif
                        </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex flex-row gap-2 items-center">
                            <a href="{{ route('employees.show', $employee->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded-lg">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection