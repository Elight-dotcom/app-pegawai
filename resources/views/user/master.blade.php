<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pegawai - Sistem Manajemen Karyawan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-50">
    <!-- Main Content -->
    <main class="pb-24 min-h-screen">
        @yield('content')
    </main>

    <!-- Bottom Navigation For Mobile -->
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t-2 border-gray-200 shadow-lg z-50">
        <ul class="flex justify-around items-center px-2 py-3">
            <!-- Attendance -->
            <li class="flex-1">
                <a href="{{ route('user.attendances.index') }}"
                    class="flex flex-col items-center gap-1 py-2 rounded-lg transition-all duration-200 {{ request()->routeIs('user.attendances.*') ? 'text-blue-500' : 'text-gray-300 hover:text-blue-300 hover:bg-blue-50' }}">
                    <svg class="w-6 h-6" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                    </svg>
                    <span class="text-xs font-medium">Absensi</span>
                </a>
            </li>

            <!-- Task -->
            <li class="flex-1">
                <a href="{{ route('user.tasks.index') }}"
                    class="flex flex-col items-center gap-1 py-2 rounded-lg transition-all duration-200 {{ request()->routeIs('user.tasks.*') ? 'text-blue-500' : 'text-gray-300 hover:text-blue-300 hover:bg-blue-50' }}">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                    </svg>
                    <span class="text-xs font-medium">Task</span>
                </a>
            </li>

            <!-- Settings -->
            <li class="flex-1">
                <a href="{{ route('user.settings.index') }}"
                    class="flex flex-col items-center gap-1 py-2 rounded-lg transition-all duration-200 {{ request()->routeIs('user.settings.*') ? 'text-blue-500' : 'text-gray-300 hover:text-blue-300 hover:bg-blue-50' }}">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    </svg>
                    <span class="text-xs font-medium">Pengaturan</span>
                </a>
            </li>
        </ul>
    </nav>
</body>

</html>