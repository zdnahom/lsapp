<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ config('app.name') }}</title>

</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li>
                <a href="/" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">Dashboard</a>
            </li>
            <li>
                <a href="/posts" class="p-3">Blog</a>
            </li>
            <li>
                <a href="" class="p-3">Service</a>
            </li>
        </ul>
        <ul>
            <li>
                <a href="/posts/create" class="p-3">Create Post</a>
            </li>
        </ul>
    </nav>
    @yield('content')
</body>
</html>
