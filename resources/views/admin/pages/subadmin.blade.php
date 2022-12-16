@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
المشرفين  الفرعين
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">  عرض المشرفين  الفرعين  </h4>
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

                <!-- errors -->
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
                @if ($subadmin->count() == 0)
                <div class="text-center col col-md-12">

              {{ __('لايوجد مشرف فرعي جدد') }}

                </div>

            @else


                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الايميل</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        @endif
                        <tbody>


                            @foreach ($subadmin as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="{{ route('users.update', $user->id) }}" method="post"
                                            class="mb-3">

                                            @method('PUT')
                                            @csrf
                                            <label>الحالة</label>
                                            <select  name="status" >

                                                <option value="accepted">قبول</option>
                                                <option value="refused">رفض</option>

                                            </select>
                                            <button type="submit" class="btn btn-danger">حفظ</button>
                                        </form>
                                    </td>
                                </tr>



                </div>
                <div class="modal-body">
                    <!-- edit form   here -->

                </div>
            </div>
        </div>


        <!-- delete modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->


    </div>
</div>
</div>





<!-- end delete modal -->
</tbody>
@endforeach

</table>
</div>

</div>

</div>
</div>
<!-- here -->

<!-- finished -->
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection