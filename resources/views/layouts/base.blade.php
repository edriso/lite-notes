<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav class="bg-gray-100 px-8 py-4 text-gray-700 flex items-center justify-between">
        <a class="font-bold text-2xl" href="/">Lite Notes</a>
        <span>Hello, @yield('user', 'there!')</span>
    </nav>

    <main class="p-12 mx-auto max-w-6xl text-gray-800">
        @yield('content')
    </main>
</body>

</html>
