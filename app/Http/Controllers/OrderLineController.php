<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderLineRequest;
use App\Http\Resources\OrderLineResource;
use App\Models\OrderLine;
use Illuminate\Http\Request;

class OrderLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return OrderLineResource::collection(OrderLine::all());
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
    public function store(OrderLineRequest $request)
    {
        /*$faker = \Faker\Factory::create(1);
        $order = \App\Models\order::pluck('id')->first();
        $book = \App\Models\book::pluck('id')->first();
        $quantity = $faker->numberBetween(0, 50);
        $price = $book->price*$quantity;

        $orderLine = OrderLine::create([
            'order_id' => $order,
            'book_id' => $book,
            'quantity' => $quantity,
            'price' => $price,
        ]);

        return new OrderLineResource($orderLine);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function show(OrderLine $orderLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderLine $orderLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderLine $orderLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderLine  $orderLine
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderLine $orderLine)
    {
        //
    }
}
