@extends('layouts.frontend')

@section('content')


<section id="main" class="clearfix myads-page">
		<div class="container">

			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="{{route('index.home')}}">Home</a></li>
					<li>Request Post</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">All My Requests</h2>
			</div><!-- banner -->

			
			@include('includes.profile')
			<!-- ad-profile -->			
			
			<div class="ads-info">
				<div class="row">
					<div class="col-sm-8">
						<div class="my-ads section" style="display: block !important;">
							<h2>All My Requests</h2>
							<!-- ad-item -->

						@forelse($requests as $req)	
							<div class="ad-item row" style="display: block !important;">
								<!-- item-image -->
								<div class="item-image-box col-sm-4">
									<div class="item-image">
										<a href="{{route('request.show',['id' => $req->id])}}"><img src="
											@if($req->image != null)
		                                    	{{$req->image}}
		                                    @else	
		                                    	{{asset('images/default.jpg')}}
		                                    @endif
										" alt="Image" class="img-responsive"></a>
									</div><!-- item-image -->
								</div>
								
								<!-- rending-text -->
								<div class="item-info col-sm-8">
									<!-- ad-info -->
									<div class="ad-info">
										<h4 class="item-title">
										<a href="{{route('request.show',['id' => $req->id])}}">{{$req->title}}</a>
										</h4>

										<span>{{str_limit($req->desc,100)}}</span>

										
																				
									</div><!-- ad-info -->
									
									<!-- ad-meta -->
									<div class="ad-meta">
										<div class="meta-content">
											<span class="dated">Posted On: {{$req->created_at->diffForHumans()}} </span>
											
										</div>										
										<!-- item-info-right -->
										<div class="user-option pull-right">
											<a class="edit-item" href="{{route('request.edit',['id' => $req->id])}}" data-toggle="tooltip" data-placement="top" title="Edit this ad"><i class="fa fa-pencil"></i></a>


											
									
											<button class="delete-item" data-title="Delete" data-toggle="modal" data-target="#deleteModal{{$req->id}}" style="border: none;color: red;background: #f6f6f6;font-size: 18px;"><i class="fa fa-times"></i>
											</button>

                                    <!-- Modal -->
                            <div id="deleteModal{{$req->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Your Request !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you Sure to Delete this Request ForEver ?</p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('request.destroy',['id' => $req->id])}}" method="post">
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

							<center>No Requests Added Yet</center>
						@endforelse	
						</div>

						<div class="text-center">
                            
                                {{$requests->links()}}
                            
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