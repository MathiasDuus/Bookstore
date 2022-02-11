<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookGenreRequest;
use App\Http\Resources\BookGenreResource;
use App\Models\BookGenre;
use Illuminate\Http\Request;

class BookGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookGenreResource::collection(BookGenre::all());
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
    public function store(BookGenreRequest $request)
    {
        $bookGenre = BookGenre::Create($request->all());
        return new BookGenreResource($bookGenre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function show(BookGenre $bookGenre)
    {
        return new BookGenreResource($bookGenre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function edit(BookGenre $bookGenre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function update(BookGenreRequest $request, BookGenre $bookGenre)
    {
        $bookGenre->update($request->all());
        return new BookGenreResource($bookGenre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookGenre  $bookGenre
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookGenre $bookGenre)
    {
        /*
        return response('Book genre deletion is not allowed',405);
        */
        $bookGenre->delete();
        return response(null, 204);
    }
}
