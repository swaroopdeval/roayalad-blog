<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parameter;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paramters=Parameter::all();
        return view('parameters.index', compact('parameters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parameters = new Parameter;

        // $parameters->params_name  = $request->input('params_name');
        // $parameters->params_value = $request->input('params_name');
        // $parameters->bidders_name = $request->input('bidders_name');

        // $parameters->save();
    
        $record_count = count($request->input('params_name'));
    
        for($i=0; $i<$record_count; $i++) {
            $parameters->params_name  = $request->input('params_name')[$i];
            $parameters->params_value = $request->input('params_name')[$i];
            $parameters->bidders_name = $request->input('bidders_name')[$i];
            dd($parameters);
            $parameters->save();
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
