@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Sản phẩm
                            <small>{{$product->Name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/product/sua/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Tên  sản phẩm</label>
                                    <input class="form-control" name="Name" value="{{$product->Name}}" />
                                </div>
                              
                             <div class="form-group">
                                <label> Loại sản phẩm</label>
                                <select class="form-control" name="ProductDetail">
                                @foreach($producttype as $type)
                                    <option 
                                    @if($product->idType == $type->id)
                                        {{"selected"}}
                                        @endif
                                    value="{{$type->id}}">{{$type->Name}}</option>
                                  @endforeach  
                                </select>
                            </div>
                                <div class="form-group">
                                    <label>Mô Tả</label>
                                    <input class="form-control" name="MoTa" value="{{$product->MoTa}}" />
                                </div>
                                <div class="form-group">
                                    <label>Đơn giá</label>
                                    <input class="form-control" name="DonViGia" value="{{$product->DonViGia}}" />
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mãi</label>
                                    <input class="form-control" name="GiaKM"value="{{$product->GiaKM}}" />
                                </div>


                                <div class="form-group">
                                <label>Hình ảnh</label>
                                <img width="200px" src="upload/product/{{$product->Hinh}}"/>
                                <input type="file" class="form-control" name="Hinh" />
                                 </div>
                                 <div class="form-group">
                                    <label>Đơn vị</label>
                                    <input class="form-control" name="DonVi" value="{{$product->DonVi}}" />
                                </div>
                                <div class="form-group">
                                    <label>New</label>
                                    <input class="form-control" name="New" value="{{$product->New}}" />
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