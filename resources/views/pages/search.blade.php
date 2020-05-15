@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Tìm kiếm sản phẩm</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm thấy {{count($product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
                            @foreach($product as $newp)
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
						
						</div> <!-- .beta-products-list -->

						

						
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #c
@endsection