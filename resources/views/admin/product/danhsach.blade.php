@extends('admin.layout.index')
@section('content')
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Product
                            <small>List</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên Bánh</th>
                                <th>Lọai Bánh</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Giá khuyến mãi</th>
                               
                                <th>Dơn Vị</th>
                                <th>New</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $pro)
                            <tr class="odd gradeX" align="center">
                                <td>{{$pro->id}}</td>
                                <td>{{$pro->Name}} </br>
                                <img width="100px" src="upload/product/{{$pro->Hinh}}"/>
                                </td>
                                <td>{{$pro->product_type->Name}}</td>
                                <td>{{$pro->MoTa}}</td>
                                <td>{{$pro->DonViGia}}</td>
                                <td>{{$pro->GiaKM}}</td>
                                <td>{{$pro->DonVi}}</td>
                                <td>{{$pro->New}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/xoa/{{$pro->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/sua/{{$pro->id}}">Edit</a></td>
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