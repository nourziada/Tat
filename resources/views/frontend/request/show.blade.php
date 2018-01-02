@extends('layouts.frontend')

@section('content')
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a283d195fcf41c2"></script>


<section id="main" class="clearfix details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					
					<li>Requests</li>
				</ol><!-- breadcrumb -->						
			</div>

			@include('includes.search')

			<!-- banner -->
	

			<div class="section slider">					
				<div class="row">
					<!-- carousel -->
					<div class="col-md-7">
						<img class="img-responsive" src="

							@if($req->image == null)
								{{asset('images/default.jpg')}}
							@else
								{{$req->image}}
							@endif		
						">
					</div><!-- Controls -->	

					<!-- slider-text -->
					<div class="col-md-5">
						<div class="slider-text">
							<h3 class="title">{{$req->title}}</h3>
							<p><span>Requested by: <span style="color: #000">{{\App\User::find($req->user_id)->name}}</span></span>

							</p>

							<span class="icon"><i class="fa fa-clock-o"></i> {{$req->created_at->diffForHumans()}} </span>

							<span class="icon"><i class="fa fa-map-marker"></i>{{$req->city}}</span>

							
							<!-- contact-with -->
							<div class="contact-with">
								<h4>Contact with </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text">Click to show phone number </span> 
									<span class="hide-number">{{\App\User::find($req->user_id)->phone}}</span>
								</span>
								<a href="#" class="btn"><i class="fa fa-envelope-square"></i>Reply by email</a>
							</div><!-- contact-with -->
							
							<!-- social-links -->
							<div class="social-links">
								<h4>Share this Request</h4>
								<ul class="list-inline">
									<div class="addthis_inline_share_toolbox_bteu"></div>
								</ul>
							</div><!-- social-links -->						
						</div>
					</div><!-- slider-text -->				
				</div>				
			</div><!-- slider -->

			<div class="description-info">
				<div class="row">
					<!-- description -->
					<div class="col-md-12">
						<div class="description">
							<h4>Description</h4>
							<p>{{$req->desc}}</p>
						</div>
					</div><!-- description -->

					
				</div><!-- row -->
			</div><!-- description-info -->	
			

		</div><!-- container -->
	</section><!-- main -->
	
	<!-- download -->
<section id="something-sell" class="clearfix parallax-section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h2 class="title">Do you have something-sell?</h2>
					<h4>Post your ad for free on Trade.com</h4>
					<a href="{{route('ads.create')}}" class="btn btn-primary">Post Your Ad</a>
				</div>
			</div><!-- row -->
		</div><!-- contaioner -->
	</section>

@stop