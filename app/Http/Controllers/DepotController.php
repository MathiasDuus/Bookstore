<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepotRequest;
use App\Http\Resources\DepotResource;
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
        return DepotResource::collection(depot::all());
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
    public function store(DepotRequest $request)
    {
        $depot = depot::create([
            'book_id' => $request->input('book_id'),
            'amount' => $request->input('amount'),
            'store_id' => $request->input('store_id'),
        ]);

        return new DepotResource($depot);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\depot  $depot
     * @return \Illuminate\Http\Response
     */
    public function show(depot $depot)
    {
        return new DepotResource($depot);
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
    public function update(DepotRequest $request, depot $depot)
    {
        $depot->update([
            'book_id' => $request->input('book_id'),
            'amount' => $request->input('amount'),
            'store_id' => $request->input('store_id'),
        ]);

        return new DepotResource($depot);
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
        or
        return response('Depot deletion is not allowed',405);
        */
        return response('Depot deletion is not allowed',405);
    }
}
