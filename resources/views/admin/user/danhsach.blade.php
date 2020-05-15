@extends('admin.layout.index')
@section('content')
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người dùng</th>
                                <th>email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                              
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                 <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->Phone}}</td>
                                <td>{{$u->DiaChi}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/user/xoa/{{$u->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/sua/{{$u->id}}">Edit</a></td>
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