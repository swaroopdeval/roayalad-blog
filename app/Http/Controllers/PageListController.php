<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageList;


class PageListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PageList::all();

        // return view('pages.index', compact('pages'));
        return view('pages.index',['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {

        $pages =new PageList([
            'pagetitle' => $request->get('pagetitle'),
            'articlelist' => $request->get('articlelist'),
            'tags' => $request->get('tags'),
            'status' => $request->get('status'),
            'prebid' => $request->get('prebid'),
        ]);
        // dd($pages);
        dd($request->get('tags'));
        $pages->save();

        $tags =explode(',', $request->tags);
        // dd($tags);
  
        $pages->tag($tags);
        // var_dump($tags =explode(',', $request->tags));
        $pages->save();
        

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
        $pages->tags = $request->get('tags');
        $pages->status = $request->get('status');
        $pages->prebid= $request->get('prebid');
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
