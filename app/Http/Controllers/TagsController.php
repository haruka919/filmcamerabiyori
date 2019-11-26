<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
class TagsController extends Controller
{
    public function search(){
        $tags = Tag::all();
        return view('tag/search', ['tags' => $tags]);
    }
}
