@extends('user.master')
@section('title', 'Profil Saya')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Header -->
    <div class="bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg p-8 mb-6 text-white">
        <div class="flex items-center gap-6">
            <div>
                <h1 class="text-3xl font-bold mb-1">Ubah Password</h1>
                <p class="text-blue-100 text-md">Ubah kata sandi Anda</p>
            </div>
        </div>
    </div>

    <!-- Notification -->
    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 alert">
        {{ session('error') }}
    </div>
    @elseif(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Password Section -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <!-- Header -->
        <div class="bg-gray-50 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                </svg>

                <h2 class="text-lg font-semibold text-gray-800">Ubah Password</h2>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('user.settings.change-password') }}" method="post" class="space-y-4">
                @csrf
                @method('PUT')
                <!-- Old Password -->
                <div class="flex items-start gap-3">
                    <div class="flex-1">
                        <label for="old_password" class="text-sm text-gray-500 mb-1">Password Lama</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="old_password" name="old_password" value="{{ old('old_password') }}">
                        @error('old_password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- New Password -->
                <div class="flex items-start gap-3">
                    <div class="flex-1">
                        <label for="password" class="text-sm text-gray-500 mb-1">Password Baru</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="password" name="password">
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Confirm Password -->
                <div class="flex items-start gap-3">
                    <div class="flex-1">
                        <label for="password_confirmation" class="text-sm text-gray-500 mb-1">Konfirmasi Password</label>
                        <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="flex items-start gap-3">
                    <div class="flex-1">
                        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">Ubah Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
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
</script>
@endsection