<?php

namespace App\Http\Controllers;

use App\Models\depot;
use Illuminate\Http\Request;

class DepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(depot $depot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function edit(depot $depot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, depot $depot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function destroy(depot $depot)
    {

        /*
        $depot->delete();
        return response(null, 204);
        */
    }
}
