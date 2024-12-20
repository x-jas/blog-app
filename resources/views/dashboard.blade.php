@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 text-white">
        <h1 class="text-3xl mb-5">Welcome {{ auth()->user()->name }}!</h1>

        <div class="mb-5">
            <a href="{{ route('posts.create') }}" class="bg-blue-500 p-1 rounded">
                Create New Post
            </a>
        </div>

        <h2 class="text-xl mb-5">Your Posts</h2>

        <div
            @foreach ($posts as $post)
                <div class="bg-gray-500 mb-5 p-5 rounded">
                    <h3 class="text-xl inline mr-1">{{ $post->title }}</h3>
                    <p class="text-xs float-right">{{ $post->published }}</p>
                    <p class="m-5">{{ Str::limit($post->content, 100) }}</p>

                    @if (auth()->user()->id === $post->author_id)
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="float-right">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-300">Delete</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>

        {{ $posts->links() }}
    </div>
@endsection
