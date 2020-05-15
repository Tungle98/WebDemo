
@extends('admin.layout.index')
@section('content')
    <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Sản phẩm
                                <small>Add</small>
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
                            <form action="admin/product/them" method="POST"  enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Tên  sản phẩm</label>
                                    <input class="form-control" name="Name" />
                                </div>
                                <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <select class="form-control" name="ProductDetail" id="ProductDetail">
                                @foreach($producttype as $type)
                                    <option value="{{$type->id}}">{{$type->Name}}</option>
                                @endforeach
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <input class="form-control" name="MoTa" value="" />
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <input class="form-control" name="DonViGia"  />
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input class="form-control" name="GiaKM" />
                                </div>


                                <div class="form-group">
                                <label>Hinh anh</label>
                                <input type="file" class="form-control" name="Hinh"  />
                                 </div>
                                 <div class="form-group">
                                    <label>Đơn vị</label>
                                    <input class="form-control" name="DonVi" />
                                </div>
                                <div class="form-group">
                                    <label>New</label>
                                    <input class="form-control" name="New"  />
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