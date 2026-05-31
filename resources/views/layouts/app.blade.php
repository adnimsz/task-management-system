<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager - Purple</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-50 to-pink-100">
    <nav class="bg-gradient-to-r from-purple-700 to-pink-600 shadow-lg mb-6">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold text-white">
                    <i class="fas fa-check-double mr-2"></i>
                    TaskFlow
                </h1>
                <a href="{{ route('tasks.create') }}" 
                   class="bg-pink-500 hover:bg-pink-600 text-white px-5 py-2 rounded-full font-semibold shadow-md">
                    <i class="fas fa-plus mr-2"></i>Add Task
                </a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 mb-8">
        @if(session('success'))
            <div class="bg-purple-100 border-l-4 border-purple-500 text-purple-700 p-4 mb-4 rounded-lg shadow">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>
</body>
</html>