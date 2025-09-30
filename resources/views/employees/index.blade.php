@extends('master')
@section('title', 'Employee')
@section('content')
<div class="flex justify-end items-center mb-6">
    <a href="{{ route('employees.create') }}" class="bg-gray-800 flex text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
        </svg>
        Tambah Employee
    </a>
</div>
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Nama Lengkap
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    No Telepon
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Tanggal Lahir
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Tanggal Masuk
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
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
                    {{ $employee->email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $employee->nomor_telepon }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $employee->tanggal_lahir }}
                </td>
                <td class="px-6 py-4">
                    {{ $employee->alamat }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $employee->tanggal_masuk }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $employee->status }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex flex-col">
                    <a href="{{ route('employees.show', $employee->id) }}" class="text-indigo-600 hover:text-indigo-900">Detail</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Delete -->
<div class="hidden fixed inset-0 bg-black bg-opacity-50 z-50" id="modal-delete">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex flex-col items-center justify-center">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Delete Product</h2>
                <p class="text-gray-700 mb-4">Are you sure you want to delete this product?</p>
                <div class="flex space-x-4">
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600" id="delete-button">Delete</button>
                    </form>
                    <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600" id="cancel-delete">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection