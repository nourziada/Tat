@extends('layouts.frontend')

@section('content')


<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					<li>Ad Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Favourite Ads</h2>
			</div><!-- banner -->

			@include('includes.profile')		
			
			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section" style="display: block !important;">
							<h2>Favourite ads</h2>
							<!-- ad-item -->

						@forelse($allAds as $ads)	
							<div class="ad-item row" style="display: block !important;">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="{{route('ads.show',['id' => $ads->ads_id])}}"><img src="{{ \App\Ads::find($ads->ads_id)->image_1 }}" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>								
								
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">${{ \App\Ads::find($ads->ads_id)->price }}</h3>
										<h4 class="item-title"><a href="{{route('ads.show',['id' => $ads->ads_id])}}">{{ \App\Ads::find($ads->ads_id)->title }}</a></h4>
										<div class="item-cat">
											<span><a href="{{route('show.categories.ads',['id' => \App\Ads::find($ads->ads_id)->category_id,'type' => 1])}}">{{ \App\Category::find(\App\Ads::find($ads->ads_id)->category_id)->name }}</a></span> 
										</div>										
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">{{ $ads->created_at->diffForHumans() }} </span>
											<a href="{{route('show.categories.ads',['id' => \App\Ads::find($ads->ads_id)->category_id,'type' => 1])}}" class="tag"><i class="fa fa-tags"></i> {{ \App\Category::find(\App\Ads::find($ads->ads_id)->category_id)->name }}</a>
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a href="#" data-toggle="tooltip" data-placement="top" title="{{ \App\Ads::find($ads->ads_id)->city }}"><i class="fa fa-map-marker"></i> 
											</a>

											

											<button class="delete-item" data-title="Delete" data-toggle="modal" data-target="#deleteModal{{ \App\Ads::find($ads->ads_id)->id }}" style="border: none;color: red;background: #f6f6f6;font-size: 18px;"><i class="fa fa-times"></i>
											</button>

											<!-- Modal -->
                            <div id="deleteModal{{ \App\Ads::find($ads->ads_id)->id }}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Remove Your Ads From Favorite  !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you Sure to Remove this Ads From Favorite ?</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('favorite.destroy',['id' => \App\Ads::find($ads->ads_id)->id ])}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Remove</button>
                                    </form>
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>
										</div><!-- item-info-right -->
									</div><!-- ad-meta -->
								</div><!-- item-info -->
							</div><!-- ad-item -->

						@empty

							<center>No Favorite Ads Added Yet</center>
						@endforelse	
						</div>
					</div><!-- my-ads -->

					<!-- recommended-cta-->
						@include('includes.settingshints')	
					<!-- recommended-cta-->				
					
				</div><!-- row -->
			</div><!-- row -->
		</div><!-- container -->
	</section>


@stop