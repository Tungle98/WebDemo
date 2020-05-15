@extends('master')

@section('content')

<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm {{$loai_sp->Name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
						@foreach($loai as $l)
							<li><a href="{{route('loaisanpham',$l->id)}}">{{$l->Name}} <img width="200 px" src="upload/product/{{$l->Hinh}}"></a></li>
							
						@endforeach	
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($sp_theoloai as $sp)
									<div class="col-sm-4">
										<div class="single-item">
										@if($sp->GiaKM!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">sale</div></div>
										@endif
											<div class="single-item-header">
												<a href="product.html"><img src="upload/product/{{$sp->Hinh}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$sp->Name}}</p>
												<p class="single-item-price">
												@if($sp->GiaKM==0)
													<span  class="flash-sale">{{number_format($sp->DonViGia)}}VND</span>
												@else
													<span  class="flash-del">{{number_format($sp->DonViGia)}}VND</span>
													<span  class="flash-sale">{{number_format($sp->GiaKM)}}VND</span>
                                                 @endif   
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sp_khac)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
							@foreach($sp_khac as $spk)
								<div class="col-sm-4">
									<div class="single-item">
									@if($spk->GiaKM!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">sale</div></div>
									@endif
										<div class="single-item-header">
											<a href="{{route('chitietsp',$sp->id)}}"><img src="upload/product/{{$spk->Hinh}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$spk->Name}}</p>
											<p class="single-item-price">
											@if($spk->GiaKM==0)
													<span  class="flash-sale">{{number_format($spk->DonViGia)}}VND</span>
												@else
													<span  class="flash-del">{{number_format($spk->DonViGia)}}VND</span>
													<span  class="flash-sale">{{number_format($spk->GiaKM)}}VND</span>
                                                 @endif  
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$spk->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
							@endforeach
							
							
							</div>
							<div class="row">{{$sp_khac->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    </div> <!-- .container -->

@endsection
