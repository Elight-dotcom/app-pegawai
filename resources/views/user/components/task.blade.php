@extends('user.master')
@section('content')
<div class="container mx-auto px-4 max-w-6xl mt-10 mb-10">
    <div class="bg-blue-500 rounded-lg shadow-md p-6 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-3xl font-bold text-white mb-2">Task Management</h1>
                <p class="text-gray-200">Kelola tugas dan proyek departemen Anda</p>
            </div>
            <a href="{{ route('user.tasks.create') }}" class="bg-white text-blue-500 hover:bg-blue-50 font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center gap-2 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Task Baru
            </a>
        </div>
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

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Tasks</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $tasks->count() }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">In Progress</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $tasks->where('status', 'in_progress')->count() }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Completed</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $tasks->where('status', 'completed')->count() }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-4 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">High Priority</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $tasks->where('priority', 'high')->count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-lg">
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Buttons -->
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <div class="flex flex-wrap gap-2">
            <button onclick="filterTasks('all')" class="filter-btn active px-4 py-2 rounded-lg font-medium transition duration-200">
                Semua
            </button>
            <button onclick="filterTasks('pending')" class="filter-btn px-4 py-2 rounded-lg font-medium transition duration-200">
                Pending
            </button>
            <button onclick="filterTasks('in_progress')" class="filter-btn px-4 py-2 rounded-lg font-medium transition duration-200">
                In Progress
            </button>
            <button onclick="filterTasks('done')" class="filter-btn px-4 py-2 rounded-lg font-medium transition duration-200">
                Done
            </button>
            <div class="ml-auto flex gap-2">
                <button onclick="filterPriority('high')" class="px-4 py-2 rounded-lg font-medium transition duration-200 bg-red-100 text-red-600 hover:bg-red-200">
                    High Priority
                </button>
                <button onclick="filterPriority('medium')" class="px-4 py-2 rounded-lg font-medium transition duration-200 bg-blue-100 text-blue-600 hover:bg-blue-200">
                    Medium
                </button>
                <button onclick="filterPriority('low')" class="px-4 py-2 rounded-lg font-medium transition duration-200 bg-gray-100 text-gray-600 hover:bg-gray-200">
                    Low
                </button>
            </div>
        </div>
    </div>

    <!-- Tasks List -->
    <div class="space-y-4" id="tasksList">
        @forelse ($tasks as $task)
        <div class="task-item bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200"
            data-status="{{ $task->status }}"
            data-priority="{{ $task->priority }}">
            <div class="p-6">
                <div class="flex flex-col lg:flex-row justify-between items-start gap-4">
                    <!-- Task Info -->
                    <div class="flex-1 w-full">
                        <div class="flex items-start gap-3 mb-3">
                            <!-- Priority Badge -->
                            @if($task->priority == 'high')
                            <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                High
                            </span>
                            @elseif($task->priority == 'medium')
                            <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">Medium</span>
                            @else
                            <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">Low</span>
                            @endif

                            <!-- Status Badge -->
                            @if($task->status == 'pending')
                            <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">Pending</span>
                            @elseif($task->status == 'in_progress')
                            <span class="bg-yellow-100 text-yellow-600 text-xs font-semibold px-3 py-1 rounded-full">In Progress</span>
                            @else
                            <span class="bg-green-100 text-green-600 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                Done
                            </span>
                            @endif
                        </div>

                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $task->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ $task->description }}</p>

                        <!-- Progress Bar -->
                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm font-medium text-gray-700">Progress</span>
                                <span class="text-sm font-semibold text-blue-600">{{ $task->progress }}%</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-blue-500 h-2.5 rounded-full transition-all duration-300" style="width: {{ $task->progress }}%"></div>
                            </div>
                        </div>

                        <!-- Sub Tasks -->
                        @if($task->subtasks->count() > 0)
                        <div class="border-t pt-4">
                            <button onclick="toggleSubtasks({{ $task->id }})" class="text-sm font-medium text-blue-500 hover:text-blue-600 flex items-center gap-1 mb-3">
                                <svg class="w-4 h-4 transition-transform subtask-arrow" id="arrow-{{ $task->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                                Sub Tasks ({{ $task->subtasks->where('is_completed', true)->count() }}/{{ $task->subtasks->count() }})
                            </button>
                            <div id="subtasks-{{ $task->id }}" class="hidden space-y-2 pl-4">
                                @foreach($task->subtasks as $subtask)
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <input type="checkbox"
                                        id="subtask-{{ $subtask->id }}"
                                        {{ $subtask->is_completed ? 'checked' : '' }}
                                        onchange="updateSubtask({{ $subtask->id }}, {{ $task->id }})"
                                        class="w-5 h-5 text-blue-600 rounded focus:ring-2 focus:ring-blue-500 cursor-pointer">
                                    <label for="subtask-{{ $subtask->id }}" class="flex-1 text-sm {{ $subtask->is_completed ? 'line-through text-gray-400' : 'text-gray-700' }} cursor-pointer">
                                        {{ $subtask->title }}
                                    </label>
                                    <button onclick="deleteSubtask({{ $subtask->id }}, {{ $task->id }})" class="text-red-500 hover:text-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                                @endforeach
                                <button onclick="openSubtaskModal({{ $task->id }})" class="w-full mt-2 text-sm text-blue-500 hover:text-blue-600 font-medium py-2 border border-blue-300 border-dashed rounded-lg hover:bg-blue-50 transition-colors">
                                    + Tambah Sub Task
                                </button>
                            </div>
                        </div>
                        @else
                        <div class="border-t pt-4">
                            <button onclick="openSubtaskModal({{ $task->id }})" class="text-sm text-blue-500 hover:text-blue-600 font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Sub Task
                            </button>
                        </div>
                        @endif

                        <!-- Task Meta -->
                        <div class="flex flex-wrap gap-4 mt-4 text-sm text-gray-500">
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ \Carbon\Carbon::parse($task->due_date)->locale('id')->isoFormat('D MMM YYYY') }}
                            </div>
                            <div class="flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ $task->employee->nama_lengkap }}
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-2 sm:grid-cols-1 gap-2">
                        <a href="{{ route('user.tasks.edit', $task->id) }}" class="bg-gray-100 text-gray-600 hover:bg-gray-200 px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>

                        <div class="relative">
                            <button onclick="toggleStatusDropdown({{ $task->id }})" class="bg-blue-100 text-blue-600 hover:bg-blue-200 px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center gap-2 whitespace-nowrap">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                                Ubah Status
                            </button>
                            <div id="status-dropdown-{{ $task->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-10 border border-gray-200">
                                <form action="{{ route('user.tasks.updateStatus', $task->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="status" value="pending" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700 rounded-t-lg">
                                        Pending
                                    </button>
                                    <button type="submit" name="status" value="in_progress" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-yellow-600">
                                        In Progress
                                    </button>
                                    <button type="submit" name="status" value="completed" class="w-full text-left px-4 py-2 hover:bg-gray-100 text-green-600 rounded-b-lg">
                                        Completed
                                    </button>
                                </form>
                            </div>
                        </div>

                        <form action="{{ route('user.tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus task ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 px-4 py-2 rounded-lg font-medium transition duration-200 flex items-center gap-2 w-full">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-lg shadow-md p-12 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Task</h3>
            <p class="text-gray-500 mb-4">Mulai tambahkan task untuk departemen Anda</p>
            <button onclick="openTaskModal()" class="bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-200">
                Tambah Task Pertama
            </button>
        </div>
        @endforelse
    </div>
