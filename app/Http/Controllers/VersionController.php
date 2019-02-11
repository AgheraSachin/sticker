<?php

namespace App\Http\Controllers;

use App\version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $versions = version::all();
        return view('Version.version-list', compact('versions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Version.add-version');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        version::create($request->all());
        return redirect('version');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\version $version
     * @return \Illuminate\Http\Response
     */
    public function show(version $version)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\version $version
     * @return \Illuminate\Http\Response
     */
    public function edit(version $version, $id)
    {
        $version = version::where('id', $id)->get()->toArray();
        return view('Version.edit-version', compact('version'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\version $version
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $version = version::find($id);
        $version->name=$request->input('name');
        $version->save();
        return redirect('version');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\version $version
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        version::destroy($id);
        return redirect('version');
    }
}
