@extends('layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Create New Task</h2>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Title *</label>
            <input type="text" name="title" class="w-full border rounded-lg px-3 py-2" required>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Description</label>
            <textarea name="description" rows="3" class="w-full border rounded-lg px-3 py-2"></textarea>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Category *</label>
            <select name="category_id" class="w-full border rounded-lg px-3 py-2" required>
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Due Date *</label>
            <input type="date" name="due_date" class="w-full border rounded-lg px-3 py-2" required>
        </div>
        
        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-lg">Create Task</button>
        <a href="{{ route('tasks.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg ml-2">Cancel</a>
    </form>
</div>
@endsection