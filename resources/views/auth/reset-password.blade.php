<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App-Pegawai</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="min-h-screen flex items-center justify-center p-4 bg-gradient-to-r from-blue-400 to-blue-200">
    <main class="flex flex-col lg:flex-row bg-white/95 backdrop-blur-lg shadow-2xl rounded-2xl w-full max-w-3xl mx-4 overflow-hidden border border-white/20">
        <section class="w-full px-8 py-14 relative">
            <div class="mb-8 relative justify-center text-center">
                <h1 class="text-5xl font-bold pb-4 text-black">Lupa Password</h1>
                <p class="text-gray-600 mb-8">Silahkan masukkan password baru Anda.</p>
            </div>

            <!-- Notification -->
            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 alert">
                {{ $errors->first() }}
            </div>
            @elseif(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 alert">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('password.update') }}" method="post" class="space-y-2">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="relative group pt-3">
                    <input
                        type="text"
                        id="email"
                        name="email"
                        required
                        readonly
                        class="cursor-not-allowed peer w-full h-14 px-4 pt-4 pl-7 pb-4 text-gray-900 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-black focus:ring-4 focus:ring-black/10 transition-all duration-300 placeholder-transparent"
                        value="{{ old('email', $email) }}">
                    <label for="email"
                        class="absolute left-4 bg-white/95 border-white/95 rounded-full px-2 text-gray-500 text-sm transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-6 top-1 peer-focus:text-sm peer-focus:text-black peer-valid:top-1 peer-valid:text-sm">
                        Email
                    </label>
                </div>

                <!-- Password Baru -->
                <div class="relative group pt-3">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        autocomplete="off"
                        class="peer w-full h-14 px-4 pt-4 pl-7 pb-4 text-gray-900 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-black focus:ring-4 focus:ring-black/10 transition-all duration-300 placeholder-transparent" />

                    <label for="password"
                        class="absolute left-4 top-7 bg-white/95 border-white/95 rounded-full px-2 text-gray-500 text-sm transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-6 peer-focus:top-1 peer-focus:text-sm peer-focus:text-black peer-valid:top-1 peer-valid:text-sm">
                        Password Baru
                    </label>

                    <button
                        type="button"
                        id="toggle-password"
                        class="absolute right-4 top-10 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg id="eye-open-password" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eye-closed-password" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>

                <!-- Konfirmasi Password -->
                <div class="relative group pt-3">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        required
                        autocomplete="off"
                        class="peer w-full h-14 px-4 pt-4 pl-7 pb-4 text-gray-900 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-black focus:ring-4 focus:ring-black/10 transition-all duration-300 placeholder-transparent" />

                    <label for="password_confirmation"
                        class="absolute left-4 top-7 bg-white/95 border-white/95 rounded-full px-2 text-gray-500 text-sm transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-6 peer-focus:top-1 peer-focus:text-sm peer-focus:text-black peer-valid:top-1 peer-valid:text-sm">
                        Konfirmasi Password
                    </label>

                    <button
                        type="button"
                        id="toggle-password-confirm"
                        class="absolute right-4 top-10 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 transition-colors duration-200">
                        <svg id="eye-open-password-confirm" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                            <path stroke="currentColor" stroke-width="2"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg id="eye-closed-password-confirm" class="w-6 h-6 hidden" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3.933 13.909A4.357 4.357 0 0 1 3 12c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 21 12c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M5 19 19 5m-4 7a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </button>
                </div>

                <div class="pt-10 pb-3">
                    <button
                        type="submit"
                        class="group relative w-full h-14 bg-gradient-to-r from-blue-600 to-blue-400 cursor-pointer hover:bg-dark text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-dark/20 overflow-hidden">
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <span>Ubah Password</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </span>
                    </button>
                </div>
            </form>
        </section>
    </main>

    <script>
        function setupToggle(buttonId, inputId, openId, closeId) {
            const toggle = document.getElementById(buttonId);
            const input = document.getElementById(inputId);
            const eyeOpen = document.getElementById(openId);
            const eyeClosed = document.getElementById(closeId);

            toggle.addEventListener('click', () => {
                const isPassword = input.type === 'password';
                input.type = isPassword ? 'text' : 'password';
                eyeOpen.classList.toggle('hidden');
                eyeClosed.classList.toggle('hidden');
            });
        }

        setupToggle('toggle-password', 'password', 'eye-open-password', 'eye-closed-password');
        setupToggle('toggle-password-confirm', 'password_confirmation', 'eye-open-password-confirm', 'eye-closed-password-confirm');

        // Form validation and loading state
        const form = document.querySelector('form');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function(e) {
            submitBtn.innerHTML = `
        <span class="relative z-10 flex items-center justify-center space-x-2">
          <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
          </svg>
          <span>Memproses...</span>
        </span>
      `;
            submitBtn.disabled = true;
        });

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
</body>

</html>