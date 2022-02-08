<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorResource;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AuthorResource::collection(author::all());
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
    public function store(AuthorRequest $request)
    {
        $author = author::create($request->all());

        return response()->json(new AuthorResource($author), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {
        return new AuthorResource($author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, author $author)
    {
        $author->update([
            'name' => $request->input('name')
        ]);

        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(author $author)
    {
        return "string: author deletion require all books with said author to be deleted";
    }
}
