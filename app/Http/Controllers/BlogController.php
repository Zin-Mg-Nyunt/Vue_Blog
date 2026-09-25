<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return inertia('Home',[
            'blogs'=>Blog::orderBy('id','desc')->get()
        ]);
    }

    public function show(Blog $blog){
        return inertia('Show',[
            'blog'=>$blog
        ]);
    }

    public function edit(){
        return inertia('Edit');
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('home');
    }
}