</div>

<!-- Modal Add Subtask -->
<div id="subtaskModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-2xl max-w-lg w-full">
        <div class="bg-gray-800 px-6 py-4 rounded-t-lg border-b-2 border-gray-200">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                </svg>
                <h2 class="text-lg font-semibold text-gray-300">Form Sub Task</h2>
            </div>
        </div>
        <form id="subtaskForm" action="{{ route('user.subtasks.store') }}" method="POST" class="p-6">
            @csrf
            <input type="hidden" name="task_id" id="subtaskTaskId">

            <div class="space-y-2">
                <label for="subtaskTitle" class="block text-sm font-medium text-gray-700">
                    Judul Sub Task <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                    </div>
                    <input type="text"
                        name="title"
                        id="subtaskTitle"
                        required
                        class="w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent"
                        placeholder="Masukkan judul sub task">
                </div>
            </div>

            <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                <button type="button"
                    onclick="closeSubtaskModal()"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 text-center">
                    Batal
                </button>
                <button type="submit"
                    class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-6 py-2.5 rounded-lg transition-colors duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Tambah Sub Task
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Alert auto hide
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

    // Filter Tasks
    function filterTasks(status) {
        const tasks = document.querySelectorAll('.task-item');
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            btn.classList.remove('active', 'bg-blue-500', 'text-white');
            btn.classList.add('bg-gray-100', 'text-gray-600');
        });

        event.target.classList.add('active', 'bg-blue-500', 'text-white');
        event.target.classList.remove('bg-gray-100', 'text-gray-600');

        tasks.forEach(task => {
            if (status === 'all' || task.dataset.status === status) {
                task.style.display = 'block';
            } else {
                task.style.display = 'none';
            }
        });
    }

    // Filter Priority
    function filterPriority(priority) {
        const tasks = document.querySelectorAll('.task-item');

        tasks.forEach(task => {
            if (task.dataset.priority === priority) {
                task.style.display = 'block';
            } else {
                task.style.display = 'none';
            }
        });
    }

    // Toggle Subtasks
    function toggleSubtasks(taskId) {
        const subtasksDiv = document.getElementById(`subtasks-${taskId}`);
        const arrow = document.getElementById(`arrow-${taskId}`);

        subtasksDiv.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }

    // Toggle Status Dropdown
    function toggleStatusDropdown(taskId) {
        const dropdown = document.getElementById(`status-dropdown-${taskId}`);
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('[onclick^="toggleStatusDropdown"]')) {
            document.querySelectorAll('[id^="status-dropdown-"]').forEach(dropdown => {
                dropdown.classList.add('hidden');
            });
        }
    });

    // Open Subtask Modal
    function openSubtaskModal(taskId) {
        document.getElementById('subtaskModal').classList.remove('hidden');
        document.getElementById('subtaskTaskId').value = taskId;
        document.getElementById('subtaskTitle').value = '';
    }

    // Close Subtask Modal
    function closeSubtaskModal() {
        document.getElementById('subtaskModal').classList.add('hidden');
    }

    // Update Subtask
    function updateSubtask(subtaskId, taskId) {
        const checkbox = document.getElementById(`subtask-${subtaskId}`);
        const isCompleted = checkbox.checked;

        fetch(`/subtasks/${subtaskId}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    is_completed: checkbox.checked
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
    }

    // Close modals when clicking outside
    document.getElementById('taskModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeTaskModal();
        }
    });

    document.getElementById('subtaskModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeSubtaskModal();
        }
    });

    // Initialize filter buttons
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            if (btn.classList.contains('active')) {
                btn.classList.add('bg-blue-500', 'text-white');
            } else {
                btn.classList.add('bg-gray-100', 'text-gray-600');
            }
        });
    });
</script>

<style>
    .filter-btn.active {
        background-color: #3B82F6;
        color: white;
    }

    .subtask-arrow {
        transition: transform 0.3s ease;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
</style>
@endsection