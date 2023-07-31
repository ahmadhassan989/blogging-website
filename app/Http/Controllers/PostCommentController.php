<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostCommentController extends Controller
{
    public function store(Post $post)
    {
        // validation

        request()->validate([
            'body' => 'required|min:5|max:255'
        ]);
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request()->body,
        ]);

        return back();
    }
}
