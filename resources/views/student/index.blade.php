@extends('layouts.admin')
@section('title')
<title>Student List</title>
@endsection
@section('bread')
<div class="row">
    <div class="col-12">
      <div class="breadcrumb-section">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="{{URL::to('/')}}">Home</a>
            <i class="bx bxs-chevron-right mx-1"></i>
          </li>
          <li class="breadcrumb-item">
          <a href="{{route('student.create')}}">Add New Student</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  @endsection 
@section('style')
<link rel="stylesheet" href="{{asset('admin')}}/css/icheck-bootstrap.min.css">
<link rel="stylesheet" href="{{asset('admin')}}/datatable/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('admin')}}/datatable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
<div class="container-fluid ts__dashboard__content">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between ts-header-info">
                <div class="d-flex align-items-center ">
                    <div class="">
                        <a href="{{route('student.create')}}" class="default-btn">
                            Add Student
                        </a>
                    </div>
                    <div class="action-wrapper ml-4">
                        <button class="btn btn-danger delete-button-head" data-route="{{URL::to('/admin/category/multi')}}">
                            Delete
                        </button>
                    </div>
                </div>

                <div class="d-flex flex-row align-self-end">                
                    <div class="">
                        <select id="pagelen" style="display: none" class="ts-table-sorting wide">
                            <option value="10">10</option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="-1">All</option>
                        </select>
                    </div>                  
                    <div>
                        <div class="data-table-search-box">
                            <input id="searchBox" type="text" placeholder="Search..." /><span> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card ts__card__section">

                <div class="table-responsive">
                    <table class="table table-striped first" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic table  -->
        <!-- ============================================================== -->
    </div>
</div>


<!-- ============================================================== -->
<!-- Dashboard wrapper end -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- footer -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- end footer -->
<!-- ============================================================== -->

@endsection

@section('script')
<script src="{{asset('admin')}}/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/datatable/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript">

    $(function () {
  
      
  
      var table = $('#data-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csvHtml5',
            'pdfHtml5'
        ],
          processing: true,
  
          serverSide: true,
  
          ajax: "{{ route('student.index') }}",
  
          columns: [
  
            {data: 'id', name: 'id'},
              {data: 'first_name', name: 'first_name'},
  
              {data: 'last_name', name: 'last_name'},
              {data: 'gender', name: 'gender'},
              {data: 'dob', name: 'dob'},
              {data: 'address', name: 'address'},

              {data: 'status', name: 'status', orderable: false, searchable: false},
  
              {data: 'action', name: 'action', orderable: false, searchable: false},
  
          ]
  
      });
  
      $('#searchBox').on( 'keyup click', function () {
         table.search($('#searchBox').val()).draw();
    } );
    $('#pagelen').on( 'change', function () {
        table.page.len($('#pagelen').val()).draw();
    } );
    $(document).on('change', '.switch-status', {}, function (e) {
                var status=$(this).prop('checked')?1:0;
                var url = $(this).data('href')+"/"+status;
                $.ajax({
                    url: url,
                    type: 'get'
                }).always(function (data) {
                    $('#takwa-table').DataTable().draw(false);
                });

            });
    $(document).on('click', '.delete-button', {}, function (e) {
            if(!window.confirm("Are you sure to delete?")){
                return;
            }
            e.preventDefault();
            
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var url = $(this).data('href');
// confirm then
$.ajax({
    url: url,
    type: 'DELETE',
    dataType: 'json',
    data: {method: '_DELETE', submit: true}
}).always(function (data) {
    $('#data-table').DataTable().draw(false);
});
        })
    });
  
  </script>
@endsection
