@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix  ad-profile-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">My Profile</h2>
			</div><!-- banner -->
			
			@include('includes.profile')


			<div class="profile">
				<div class="row">
					<div class="col-sm-8">
						<div class="user-pro-section">

						<form action="{{route('profile.update')}}" method="post">
							{{csrf_field()}}
							<!-- profile-details -->
							@include('includes.errors')	
							<div class="profile-details section">
								<h2>Profile Details</h2>
								<!-- form -->
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}" required>
								</div>

								<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" placeholder="your email" disabled value="{{$user->email}}" required>
								</div>

								<div class="form-group">
									<label for="name-three">Mobile</label>
									<input type="number" name="phone" id="name-three" class="form-control" placeholder="Your Mobile" value="{{$user->phone}}" required>
								</div>

								

								<div class="form-group">
									<label>You are a</label>
									<select class="form-control" name="type">
										<option value="1" 
											@if($user->type == 1)
												selected
											@endif	
										>Dealer</option>
										<option value="0" 
											@if($user->type == 0)
												selected
											@endif
										>Individual Seller</option>
									</select>
								</div>					
							</div><!-- profile-details -->

							<!-- change-password -->
							<div class="change-password section">
								<h2>Change password</h2>
								<!-- form -->
								<div class="form-group">
									<label>Old Password</label>
									<input type="password" class="form-control" name="old_password">
								</div>
								
								<div class="form-group">
									<label>New password</label>
									<input type="password" class="form-control" name="password">	
								</div>
								
								<div class="form-group">
									<label>Confirm password</label>
									<input type="password" class="form-control" name="password_confirmation">
								</div>															
							</div><!-- change-password -->
							
							
							<button type="submit" class="btn btn-primary btn-md">Update Profile</button>
							<button href="#" class="btn cancle">Cancle</button>

						</form>	
						</div><!-- user-pro-edit -->

					</div><!-- profile -->

					@include('includes.settingshints')	
					<!-- recommended-cta-->
				</div><!-- row -->	
			</div>				
		</div><!-- container -->
	</section>

@stop