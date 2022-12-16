@extends('layouts.app')

@section('content')

    <div class="container">
        @if ($orders->count() == 0)
            <h3>{{ __('لا يوجد طلبيات') }}</h3>
         @else  
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-md-4 col-lg-3 col-lg-xs-12">
                        <div class="card mt-3 p-2 h-100">
                            
                            <div class="card-body">
                                <h5 class="card-title "> الطلبيه  :{{ $order->comment }}</h5>
                                <p class="card-text m-auto"> اسم الخدمه:{{ $order->service->service_name }}</p>
                                <p class="card-text"> تفاصيل الخدمه:{{ $order->service->service_description }}</p>
                                <div class="btn-group">
                                    <a href="{{ route('orders.show', $order->id) }}"
                                        class="btn btn-outline-primary">{{ __('تفاصيل الطلبية') }}</a>
                                    @if (auth()->user()->id == $order->user->id )
                                        <a href="{{ route('orders.destroy', $order->id) }}" class="btn btn-outline-danger"
                                            onclick="event.preventDefault();
                                    document.getElementById('logout-form{{ $order->id }}').submit();">{{ __('إلغاء الطلبية') }}</a>
                                        <form id="logout-form{{ $order->id }}"
                                            action="{{ route('orders.destroy', $order->id) }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif


    @endsection