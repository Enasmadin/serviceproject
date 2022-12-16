<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        //  dd($orders);
        return view("orders.index", ["orders" => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Order $order)
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

        return back()->with('success', 'تم إضافة عرضك بنجاح ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("orders.show", [
            
            "order" => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([

            "comment" => 'required|max:255',
            "delivery_date" => 'required|after:yesterday',

        ]);
        $order->update($request->all());
        $order->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        
        $user = auth()->user();
       
        $order->delete();
      

        return redirect()->route('services.index');
        
    }
}
