<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
//    function __construct()
//    {
//        $this->middleware('auth:customer_api', ['scopes: customer'])->only(['show']);
//        $this->middleware('auth:employee_api', ['scopes: employee']);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CustomerResource::collection(customer::all());
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
    public function store(CustomerRequest $request)
    {
        $password = password_hash($request->input('password'),PASSWORD_DEFAULT );
        $customer = customer::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $password,
            'active' => true,
        ]);

        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        return new CustomerResource($customer);// customer::with('address')->findOrFail($customer->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, customer $customer)
    {
        $password = password_hash($request->input('password'),PASSWORD_DEFAULT );
        $customer->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $password,
            'active' => true,
        ]);

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer $customer)
    {
        /*
        $customer->delete();
        return response(null, 204);
        or
        return response('You are not allowed to delete a customer',405);
        */
        $customer->update([
            'active' => false,
        ]);

        return new CustomerResource($customer);
    }
}
