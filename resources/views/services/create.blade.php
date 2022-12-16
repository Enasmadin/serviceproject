@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="m-auto py-2 w-md-50 shadow-lg rounded-3">


                    <div class="container py-5">
                        <h1 class="text-center text-primary">{{ __('إضافة خدمه') }}</h1>

                        <div class="container">
                            <form action="{{ route('services.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
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


                                <div class="mb-3">
                                    <label for="service_description" class="form-label text-primary">{{ __('وصف الخدمه') }}</label>
                                    <textarea type="text" name="service_description" class="form-control @error('service_description') is-invalid @enderror"
                                        id="service_description">{{ old('service_description') }}</textarea>

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
                                        value="{{ old('service_note') }}">
                                    @error('service_note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
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

                                <div class="mb-3">
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

                               

                               
                                <div class="d-flex justify-content-between my-5">
                                    <div class="text-end">
                                        <a href="{{ route('services.index') }}"
                                            class="btn btn-outline-secondary">{{ __('رجوع') }}</a>
                                        <button type="submit" class="btn btn-primary">{{ __('اضف') }}</button>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection