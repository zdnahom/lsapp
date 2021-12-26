@extends('layouts.app2')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{route('posts.update',$article->id)}}" method="POST" class="mb-6">
                @csrf
                @method("PUT")
                <div class="mb-2">

                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter a Title"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('title') border-red-500 @enderror"
                            value="{{$article->title}}">
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100
                                            border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="Post Something!">{{$article->body}}</textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
            </form>

        </div>
    </div>
@endsection
