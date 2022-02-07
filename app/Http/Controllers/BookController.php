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
        $faker = \Faker\Factory::create(1);
        $author = \App\Models\author::pluck('id')->first();
        $publisher = \App\Models\publisher::pluck('id')->first();

        $book = book::create([
            'name' => $faker->domainName,
            'author_id' => $author,
            'publisher_id' => $publisher,
            'price' => $faker->numberBetween(1,500),
            'release_date' => $faker->date,
            'pages' => $faker->numberBetween(1,500),
        ]);

        $genreNames = $request->input('genre');
        $genreNames = explode(',', $genreNames);
        $genreIds = [];
        foreach ($genreNames as $genreName) {
            $genreName = trim(strtolower($genreName));
            // Creates genre to book
            $genre = genre::firstOrCreate([
                'name'=>$genreName
            ]);
            $genreIds[] = $genre->id;
        }

        foreach ($genreIds as $genreId) {
            // Creates junction between book and genre
            BookGenre::updateOrCreate([
                'book_id'=>$book->id,
                'genre_id'=>$genreId,
            ]);
        }


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
        $author = \App\Models\author::pluck('id')->first();
        $publisher = \App\Models\publisher::pluck('id')->first();

        $book->update([
            'name' => $request->input('name'),
            'author_id' => $author,
            'publisher_id' => $publisher,
            'price' =>  $request->input('price'),
            'release_date' =>  $request->input('release_date'),
            'pages' =>  $request->input('pages'),
        ]);

        $genreNames = $request->input('genre');
        $genreNames = explode(',', $genreNames);
        $genreIds = [];
        foreach ($genreNames as $genreName) {
            $genreName = trim(strtolower($genreName));
            // Creates genre to book
            $genre = genre::firstOrCreate([
                'name'=>$genreName
            ]);
            $genreIds[] = $genre->id;
        }

        BookGenre::where('book_id', $book->id)->delete();
        foreach ($genreIds as $genreId) {

            // Creates junction between book and genre
            BookGenre::Create([
                'book_id'=>$book->id,
                'genre_id'=>$genreId,
            ]);
        }

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
        return "Books should not be deleted, instead set amount to zero in depot table";
    }
}
