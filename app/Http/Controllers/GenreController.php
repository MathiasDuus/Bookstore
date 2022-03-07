<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\genre;
use Illuminate\Http\Request;
use App\Http\Requests\GenreRequest;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return GenreResource::collection(genre::all());
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
    public function store(GenreRequest $request)
    {
        $genreName = strtolower($request->input('name'));
        $genre = genre::create([
            'name' => $genreName,
        ]);
        return new GenreResource($genre);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, genre $genre)
    {
        $genreName = strtolower($request->input('name'));
        $genre->update([
            'name' => $genreName
        ]);

        return new GenreResource($genre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(genre $genre)
    {
        /*
        $genre->delete();
        return response(null, 204);
        */
        return response('Genre deletion is not allowed',405);
    }
}
