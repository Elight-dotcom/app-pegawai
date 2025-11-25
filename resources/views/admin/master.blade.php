<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pegawai - Sistem Manajemen Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gradient-to-br from-gray-50 to-gray-100 font-sans antialiased">
    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="fixed top-4 left-4 z-50 sm:hidden bg-black text-white p-3 rounded-xl shadow-lg hover:bg-gray-800 transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- Overlay for mobile -->
    <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 sm:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="fixed top-0 left-0 z-40 w-64 sm:w-20 lg:w-64 h-screen transition-all duration-300 -translate-x-full sm:translate-x-0 shadow-2xl"
        aria-label="Sidebar">
        <div class="h-full px-4 py-6 flex flex-col bg-gradient-to-b from-gray-900 via-black to-gray-900 rounded-r-3xl">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 mb-4">
                    <h1 class="text-white font-bold text-xl lg:text-2xl">@yield('title', 'App Pegawai')</h1>
                </div>
            </div>

            <!-- Menu Items -->
            <nav class="flex-1 overflow-y-auto space-y-2 scrollbar-thin scrollbar-thumb-gray-700">
                <!-- Employee -->
                <a href="{{ route('employees.index') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('employees.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Employee</span>
                </a>

                <!-- Department -->
                <a href="{{ url('/departments') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('departments.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Departement</span>
                </a>

                <!-- Position -->
                <a href="{{ url('/positions') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('positions.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 2c-1.10457 0-2 .89543-2 2v4c0 .55228.44772 1 1 1s1-.44772 1-1V4h12v7h-2c-.5523 0-1 .4477-1 1v2h-1c-.5523 0-1 .4477-1 1s.4477 1 1 1h5c.5523 0 1-.4477 1-1V3.85714C20 2.98529 19.3667 2 18.268 2H6Z" />
                            <path d="M6 11.5C6 9.567 7.567 8 9.5 8S13 9.567 13 11.5 11.433 15 9.5 15 6 13.433 6 11.5ZM4 20c0-2.2091 1.79086-4 4-4h3c2.2091 0 4 1.7909 4 4 0 1.1046-.8954 2-2 2H6c-1.10457 0-2-.8954-2-2Z" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Positions</span>
                </a>

                <!-- Salaries -->
                <a href="{{ url('/salaries') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('salaries.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Salaries</span>
                </a>

                <!-- Attendance -->
                <a href="{{ url('/attendances') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('attendances.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                            <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Attendance</span>
                </a>

                <!-- Tasks -->
                <a href="{{ url('/tasks') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('tasks.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Task</span>
                </a>

                <!-- Reports -->
                <a href="{{ url('/reports') }}"
                    class="group flex items-center gap-3 p-3 rounded-xl transition-all duration-300 {{ request()->routeIs('reports.*') ? 'text-white bg-gradient-to-r from-blue-600 to-blue-700 shadow-lg shadow-blue-500/50' : 'text-gray-300 hover:text-white hover:bg-white/10' }}">
                    <div class="bg-white/20 p-2 rounded-lg group-hover:bg-white/30 transition-all">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                            <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                        </svg>
                    </div>
                    <span class="font-semibold sm:hidden lg:block">Report</span>
                </a>
            </nav>

            <!-- Logout Button -->
            <button onclick="confirmLogout()" class="mt-4 w-full flex items-center gap-3 p-3 rounded-xl bg-red-600/20 text-red-400 hover:bg-red-600 hover:text-white transition-all duration-300 group cursor-pointer">
                <div class="bg-red-500/20 p-2 rounded-lg group-hover:bg-white/20 transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <div class="text-left sm:hidden lg:block">
                    <h2 class="text-sm font-semibold">Logout</h2>
                    <p class="text-xs opacity-80">Keluar dari akun</p>
                </div>
            </button>

            <!-- Footer -->
            <footer class="mt-4 text-gray-500 text-center text-xs">
                <p>&copy; {{ date('Y') }} App Pegawai</p>
            </footer>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="p-4 sm:p-6 sm:ml-20 lg:ml-64 transition-all duration-300 mt-14 md:mt-0">
        <div class="p-4 sm:p-6 lg:p-8 bg-white border border-gray-200 rounded-2xl shadow-lg">
            <main class="p-2 mt-2">
                @yield('content')
            </main>
        </div>
    </main>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 sm:p-8 transform transition-all">
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Konfirmasi Hapus</h2>
                <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan.</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button id="cancelDelete" class="flex-1 px-6 py-3 bg-gray-200 text-gray-800 rounded-xl font-semibold hover:bg-gray-300 transition-colors duration-300">
                        Batal
                    </button>
                    <form id="deleteForm" method="POST" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-6 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition-colors duration-300 shadow-lg hover:shadow-red-500/50">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div id="logoutModal" class="hidden fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-6 sm:p-8 transform transition-all">
            <div class="text-center">
                <div class="mx-auto w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Konfirmasi Logout</h3>
                <p class="text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari akun Anda?</p>
                <div class="flex flex-col sm:flex-row gap-3">
                    <button type="button" onclick="closeLogoutModal()"
                        class="flex-1 px-6 py-3 bg-gray-200 text-gray-800 rounded-xl font-semibold hover:bg-gray-300 transition-colors duration-300">
                        Batal
                    </button>
                    <form action="{{ route('logout') }}" method="POST" class="flex-1">
                        @csrf
                        <button type="submit"
                            class="w-full px-6 py-3 bg-red-600 text-white rounded-xl font-semibold hover:bg-red-700 transition-colors duration-300 shadow-lg hover:shadow-red-500/50">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Close sidebar on mobile when clicking a link
        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 640) {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');
                }
            });
        });

        // Logout modal
        function confirmLogout() {
            document.getElementById('logoutModal').classList.remove('hidden');
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').classList.add('hidden');
        }

        document.getElementById('logoutModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeLogoutModal();
            }
        });

        // Delete modal
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    deleteForm.setAttribute('action', url);
                    deleteModal.classList.remove('hidden');
                });
            });

            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>