<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Blog App') }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-600">
    <div class="w-fit h-fit absolute right-0 m-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-300">Logout</button>
        </form>
    </div>

    <div class="h-screen flex justify-center items-center">
        @yield('content')
    </div>
</body>
</html>
