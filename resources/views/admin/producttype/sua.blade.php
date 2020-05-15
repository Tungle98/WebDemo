@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$loaisp->Name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/producttype/sua/{{$loaisp->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Tên  sản phẩm</label>
                                    <input class="form-control" name="Name" value="{{$loaisp->Name}}" />
                                </div>
                              
                            
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <input class="form-control" name="MoTa" value="{{$loaisp->MoTa}}" />
                                </div>
                                


                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <img width="200px" src="upload/producttype/{{$loaisp->Hinh}}"/>
                                    <input type="file" class="form-control" name="Hinh" />
                                </div>
                              
                            </div>
                            <button type="submit" class="btn btn-default">Ok</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection