<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::all();
        return view("/posts.create", compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
         $post = Post::create([
            'title' => $request->get('title'),
        ]);


         $post->save();
         return redirect("/posts")->with("sucess", "data saved");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view("/posts.edit", compact('post'));
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        // $post->$request = $request->get('title');
        $post->title = $request->get('title');
        $post->save();

        return redirect("/posts")->with("success", "Data updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect("/posts")->with("success", "data deleted");
    }
}
