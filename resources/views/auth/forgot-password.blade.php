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
                <p class="text-gray-600 mb-8">Silahkan masukkan email Anda</p>
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

            <form action="{{ route('password.email') }}" method="post" class="space-y-2">
                @csrf
                <div class="relative group pt-3">
                    <input
                        type="text"
                        id="email"
                        name="email"
                        required
                        class="peer w-full h-14 px-4 pt-4 pl-7 pb-4 text-gray-900 bg-white border-2 border-gray-200 rounded-xl focus:outline-none focus:border-black focus:ring-4 focus:ring-black/10 transition-all duration-300 placeholder-transparent"
                        value="{{ old('email') }}">
                    <label for="email"
                        class="absolute left-4 top-7 bg-white/95 border-white/95 rounded-full px-2 text-gray-500 text-sm transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:top-6 peer-focus:top-1 peer-focus:text-sm peer-focus:text-black peer-valid:top-1 peer-valid:text-sm">
                        Email
                    </label>
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-10 pb-3 grid grid-cols-3 gap-4">
                    <!-- Tombol Kembali -->
                    <a href="{{ route('login') }}"
                        class="flex items-center justify-center h-12 bg-gray-500 hover:bg-gray-600 text-white text-sm font-semibold rounded-lg shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300 col-span-1">
                        <span>Kembali</span>
                    </a>

                    <!-- Tombol Kirim Email -->
                    <button type="submit"
                        class="group relative flex items-center justify-center h-14 bg-gradient-to-r from-blue-600 to-blue-400 hover:from-blue-700 hover:to-blue-500 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300/50 overflow-hidden col-span-2">
                        <span class="relative z-10 flex items-center justify-center space-x-2">
                            <span>Kirim Email</span>
                            <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </button>
                </div>


            </form>
        </section>
    </main>

    <script>
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