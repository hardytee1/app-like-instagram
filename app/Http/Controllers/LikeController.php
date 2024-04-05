<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Post $post)
{
    $user = Auth::user();
    $like = Like::where('post_id', $post->id)->where('user_id', $user->id)->first();

    if ($like) {
        $like->delete();
        $post->decrement('like_count'); // Decrement like count directly in database
        $message = 'Post unliked successfully!';
    } else {
        $like = new Like();
        $like->post_id = $post->id;
        $like->user_id = $user->id;
        $like->save();
        $post->increment('like_count'); // Increment like count directly in database
        $message = 'Post liked successfully!';
    }

    return redirect()->route('dashboard')->with('success', $message);
}


    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}