<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager - Dark</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900">
    <nav class="bg-gray-800 border-b border-gray-700 shadow-lg mb-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-white">
                    <i class="fas fa-tasks text-blue-400 mr-2"></i>
                    DarkTask
                </h1>
                <a href="{{ route('tasks.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition shadow-md">
                    <i class="fas fa-plus mr-2"></i>New Task
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 mb-8">
        @if(session('success'))
            <div class="bg-gray-800 border-l-4 border-green-500 text-green-400 p-4 mb-4 rounded shadow">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>
</body>
</html>