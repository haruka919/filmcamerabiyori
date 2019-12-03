<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function index()
    {
        $like = Like::where('user_id', Auth::user()->id)->pluck('post_id');
        $posts = Post::find($like);
        $tagmenus = Tag::all();
        return view('post/index', ['posts' => $posts, 'tagmenus' => $tagmenus]);
    }

    public function store(Request $request)
    {
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
    }
}
