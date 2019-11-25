<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        
        return view('post/index', ['posts' => $posts]);
    }

    public function new()
    {
        return view('post/new');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'caption' => 'required|string|max:255', 
            'photo' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        
        $post = new Post;
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->user_id = Auth::user()->id;
        $post->save();


        $request->photo->storeAs('public/post_images', $post->id . '.jpg');

        // タグの登録
        $tags_name = $request->input('tags');
        $tag_ids = [];
        foreach ($tags_name as $tag_name) {
            if(!empty($tag_name)){
                $tag = Tag::firstOrCreate([
                    'name' => $tag_name,
                ]);
                $tag_ids[] = $tag->id;
            }
        }
        // dd($tag_ids);
 
        // 中間テーブル
        $post->tags()->attach($tag_ids);
        
        return redirect('/')->with('success', '投稿しました');

    }
    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        return view('post/show', ['post' => $post]);
    }
    public function showByTag($id){
        $tag = Tag::find($id);
        return view('post/tag', ['posts' => $tag->posts]);
    }
}
