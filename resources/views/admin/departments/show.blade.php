@extends('admin.master')
@section('title', 'Department')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Departemen -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden mb-6">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Departemen</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-start gap-3">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-500 mb-1">Nama Departemen</p>
                    <p class="text-xl font-bold text-gray-800">{{ $department->nama_departemen }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Back, Edit, dan Hapus -->
    <div class="flex justify-end gap-3 mb-6">
        <!-- Tombol Kembali -->
        <a href="{{ route('departments.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Kembali
        </a>

        <!-- Tombol Edit -->
        <a href="{{ route('departments.edit', $department->id) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                        Jabatan
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
                        {{ $employee->jabatan->nama_jabatan }}
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