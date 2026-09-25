<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return inertia('blog/Home',[
            'blogs'=>Blog::orderBy('id','desc')->get()
        ]);
    }

    public function show(Blog $blog){
        return inertia('blog/Show',[
            'blog'=>$blog
        ]);
    }

    public function create(){
        return inertia('blog/Create');
    }

    public function add(Request $request){
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);
        
        $request->user()->blogs()->create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);
        return redirect('/');
    }

    public function edit(Blog $blog){
        return inertia('blog/Edit',[
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
