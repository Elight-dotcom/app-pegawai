@extends('admin.master')
@section('title', 'Detail Task')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10">
    <!-- Informasi Task -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806A3.42 3.42 0 0120.1 7.835a3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946A3.42 3.42 0 0116.962 19a3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0A3.42 3.42 0 008.632 19a3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438A3.42 3.42 0 005.494 7.835 3.42 3.42 0 018.632 4.697z" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Detail Task</h2>
            </div>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-3-3v6m-7 8h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Judul Task</p>
                        <p class="text-base font-semibold text-gray-800">{{ $task->title }}</p>
                    </div>
                </div>

                <!-- Employee -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Dibuat oleh</p>
                        <p class="text-base font-semibold text-gray-800">{{ $task->employee->nama_lengkap }}</p>
                    </div>
                </div>

                <!-- Departemen -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 7h6m-3 3v6m8 4V5a2 2 0 00-2-2H7a2 2 0 00-2 2v15m14 0H5" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Departemen</p>
                        <p class="text-base font-semibold text-gray-800">{{ $task->department->nama_departemen }}</p>
                    </div>
                </div>

                <!-- Prioritas -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Prioritas</p>
                        <p class="text-base font-semibold text-gray-800 capitalize">
                            {{ $task->priority }}
                        </p>
                    </div>
                </div>

                <!-- Status -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-pink-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Status</p>
                        <span
                            class="inline-block px-3 py-1 rounded-full text-white text-sm font-semibold
                                @if($task->status == 'completed') bg-green-600
                                @elseif($task->status == 'in_progress') bg-yellow-500
                                @else bg-gray-500 @endif">
                            {{ ucfirst($task->status) }}
                        </span>
                    </div>
                </div>

                <!-- Completion -->
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 bg-teal-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-gray-500 mb-1">Progress</p>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="h-3 rounded-full
                                @if($task->progress == 100) bg-green-600
                                @elseif($task->progress >= 50) bg-yellow-500
                                @else bg-gray-400 @endif"
                                style="width: {{ $task->progress }}%">
                            </div>
                        </div>
                        <p class="text-sm font-semibold text-gray-700 mt-1">
                            {{ round($task->progress, 0) }}%
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Subtasks -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm mb-6 overflow-hidden">
        <div class="bg-gray-800 px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Subtasks</h2>
            </div>
        </div>
        <div class="p-6">
            @if ($task->subtasks->count() > 0)
            <ul class="space-y-3">
                @foreach ($task->subtasks as $subtask)
                <li class="flex items-center justify-between bg-gray-50 p-3 rounded-lg border border-gray-200">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" disabled
                            {{ $subtask->is_completed ? 'checked' : '' }}
                            class="h-4 w-4 text-green-600 border-gray-300 rounded focus:ring-green-500">
                        <span class="text-gray-800 {{ $subtask->is_completed ? 'line-through text-gray-500' : '' }}">
                            {{ $subtask->title }}
                        </span>
                    </div>
                    <span class="text-sm font-medium
                                {{ $subtask->is_completed ? 'text-green-600' : 'text-gray-400' }}">
                        {{ $subtask->is_completed ? 'Selesai' : 'Belum' }}
                    </span>
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-gray-500 italic">Belum ada subtask.</p>
            @endif
        </div>
    </div>

    <!-- Tombol Navigasi -->
    <div class="flex justify-end gap-3 mb-6">
        <a href="{{ route('tasks.index') }}"
            class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Kembali
        </a>
        <a href="{{ route('tasks.edit', $task->id) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
            Edit
        </a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
            onsubmit="return confirm('Yakin ingin menghapus task ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg transition-colors duration-200">
                Hapus
            </button>
        </form>
    </div>
</div>
@endsection