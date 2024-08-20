<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{
    public function like($id)
    {
        $post = Post::find($id);
        $post->likes += 1;
        $post->save();

        return back();
    }
    // public function show($id)
    // {
    //     // Fetch the post by ID
    //     $post = Post::find($id);

    //     // If the post does not exist, redirect back with an error message
    //     if (!$post) {
    //         return redirect()->back()->with('message', 'Post not found.');
    //     }

    //     // Pass the post data to the view
    //     return view('post.show', compact('post'));
    // }
    public function show($id)
    {
        // Retrieve the post by its ID, including comments and the users who made them
        $post = Post::with('comments.user')->findOrFail($id);

        // Pass the post data to the view
        return view('posts.show', compact('post'));
    }
}
