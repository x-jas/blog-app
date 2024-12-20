<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(): View|Factory|Application
    {
        $posts = Post::where('author_id', Auth::id())->orderByDesc('published')->get();

        return view('dashboard', compact('posts'));
    }

    public function create(): View|Factory|Application
    {
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'author_id' => Auth::id(),
            'category_id' => $request->category_id,
            'published' => now(),
        ]);

        return $this->dashboard(false);
    }

    public function edit(Post $post): Factory|View|Application|RedirectResponse
    {
        $categories = Category::all();

        if ($post->author_id != Auth::id()) {
            return $this->dashboard(true);
        }

        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->author_id != Auth::id()) {
            return $this->dashboard(true);
        }

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post->update($request->all());
        return $this->dashboard(false);
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->author_id != Auth::id()) {
            return $this->dashboard(true);
        }

        $post->delete();
        return $this->dashboard(false);
    }

    private function dashboard($error): RedirectResponse
    {
        $redirect = redirect()->route('dashboard');

        if ($error) {
            $redirect->with('error', 'You can only edit your own posts.');
        }

        return $redirect;
    }
}
