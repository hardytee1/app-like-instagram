<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('dashboard', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required',
            'image_url' => 'required|url',
        ]);

        $user = Auth::user();

        $post = new Post();
        $post->caption = $request->caption;
        $post->image_url = $request->image_url;
        $post->user_id = $user->id;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to edit this post.');
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Ensure the authenticated user is authorized to update the post
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this post.');
        }

        // Validate the request data
        $request->validate([
            'caption' => 'required',
            'image_url' => 'required|url',
        ]);

        // Update the post with the new data
        $post->update([
            'caption' => $request->caption,
            'image_url' => $request->image_url,
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to delete this post.');
        }
        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Post deleted successfully!');
    }

    public function search(Request $request)
    {
        $userName = $request->input('user_name');

        // Find the user by name
        $user = User::where('name', 'like', '%' . $userName . '%')->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Get posts made by the user
        $posts = Post::where('user_id', $user->id)->get();

        return view('dashboard', compact('posts'));
    }
}