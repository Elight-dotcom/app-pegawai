@extends('master')
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5">Tambah Position</h1>
    <form action="{{ route('positions.store') }}" method="POST" class="space-y-4">
        @csrf
        <!-- Nama Jabatan -->
        <div class="flex flex-col space-y-2">
            <label for="nama_jabatan" class="block text-sm font-medium text-black mb-2">Nama Jabatan</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="nama_jabatan" name="nama_jabatan" value="{{ old('nama_jabatan') }} ">
            @error('nama_jabatan')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gaji Pokok -->
        <div class="flex flex-col space-y-2">
            <label for="gaji_pokok" class="block text-sm font-medium text-black mb-2">Gaji Pokok</label>
            <input type="number" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }} ">
            @error('gaji_pokok')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-start">
            <button type="submit" class="bg-gray-800 hover:bg-gray-800/80 text-white cursor-pointer px-4 py-2 rounded-md">Create</button>
        </div>
    </form>
</div>
@endsection