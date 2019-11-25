<?php

namespace App\Http\Controllers;
use App\User;
use App\Post;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($user_id)
    {
        $user = User::where('id', $user_id)->firstOrFail();
        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        //firstOrFailは条件とマッチするレコードのうち最初のレコードだけを返す。
        return view('user/show', ['user' => $user, 'posts' => $posts]);
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
            'profile_photo' => 'string|max:255',
            'intro' => 'nullable|string|max:150'
        ]);
        // バリデーションが失敗した場合
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $user = User::find($request->id);
        $user->name = $request->name;
        if($request->user_profile_photo != null){
            $request->user_profile_photo->storeAs('public/user_images', $user->id . '.jpg');
            $user->profile_photo = $user->id . '.jpg';
        }
        $user->intro = $request->intro;
        $user->save();
        return redirect('/users/'.$request->id);
    }
}
