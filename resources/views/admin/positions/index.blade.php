@extends('admin.master')
@section('title', 'Position')
@section('content')
<div class="flex flex-wrap justify-between items-end gap-6 mb-8">
    <!-- Form Search -->
    <form action="{{ route('positions.index') }}" method="get"
        class="flex flex-wrap items-end gap-3">

        <!-- Search -->
        <div>
            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Position</label>
            <input name="search" autocomplete="off" type="text" id="search"
                placeholder="Cari Position..."
                value="{{ request('search') }}"
                class="bg-white border border-gray-300 text-gray-900 text-sm px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:border-gray-400 transition-all duration-200 w-56">
        </div>

        <!-- Tombol Filter -->
        <div class="flex items-end gap-2">
            <button type="submit"
                class="bg-gray-800 hover:bg-gray-600 text-white text-sm font-semibold px-4 py-2 rounded-lg shadow-md transition-all duration-200 cursor-pointer">
                🔍 Filter
            </button>
        </div>
    </form>


    <!-- Tombol Tambah Position -->
    <a href="{{ route('positions.create') }}"
        class="flex items-center bg-gradient-to-r from-gray-800 to-gray-600 hover:from-gray-700 hover:to-gray-500 text-white font-semibold px-5 py-3 rounded-lg shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Position
    </a>
</div>

<div class="bg-white rounded-lg shadow-md overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Nama Jabatan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Gaji
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody id="products-table" class="bg-white divide-y divide-gray-200 text-sm">
            @foreach($positions as $position)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $position->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $position->nama_jabatan }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $position->gaji_pokok }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex flex-row gap-2">
                    <a href="{{ route('positions.show', $position->id) }}" class="bg-green-500 hover:bg-green-600 text-white p-1 rounded-lg">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </a>
                    <a href="{{ route('positions.edit', $position->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white p-1 rounded-lg">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                        </svg>
                    </a>
                    <button type="buttons" data-url="{{ route('positions.destroy', $position->id) }}" class="bg-red-500 hover:bg-red-600 text-white p-1 rounded-lg cursor-pointer delete-btn">
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
    {{ $positions->links() }}
</div>
@endsection