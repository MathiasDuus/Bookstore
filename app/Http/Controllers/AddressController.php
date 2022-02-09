<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Models\address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AddressResource::collection(address::all());
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
    public function store(AddressRequest $request)
    {
        $faker = \Faker\Factory::create(1);
        $postal = \App\Models\postal::pluck('id')->first();
        $customer = \App\Models\customer::pluck('id')->first();

        $address = address::create([
            'postal_id' => $postal,
            'street' => $faker->city(),
            'customer_id' => $customer,
        ]);

        return new AddressResource($address);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(address $address)
    {
        return new AddressResource($address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, address $address)
    {
        $customer = \App\Models\customer::where('mail', $request->input('mail'))->pluck('id')->first();

        $address->update([
            'postal_id' => $request->input('postal_id'),
            'street' => $request->input('street'),
            'customer_id' => $customer,
        ]);

        return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(address $address)
    {
        /*
        $address->delete();
        return response(null, 204);
        */
        return "string: you should not delete an address";
    }
}
