@extends('master')
@section('content')
<div>
    <h1 class="text-2xl font-bold mb-5">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <!-- Nama Lengkap -->
        <div class="flex flex-col space-y-2">
            <label for="nama_lengkap" class="block text-sm font-medium text-black mb-2">Nama Lengkap</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap',  $employee->nama_lengkap )}}">
            @error('nama_lengkap')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="flex flex-col space-y-2">
            <label for="email" class="block text-sm font-medium text-black mb-2">Email</label>
            <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="email" name="email" value="{{ old('email',  $employee->email )}}">
            @error('email')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Nomor Telepon -->
        <div class="flex flex-col space-y-2">
            <label for="nomor_telepon" class="block text-sm font-medium text-black mb-2">Nomor Telepon</label>
            <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon',  $employee->nomor_telepon )}}">
            @error('nomor_telepon')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Lahir -->
        <div class="flex flex-col space-y-2">
            <label for="tanggal_lahir" class="block text-sm font-medium text-black mb-2">Tanggal Lahir</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir',  $employee->tanggal_lahir )}}">
            @error('tanggal_lahir')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Alamat -->
        <div class="flex flex-col space-y-2">
            <label for="alamat" class="block text-sm font-medium text-black mb-2">Alamat</label>
            <textarea
                name="alamat"
                rows="3"
                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">{{ old('alamat',  $employee->alamat )}}</textarea>
            @error('alamat')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Masuk -->
        <div class="flex flex-col space-y-2">
            <label for="tanggal_masuk" class="block text-sm font-medium text-black mb-2">Tanggal Masuk</label>
            <input type="date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary @error('name') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk',  $employee->tanggal_masuk )}}">
            @error('tanggal_masuk')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Status -->
        <div class="flex flex-col space-y-2">
            <label for="status" class="block text-sm font-medium text-black mb-2">Status</label>
            <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                <option value="aktif" @if($employee->status == 'aktif') selected @endif>Aktif</option>
                <option value="nonaktif" @if($employee->status == 'nonaktif') selected @endif>Non-Aktif</option>
            </select>
            @error('status')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Department -->
        <div class="flex flex-col space-y-2">
            <label for="department_id" class="block text-sm font-medium text-black mb-2">Department</label>
            <select name="department_id" id="department_id" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                @foreach ($departments as $department)
                <option value="{{ $department->id }}">{{ $department->nama_departemen }}</option>
                @endforeach
            </select>
            @error('department_id')
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <!-- Position -->
        <div class="flex flex-col space-y-2">
            <label for="jabatan_id" class="block text-sm font-medium text-black mb-2">Department</label>
            <select name="jabatan_id" id="jabatan_id" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                @endforeach
            </select>
            @error('jabatan_id')
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