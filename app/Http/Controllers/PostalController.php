<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostalRequest;
use App\Http\Resources\PostalResource;
use App\Models\postal;
use Illuminate\Http\Request;

class PostalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PostalResource::collection(postal::all());
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
    public function store(PostalRequest $request)
    {
        $faker = \Faker\Factory::create(1);
        $country = \App\Models\country::where('name',$faker->country/*$request->input('country')*/)->pluck('abbreviation')->first();

        $postal = postal::create([
            'post_code' => $faker->postcode(),
            'city' => $faker->city(),
            'country_id' => $country,
        ]);

        return new PostalResource($postal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postal  $postal
     * @return \Illuminate\Http\Response
     */
    public function show(postal $postal)
    {
        return new PostalResource($postal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postal  $postal
     * @return \Illuminate\Http\Response
     */
    public function edit(postal $postal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\postal  $postal
     * @return \Illuminate\Http\Response
     */
    public function update(PostalRequest $request, postal $postal)
    {
        $country = \App\Models\country::where('name',$request->input('country'))->pluck('abbreviation')->first();
        $postal->update([
            'post_code' => $request->input('post_code'),
            'city' => $request->input('city'),
            'country_id' => $country,
        ]);

        return new PostalResource($postal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postal  $postal
     * @return \Illuminate\Http\Response
     */
    public function destroy(postal $postal)
    {
        /*
        $postal->delete();
        return response(null, 204);
        */
        return "string: you should not delete from postal";
    }
}
