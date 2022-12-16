<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;



class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('is_subadmin', ['except' => [
            'index', 'show'
        ]]);
     
        

    }
    public function index()
    {
        $services = Service::all();
        return view("services.index", ["services" => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("services.create");
       
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
            "service_description" => 'required|max:255|string',
            "service_name" => 'required|string',
            "service_price" => 'required|numeric|min:1',
            "service_execution_period" =>'required|numeric|min:1', 
            "service_note" => 'required|string',
        ]);
        $service = new Service(request()->all());
        $service->user_id = Auth::user()->id;
        $service->save();
        return redirect()->route("services.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        // $services = Service::all(); 
        // dd($services);
        $orders = Order::all()->where('service_id', $service->id);
        
        return view("services.show", [
            "service" => $service,
            "orders" => $orders
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service ,User $user)
    {
         $this->authorize('update', [$service]);
     
        return view('services.edit', [
            "service" => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
           
            "service_description" =>'required|max:255|string',
            "service_name" => 'required|string',
            "service_price" => 'required|numeric|min:1',
            "service_execution_period" =>'required|numeric|min:1', 
            "service_note" => 'required|string',
        ]);

        $service->update($request->all());

        return redirect()->route("services.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service ,User $user)
    {
       
        $this->authorize('delete', [$service, $user]);
        $service->delete();

        return redirect()->route('services.index');
    }
}
