@extends('admin.layout.index')
@section('content')
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Khách hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Khách hàng</th>
                                <th>Giới tính</th>
                                <th>email</th>
                                <th>Địa chỉ</th>
                                <th>Số diện thoại</th>
                                <th>Ghi chú</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($customer as $kh)
                            <tr class="odd gradeX" align="center">
                                 <td>{{$kh->id}}</td>
                                <td>{{$kh->Name}}</td>
                                <td>{{$kh->GioiTinh}}</td>
                                <td>{{$kh->email}}</td>
                                <td>{{$kh->DiaChi}}</td>
                                <td>{{$kh->SDT}}</td>
                                <td>{{$kh->GhiChu}}</td>
                          
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/customer/xoa/{{$customer->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/customer/sua/{{$customer->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                      
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
   </div>
@endsection