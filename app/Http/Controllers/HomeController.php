<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $posts = Post::where('post_status', '=', 'active')->with('comments')->get();
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('home.homepage', compact('posts'));
            } else if ($usertype == 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }

    public function homepage()
    {
        $posts = Post::where('post_status', '=', 'active')->with('comments')->get();
        return view("home.homepage", compact('posts'));
    }

    public function post_details($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        return view('home.post_details', compact('post'));
    }

    public function create_post()
    {
        return view('home.create_post');
    }

    public function user_post(Request $request)
    {
        // Validation rules
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $post = new Post;

        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user->id;
        $post->name = $user->name;
        $post->usertype = $user->usertype;
        $post->post_status = 'pending';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $post->image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('postimage', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with('message', 'Post Updated Successfully!');
    }

    public function about()
    {
        return view('home.about');
    }

    public function like_post($id)
    {
        $post = Post::findOrFail($id);
        $post->increment('likes');
        return redirect()->back()->with('message', 'You liked the post!');
    }

    public function post_comment(Request $request, $id)
    {
        $request->validate([
            'comment_body' => 'required|string|max:255',
        ]);

        $comment = new Comment;
        $comment->post_id = $id;
        $comment->user_id = Auth::id();
        $comment->comment_body = $request->comment_body;
        $comment->save();

        return redirect()->back()->with('message', 'Comment added successfully!');
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);
        return view('home.post_details', compact('post'));
    }
    public function userlist()
    {
        $users = User::all();
        return view('home.userlist', compact('users'));
    }
}


// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use App\Models\Comment;
// use App\Models\Post;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class HomeController extends Controller
// {
//     public function index()
//     {
//         if (Auth::id()) {
//             $post = Post::where('post_status', '=', 'active')->get();
//             $usertype = Auth()->user()->usertype;

//             if ($usertype == 'user') {
//                 return view('home.homepage', compact('post'));
//             } else if ($usertype == 'admin') {
//                 return view('admin.adminhome');
//             } else {
//                 return redirect()->back();
//             }
//         }
//     }

//     public function homepage()
//     {
//         $post = Post::where('post_status', '=', 'active')->get();
//         return view("home.homepage", compact('post'));
//     }


//     public function post_details($id)
//     {
//         $post = Post::with('comments')->findOrFail($id);
//         return view('home.post_details', compact('post'));
//     }



//     public function create_post()
//     {
//         return view('home.create_post');
//     }

//     public function user_post(Request $request)
//     {
//         // Validation rules
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $user = Auth::user();
//         $post = new Post;

//         $post->title = $request->title;
//         $post->description = $request->description;
//         $post->user_id = $user->id;
//         $post->name = $user->name;
//         $post->usertype = $user->usertype;
//         $post->post_status = 'pending';

//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imagename = time() . '.' . $image->getClientOriginalExtension();
//             $request->image->move('postimage', $imagename);
//             $post->image = $imagename;
//         }

//         $post->save();

//         return redirect()->back()->with('message', 'Post Added Successfully');
//     }

//     public function my_post()
//     {
//         $user = Auth::user();
//         $userid = $user->id;
//         $data = Post::where('user_id', '=', $userid)->get();
//         return view('home.my_post', compact('data'));
//     }

//     public function my_post_del($id)
//     {
//         $data = Post::find($id);
//         $data->delete();
//         return redirect()->back()->with('message', 'Post deleted Successfully!');
//     }

//     public function post_update_page($id)
//     {
//         $data = Post::find($id);
//         return view('home.post_page', compact('data'));
//     }

//     public function update_post_data(Request $request, $id)
//     {
//         $request->validate([
//             'title' => 'required|string|max:255',
//             'description' => 'required|string',
//             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
//         ]);

//         $data = Post::find($id);
//         $data->title = $request->title;
//         $data->description = $request->description; // Fixed typo
//         if ($request->hasFile('image')) {
//             $image = $request->file('image');
//             $imagename = time() . '.' . $image->getClientOriginalExtension();
//             $request->image->move('postimage', $imagename);
//             $data->image = $imagename;
//         }
//         $data->save();
//         return redirect()->back()->with('message', 'Post Updated Successfully!');
//     }

//     public function about()
//     {
//         return view('home.about');
//     }
//     public function like_post($id)
//     {
//         $post = Post::findOrFail($id);
//         $post->increment('likes'); // Increment the likes count by 1
//         return redirect()->back()->with('message', 'You liked the post!');
//     }
//     public function post_comment(Request $request, $id)
//     {
//         $request->validate([
//             'comment_body' => 'required|string|max:255',
//         ]);

//         $comment = new Comment;
//         $comment->post_id = $id;
//         $comment->user_id = Auth::id();
//         $comment->comment_body = $request->comment_body;
//         $comment->save();

//         return redirect()->back()->with('message', 'Comment added successfully!');
//     }

//     public function showPost($id)
//     {
//         // Find the post by ID
//         $post = Post::findOrFail($id);

//         // Pass the post data to the view
//         return view('home.post_details', compact('post'));
//     }
// }
