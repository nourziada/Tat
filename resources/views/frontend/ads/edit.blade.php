@extends('layouts.frontend')

@section('content')


<style type="text/css">
	.flag_remove{
    		position: absolute;
			content: "\f055";
			font-family: 'FontAwesome';
			top: 50%;
			left: 50%;
			font-size: 30px;
			color: white;
			cursor: pointer;
			margin-top: -14px;
			margin-left: -14px;
			line-height: 30px;
			-webkit-transition: all 0.3s ease-in-out;
			-moz-transition: all 0.3s ease-in-out;
			-ms-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
    	}

    	.lisitingpreview{
    		position: absolute;
    	}
</style>
<section id="main" class="clearfix ad-details-page">
		<div class="container">
		
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Update Your Ad : {{$ads->title}}</h2>
			</div><!-- banner -->

			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-8">
					@include('includes.errors')
						<form action="{{route('ads.update',['id' => $ads->id])}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						{{method_field('PATCH')}}
							<fieldset>
								<div class="section postdetails">
									<h4>Update item or service <span class="pull-right">* Mandatory Fields</span></h4>

									<div class="row form-group">
										<label class="col-sm-3">Select category of ads<span class="required">*</span></label>
										<div class="col-sm-9 user-type">

										@forelse($categories as $cat)
											<input type="radio" name="category_id" value="{{$cat->id}}" id="{{$cat->id}}" 
												@if($cat->id == $ads->category_id)
													checked="checked"
												@endif	
											> 
											<label for="{{$cat->id}}" 
												
											>{{$cat->name }}</label>
										
										@empty 

											there's No Category Add Yet
										@endforelse	

										</div>
									</div>
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Title for your Ad<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" class="form-control" id="text" placeholder="ex, Sony Xperia dual sim 100% brand new " value="{{$ads->title}}" name="title" required>
										</div>
									</div>

									<div class="row form-group add-image">
										<label class="col-sm-3 label-title">Photos for your ad <span >(This will be your cover photo )</span> </label>
										<div class="col-sm-9">
											<h5><i class="fa fa-upload" aria-hidden="true"></i>Select Files to Upload / Drag and Drop Files <span style="color: red">If you dont Need to change Dont touch it</span></h5>
											<div class="upload-section">
												<label class="upload-image" for="upload-image-one">
													<img  src="{{$ads->image_1}}" class="lisitingpreview" alt="">
													<input type="file" name="image_1" id="upload-image-one" class="identity_img">
												</label>										

												<label class="upload-image" for="upload-image-two">
													<img  src="{{$ads->image_2}}" class="lisitingpreview" alt="">
													<input type="file" name="image_2" id="upload-image-two" class="identity_img">
												</label>											
												<label class="upload-image" for="upload-image-three">
													<img  src="{{$ads->image_3}}" class="lisitingpreview" alt="">
													<input type="file" name="image_3" id="upload-image-three" class="identity_img">
												</label>										

												<label class="upload-image" for="upload-imagefour">
													<img  src="{{$ads->image_4}}" class="lisitingpreview" alt="">
													<input type="file" name="image_4" id="upload-imagefour" class="identity_img">
												</label>
											</div>	
										</div>
									</div>
									<div class="row form-group select-condition">
										<label class="col-sm-3">Condition<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="radio" name="item_type" value="1" id="new" 
												@if($ads->type == 1)
													checked="checked"
												@endif	
											> 
											<label for="new">New</label>
											<input type="radio" name="item_type" value="0" id="used"
												@if($ads->type == 0)
													checked="checked"
												@endif	
											> 
											<label for="used">Used</label>
										</div>
									</div>
									<div class="row form-group select-price">
										<label class="col-sm-3 label-title">Price<span class="required">*</span></label>
										<div class="col-sm-9">
											<label>$USD</label>
											<input type="text" name="price" class="form-control" value="{{$ads->price}}" id="text1" required>
										</div>
									</div>
									<div class="row form-group item-description">
										<label class="col-sm-3 label-title">Description<span class="required">*</span></label>
										<div class="col-sm-9">
											<textarea class="form-control" id="textarea" placeholder="Write few lines about your products" rows="8" name="desc" onkeyup="textCounter(this,'counter',5000);">{{$ads->desc}}</textarea>		
										</div>
									</div>
									<div class="row">
										<div class="col-sm-9 col-sm-offset-3">
											<p id="count">5000 characters left</p>
										</div>
									</div>								
								</div><!-- section -->

								<div class="section seller-info">
									<h4>Seller Information</h4>
									<div class="row form-group">
										<label class="col-sm-3 label-title">Name<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" placeholder="name" disabled>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-3 label-title">Email<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="email" name="email" class="form-control" value="{{Auth::user()->email}}" placeholder="Email" disabled>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-sm-3 label-title">Phone number<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="mobileNumber" class="form-control" value="{{Auth::user()->phone}}" placeholder="Phone" disabled>
										</div>

									</div>
									<div class="row form-group">
										<label class="col-sm-3 label-title">City</label>
										<div class="col-sm-9">
											<input type="text" name="city" class="form-control" value="{{$ads->city}}" placeholder="City" required>
										</div>
									</div>
								</div>
								<div class="checkbox section agreement">
									<label for="send">
										<input type="checkbox" name="send" id="send" required>
										I undertake to assume full legal responsibility in the publication of this Declaration									</label>
									<button type="submit" class="btn btn-primary">Update Your Ad</button>
								</div><!-- section -->
								
							</fieldset>
						</form><!-- form -->	
					</div>
				

					<!-- quick-rules -->	
					<div class="col-md-4">
						<div class="section quick-rules">
							<h4>Quick rules</h4>
							<p class="lead">Posting an ad on <a href="#">Trade.com</a> is free! However, all ads must follow our rules:</p>

							<ul>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
								<li>Do not put your email or phone numbers in the title or description.</li>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
							</ul>
						</div>
					</div><!-- quick-rules -->	
				</div><!-- photos-ad -->				
			</div>	
		</div><!-- container -->
	</section>

@stop
