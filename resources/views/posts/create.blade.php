@extends('layouts.app2')
@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('posts.create') }}" method="POST" class="mb-6">
                @csrf
                <div class="mb-2">

                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter a Title"
                            class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('title') border-red-500 @enderror"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4"
                            class="bg-gray-100
                                                                border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="Post Something!"></textarea>
                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="mb-4">
                        <label for="" class="font-bold">Tags</label>
                        <div>
                            <select class="" name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>


                        @enderror
                    </div> --}}
                       <div class="w-full md:w-1/3 flex flex-wrap mb-4 pr-0 md:pr-4">
                        <label class="w-full block text-xs mb-2 text-gray-400 font-bold">Tag</label>
                        <div class="relative w-full border-none">
                            <select
                                class="text-gray-400 appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full text-sm"
                                name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @error('tags')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>

                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>

            </form>

        </div>
    </div>
@endsection
