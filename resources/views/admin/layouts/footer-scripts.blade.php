<!-- jquery -->
<script src="{{ URL::asset('admin/assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('admin/assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = '{{ asset('admin/assets/js') }}/';
</script>

<!-- chart -->
<script src="{{ URL::asset('admin/assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('admin/assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('admin/assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('admin/assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('admin/assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="{{ URL::asset('admin/assets/js/sweetalert2.js') }}"></script>
<!-- toastr -->
@yield('js')
<script src="{{ URL::asset('admin/assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('admin/assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('admin/assets/js/lobilist.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('admin/assets/js/custom.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>



@if (App::getLocale() == 'ar')
    <script src="{{ URL::asset('admin/assets/js/bootstrap-datatables/en/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/bootstrap-datatables/en/dataTables.bootstrap4.min.js') }}"></script>
@else
    <script src="{{ URL::asset('admin/assets/js/bootstrap-datatables/ar/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('admin/assets/js/bootstrap-datatables/ar/dataTables.bootstrap4.min.js') }}"></script>
@endif