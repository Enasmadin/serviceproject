<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::simplePaginate(10);;
        $users = User::all();

        return view('admin.pages.services.index', [
            'services' => $services,
            'users' => $users,
        ]);
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
        return redirect()->route("admin.services.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
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

        return redirect()->route("admin.services.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route("admin.services.index");
    }
}