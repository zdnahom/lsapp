@extends('layouts.app2')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
                @forelse ($articles as $article)
                    <div class="">
                        <div class="mb-2"><a class="font-bold" href="{{route('posts.show',$article)}}">{{ $article->title }}</a> 
                            <span class="text-gray-600 text-sm">{{ $article->created_at->diffForHumans() }}</span>
                            <p>{{ $article->body }}</p>
                        </div>
                @empty

                <p class="text-gray-600">No available articles</p>
                    
                @endforelse
                
                {{-- {{$articles->links()}} --}}

            
        </div>

    </div>
@endsection
    