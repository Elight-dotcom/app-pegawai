@extends('admin.master')
@section('title', 'Tambah Task')
@section('content')
<div class="container mx-auto md:px-4 max-w-4xl mt-4 md:mt-8 mb-4 md:mb-8">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Task</h1>
    </div>

    <!-- Form Card -->
    <div class="bg-white border-2 border-gray-200 rounded-lg shadow-sm overflow-hidden">
        <div class="bg-gray-800 px-4 md:px-6 py-4 border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h2 class="text-base md:text-lg font-semibold text-gray-300">Form Data Task</h2>
            </div>
        </div>

        <form action="{{ route('tasks.store') }}" method="POST" class="p-4 md:p-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 md:gap-6">

                <!-- User -->
                <div class="space-y-2">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">
                        Employee <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <select name="employee_id" id="employee_id"
                            class="w-full pl-3 pr-10 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 @error('employee_id') border-red-500 @enderror">
                            <option value="">Pilih Employee</option>
                            @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                data-department="{{ $employee->department->nama_departemen }}"
                                data-department-id="{{ $employee->department->id }}"
                                {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->department->nama_departemen }}) - {{ $employee->jabatan->nama_jabatan }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    @error('employee_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Department -->
                <div class="space-y-2">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">
                        Department <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="department_name" name="department_name"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg bg-gray-100 cursor-not-allowed"
                        placeholder="Pilih employee terlebih dahulu" readonly>

                    <input type="hidden" id="department_id" name="department_id">
                </div>

                <!-- Judul -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="title" class="block text-sm font-medium text-gray-700">
                        Judul Task <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="title" name="title"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 @error('title') border-red-500 @enderror"
                        placeholder="Masukkan judul task" value="{{ old('title') }}">
                    @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="space-y-2 lg:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Deskripsi
                    </label>
                    <textarea id="description" name="description" rows="3"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 @error('description') border-red-500 @enderror"
                        placeholder="Tuliskan detail task...">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Prioritas -->
                <div class="space-y-2">
                    <label for="priority" class="block text-sm font-medium text-gray-700">
                        Prioritas <span class="text-red-500">*</span>
                    </label>
                    <select name="priority" id="priority"
                        class="w-full pl-3 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 @error('priority') border-red-500 @enderror">
                        <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority') == 'medium' ? 'selected' : '' }}>Normal</option>
                        <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    @error('priority')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select name="status" id="status"
                        class="w-full pl-3 pr-10 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800 @error('status') border-red-500 @enderror">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
                    </select>
                    @error('status')
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
                        <input type="text" name="subtasks[]" placeholder="Subtask 1"
                            class="flex-1 px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-800">
                        <button type="button"
                            class="remove-subtask text-red-600 hover:text-red-800 font-bold text-xl leading-none">&times;</button>
                    </div>
                </div>
                <button type="button" id="add-subtask"
                    class="mt-2 px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                    + Tambah Subtask
                </button>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-3 mt-6 border-t pt-6">
                <a href="{{ route('tasks.index') }}"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg text-center">
                    Batal
                </a>
                <button type="submit"
                    class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-6 py-2.5 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Simpan Task
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('employee_id').addEventListener('change', function() {
        const selected = this.options[this.selectedIndex];
        const departmentName = selected.getAttribute('data-department') || '';
        const departmentId = selected.getAttribute('data-department-id') || '';

        document.getElementById('department_name').value = departmentName;
        document.getElementById('department_id').value = departmentId;
    });

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
                class="remove-subtask text-red-600 hover:text-red-800 font-bold text-xl leading-none">&times;</button>
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