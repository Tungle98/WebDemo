
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Người dùng
                                <small></small>
                            </h1>
                        </div>
                        <!-- /.col-lg-12 -->
                        @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                         @endif

                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}

                            </div>
                        @endif
                        <div class="col-lg-7" style="padding-bottom:120px">
                            <form action="admin/user/sua" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Name</label>
                                    <input class="form-control" name="name" value="{{$user->name}}"/>
                                </div>
                               
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" value="{{$user->email}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" name="password" value="{{$user->password}}" />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="Phone" value="{{$user->Phone}}"/>
                                </div>


                              
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" name="DiaChi" value="{{$user->DiaChi}}" />
                                </div>
                            
                                
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            <form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
    </div>
@endsection