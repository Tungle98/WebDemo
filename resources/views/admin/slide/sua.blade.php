
@extends('admin.layout.index')
@section('content')
    
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide 
                            <small>{{$slide->Ten}}</small>
                        </h1>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger"> 
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div?
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}

                        </div>
                    @endif
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <input type="hidden" name="_tocken" value="{{csrf_token()}}">
                      <div class="form-group">
                                <label>Link</label>
                                <input class="form-control" name="link" placeholder="Nhập link slide" value="{{$slide->link}}" />
                            </div>
                           
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="500px" src="upload/slide/{{$slide->Hinh}}">
                                </p>
                                <input type="file" class="form-control" name="Hinh"  />
                            </div>
                          
                          
                           
                            <button type="submit" class="btn btn-default">Update</button>
                            <button type="reset" class="btn btn-default">Refresh</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection