@extends('master')
@section('title', 'Employee')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div id="search">
        <form action="{{ route('employees.index') }}" method="get">
            <input name='search' autocomplete="off" type="text" id="searchInput" placeholder="Cari Employee..." class="bg-white border-2 border-gray-500 text-gray-900 text-sm px-4 py-2 rounded-lg">
        </form>
    </div>
    <a href="{{ route('employees.create') }}" class="bg-gray-800 flex text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
        </svg>
        Tambah Employee
    </a>
</div>
@if(session('error'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 alert">
    {{ session('error') }}
</div>
@elseif(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 alert">
    {{ session('success') }}
</div>
@endif
<div class="bg-white rounded-lg shadow-md overflow-x-auto">
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
                    Departemen
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Jabatan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    No Telepon
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
                    {{ $employee->department->nama_departemen }}
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
                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-lg">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                            </svg>
                        </a>
                        <button type="buttons" data-url="{{ route('employees.destroy', $employee->id) }}" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-lg cursor-pointer delete-btn">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                            </svg>
                        </button>
                        @if ($employee->user)
                        <button type="button" class="bg-gray-400 text-white p-1 rounded-lg cursor-not-allowed" disabled title="User sudah dibuat">
                            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        @else
                        <form action="{{ route('employees.createUser', $employee->id) }}" method="post" style="display: inline;">
                            @csrf
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white p-1 rounded-lg" title="Buat User">
                                <svg class="w-6 h-6 text--white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4 mx-2 items-center text-white">
    {{ $employees->links() }}
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".tanggal").forEach(function(el) {
            const date = new Date(el.textContent);
            el.textContent = date.toLocaleDateString("id-ID", {
                day: "2-digit",
                month: "long",
                year: "numeric"
            });
        });

        document.querySelectorAll(".telepon").forEach(function(tel) {
            tel.textContent = tel.textContent.replace(/(\d{1,4})(\d{4})(\d)/, "$1-$2-$3");
        });

        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    });
</script>
@endsection