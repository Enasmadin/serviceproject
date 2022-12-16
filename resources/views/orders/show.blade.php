@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-sm-8 col-md-6 offset-sm-2 offset-md-0">
                <div class="card my-sm-3 my-md-5">
                    <p class="mt-2 "> تفاصيل صاحب الخدمه </p>
                    <div class="card-body">
                        <div class="my-1"> اسم  :{{ $order->service->user->name }}</div>
                        <div class="my-1"> ميل  :{{ $order->service->user->email }}</div>
                    </div>

                </div>
            </div>

            <div class="col-sm-8 col-md-6 offset-sm-2 offset-md-0">
                <div class="card my-sm-3 my-md-5">
                    <p class="mt-2 ">تفاصيل   طالب الخدمه</p>
                    
                        <p class="card-title  text-capitalize"> اسم :{{ $order->user->name }}</p>
                    </a>

                    <div class="card-body">
            
                        <div class="my-1">ميل:{{ $order->user->email }}</div>
                    </div>
                </div>
            </div>
        </div>

        <hr>


        <div class="py-5">
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-12 col-md-9 offset-md-1 my-4">
                        <div class="card">
                            <div class="row g-0 text-white bg-dark">
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h6 class="text-center"> تفاصيل الطلبيه</h6>
                                        <h5 class="card-title"> اسم :{{ $order->service->service_name}}</h5>
                                        <p class="card-text">
                                            <small class="fw-bold">الأجراء: </small>
                                            {{ $order->service->status }}
                                           
                                        </p>
                                        
                                        <p class="card-text">
                                            <small class="fw-bold">مده انقضاء الخدمه: </small>
                                            {{  $order->service->orderservice_execution_period }}
                                        </p>
                                        <p class="card-text">
                                            <small class="fw-bold"> اسم طالب الأوردر : </small>
                                            {{  $order->user->name }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                <small class="fw-bold">ملاحظات: </small>
                                                {{  $order->service->service_note }}</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @endsection

