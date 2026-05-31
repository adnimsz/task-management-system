<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Category;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $pendingTasks = Task::with('category')->where('is_completed', false)->get();
        $completedTasks = Task::with('category')->where('is_completed', true)->get();
        
        return view('tasks.index', compact('pendingTasks', 'completedTasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        Task::create($request->all());
        
        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }

    public function toggle(Task $task)
    {
        $task->update(['is_completed' => !$task->is_completed]);
        
        $status = $task->is_completed ? 'completed' : 'pending';
        return redirect()->route('tasks.index')->with('success', "Task marked as {$status}!");
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }
}