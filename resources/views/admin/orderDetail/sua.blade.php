@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Chi tiết đơn đặt hàng
                            <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/order/sua/{{$odct->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Mã đơn đặt hàng</label>
                                    <input class="form-control" name="idOrder" value="{{$odct->idOrder}}" />
                                </div>
                                <div class="form-group">
                                    <label> Mã sản phẩm</label>
                                    <input class="form-control" name="idProduct" value="{{$odct->idProduct}}"  />
                                </div>
                              
                            
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input class="form-control" name="quantity" value="{{$odct->quantity}}"  />
                                </div>
                                <div class="form-group">
                                    <label>Đơn vị giá</label>
                                    <input class="form-control" name="DonViGia" value="{{$odct->DonViGia}}"  />
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
