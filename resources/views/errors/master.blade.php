<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pegawai - Sistem Manajemen Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden bg-gradient-to-r from-blue-400 to-blue-200">
    <!-- Pattern Dots Background -->
    <div class="fixed inset-0 opacity-30 pointer-events-none" style="background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size: 25px 25px;"></div>

    <!-- Container Centered -->
    <div class="min-h-screen flex items-center justify-center p-4 relative z-10">
        <main class="w-full max-w-2xl bg-white/95 backdrop-blur-lg shadow-2xl rounded-2xl overflow-hidden border border-white/20">
            <section class="w-full px-6 sm:px-12 py-12 sm:py-16 text-center">

                <!-- Error Icon -->
                @yield('icon', 'ICON')

                <!-- Error Code -->
                <h1 class="text-6xl sm:text-8xl font-bold mb-4 bg-gradient-to-r from-blue-500 to-blue-300 bg-clip-text text-transparent">
                    @yield('code', '404')
                </h1>

                <!-- Error Title -->
                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-4">
                    @yield('title', 'Halaman Tidak Ditemukan')
                </h2>

                <!-- Error Message -->
                <p class="text-sm sm:text-base text-gray-600 mb-8 max-w-md mx-auto">
                    @yield('message', 'Maaf, halaman yang Anda cari tidak dapat ditemukan. Silakan periksa URL atau kembali ke halaman utama.')
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="javascript:history.back()"
                        class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-blue-500 text-blue-500 font-semibold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-md hover:shadow-lg">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            <span>Kembali</span>
                        </span>
                    </a>
                </div>

                <!-- Additional Info -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <p class="text-xs sm:text-sm text-gray-500">
                        Jika masalah berlanjut, silakan hubungi administrator sistem
                    </p>
                </div>
            </section>
        </main>
    </div>
</body>

</html>