@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Slide
                                <small>Thêm</small>
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
                            <form action="admin/slide/them" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                               
                                <div class="form-group">
                                    <label>Link</label>
                                    <input class="form-control" name="link" placeholder="Nhập mô tả" />
                                </div>
                                <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" class="form-control" name="Hinh" placeholder="Nhập hình ảnh" />
                                 </div>
                            
                               
                                <button type="submit" class="btn btn-default">Đồng ý</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            <form>
                         </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
    </div>
@endsection