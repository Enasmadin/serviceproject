@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($services->count() == 0)
            <h3 class="mb-3">{{ __('لا توجد خدمات ') }}</h3>

            @auth
            @authsubAdmin
                <a class="btn btn-primary" href="{{ route('services.create') }}">{{ __('اضف خدمه  جديدا') }}</a>
            @endauthsubAdmin
            @endauth
        @else
        <div class="container pb-3 mt-5">
            <div class="d-grid gap-3">
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-sm-12 col-md-4 col-lg-2 offset-sm-2 offset-md-0 offset-lg-0 mb-4" style="width: 23rem;">
                            <div class="card shadow-sm text-center h-100">
                    
                                <div class="card-body">
                                    <h1 style="color: #007EA7">{{$service->service_name }}</h1>
                                    <p class="card-text">
                                        <span class="text-muted">{{ __('الوصف: ') }}</span>
                                        {{ Str::words($service->service_description, 4) }}
                                    </p>
                                    <p class="card-text">
                                        <span class="text-muted">
                                            {{ __(' سعر الخدمه: ') }}
                                        </span>
                                        {{ $service->service_price }}
                                    </p>
                                    <p class="card-text">
                                        <span class="text-muted">{{ __('مده تنفيذ الخدمه: ') }}
                                        </span>
                                        {{ $service->service_execution_period }}
                                    </p>
                                    <p class="card-text">
                                        <span class="text-muted">{{ __('  ملاحظات: ') }}
                                        </span>
                                        {{ $service->service_note }}
                                        {{-- {{ $service->id }} --}}
                                    </p>
    
                                    <div class="btn-group">
                                       
                                        <a class="btn btn-primary" href="{{ route('services.show',$service->id ) }}">
                                            {{ __('عرض') }}
                                        </a>
                                        @auth
    
                                            {{-- @if (auth()->user()->id === $service->user_id) --}}
                                                <a class="btn btn-outline-primary" href="{{ route('services.edit', $service->id) }}">
                                                    {{ __('تعديل') }}
                                                </a>
                                                <a class="btn btn-outline-danger" href="{{ route('services.destroy', $service->id) }}"
                                                    onclick="event.preventDefault();
                                                   document.getElementById('delete{{ $service->id }}').submit();">
    
                                                    حذف
                                                </a>
                                                <form id="delete{{ $service->id }}"
                                                    action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-none">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            {{-- @endif --}}
                                        @endauth
                                        {{-- @endvendor --}}
                                    </div>
                                </div>
    
                                <div class="row mb-4">
                                    
                                    <small class="col-12 fw-bold fs-6" style="color: #007EA7">{{ $service->user->name }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 
        @endif
    </div>



    
@endsection