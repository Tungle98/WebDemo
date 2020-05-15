@extends('master')

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$sanpham->Name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="upload/product/{{$sanpham->Hinh}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><h2>{{$sanpham->Name}}</h2></p>
								<p class="single-item-price">
								@if($sanpham->GiaKM==0)
                                     <span  class="flash-sale">{{number_format($sanpham->DonViGia)}}VND</span>
                                 @else
                                     <span  class="flash-del">{{number_format($sanpham->DonViGia)}}VND</span>
                                     <span  class="flash-sale">{{number_format($sanpham->GiaKM)}}VND</span>
                                                    
                                 @endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->MoTa}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Số lượng</p>
							<div class="single-item-options">
								
								<select class="wc-select" name="color">
									<option>Số lượng</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->MoTa}}</p>
						</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm liên quan</h4>
						
							<div class="row">
							@foreach($sp_tuongtu as $tt)
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsp',$tt->id)}}"><img src="upload/product/{{$tt->Hinh}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$tt->Name}}</p>
											<p class="single-item-price">
												@if($tt->GiaKM==0)
													<span  class="flash-sale">{{number_format($tt->DonViGia)}}VND</span>
												@else
													<span  class="flash-del">{{number_format($tt->DonViGia)}}VND</span>
													<span  class="flash-sale">{{number_format($tt->GiaKM)}}VND</span>
																	
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="product.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						
					</div> <!-- .beta-products-list -->
				</div>
				
					</div> <!-- best sellers widget -->
					 <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
    
@endsection