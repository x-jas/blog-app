<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog App</title>
        @vite('resources/css/app.css')
    </head>

    <body class="bg-gray-600 h-screen flex justify-center items-center">
        <div class="text-center text-white">
            <h1 class="text-3xl mb-5">Blog App</h1>
            <h2 class="text-xl mb-5">Built with Laravel and Breeze</h2>

            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-blue-500 p-1 rounded">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-500 mr-2 p-1 rounded">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-500 p-1 rounded">Register</a>
                    @endauth
                </div>
            @endif
        </div>
    </body>
</html>
