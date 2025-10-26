@extends('user.master')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <div class="bg-blue-500 rounded-lg shadow-md p-6 mb-6">
        <h1 class="text-3xl font-bold text-white mb-2">Sistem Absensi</h1>
        <p class="text-gray-200" id="currentDate"></p>
        <p class="text-2xl font-semibold text-cyan-100 mt-2" id="currentTime"></p>
    </div>

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 alert">
        {{ session('error') }}
    </div>
    @elseif(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6 alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Absensi -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Absensi Hari Ini</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <form action="{{ route('user.attendances.masuk') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Absensi Masuk
                </button>
            </form>
            <form action="{{ route('user.attendances.keluar') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-bold py-4 px-6 rounded-lg transition duration-200 flex items-center justify-center gap-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Absensi Keluar
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Riwayat Absensi</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Masuk</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jam Keluar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($attendances as $attendance)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ \Carbon\Carbon::parse($attendance->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $attendance->waktu_masuk ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $attendance->waktu_keluar ?? '-' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            @if($attendance->status_absensi == 'hadir')
                            <span class="text-green-600 bg-green-100 px-2 py-1 rounded rounded-full">{{ $attendance->status_absensi }}</span>
                            @elseif($attendance->status_absensi == 'sakit')
                            <span class="text-yellow-600 bg-yellow-100 px-2 py-1 rounded rounded-full">{{ $attendance->status_absensi }}</span>
                            @elseif($attendance->status_absensi == 'izin')
                            <span class="text-blue-600 bg-blue-100 px-2 py-1 rounded rounded-full">{{ $attendance->status_absensi }}</span>
                            @else
                            <span class="text-red-600 bg-red-100 px-2 py-1 rounded rounded-full">{{ $attendance->status_absensi }}</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                            Belum ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($attendances->hasPages())
        <div class="mt-4">
            {{ $attendances->links() }}
        </div>
        @endif
    </div>
</div>

<script>
    function updateTime() {
        const now = new Date();
        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('currentDate').textContent = now.toLocaleDateString('id-ID', options);
        document.getElementById('currentTime').textContent = now.toLocaleTimeString('id-ID');
    }

    updateTime();
    setInterval(updateTime, 1000);

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