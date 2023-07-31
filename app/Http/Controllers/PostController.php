<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Response;
use Illuminate\Validation\Rule;

use Illuminate\Http\Response as HttpResponse;
use Illuminate\Validation\Rule as ValidationRule;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(request(['search', 'category', 'auther']))->simplePaginate(9)->withQueryString();

        return view('posts.index', [
            'posts' => $posts,
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {

        return view(
            'posts.create'
        );
    }

    public function store(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|min:5|max:255',
            'thumbnail' => 'required|image',
            'body' => 'required|min:10',
        ]);
        $attributes['slug'] = Str::slug($attributes['title']);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        Post::create($attributes);
        return redirect('/');
    }

    public function update(Request $request, Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required|min:5|max:255',
            'body' => 'required|min:10',
        ]);



        if ($request->hasFile('thumbnail')) {

            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');
        }

        $post->update($attributes);

        return redirect('/');
    }
}
