@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Contacts</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Home</a> / <span>Contacts</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="beta-map">
		
		<div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/place/Hai+B%C3%A0+Tr%C6%B0ng,+H%C3%A0+N%E1%BB%99i,+Vi%E1%BB%87t+Nam/@21.0051307,105.8443309,14z/data=!3m1!4b1!4m5!3m4!1s0x3135ac1eb17075a1:0xb1f717592512c549!8m2!3d21.0090571!4d105.8607507?hl=vi-VN" ></iframe></div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Contact Form</h2>
					<div class="space20">&nbsp;</div>
					<p></p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Your Name (required)">
						</div>
						<div class="form-block">
							<input name="your-email" type="email" placeholder="Your Email (required)">
						</div>
						<div class="form-block">
							<input name="your-subject" type="text" placeholder="Subject">
						</div>
						<div class="form-block">
							<textarea name="your-message" placeholder="Your Message"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gửi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>Thông tin liên hệ</h2>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						Hai Bà Trưng - Hà Nội
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Kinh doanh</h6>
					<p>
						
						<a href="mailto:letung26021998@gmail.com">letung26021998@gmail.com</a>
					</p>
					<div class="space20">&nbsp;</div>
					<h6 class="contact-title">Việc làm</h6>
					<p>
					
						<a href="letung26021998@gmail.com">letung26021998@gmail.com</a>
					</p>
				</div>
			</div>
		</div> <!-- #content -->
    </div> <!-- .container -->
@endsection