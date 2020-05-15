@extends('admin.layout.index')

@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Đơn đặt hàng
                            <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/order/sua/{{$order->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <label> Mã khách hàng</label>
                                    <input class="form-control" name="idCustomer" value="{{$order->idCustomer}}" />
                                </div>
                                <div class="form-group">
                                    <label> Ngày đặt</label>
                                    <input class="form-control" name="NgayDat" value="{{$order->NgayDat}}" />
                                </div>
                              
                            
                                <div class="form-group">
                                    <label>Thanh Toán</label>
                                    <input class="form-control" name="ThanhToan" value="{{$order->ThanhToan}}" />
                                </div>
                                <div class="form-group">
                                    <label>Tổng tiền</label>
                                    <input class="form-control" name="TongTien" value="{{$order->TongTien}}" />
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <input class="form-control" name="GhiChu"value="{{$order->GhiChu}}" />
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