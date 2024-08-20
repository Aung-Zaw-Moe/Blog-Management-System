<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new comment.
     */
    public function create_comment($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('home.comment', compact('post'));
    }

    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'comment_body' => 'required|string|max:255',
                'post_id' => 'required|exists:posts,id',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Create and save the comment
            Comment::create([
                'post_id' => $request->post_id,
                'user_id' => Auth::user()->id,
                'comment_body' => $request->comment_body
            ]);

            return redirect()->route('post.details', $request->post_id)->with('message', 'Comment added successfully!');
        } else {
            return redirect()->route('login')->with('message', 'Please log in to comment!');
        }
    }

    /**
     * Show the form for editing a comment.
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        // Authorization check
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the comment.
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // Authorization check
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'comment_body' => 'required|string|max:255',
        ]);

        $comment->update($request->only('comment_body'));

        return redirect()->route('post.details', $comment->post_id)->with('success', 'Comment updated successfully.');
    }

    /**
     * Delete the comment.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        // Authorization check
        if (Auth::id() !== $comment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        $comment->delete();

        return redirect()->route('post.details', $comment->post_id)->with('success', 'Comment deleted successfully.');
    }
}
