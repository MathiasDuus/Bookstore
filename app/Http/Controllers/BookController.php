<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\book;
use App\Models\BookGenre;
use App\Models\genre;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(book::all());
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
    public function store(BookRequest $request)
    {
        $date = $request->input('release_date');
        $date = date('Y-m-d', strtotime($date));

        $book = book::create([
            'name' => $request->input('name'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'price' =>  $request->input('price'),
            'release_date' => $date,
            'pages' =>  $request->input('pages'),
            'cover' =>  $request->input('cover'),
        ]);


        return new BookResource($book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(book $book)
    {
        return New BookResource($book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, book $book)
    {
        $date = $request->input('release_date');
        $date = date('Y-m-d', strtotime($date));

        $book->update([
            'name' => $request->input('name'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'price' =>  $request->input('price'),
            'release_date' => $date,
            'pages' =>  $request->input('pages'),
            'cover' =>  $request->input('cover'),
        ]);

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(book $book)
    {
        /*
        $book->delete();
        return response(null, 204);
        */
        return response('Book deletion is not allowed, set amount to zero in depot',405);//TODO: When delete set depot amount to zero
    }
}
