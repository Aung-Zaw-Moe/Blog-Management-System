<?php

namespace App\Http\Controllers;

use \Str;
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
        // Validation rules
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable|string|unique:posts,slug|max:255', // Validating slug
        ];

        // Custom error messages (optional)
        $messages = [
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'image.image' => 'The file must be an image.',
        ];

        // Validate the request data
        $validatedData = $request->validate($rules, $messages);

        // Proceed with storing the post if validation passes
        $user = Auth::user();
        $post = new Post;

        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->post_status = 'active';
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->userType = $user->usertype;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
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
    public function update_post(Request $request, $id)
    {
        // Validate the request data
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $messages = [
            'title.required' => 'The title is required.',
            'description.required' => 'The description is required.',
            'image.image' => 'The file must be an image.',
        ];

        $validatedData = $request->validate($rules, $messages);

        // Find the post by ID
        $post = Post::findOrFail($id);

        // Update the post fields
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];

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
        return redirect()->back()->with('message', 'Post Status changed to Active😃');
    }

    public function reject_post($id)
    {
        $data = Post::find($id);
        $data->post_status = 'rejected';

        $data->save();
        return redirect()->back()->with('message', 'Post Status changed to Rejected 😢');
    }

    public function like($id)
    {
        $post = Post::find($id);
        $post->likes += 1;
        $post->save();

        return back();
    }
}
