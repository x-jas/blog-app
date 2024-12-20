@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-5 text-white">
        <h1 class="text-3xl mb-5">Create New Post</h1>

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf

            <div class="mb-5">
                <label for="title" class="block">Title</label>
                <input type="text" id="title" name="title" class="w-full block text-black rounded" required>
                @error('title')
                <div class="text-red-300">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="content" class="block">Content</label>
                <textarea id="content" name="content" rows="4" class="w-full block text-black rounded" required></textarea>
                @error('content')
                <div class="text-red-300">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="category" class="block">Category</label>
                <select id="category" name="category_id" class="w-full block text-black rounded" required>
                    <option value="">Select Category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-red-300">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 p-1 rounded">Create Post</button>
            <a href="{{ route('dashboard') }}" class="text-red-300 float-right">Cancel</a>
        </form>
    </div>
@endsection
