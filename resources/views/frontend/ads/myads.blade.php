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
				<h2 class="title">All Ads</h2>
			</div><!-- banner -->

			
			@include('includes.profile')
			<!-- ad-profile -->			
			
			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section" style="display: block !important;">
							<h2>All Ads</h2>
							<!-- ad-item -->

						@forelse($allMyAds as $ads)	
							<div class="ad-item row" style="display: block !important;">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="{{route('ads.show',['id' => $ads->id])}}"><img src="{{$ads->image_1}}" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h3 class="item-price">${{$ads->price}}</h3>
										<h4 class="item-title">
										<a href="{{route('ads.show',['id' => $ads->id])}}">{{$ads->title}}</a>
										</h4>

										<div class="item-cat">
											<span><a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}">{{ \App\Category::find($ads->category_id)->name }}</a></span> 
											
										</div>
																				
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Posted On: {{$ads->created_at->diffForHumans()}} </span>
											<span class="visitors">Visitors: {{$ads->views}}</span> 
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="{{route('ads.edit',['id' => $ads->id])}}" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>


											
									
											<button class="delete-item" data-title="Delete" data-toggle="modal" data-target="#deleteModal{{$ads->id}}" style="border: none;color: red;background: #f6f6f6;font-size: 18px;"><i class="fa fa-times"></i>
											</button>

                                    <!-- Modal -->
                            <div id="deleteModal{{$ads->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Your Ads !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you Sure to Delete this Ads ForEver ?</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('ads.destroy',['id' => $ads->id])}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
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

							<center>No Ads Added Yet</center>
						@endforelse	
						</div>

						<div class="text-center">
                            
                                {{$allMyAds->links()}}
                            
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