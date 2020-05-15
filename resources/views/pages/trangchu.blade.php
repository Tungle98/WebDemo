@extends('master')

@section('content')
<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
								<ul>
                                @foreach($slide as $sl)
									<!-- THE FIRST SLIDE -->
									<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" 
                                    data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" 
                                    data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="upload/slide/{{$sl->Hinh}}" data-src="upload/slide/{{$sl->Hinh}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('upload/slide/{{$sl->Hinh}}'); 
                                                        background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
									</div>

						        </li>
                                @endforeach
                                </ul>
                          
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($new_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                            @foreach($new_product as $newp)
								<div class="col-sm-3">
									<div class="single-item">
										@if($newp->GiaKM!=0)
											<div class="ribbon-wrapper"><div class="ribbon sale">sale</div></div>
										@endif
										<div class="single-item-header">
											<a href="{{route('chitietsp',$newp->id)}}"><img src="upload/product/{{$newp->Hinh}}" alt="" height="250px"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$newp->Name}}</p>
											<p class="single-item-price">
                                                @if($newp->GiaKM==0)
                                                    <span  class="flash-sale">{{number_format($newp->DonViGia)}}VND</span>
                                                @else
                                                    <span  class="flash-del">{{number_format($newp->DonViGia)}}VND</span>
                                                    <span  class="flash-sale">{{number_format($newp->GiaKM)}}VND</span>
                                                    
                                                @endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$newp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Chi tiet<i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
                                </div>
                            @endforeach
						
							</div>
							<div class="row">{{$new_product->links()}}</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khuyến mãi</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($sanpham_km)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sanpham_km as $km)
									<div class="col-sm-3">
										<div class="single-item">
										<div class="ribbon-wrapper"><div class="ribbon sale">sale</div></div>
											<div class="single-item-header">
												<a href="{{route('chitietsp',$km->id)}}"><img src="upload/product/{{$km->Hinh}}" alt="" height="250px"></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$km->Name}}</p>
												<p class="single-item-price">
													<span  class="flash-del">{{number_format($km->DonViGia)}}VND</span>
													<span class="flash-sale">{{number_format($km->GiaKM)}}VND</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="{{route('themgiohang',$km->id)}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
								@endforeach
							
							</div>
							<div class="row">{{$sanpham_km->links()}}</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
    

@endsection