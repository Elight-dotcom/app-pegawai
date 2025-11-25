<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Pegawai - Sistem Manajemen Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="overflow-x-hidden bg-gradient-to-r from-blue-400 to-blue-200">
    <!-- Pattern Dots Background -->
    <div class="fixed inset-0 opacity-30 pointer-events-none" style="background-image: radial-gradient(circle, white 1.5px, transparent 1.5px); background-size: 25px 25px;"></div>

    <!-- Navbar -->
    <nav class="relative z-20 bg-white/95 backdrop-blur-lg shadow-lg border-b border-white/20">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-400 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="text-xl font-bold bg-gradient-to-r from-blue-500 to-blue-400 bg-clip-text text-transparent">App Pegawai</span>
                </div>
                <div class="hidden md:flex items-center gap-6">
                    <a href="#home" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Beranda</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Tentang</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-500 font-medium transition duration-200">Kontak</a>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/login" class="bg-gradient-to-r from-blue-600 to-blue-400 text-white px-6 py-2.5 rounded-lg font-semibold hover:from-blue-700 hover:to-blue-500 transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                        Login
                    </a>
                    <button onclick="toggleMobileMenu()" class="md:hidden text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 space-y-2">
                <a href="#home" class="block text-gray-700 hover:text-blue-500 font-medium py-2 transition duration-200">Beranda</a>
                <a href="#features" class="block text-gray-700 hover:text-blue-500 font-medium py-2 transition duration-200">Fitur</a>
                <a href="#about" class="block text-gray-700 hover:text-blue-500 font-medium py-2 transition duration-200">Tentang</a>
                <a href="#contact" class="block text-gray-700 hover:text-blue-500 font-medium py-2 transition duration-200">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative z-10 min-h-screen flex items-center">
        <div class="container mx-auto px-4 py-20">
            <div class="max-w-4xl mx-auto text-center">
                <div class="mb-6">
                    <span class="bg-white/90 backdrop-blur-sm text-blue-600 px-4 py-2 rounded-full text-sm font-semibold shadow-md">
                        Portal Karyawan Resmi App Pegawai
                    </span>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-lg">
                    Selamat Datang di Portal
                    <span class="block mt-2 bg-white/20 backdrop-blur-sm px-6 py-2 rounded-2xl inline-block">Sistem HRIS & Tugas</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto drop-shadow">
                    Akses cepat untuk <span class="font-semibold text-green-300">Absensi Harian</span>, <span class="font-semibold text-yellow-300">Pencatatan Tugas</span>, dan informasi penting lainnya. Mulai hari kerja Anda sekarang.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/login" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-blue-50 transition duration-200 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 flex items-center justify-center gap-2">
                        <span>Lanjutkan ke Login Karyawan</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="relative z-10 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white/95 backdrop-blur-lg rounded-2xl p-8 md:p-12 shadow-2xl border border-white/20">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Tentang Kami</h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-blue-400 mx-auto mb-6"></div>
                </div>
                <div class="space-y-6 text-gray-700 text-lg">
                    <p>
                        Selamat datang di DODONUT, mitra terpercaya Anda di garis depan inovasi teknologi. Sejak awal, kami telah berdedikasi untuk menyediakan solusi teknologi yang tidak hanya inovatif tetapi juga didukung oleh prinsip inti kami: keandalan dan disiplin yang tak tergoyahkan. Di dunia digital yang bergerak cepat, kami percaya bahwa kualitas layanan dan ketepatan waktu adalah segalanya.
                    </p>
                    <p>
                        Tim ahli kami berfokus pada pengembangan perangkat lunak untuk penjualan donut, memastikan setiap proyek dikerjakan dengan standar profesionalisme tertinggi, mulai dari konsep hingga implementasi. Kami di sini untuk membangun masa depan teknologi Anda dengan integritas dan hasil yang terbukti.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="relative z-10 py-20">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto bg-white/95 backdrop-blur-lg rounded-2xl p-8 md:p-12 shadow-2xl border border-white/20">
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                    <p class="text-gray-600 text-lg">Ada pertanyaan? Kami siap membantu Anda</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Email</h3>
                        <p class="text-gray-600 text-sm">ardan@gmail.com</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Telepon</h3>
                        <p class="text-gray-600 text-sm">+62 896-9999-7929</p>
                    </div>
                    <div class="text-center p-6 bg-gray-50 rounded-xl hover:bg-gray-100 transition duration-200">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-2">Alamat</h3>
                        <p class="text-gray-600 text-sm">Surabaya, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 bg-white/95 backdrop-blur-lg border-t border-white/20 mt-20">
        <div class="container mx-auto px-4 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-blue-400 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <span class="font-bold text-gray-800">App Pegawai</span>
                </div>
                <p class="text-gray-600 text-sm">© 2024 App Pegawai. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-600 hover:text-blue-500 transition duration-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Toggle Mobile Menu
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        }

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu after click
                    const mobileMenu = document.getElementById('mobileMenu');
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('shadow-xl');
            } else {
                nav.classList.remove('shadow-xl');
            }
        });
    </script>
</body>

</html>