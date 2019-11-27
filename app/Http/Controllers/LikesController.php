<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\like;
use App\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $like = Like::where('user_id', Auth::user()->id)->pluck('post_id');
        $posts = Post::find($like);
        return view('like/index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect('/');
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
}
