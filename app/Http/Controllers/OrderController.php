<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderResource::collection(order::all());
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
    public function store(OrderRequest $request)
    {
        // TODO: Create order line entry/ies, when making an order
        // TODO: when order line is created subtract amount of books in order from depot, check if depot>=order
        $faker = \Faker\Factory::create(1);
        $address = \App\Models\address::pluck('id')->first();
        $status =  [
            "Order Recieved",
            "In transit",
            "Delivered"
        ];

        $order = order::create([
            'address_id' => $address,
            'date' => $faker->date,
            'status' => $faker->randomElement($status),
        ]);

        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, order $order)
    {
        $order->update([
            'address_id' => $request->input('address_id'),
            'date' => $request->input('date'),
            'status' => $request->input('status'),
        ]);

        return new OrderResource($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order)
    {
        return 'String: Should not delete Order';
    }
}
