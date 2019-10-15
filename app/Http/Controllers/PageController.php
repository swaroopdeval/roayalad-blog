<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\Tag;

class PageController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $tags =Tag::all();

        $pages->map(function($page) {
            $page->page_tag = Tag::where('id', $page->id)->get();
        });
       
        return view('pages.index', compact('pages'))->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages =Page::all();
        $tags = Tag::all();

        return view("pages.create")->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $page = Page::create([
            'title' => $request->get('title'),
            'articles' => $request->get('articles'),
            'status' => $request->get('status'),
        ]);
        
        $page->save();

        $page->tags()->sync($request->tags, false);

        return redirect("/pages")->with("sucess", "data saved");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ger pages
        $page =Page::find($id);
        $tags =Tag::all();

        return view('pages.show', ['page' => $page, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page =Page::find($id);
        $tags =Tag::all();

        return view('pages.edit', ['page' => $page, 'tags' => $tags]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page =Page::find($id);
        

        $page->title = $request->get('title');
        $page->articles = $request->get('articles');
        $page->status = $request->get('status');
     
        $page ->save();

        $page->tags()->sync($request->tags);

        return redirect("/pages")->with("success", "Data successfully updated");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page=Page::find($id);
        $page->delete();
 
       return redirect("/pages")->with("success", "Data deleted succesfully");
    }
}
