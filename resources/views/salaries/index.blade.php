@extends('master')
@section('title', 'Salary')
@section('content')
<div class="flex justify-between items-center mb-6">
    <div id="search">
        <form action="{{ route('salaries.index') }}" method="get">
            <input name='search' autocomplete="off" type="text" id="searchInput" placeholder="Cari salary..." class="bg-white border-2 border-gray-500 text-gray-900 text-sm px-4 py-2 rounded-lg">
        </form>
    </div>
    <a href="{{ route('salaries.create') }}" class="bg-gray-800 flex text-white px-4 py-2 rounded-lg hover:bg-gray-500 transition-colors">
        <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
        </svg>
        Tambah Salary
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
                    Nama Karyawan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Bulan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Gaji Pokok
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Tunjangan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Potongan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Total Gaji
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody id="products-table" class="bg-white divide-y divide-gray-200 text-sm">
            @foreach($salaries as $salary)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->employee->nama_lengkap }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->bulan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->gaji_pokok }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->tunjangan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->potongan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $salary->total_gaji }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex flex-row gap-2">
                    <a href="{{ route('salaries.show', $salary->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded-lg">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </a>
                    <a href="{{ route('salaries.edit', $salary->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-lg">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                        </svg>
                    </a>
                    <button type="buttons" data-url="{{ route('salaries.destroy', $salary->id) }}" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-lg delete-btn">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                        </svg>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-4 mx-2 items-center text-white">
    {{ $salaries->links() }}
</div>
@endsection