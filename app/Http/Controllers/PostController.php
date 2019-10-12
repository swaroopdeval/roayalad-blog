<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
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
        $tags = Tag::all();

        $posts->map(function($post) {
            $post->post_tag= Tag::where('id', $post->id)->get();
        });
       
        return view('posts.index', compact('posts'))->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::all();
        $tags = Tag::all();

        return view("posts.create")->withTags($tags);
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

         $post->tags()->sync($request->tags, false);
         return redirect("/posts")->with("sucess", "data saved");
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all();

        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
        
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->save();

        $post->tags()->sync($request->tags);

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
