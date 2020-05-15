@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Loại sản phẩm
                                <small>Add</small>
                            </h1>
                        </div>
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
                   
                        <!-- /.col-lg-12 -->
                    
                        <div class="col-lg-7" style="padding-bottom:120px">
                            <form action="admin/producttype/them" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Tên loại sản phẩm</label>
                                    <input class="form-control" name="Name" placeholder="Nhập tên loại sản phẩm" />
                                </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <input class="form-control" name="MoTa" placeholder="Nhập mô tả" />
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" name="Hinh"  />
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