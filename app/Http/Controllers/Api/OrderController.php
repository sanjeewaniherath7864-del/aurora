<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){


        $issued_at = $request->get("issued_at");
        $vehicle_no = $request->get("vehicle_no");
        $status = $request->get("status");
        $shipped_at = $request->get("shipped_at");


        $updateObj = [];

        if($issued_at) {
            $updateObj['issued_at'] = $issued_at;
            $updateObj['status'] = 'issued';
        }

        if($vehicle_no ){
            $updateObj['vehicle_no'] = $vehicle_no;
            $updateObj['status'] = 'shipping';
            $updateObj['shipped_at'] = now();
        } 
        if($status ){
            $updateObj['status'] = 'canceled';
        } 

        $order = Order::where("id", $id)->first()->update($updateObj);

        dd($order);
        return [
            "status"=> 'success',
            'order'=> $order,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
