<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App-Pegawai</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Sidebar -->
    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-40 h-screen transition-transform -translate-x-full sm:translate-x-0 shadow-lg"
        aria-label="Sidebar">
        <div class="h-full px-3 py-6 flex flex-col justify-between bg-black rounded-r-2xl">
            <div class="text-center text-white font-bold mb-5 text-2xl">
                <h1>@yield('title', 'App Pegawai')</h1>
            </div>
            <ul class="space-y-3 font-medium">
                <!-- Employee -->
                <li>
                    <a href="{{ route('employees.index') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group {{ request()->routeIs('employees.*') ? 'text-white bg-gray-700 rounded-lg' : 'text-gray-300 rounded-lg hover:bg-gray-800/70 hover:text-white' }}">
                        <svg class="w-7 h-7 mb-1" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">Employee</span>
                    </a>
                </li>
                <!-- Departement -->
                <li>
                    <a href="{{ url('/departments') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group  {{ request()->routeIs('departments.*') ? 'text-white bg-gray-700 rounded-lg' : 'text-gray-300 rounded-lg hover:bg-gray-800/70 hover:text-white' }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">Departement</span>
                    </a>
                </li>
                <!-- Position -->
                <li>
                    <a href="{{ url('/positions') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group  {{ request()->routeIs('positions.*') ? 'text-white bg-gray-700 rounded-lg' : 'text-gray-300 rounded-lg hover:bg-gray-800/70 hover:text-white' }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6 2c-1.10457 0-2 .89543-2 2v4c0 .55228.44772 1 1 1s1-.44772 1-1V4h12v7h-2c-.5523 0-1 .4477-1 1v2h-1c-.5523 0-1 .4477-1 1s.4477 1 1 1h5c.5523 0 1-.4477 1-1V3.85714C20 2.98529 19.3667 2 18.268 2H6Z" />
                            <path d="M6 11.5C6 9.567 7.567 8 9.5 8S13 9.567 13 11.5 11.433 15 9.5 15 6 13.433 6 11.5ZM4 20c0-2.2091 1.79086-4 4-4h3c2.2091 0 4 1.7909 4 4 0 1.1046-.8954 2-2 2H6c-1.10457 0-2-.8954-2-2Z" />
                        </svg>
                        <span class="text-sm">Positions</span>
                    </a>
                </li>
                <!-- Salaries -->
                <li>
                    <a href="{{ url('/salaries') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group  {{ request()->routeIs('salaries.*') ? 'text-white bg-gray-700 rounded-lg' : 'text-gray-300 rounded-lg hover:bg-gray-800/70 hover:text-white' }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M7 6a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2h-2v-4a3 3 0 0 0-3-3H7V6Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M2 11a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-7Zm7.5 1a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5Z" clip-rule="evenodd" />
                            <path d="M10.5 14.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                        </svg>
                        <span class="text-sm">Salaries</span>
                    </a>
                </li>
                <!-- Attendance -->
                <li>
                    <a href="{{ url('/attendances') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group  {{ request()->routeIs('attendances.*') ? 'text-white bg-gray-700 rounded-lg' : 'text-gray-300 rounded-lg hover:bg-gray-800/70 hover:text-white' }}">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Z" />
                            <path fill-rule="evenodd" d="M11 7V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm4.707 5.707a1 1 0 0 0-1.414-1.414L11 14.586l-1.293-1.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4Z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-sm">Attendance</span>
                    </a>
                </li>
                <!-- Report -->
                <li>
                    <a href="{{ url('/reports') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
                            <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
                        </svg>
                        <span class="text-sm">Report</span>
                    </a>
                </li>
                <!-- Settings -->
                <li>
                    <a href="{{ url('/settings') }}"
                        class="flex flex-col items-center p-3 transition-colors duration-200 group">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                        <span class="text-sm">Setting</span>
                    </a>
                </li>
            </ul>
            <footer class="mt-auto text-gray-400 text-center text-xs">
                <p>&copy; {{ date('Y') }} App Pegawai</p>
            </footer>
        </div>
    </aside>

    <!-- Content -->
    <main class="p-6 sm:ml-40">
        <div class="p-6 bg-white border border-gray-200 rounded-2xl shadow-sm">
            <main class="p-2 mt-2">
                @yield('content')
            </main>
        </div>
    </main>

    <!-- Modal Konfirmasi Hapus -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-500/70 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg w-96 p-6 text-center">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
            <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan.</p>
            <div class="flex justify-center gap-4">
                <button id="cancelDelete" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Batal</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const deleteModal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');

            // Saat klik tombol delete → tampilkan modal
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const url = this.getAttribute('data-url');
                    deleteForm.setAttribute('action', url);
                    deleteModal.classList.remove('hidden');
                });
            });

            // Klik batal → sembunyikan modal
            cancelDelete.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });

            // Klik di luar modal → tutup modal
            deleteModal.addEventListener('click', function(e) {
                if (e.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>