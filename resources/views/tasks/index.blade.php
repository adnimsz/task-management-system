@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-2 gap-6">
    <!-- Pending Tasks -->
    <div>
        <div class="bg-gray-800 rounded-lg p-4 mb-4 border border-yellow-600">
            <h2 class="text-xl font-bold text-yellow-400">
                <i class="fas fa-clock mr-2"></i>
                Pending ({{ $pendingTasks->count() }})
            </h2>
        </div>
        
        @forelse($pendingTasks as $task)
            <div class="bg-gray-800 rounded-lg shadow-md p-4 mb-4 border border-gray-700 hover:border-yellow-500 transition">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-2 py-1 rounded text-xs text-white mb-2" 
                              style="background-color: {{ $task->category->color }}">
                            {{ $task->category->name }}
                        </span>
                        <h3 class="text-lg font-semibold text-white">{{ $task->title }}</h3>
                        <p class="text-gray-400 text-sm">{{ $task->description }}</p>
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fas fa-calendar mr-1"></i>
                            {{ $task->due_date->format('M d, Y') }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-gray-800 rounded-lg p-8 text-center text-gray-500 border border-dashed border-gray-700">
                <i class="fas fa-inbox text-4xl mb-2"></i>
                <p>No pending tasks</p>
            </div>
        @endforelse
    </div>

    <!-- Completed Tasks -->
    <div>
        <div class="bg-gray-800 rounded-lg p-4 mb-4 border border-green-600">
            <h2 class="text-xl font-bold text-green-400">
                <i class="fas fa-check-circle mr-2"></i>
                Completed ({{ $completedTasks->count() }})
            </h2>
        </div>
        
        @forelse($completedTasks as $task)
            <div class="bg-gray-800 rounded-lg shadow-md p-4 mb-4 opacity-70 border border-gray-700">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-2 py-1 rounded text-xs text-white mb-2 opacity-50" 
                              style="background-color: {{ $task->category->color }}">
                            {{ $task->category->name }}
                        </span>
                        <h3 class="text-lg font-semibold text-gray-500 line-through">{{ $task->title }}</h3>
                        <p class="text-gray-600 line-through text-sm">{{ $task->description }}</p>
                    </div>
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-1 rounded text-sm">
                            <i class="fas fa-undo"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-gray-800 rounded-lg p-8 text-center text-gray-500 border border-dashed border-gray-700">
                <i class="fas fa-trophy text-4xl mb-2"></i>
                <p>No completed tasks</p>
            </div>
        @endforelse
    </div>
</div>
@endsection