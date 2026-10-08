<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - To-Do App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 p-6">

    <div class="max-w-md mx-auto bg-white p-6 rounded-md shadow">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">
     Create Account
    </h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
    </div>
    @endif

    <form action="/register" method="POST">

    @csrf

    <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>

    <input type="text" name="name" value="{{ old('name') }}"
    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-300"
    required >
    </div>

    <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">
     Email
    </label>

    <input type="email" name="email" value="{{ old('email') }}"
    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-300"
     required>
     </div>

     <div class="mb-4">
    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>

     <input type="password" name="password"
    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-300"
    required >
    </div>

    <div class="mb-6">
    <label class="block text-sm font-medium text-gray-700 mb-1">
    Confirm Password
    </label>

    <input type="password"
    name="password_confirmation"
    class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:border-blue-300"
    required>
    </div>

    <button type="submit"
     class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-black transition" >
    Register
    </button>

    </form>

    <p class="text-sm text-gray-500 mt-4 text-center">
     Already have an account?

    <a href="/login" class="text-blue-600 hover:underline">
    Login
    </a>
    </p>

    </div>

</body>
</html>