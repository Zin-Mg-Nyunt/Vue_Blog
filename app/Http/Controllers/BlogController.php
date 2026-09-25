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

    public function edit(Blog $blog){
        return inertia('Edit',[
            'blog'=>$blog
        ]);
    }

    public function update(Blog $blog, Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        $blog->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        return redirect()->route('blog.show',$blog->id);
    }

    public function destroy(Blog $blog){
        $blog->delete();
        return redirect()->route('home');
    }
}
