@extends('admin.layout.index')
@section('content')
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
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
                                <th>ID khách hàng</th>
                                <th>Ngày đặt</th>
                                <th>Thanh Toán</th>
                                <th>Tổng tiền</th>
                                <th>Ghi chu</th>
                              
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $or)
                            <tr class="odd gradeX" align="center">
                                 <td>{{$or->id}}</td>
                                <td>{{$or->idCustomer}}</td>
                                
                                <td>{{$or->NgayDat}}</td>
                                <td>{{$or->ThanhToan}}</td>
                                <td>{{$or->TongTien}}</td>
                                <td>{{$or->GhiChu}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/order/xoa/{{$or->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/order/sua/{{$or->id}}">Edit</a></td>
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