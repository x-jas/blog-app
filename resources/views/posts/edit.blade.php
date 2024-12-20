@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 text-white">
        <h2 class="text-3xl mb-5">Edit Post</h2>

        @if ($errors->any())
            <div class="text-red-300">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="title" class="block">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="w-full block text-black rounded" required>
            </div>

            <div class="mb-5">
                <label for="content" class="block">Content</label>
                <textarea name="content" id="content" rows="5" class="w-full block text-black rounded" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="mb-5">
                <label for="category_id" class="block">Category</label>
                <select name="category_id" id="category_id" class="w-full block text-black rounded">
                    @foreach ($categories as $category)
                        {{ $old = $category->id == old('category_id', $post->category_id) }}

                        <option value="{{ $category->id }}" {{ $old ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 p-1 rounded">Update Post</button>
            <a href="{{ route('dashboard') }}" class="text-red-300 float-right">Cancel</a>
        </form>
    </div>
@endsection
