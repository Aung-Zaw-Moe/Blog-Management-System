<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $post = Post::where('post_status', '=', 'active')->get();
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('home.homepage', compact('post'));
            } else if ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }
    public function homepage()
    {
        $post = Post::where('post_status', '=', 'active')->get();
        return view("home.homepage", compact('post'));
    }
    public function post_details($id)
    {
        $post = Post::find($id);
        return view('home.post_details', compact('post'));
    }
    // public function likePost($id)
    // {
    //     $post = Post::findOrFail($id);

    //     // Increment the likes count
    //     $post->likes += 1;
    //     $post->save();

    //     return redirect()->back()->with('message', 'You liked the post.');
    // }
    public function create_post()
    {
        // $post = Post::find($id);
        return view('home.create_post');
    }
    public function user_post(Request $request)
    {
        $user = Auth()->user();
        $userid = $user->id;

        $username = $user->name;
        $usertype = $user->usertype;

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $userid;
        $post->name = $username;
        $post->usertype = $usertype;
        $post->post_status = 'pending';


        $image = $request->image;
        if ($image) {

            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $imagename = time() . '.' . $image->getClientOriginalExtension();
        //     $request->image->move('postimage', $imagename);
        //     $post->image = $imagename;
        // }

        $post->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
    }
    public function my_post()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = Post::where('user_id', '=', $userid)->get();
        return view('home.my_post', compact('data'));
    }
    public function my_post_del($id)
    {
        $data = Post::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Post deleted Successfully!');
    }
    public function post_update_page($id)
    {
        $data = Post::find($id);

        return view('home.post_page', compact('data'));
    }
    public function update_post_data(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->descriptio;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Post Updated Successfully!');
    }
}
