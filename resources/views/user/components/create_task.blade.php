@extends('user.master')
@section('content')
<div class="flex justify-center items-center min-h-[calc(100vh-5rem)] px-4 mt-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-3xl w-full">
        <div class="bg-blue-500 px-6 py-4 rounded-t-lg border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-100" id="modalTitle">Form Data Task</h2>
            </div>
        </div>

        <form id="taskForm" action="{{ route('user.tasks.store') }}" method="POST" class="p-6">
            @csrf
            <div id="methodField"></div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Judul Task -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Judul Task <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <input type="text" name="title" id="title" required
                            class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent"
                            value="{{ old('title') }}"
                            placeholder="Masukkan judul task">
                    </div>
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prioritas -->
                <div class="space-y-2">
                    <label for="priority" class="block text-sm font-medium text-gray-700">
                        Prioritas <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg>
                        </div>
                        <select name="priority" id="priority" required
                            class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none">
                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('priority')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <select name="status" id="status" required
                            class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent appearance-none">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </div>
                    @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Deadline -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">
                        Tanggal Deadline <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="date" name="due_date" id="due_date" required
                            class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent"
                            value="{{ old('due_date') }}">
                    </div>
                    @error('due_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Deskripsi
                    </label>
                    <div class="relative">
                        <div class="absolute top-3 left-0 pl-3 flex items-start pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                        </div>
                        <textarea name="description" id="description" rows="4"
                            class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent"
                            placeholder="Masukkan deskripsi task (opsional)">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Subtasks -->
            <div class="space-y-2 mt-6">
                <label class="block text-sm font-medium text-gray-700">
                    Subtask (Opsional)
                </label>
                <div id="subtasks-container" class="space-y-2">
                    <div class="flex items-center gap-2">
                        <input type="text" name="subtasks[]" placeholder="Subtask"
                            class="flex-1 px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800">
                        <button type="button"
                            class="remove-subtask text-red-600 hover:text-red-800 font-bold text-xl leading-none cursor-pointer">&times;</button>
                    </div>
                </div>
                <button type="button" id="add-subtask"
                    class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 cursor-pointer">
                    + Tambah Subtask
                </button>
            </div>

            <!-- Tombol -->
            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                <a type="button" href="{{ route('user.tasks.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 text-center">
                    Batal
                </a>
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2 cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 13l4 4L19 7"></path>
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const container = document.getElementById('subtasks-container');
    const addBtn = document.getElementById('add-subtask');

    // Tambah subtask
    addBtn.addEventListener('click', function() {
        const wrapper = document.createElement('div');
        wrapper.className = 'flex items-center gap-2';

        wrapper.innerHTML = `
            <input type="text" name="subtasks[]" placeholder="Subtask"
                class="flex-1 px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800">
            <button type="button"
                class="remove-subtask text-red-600 hover:text-red-800 font-bold text-xl leading-none cursor-pointer">&times;</button>
        `;

        container.appendChild(wrapper);
    });

    // Hapus subtask (pakai event delegation)
    container.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-subtask')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection