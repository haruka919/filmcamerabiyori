<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        $tagmenus = Tag::all();
        return view('post/index', ['posts' => $posts, 'tagmenus' => $tagmenus]);
    }

    public function new()
    {
        $tagmenus = Tag::all();
        return view('post/new', ['tagmenus' => $tagmenus]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:50',
            'photo' => 'required|file|image'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $photo = $request->file('photo');
        $img = \Image::make($photo);
        $width = 600;
        $img->resize($width, null, function($constraint){
            $constraint->aspectRatio();
        });
        
        
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = Auth::user()->id;
        
        $post->photo = str_random(30);
        $post->save();

        //画像登録
        $file_name = $post->photo. '.jpg';
        $save_path = storage_path('app/public/post_images/'.$file_name);        
        $img->save($save_path);

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
        // 中間テーブル
        $post->tags()->attach($tag_ids);
        return redirect('/')->with('success', '投稿しました');
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $tagmenus = Tag::all();
        return view('post/show', ['post' => $post, 'tagmenus' => $tagmenus]);
    }
    public function showByTag($id){
        $tag = Tag::find($id);
        $tagmenus = Tag::all();
        return view('post/tag', ['posts' => $tag->posts, 'tag' => $tag, 'tagmenus' => $tagmenus]);
    }
    public function destroy($post_id){
        $post = Post::find($post_id);
        $post->delete();
        return redirect('/');
    }
}
