@extends('layouts.admin');
@section('title', 'Thùng rác danh mục sản phẩm')
@section('maincontent')
@section('header')
  <link rel="stylesheet" href="{{ asset('template/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
  <script src="{{ asset('template/jquery.dataTables.min.js')}}"></script>
  <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
  } 
);
  </script>
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-2">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-md-6">
                <strong class="text-danger">Thùng rác danh mục sản phẩm</strong>
              </div>
              <div class="col-md-6 text-right">
                <a href="{{route('member.index')}}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Trở lại danh sách</a>
              </div>
          </div>
        </div>
        <div class="card-body">
          @includeIf('backend.message')
          
          <table class="table table-striped table-bordered" id="myTable">
              <thead>
                <tr class="bg-info">
                    <th class="text-center" style="width:20px;">#</th>
                    <th>Tên danh sách SP</th>
                    <th>Quyền vụ</th>
                    <th>Số điện thoại</th>
                    <th>Chức năng</th>
                    <th class="text-center" style="width:20px;">ID</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($list as $row)
                <tr>
                    <td class="text-center" style="width:20px;">
                        <input type="checkbox" name="checkboxid" id="value">
                    </td>
                    <td>{{ $row->fullname }}</td>
                    <td>{{ $row->roles }}</td>
                    <td>{{ $row->phone }}</td>
                    <td class="text-center">
                      @if (Auth::user()->roles = 'superadmin' || Auth::user()->roles = 'admin')
                        <form action="{{ route('member.destroy',['member' => $row -> id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a href="{{ route('member.retrash',['id' => $row -> id]) }}" class="btn btn-sm btn-warning"><i class="fas fa-undo-alt"></i></a>
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                      @endif
                      
                    </td>
                    <td class="text-center" style="width:20px;">{{ $row->id }}</td>
                </tr>
                @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
@endsection