<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            $orders
        ]);
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
    public function store(Request $request)
    {
       
        $request->validate([

            "comment" => 'required|max:255',
            "delivery_date" => 'required|after:yesterday',
            

        ]);
    
        $url = request()->headers->get('referer');
        $urlArr = explode('/', $url);
        $seriveId =  end($urlArr);
        $orders = new Order(request()->all());
        $orders->user_id = auth()->user()->id;
        $orders->service_id = $seriveId;
        $orders->save();
        return response()->json([
            "massage" => "order Store Succusfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'max:255'],
            'from' => ['required', 'max:255'],
            'to' => ['required', 'max:255'],
            'deliver_price' => ['required', 'numeric'],
            'product_id' => ['required', 'numeric'],
        ]);

        $post->update($request->all());
        return response()->json([
            "massage" => "Data Updated Succusfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
        $order->delete();
        return response()->json([
            "massage" => "Data Deleted Succusfully"
        ]);
    }
}