<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name')}}</title>
    </head>
    <body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
                <li >
                    <a href="{{route('home')}}" class="p-3">Home</a>
                </li>
                <li>
                    <a href="{{route('dashboard')}}" class="p-3">Dashboard</a>
                </li>
                <li>
                    <a href="{{route('posts')}}" class="p-3">Post</a>
                </li>
            </ul> 
            <ul class="flex items-center">
                @auth   
                    
                <li >
                    <a href="" class="p-3">{{auth()->user()->name}}</a>
                </li>

                <li>
                    <form action="{{route('logout')}}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth 
                    
                
                @guest
                <li>
                    <a href="login" class="p-3">Login</a>
                </li>
   
                <li>
                    <a href="{{route('register')}}" class="p-3">Register</a>
                </li>
   
                @endguest
                    
                    
                
            </ul>
        </nav>
    @yield('content')
    </body>
</html>