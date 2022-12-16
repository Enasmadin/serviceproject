@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
الأوردارت
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع الأوردارت</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">القائمة</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <!-- add Grade -->

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- end errors -->


                {{-- <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة عرض
                </button> --}}
                <br><br>
                @if ($orders->count() == 0)
                    <div class="text-center col col-md-12">

                        {{ __('لاتوجد  عروض ') }}

                    </div>
                @else
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم  طالب الأوردر</th>
                                    <th> تفاصيل الأوردر</th>
                                    <th> تاريخ تسليم الأوردر</th>   
                                    <th>  حاله الأوردر</th> 
                                    <th> حذف الأوردر</th>         
                                
                                </tr>
                            </thead>
                @endif
                <tbody>

                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->comment }}</td>
                            <td>{{ $order->delivery_date }}</td>
                            <td>{{ $order->status }}</td>
                            {{-- <td>{{ $order->$service->service_price }}</td> --}}
                           
                        
                            <td>
                                <div class="d-flex">
                                    
                                    <a class="btn btn-danger " href="{{ route('admin.orders.destroy', $order->id) }}"
                                        onclick="event.preventDefault();
                                       document.getElementById('service-delete{{ $order->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <form id="service-delete{{ $order->id }}"
                                        action="{{ route('admin.orders.destroy', $order->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
            </div>
           
        </div>

      
        @endforeach

        </table>
    </div>
</div>

</div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container ">
                <form class="row g-3" method="POST" action="{{ route('admin.orders.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title container mx-4"
                            id="exampleModalLabel">
                            اضافة طلبيه
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                    </div>
                    <div class="modal-body mt-0 ">
                        <div class="container row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label for="comment" class="form-label text-primary"> التعليق </label>
                                        <input value="{{ old('comment') }}" type="text"
                                            class="form-control @error('description') is-invalid @enderror" id="comment"
                                            name="comment">
                                        @error('comment')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="delivery_date" class="form-label text-primary">تاريخ التسليم</label>
                                <input type="date" value="{{ old('delivery_date') }}"
                                    class="form-control @error('delivery_date') is-invalid @enderror" id="delivery_date"
                                    name="delivery_date">
                                @error('delivery_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                            <button type="submit" class="btn btn-success">حفظ</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')

@endsection