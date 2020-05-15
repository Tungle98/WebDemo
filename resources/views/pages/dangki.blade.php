@extends('master')

@section('content')
<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng kí</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html">Home</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
    </div>
    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}

                        </div>
      @endif
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dangki')}}" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address</label>
							<input type="email" id="email" name="email"  required>
						</div>

						<div class="form-block">
							<label for="your_last_name">Fullname</label>
							<input type="text" id="your_last_name" name="name" required>
						</div>

						<div class="form-block">
							<label for="adress">Address</label>
							<input type="text" id="adress"  name="DiaChi" required>
						</div>


						<div class="form-block">
							<label for="phone">Phone</label>
							<input type="text" id="phone" name="Phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password</label>
							<input type="text" id="phone" name="password" required>
						</div>
						<div class="form-block">
							<label for="phone">Re password</label>
							<input type="text" id="phone" name="re_password" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container --
@endsection