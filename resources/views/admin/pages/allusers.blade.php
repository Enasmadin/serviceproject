@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
      المستخدين
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> عرض جميع الاعضاء</h4>
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
                    اضافة مستخدم
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th> ادمن</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->is_admin }}</td>



                                    <td>
                                        <button type="button" class="btn btn-info " data-toggle="modal"
                                            data-target="#edit{{ $user->id }}" title="edit"
                                            style="width: 34px; height: 34px; margin:1px; display: inline-block;"><i
                                                class="fa fa-edit"></i></button>


                                        <form action="{{ route('admines.destroy', $user->id) }}" method="POST"
                                            style="width: 34px; height: 34px; margin:1px; display: inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash"></i></button>

                                        </form>

                                    </td>
                                </tr>



                                <!-- edit modal Grade -->
                                <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admines.update', $user->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        edit
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- edit form   here -->

                                                    <div class="raw container">

                                                        <div class="col-12">
                                                            <label class="form-label text-primary" for="name">الاسم
                                                                كامل</label>

                                                            <input type="text" id="name" name="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ old('name', $user->name) }}">
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>



                                                        <div class="col-12">
                                                            <label class="form-label text-primary" for="email">البريد
                                                                الالكتروني</label>

                                                            <input type="email" id="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email"
                                                                value="{{ old('email', $user->email) }}">

                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="col-12">
                                                            <label class="form-label text-primary" for="password">كلمة
                                                                السر</label>
                                                            <input type="password" id="password" name="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                autocomplete="new-password"   value="{{ old('password', $user->password ) }}">
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="col-12">
                                                            <label class="form-label text-primary"
                                                                for="password_confirmation">تأكيد كلمة
                                                                السر</label>
                                                            <input type="password" name="password_confirmation"
                                                                id="password_confirmation"
                                                                class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password', $user->password   ) }}"/>
                                                            @error('password_confirmation')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>


                                                        <div class="col-12 mt-3">
                                                            <label class="form-label text-primary"
                                                                for="role"> نوع المستخدم</label>
                                                            <div class="col-12">
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('is_admin') is-invalid @enderror"
                                                                        type="radio" name="is_admin"
                                                                        id="femaleGender" value="0"
                                                                        {{ $user->is_admin == '0' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="femaleGender">مستخدم</label>
                                                                </div>

                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="is_admin"
                                                                        id="maleGender" value="1"
                                                                        {{ $user->is_admin == '1' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="maleGender">أدمن</label>
                                                                </div>
                                                                <div class="form-check form-check-inline mb-0 me-4">
                                                                    <input
                                                                        class="form-check-input @error('gender') is-invalid @enderror"
                                                                        type="radio" name="is_admin"
                                                                        id="maleGender" value="1"
                                                                        {{ $user->is_admin == '2' ? 'checked' : '' }} />
                                                                    <label class="form-check-label"
                                                                        for="maleGender">مشرف</label>
                                                                </div>
                                                                @error('is_admin')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="d-flex flex-row align-items-center mb-4">
                                                        <div class="form-check form-check-inline mb-0 me-4">

                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">اغلاق</button>
                                                            <button type="submit"
                                                                class="btn btn-success">حفظ</button>

                                                        </div>
                                                    </div>
                                                    <br><br>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- delete modal -->
                                <!-- Button trigger modal -->
                            @endforeach

                    </table>
                </div>

            </div>

        </div>
    </div>
    <!-- here -->

    <!-- add modal Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admines.store') }}" method="POST" >
                    @csrf
                    <div class="modal-header">

                        <h5 style="font-family: 'Cairo' , sans-serif;" class="modal-title" id="exampleModalLabel">
                            اضافة مستخدم
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>



                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- add form   here -->

                        <div class="row container">
                            <!-- register -->






                            <div class="col-12">
                                <label class="form-label text-primary" for="name">الاسم كامل</label>

                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-12">
                                <label class="form-label text-primary" for="email">البريد الالكتروني</label>

                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label class="form-label text-primary" for="password">كلمة السر</label>
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12">
                                <label class="form-label text-primary" for="password_confirmation">تأكيد كلمة
                                    السر</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" />
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-12 mt-3">
                                <label class="form-label text-primary" for="role"> نوع المستخدم المنشئ</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('is_admin') is-invalid @enderror"
                                            type="radio" name="is_admin" id="user" value="0" />
                                        <label class="form-check-label" for="user">مستخدم</label>
                                    </div>

                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('is_admin') is-invalid @enderror"
                                            type="radio" name="is_admin" id="user" value="1" />
                                        <label class="form-check-label" for="user">أدمن</label>
                                    </div>
                                    <div class="form-check form-check-inline mb-0 me-4">
                                        <input class="form-check-input @error('is_admin') is-invalid @enderror"
                                            type="radio" name="is_admin" id="user" value="2" />
                                        <label class="form-check-label" for="user">مشرف</label>
                                    </div>
                                    @error('is_admin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end register -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                                <button type="submit" class="btn btn-success">حفظ</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
    <!-- finished -->
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection