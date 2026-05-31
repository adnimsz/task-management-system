@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-2 gap-6">
    <!-- Completed Tasks - LEFT -->
    <div>
        <div class="bg-gradient-to-r from-green-500 to-teal-500 rounded-xl p-4 mb-4 shadow-lg">
            <h2 class="text-xl font-bold text-white">
                <i class="fas fa-check-circle mr-2"></i>
                Done ({{ $completedTasks->count() }})
            </h2>
        </div>
        
        @forelse($completedTasks as $task)
            <div class="bg-white rounded-xl shadow-md p-4 mb-4 border-2 border-green-200">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-2 py-1 rounded-full text-xs text-white mb-2" 
                              style="background-color: {{ $task->category->color }}">
                            {{ $task->category->name }}
                        </span>
                        <h3 class="text-lg font-semibold text-gray-500 line-through">{{ $task->title }}</h3>
                        <p class="text-gray-400 line-through text-sm">{{ $task->description }}</p>
                    </div>
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-1 rounded-full text-sm">
                            <i class="fas fa-redo mr-1"></i>Reopen
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="bg-gray-50 rounded-xl p-8 text-center text-gray-500">
                <i class="fas fa-smile-wink text-4xl mb-2"></i>
                <p>Nothing done yet</p>
            </div>
        @endforelse
    </div>

    <!-- Pending Tasks - RIGHT -->
    <div>
        <div class="bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl p-4 mb-4 shadow-lg">
            <h2 class="text-xl font-bold text-white">
                <i class="fas fa-hourglass-half mr-2"></i>
                To Do ({{ $pendingTasks->count() }})
            </h2>
        </div>
        
        @forelse($pendingTasks as $task)
            <div class="bg-white rounded-xl shadow-md p-4 mb-4 border-l-4 border-purple-500">
                <div class="flex justify-between items-start">
                    <div>
                        <span class="inline-block px-2 py-1 rounded-full text-xs text-white mb-2" 
                              style="background-color: {{ $task->category->color }}">
                            {{ $task->category->name }}
                        </span>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $task->title }}</h3>
                        <p class="text-gray-600 text-sm">{{ $task->description }}</p>
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fas fa-calendar mr-1"></i>
                            Due: {{ $task->due_date->format('M d, Y') }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full text-sm">
                                <i class="fas fa-check mr-1"></i>Done
                            </button>
                        </form>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-gray-50 rounded-xl p-8 text-center text-gray-500">
                <i class="fas fa-clipboard-list text-4xl mb-2"></i>
                <p>No pending tasks</p>
            </div>
        @endforelse
    </div>
</div>
@endsection