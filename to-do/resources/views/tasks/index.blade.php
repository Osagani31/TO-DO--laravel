<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple To-Do App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-md shadow">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">To-Do List</h1>

        <!--  Form -->
        <form action="/tasks" method="POST" class="flex gap-2 mb-6">
            @csrf
           <input
            type="text"
            name="title"
            placeholder="Enter new task..."
            class="flex-1 border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-300
           caret-black"
         required>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-black transition">Add</button>
        </form>

        <!-- Task-->
        <ul>
            @foreach($tasks as $task)
                <li class="flex justify-between items-center border-b border-gray-200 py-2">
                    


            <!-- Update  -->
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="flex items-center gap-2">
                    <input type="checkbox"  onchange="this.form.submit()"
                     {{ $task->is_completed ? 'checked' : '' }} class="rounded cursor-pointer">
                    <span class="{{ $task->is_completed ? 'line-through text-gray-400' : 'text-gray-800' }}">
                        {{ $task->title }}
                    </span>
                </button>
            </form>

            <!-- Delete -->
            <form action="/tasks/{{ $task->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-semibold">
                    Delete
                </button>
            </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>