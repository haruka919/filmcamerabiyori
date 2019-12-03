<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use App\Tag;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        $tagmenus = Tag::all();
            
        //firstOrFailは条件とマッチするレコードのうち最初のレコードだけを返す。
        return view('user/show', ['user' => $user, 'posts' => $posts, 'tagmenus' => $tagmenus]);
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user/edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'. $request->id,
            'user_profile_photo' => 'nullable|file|image',
            'intro' => 'nullable|string|max:150'
        ]);
        // バリデーションが失敗した場合
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $photo = $request->file('user_profile_photo');
        $img = \Image::make($photo);
        $width = 300;
        $img->resize($width, null, function($constraint){
            $constraint->aspectRatio();
        });

        $user = User::find($request->id);
        $user->name = $request->name;


        if($request->user_profile_photo != null){

            $file_name = $user->id . '.jpg';
            $save_path = storage_path('app/public/user_images/'.$file_name);        
            $img->save($save_path);

            // $img->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $file_name;
        }
        $user->intro = $request->intro;
        $user->save();
        return redirect('/users/'.$request->id);
    }
}
