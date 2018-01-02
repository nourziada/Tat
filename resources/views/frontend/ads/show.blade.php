@extends('layouts.frontend')

@section('content')

<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a283d195fcf41c2"></script>

<section id="main" class="clearfix details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					<li><a href="{{route('show.categories.ads',['id' => \App\Category::find($ads->category_id)->id,'type' => 1])}}">{{\App\Category::find($ads->category_id)->name}}</a></li>
				</ol><!-- breadcrumb -->						
			</div>

			@include('includes.search')

			<!-- banner -->
	

			<div class="section slider">					
				<div class="row">
					<!-- carousel -->
					<div class="col-md-7">
						<div id="product-carousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#product-carousel" data-slide-to="0" class="active">
									<img src="{{$ads->image_1}}" class="img-responsive">
								</li>

								@if($ads->image_2 != null)
								<li data-target="#product-carousel" data-slide-to="1">
									<img src="{{$ads->image_2}}"  class="img-responsive">
								</li>
								@endif

								@if($ads->image_3 != null)
								<li data-target="#product-carousel" data-slide-to="2">
									<img src="{{$ads->image_3}}"  class="img-responsive">
								</li>
								@endif

								@if($ads->image_4 != null)
								<li data-target="#product-carousel" data-slide-to="3">
									<img src="{{$ads->image_4}}"  class="img-responsive">
								</li>
								@endif
								
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<!-- item -->
								<div class="item active">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{$ads->image_1}}" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->

								<!-- item -->
								<div class="item">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{$ads->image_2}}" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->

								<!-- item -->
								<div class="item">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{$ads->image_3}}" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->

								<!-- item -->
								<div class="item">
									<div class="carousel-image">
										<!-- image-wrapper -->
										<img src="{{$ads->image_4}}" alt="Featured Image" class="img-responsive">
									</div>
								</div><!-- item -->

								<!-- item -->
						
							</div><!-- carousel-inner -->

							<!-- Controls -->
							<a class="left carousel-control" href="#product-carousel" role="button" data-slide="prev">
								<i class="fa fa-chevron-left"></i>
							</a>
							<a class="right carousel-control" href="#product-carousel" role="button" data-slide="next">
								<i class="fa fa-chevron-right"></i>
							</a><!-- Controls -->
						</div>
					</div><!-- Controls -->	

					<!-- slider-text -->
					<div class="col-md-5">
						<div class="slider-text">
							<h2>{{$ads->price}} $</h2>
							<h3 class="title">{{$ads->title}}</h3>
							<p><span>Offered by: <span style="color: #000">{{\App\User::find($ads->user_id)->name }}</span></span>
							</p>
							<span class="icon"><i class="fa fa-clock-o"></i>{{$ads->created_at->diffForHumans()}}</span>
							<span class="icon"><i class="fa fa-map-marker"></i><a href="#">{{$ads->city}}</a></span>
							
							
							<!-- short-info -->
							<div class="short-info">
								<h4>Short Info</h4>
								<p><strong>Condition: </strong>

								@if($ads->type == 1)
									New
								@else
								
									Used
								@endif		

								 </p>
								
							</div><!-- short-info -->
							
							<!-- contact-with -->
							<div class="contact-with">
								<h4>Contact with </h4>
								<span class="btn btn-red show-number">
									<i class="fa fa-phone-square"></i>
									<span class="hide-text">Click to show phone number </span> 
									<span class="hide-number">{{\App\User::find($ads->user_id)->phone }}</span>
								</span>
								<a href="#" class="btn"><i class="fa fa-envelope-square"></i>Reply by email</a>


							</div><!-- contact-with -->
							
							<!-- social-links -->
							<div class="social-links">
								<h4>Share this ad</h4>
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
					<div class="col-md-8">
						<div class="description">
							<h4>Description</h4>
							<p>{{$ads->desc}}</p>
						</div>
					</div><!-- description -->

					<!-- description-short-info -->
					<div class="col-md-4">					
						<div class="short-info">
							<h4>Short Info</h4>
							<!-- social-icon -->
							<ul>
								
								<li>

								@if($fav->count() > 0)

									<i class="fa fa-heart-o" style="color: #e2e21d;"></i>
									<form id="favorite-form-delete" action="{{route('favorite.destroy',['id' => $ads->id])}}" method="post" style="display: none;" >
										{{csrf_field()}}
										{{method_field('DELETE')}}
									</form>
									<a href="{{route('favorite.destroy',['id' => $ads->id])}}" onclick="event.preventDefault(); document.getElementById('favorite-form-delete').submit();"> Remove this ads from Favorite</a>

								@else
									
									<i class="fa fa-heart-o"></i>
									<form id="favorite-form" action="{{route('favorite.store')}}" method="post" style="display: none;" >
										{{csrf_field()}}
										<input type="hidden" name="ads_id" value="{{$ads->id}}">
									</form>
									<a href="{{route('favorite.store')}}" onclick="event.preventDefault(); document.getElementById('favorite-form').submit();"> Save ad as Favorite</a>

								@endif	
								</li>

								<li><i class="fa fa-exclamation-triangle"></i>
									<button type="button" data-toggle="modal" data-target="#reportModal" style="background: #fff;border: none;">Report this ad</button>
								</li>
							</ul><!-- social-icon -->
						</div>
					</div>
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
	</section><!-- download -->

	<!-- Modal -->
	<div id="reportModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>

	        <h4 class="modal-title">Send Report for this Ads</h4>
	      </div>

	      <form action="{{route('report.store')}}" method="post">
	      	{{csrf_field()}}
	      		<input type="hidden" name="ads_id" value="{{$ads->id}}">
		      <div class="modal-body">
		        	<div class="form-group">
					  <label for="comment">Comment:</label>
					  <textarea class="form-control" name="desc" rows="5" id="comment" required></textarea>
					</div>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary btn-sm">Send</button>
		      </div>
	      </form>
	    </div>

	  </div>
	</div>

@stop