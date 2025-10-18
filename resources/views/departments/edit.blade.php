@extends('master')
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5">Edit department</h1>
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <!-- Nama Departemen -->
        <div class="flex flex-col space-y-2">
            <label for="nama_departemen" class="block text-sm font-medium text-black mb-2">Nama Lengkap</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="nama_departemen" name="nama_departemen" value="{{ old('nama_departemen',  $department->nama_departemen )}}">
            @error('nama_departemen')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-start">
            <button type="submit" class="bg-gray-800 hover:bg-gray-800/80 text-white px-4 py-2 rounded-md">Update</button>
        </div>
    </form>
</div>
@endsection