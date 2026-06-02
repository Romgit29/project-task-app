<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    <nav class="bg-gray-800 text-white shadow-md mb-6">
        <div class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex space-x-6">
                <a href="{{ route('tasks.index') }}" class="font-medium hover:text-gray-300 {{ request()->routeIs('tasks.*') ? 'text-blue-400' : '' }}">
                    Задачи
                </a>
                <a href="{{ route('projects.index') }}" class="font-medium hover:text-gray-300 {{ request()->routeIs('projects.*') ? 'text-blue-400' : '' }}">
                    Проекты
                </a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{ $slot }}
    </main>
</body>
</html>
