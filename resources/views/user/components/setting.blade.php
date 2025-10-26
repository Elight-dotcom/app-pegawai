@extends('user.master')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Header -->
    <div class="bg-blue-500 text-white border-2 border-gray-200 rounded-lg p-6 mb-6">
        <h1 class="text-3xl font-bold mb-2">Pengaturan Akun</h1>
        <p class="text-gray-200">Kelola informasi akun dan keamanan Anda</p>
    </div>

    <!-- Account Settings Menu -->
    <div class="bg-white border-2 border-gray-200 rounded-lg mb-6">
        <!-- Info Akun -->
        <a href="{{ route('user.settings.account-info') }}" class="flex items-center justify-between p-6 hover:bg-gray-50 transition duration-200 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Info Akun</h2>
                    <p class="text-sm text-gray-500">Kelola informasi profil Anda</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>

        <!-- Change Password -->
        <a href="{{ route('user.settings.change-password') }}" class="flex items-center justify-between p-6 hover:bg-gray-50 transition duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-green-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">Ubah Password</h2>
                    <p class="text-sm text-gray-500">Perbarui password akun Anda</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>

    <!-- Logout -->
    <div class="bg-white border-2 border-gray-200 rounded-lg">
        <button onclick="confirmLogout()" class="w-full flex items-center justify-between p-6 hover:bg-red-50 transition duration-200">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <div class="text-left">
                    <h2 class="text-lg font-semibold text-red-500">Logout</h2>
                    <p class="text-sm text-red-400">Keluar dari akun Anda</p>
                </div>
            </div>
            <svg class="w-5 h-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </div>
</div>

<!-- Logout Confirmation Modal -->
<div id="logoutModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-80 md:w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-center w-12 h-12 mx-auto bg-red-100 rounded-full">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 text-center mt-4">Konfirmasi Logout</h3>
            <p class="text-sm text-gray-500 text-center mt-2">
                Apakah Anda yakin ingin keluar dari akun Anda?
            </p>
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="closeLogoutModal()"
                    class="flex-1 px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-lg transition duration-200">
                    Batal
                </button>
                <form action="{{ route('logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit"
                        class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition duration-200">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Logout modal
    function confirmLogout() {
        document.getElementById('logoutModal').classList.remove('hidden');
    }

    // Close modal
    function closeLogoutModal() {
        document.getElementById('logoutModal').classList.add('hidden');
    }

    document.getElementById('logoutModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeLogoutModal();
        }
    });
</script>
@endsection