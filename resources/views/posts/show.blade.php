@extends('layouts.app2')
@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <div class="">
                <form action="/posts">

                    <button class="bg-gray-500 text-white  rounded font-medium">back</button>
                </form>
                <div class="mb-2">{{ $article->title }}
                    <span class="text-gray-600 text-sm">{{ $article->created_at->diffForHumans() }}</span>
                    <p>{{ $article->body }}</p>

                    @foreach ($article->tags as $tag)
                        {{-- <a href="/posts?tag={{$tag->name}}" class="text-gray-600 text-sm mr-2">{{$tag->name}}</a> --}}
                        <a href="{{route('posts.index',['tag'=>$tag->name])}}" class="text-gray-600 text-sm mr-2">{{ $tag->name }}</a>
                    @endforeach
                    <div class="flex flex-wrap content-between ">
                        <form action="{{ route('posts.edit', $article->id) }}">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium mr-5">edit</button>
                        </form>

                        <form action="{{ route('posts.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">delete</button>
                        </form>

                    </div>

                    {{-- <form action="{{ route('posts.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">edit</button>
                        </form> --}}


                </div>
            </div>
        </div>

    @endsection
