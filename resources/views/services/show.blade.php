@extends('layouts.app')

@section('links')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
  integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous"> --}}
@endsection


@section('content')
    <div class="container">
 
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-right">
                            <h4 class="my-3 text-center text-primary">{{$service->service_name }}</h4>
                            <p class="mx-4">{{ $service->service_description }}</p>

                            <hr class="m-4">
                            <h4 class="text-primary text-center m-4">بيانات الخدمه</h4>
                            <div class="mx-4">
                                <h6><span class="text-primary">مده انقضاء الخدمه:</span> {{ $service->service_execution_period }}</h6>
                                <h6><span class="text-primary">ملاحظات:</span> {{ $service->service_note }}</h6>
                                <h6><span class="text-primary">سعر الخدمه :</span> {{ $service->service_price }} جنيه
                                    مصري</h6>
                            </div>
                            
                        </div>
                    </div>

                </div>

        </section>
    </div>
    

 
    <!-- /add order -->
    <div class="container">
        @auth

            <div class="row mt-5 mb-3">
                <div class="col-sm-7 offset-sm-3 offset-md-0 ">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#addcomment" role="button" aria-expanded="false"
                        aria-controls="addcomment">
                        {{ __('اضف الخدمه لك ') }}
                    </a>
                </div>
            </div>
            <div class="row ">
                <div class="col col-md-12 ">
                    <div class="collapse multi-collapse" id="addcomment">
                        <div class="card card-body">
                            <!-- store order -->
                            <form class="row g-3" method="POST" action="{{ route('orders.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-12">
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


                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary">حفظ</button>
                                </div>
                            </form>
                            <!-- end store orders -->
                        </div>
                    </div>
                </div>
            </div>
       
        @endauth
        <!-- end orders -->

        <section>
            <div class="row text-right">
                @foreach ($orders as $order)
                    <div class="col-sm-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-text">
                                    اسم طالب الخدمه:<span class="fw-bold fs-5">{{ $order->user->name }}</span>
                                    </a>
                                </div>
                                <p class="card-text">
                                    <span class="text-muted">التعليق:</span>
                                    &nbsp; {{ $order->comment }}
                                </p>
                                <p class="card-text">
                                    <span class="text-muted"> تاريخ التسليم :</span>
                                    &nbsp;{{ $order->delivery_date }}
                                </p>
                               
                                <p class="card-text">
                                    <span class="text-muted"> حاله الطلب :</span>
                                    &nbsp;{{ $order->status }}
                                </p>

                                @auth
                                    
                                    @if (auth()->user()->id === $order->user_id)
                                        <div class="d-flex justify-content-end">
                                            <a class="btn btn-primary mx-2 align-self-start" data-bs-toggle="collapse"
                                                href="#commentedit{{ $loop->iteration }}" role="button"
                                                aria-expanded="false"
                                                aria-controls="commentedit{{ $loop->iteration }}">{{ __('تعديل') }}</a>

                                            <form action="{{ route('orders.destroy', $order->id) }}" method="post"
                                                class="mb-3">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger "> حذف </button>
                                            </form>

                                        </div>

                                    @endif
                                   
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endsection


    @section('scripts')
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script> --}}
        {{-- <script src="{{asset('lte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('lte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('lte/dist/js/demo.js')}}"></script> --}}

        {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}}
    @endsection