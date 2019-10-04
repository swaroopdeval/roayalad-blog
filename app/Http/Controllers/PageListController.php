<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageList;
use App\PageListTag;
use App\Tag;

class PageListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = PageListTag::all();
        $pages = PageList::all();
        $pages->map(function($page) {
            $page->tags = Tag::where('page_list_id', $page->id)->get();
        });

        // return view('pages.index', compact('pages'));
        return view('pages.index', compact('pages', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = PageList::all();
        $tags = PageListTag::all();

        // $pages->tags()->sync($request->tags
        return view('pages.create', ['pages' => $pages, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

        $page = PageList::create([
            'pagetitle' => $request->get('pagetitle'),
            'articlelist' => $request->get('articlelist'),
            'status' => $request->get('status'),
            'prebid' => $request->get('prebid'),
        ]);
        
        if ($page && count($request->tags) > 0) {
            $tags = $request->tags;
            foreach ($tags as $tag_id) {
                Tag::create([
                    'page_list_id' => $page->id,
                    'page_list_tag_id' => $tag_id
                ]);
            }
        }

        return redirect('/pages')->with('success', 'data saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = PageList::find($id);
        return view('pages.edit', compact('pages')); 
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
        $pages = PageList::find($id);
        $pages->pagetitle =  $request->get('pagetitle');
        $pages->articlelist = $request->get('articlelist');
        $pages->status = $request->get('status');

        $pages->save();

        
        return redirect('/pages')->with('success', 'pages updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pages = PageList::find($id);
        $pages->delete();

        return redirect('/pages')->with('success', 'Page  deleted!');
    }
}
