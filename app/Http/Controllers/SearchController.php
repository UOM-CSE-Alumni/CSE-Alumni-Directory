<?php

namespace App\Http\Controllers;

use App\Company;
use App\Degree;
use App\Student;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $degrees=Degree::All();
        $companies=Company::All();
        return view('search.search',compact('degrees','companies'));
    }

    /**
     * Search for people
     *
     * @return \Illuminate\Http\Response
     */
    public function simpleSearch(Request $request)
    {
        $keyword=$request->keyword;
        $results=Student::where('name','like','%'.$keyword.'%')->get();
        return view('search.result')->with('results',$results);
    }

    /**
     * Search for people
     *
     * @return \Illuminate\Http\Response
     */
    public function advanceSearch(Request $request)
    {
        $keyword=$request->keyword;
        $results=Student::where('name','like','%'.$keyword.'%')->get();
        return view('search.result')->with('results',$results);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
