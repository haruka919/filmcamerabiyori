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

    public function ajaxlike(Request $request)
    {    
        $post_id = $request->post_id;
        $liked = Like::where('post_id', $post_id)->where('user_id', Auth::user()->id)->count();
        if($liked > 0){
            $like = Like::where('post_id', $post_id)->where('user_id', Auth::user()->id)->delete();
            return response()->json($like);
        }else{
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
            return response()->json($like);
        }
    }

    public function store(Request $request)
    {
        $post_id = $request->post_id;
        $liked = Like::where('post_id', $post_id)->where('user_id', Auth::user()->id)->count();
        if($liked > 0){
            return redirect('/');
        }else{
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
            return redirect('/');
        }
    }
    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $like->delete();
        return redirect('/');
    }
}
