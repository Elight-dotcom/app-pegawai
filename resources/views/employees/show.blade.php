@extends('master')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h2 class="text-2xl font-semibold text-gray-800">Detail Employee</h2>
    </div>
    <a href="{{ route('employees.index') }}" class="bg-gray-800 flex text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 19-7-7 7-7" />
        </svg>
        Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
        <table class="text-left border-separate border-spacing-2">
            <tr>
                <th class="pr-5">Nama Lengkap</th>
                <td>{{ $employee->nama_lengkap }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $employee->email }}</td>
            </tr>
            <tr>
                <th>No Telepon</th>
                <td>{{ $employee->nomor_telepon }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $employee->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>{{ $employee->alamat }}</td>
            </tr>
            <tr>
                <th>Tanggal Masuk</th>
                <td>{{ $employee->tanggal_masuk }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $employee->status }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection