@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
الخدمات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع الخدمات</h4>
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


                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافة خدمه
                </button>
                <br><br>
                @if ($services->count() == 0)
                    <div class="text-center col col-md-12">

                        {{ __('لاتوجد  خدمات ') }}

                    </div>
                @else
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم الخدمه</th>
                                    <th> وصف الخدمه</th>
                                    <th>سعر الخدمه</th>            
                                   
                                    <th> مده تنفيذ الخدمه </th>  
                                    <th>  ملاحظات </th>
                                    
                                </tr>
                            </thead>
                @endif
                <tbody>

                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $service->service_name }}</td>
                            <td>{{ $service->service_description }}</td>
                            <td>{{ $service->service_price }}</td>
                            <td>{{ $service->service_note }}</td>
                        
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-info mr-1" data-toggle="modal"
                                        data-target="#edit{{ $service->id }}" title="edit"><i
                                            class="fa fa-edit"></i></button>


                                    <a class="btn btn-danger " href="{{ route('admin.services.destroy', $service->id) }}"
                                        onclick="event.preventDefault();
                                       document.getElementById('service-delete{{ $service->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                    <form id="service-delete{{ $service->id }}"
                                        action="{{ route('admin.services.destroy', $service->id) }}" method="POST"
                                        class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
            </div>
           
        </div>

        <!-- edit modal Grade -->
        <div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST"
                       >
                        @method('PUT')
                        @csrf
                        <div class="modal-header">
                            <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title" id="exampleModalLabel">
                                تعديل
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>


                        </div>
                        <div class="modal-body">
                            <!-- edit form   here -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="service_name" class="form-label text-primary">{{ __('اسم الخدمه') }}</label>
                                        <input type="text" name="service_name"
                                            class="form-control @error('service_name') is-invalid @enderror" id="service_name"
                                            value="{{ old('service_name',$service->service_name) }}" autofocus>
                                        @error('service_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                            <label for="service_description" class="form-label text-primary">{{ __('وصف الخدمه') }}</label>
                                            <textarea type="text" name="service_description" class="form-control @error('service_description') is-invalid @enderror"
                                                id="service_description">{{ old('service_description',$service->service_description) }}</textarea>
            
                                            @error('service_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                            <label for="service_note" class="form-label text-primary">{{ __('ملاحظات') }}</label>
                                            <input type="text" name="service_note"
                                                class="form-control  @error('service_note') is-invalid @enderror" id="service_note"
                                                value="{{ old('service_note',$service->service_note) }}">
                                            @error('service_note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="mb-3">
                                            <label for="service_execution_period"
                                            class="form-label text-primary">{{ __('مده تنفيذ الخدمه ') }}</label>
                                        <input type="text" name="service_execution_period"
                                            class="form-control @error('service_execution_period') is-invalid @enderror" id="service_execution_period"
                                            value="{{ old('service_execution_period',$service->service_execution_period) }}">
                                        @error('service_execution_period')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    </div>
                                    <div class="mb-3">
                                            <label for="service_price"
                                            class="form-label text-primary">{{ __('سعر الخدمه') }}</label>
                                        <input type="text" name="service_price"
                                            class="form-control @error('service_price') is-invalid @enderror" id="service_price"
                                            value="{{ old('service_price',$service->service_price) }}">
                                        @error('service_price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                  </div>


                            <button type="submit" class="btn btn-primary">{{ __('ارسال') }}</button>
                    </form>
                </div>
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
                <form class="row g-3" method="POST" action="{{ route('admin.services.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title container mx-4"
                            id="exampleModalLabel">
                            اضافة خدمه
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>

                    </div>
                    <div class="modal-body mt-0 ">
                        <div class="container row">
                            <div class="col-12">
                                <div class="mb-1">
                                    <label for="service_name" class="form-label text-primary">{{ __('اسم الخدمه') }}</label>
                                    <input type="text" name="service_name"
                                        class="form-control @error('service_name') is-invalid @enderror" id="service_name"
                                        value="{{ old('service_name') }}" autofocus>
                                    @error('service_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="service_description" class="form-label text-primary">{{ __('وصف الخدمه') }}</label>
                                    <textarea type="text" name="service_description" class="form-control @error('service_description') is-invalid @enderror"
                                        id="service_description">{{ old('service_description') }}</textarea>

                                    @error('service_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-12">
                                <label for="service_note" class="form-label text-primary">{{ __('ملاحظات') }}</label>
                                <input type="text" name="service_note"
                                    class="form-control  @error('service_note') is-invalid @enderror" id="service_note"
                                    value="{{ old('service_note') }}">
                                @error('service_note')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-12">
                                <label for="deliver_price"
                                        class="form-label text-primary">{{ __('مده تنفيذ الخدمه ') }}</label>
                                    <input type="text" name="service_execution_period"
                                        class="form-control @error('service_execution_period') is-invalid @enderror" id="service_execution_period"
                                        value="{{ old('service_execution_period') }}">
                                    @error('service_execution_period')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            <div class="col-12">
                                    <label for="service_price"
                                    class="form-label text-primary">{{ __('سعر الخدمه') }}</label>
                                <input type="text" name="service_price"
                                    class="form-control @error('service_price') is-invalid @enderror" id="service_price"
                                    value="{{ old('service_price') }}">
                                @error('service_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-12">
                                <div class="d-flex justify-content-between my-5">
                                    <div class="text-end">
                                        <a href="{{ route('services.index') }}"
                                            class="btn btn-outline-secondary">{{ __('رجوع') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('اضف') }}</button>
                                    </div>
                                </div>
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