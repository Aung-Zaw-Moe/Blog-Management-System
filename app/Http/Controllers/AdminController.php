<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Code for listing resources
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add_post(Request $request)
    {
        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $userType = $user->usertype;
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->post_status = 'active';
        $post->user_id = $userid;
        $post->name = $name;
        $post->userType = $userType;


        $image = $request->image;
        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }


        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show_post()
    {
        $post = Post::all();
        return view('admin.show_post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_page($id)
    {
        $post = Post::find($id);
        return view('admin.edit_page', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update_post(Request $request, $id)
    // {
    //     $data = Post::find($id);

    //     $data->title = $request->title;
    //     $data->description = $request->description;

    //     $image = $request->image;
    //     if ($image) {
    //         $imagename = time() . '.' . $image->getClientOriginalExtension();
    //         $request->image->move('postimage', $imagename);
    //         $data->image = $imagename;
    //     }
    //     $data->save();
    //     return redirect()->back()->with('message', 'Post Updated Successfully');
    // }
    public function update_post(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Updated Successfully😄');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Successfully😢');
    }
    public function accept_post($id)
    {
        $data = Post::find($id);
        $data->post_status = 'active';

        $data->save();
        return redirect()->back()->with('message', 'Post Status change to Active😃');
    }
    public function reject_post($id)
    {
        $data = Post::find($id);
        $data->post_status = 'rejected';

        $data->save();
        return redirect()->back()->with('message', 'Post Status change to Reject 😢');
    }
}
