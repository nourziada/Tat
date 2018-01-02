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
			
			<!-- breadcrumb -->
			<!-- <div class="breadcrumb-section">
				<ol class="breadcrumb">
					<li><a href="http://tashlee7sa.com/">الصفحة الرئيسية</a></li>
					<li>مشاركة الإعلان</li>
				</ol>						
				<h2 class="title"></h2>
			</div> -->
			<!-- breadcrumb -->
			<!-- banner -->


			<form name="ad-post" id="ad-post" method="post" action="{{route('request.update',['id' => $req->id])}}" enctype="multipart/form-data" style="display: block !important;">

			{{csrf_field()}}
			{{method_field('PATCH')}}


			<div class="adpost-details">
				<div class="row">	
					<div class="col-md-12">
						@include('includes.errors')
							<fieldset>
								<div class="section postdetails">
									<h4> Requests Service <span class="">* required fields</span></h4>
									
									<div class="row form-group add-title">
										<label class="col-sm-3 label-title">Request Title<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="title" class="form-control" value="{{$req->title}}" id="text" required="required">
										</div>
									</div>
                                    <div class="row form-group add-image">
                                        <label class="col-sm-3 label-title">Description image </label>

                                        <div class="col-sm-9">
                                            <div class="upload-section">
                                                <label class="upload-image" for="upload-image-one">
                                                    <img src="
                                                    	@if($req->image != null)
                                                    		{{$req->image}}
                                                    	@endif
                                                    " class="lisitingpreview" alt="">
                                                    <input type="file" id="upload-image-one" name="image" class="images-group identity_img">
                                                     
                                                </label>


                                            </div>
                                            <span style="color: red">If you dont Need to change Dont touch it</span>
                                        </div>
                                    </div>

                                    <div class="row form-group add-title">
                                        <label class="col-sm-3 label-title">Request Description<span class="required">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea type="text" name="desc" class="form-control" id="desc" required="required">{{$req->desc}}</textarea>
                                        </div>
                                    </div>

                                    <div class="row form-group add-title">
										<label class="col-sm-3 label-title">City<span class="required">*</span></label>
										<div class="col-sm-9">
											<input type="text" name="city" class="form-control" value="{{$req->city}}" id="text" required="required">
										</div>
									</div>

									<div class="row form-group" style="margin-left: 0;">	
										<button type="submit" name="ad_post_submit" class="btn btn-primary pull-left" >Update your request</button>
									</div>		
								</div><!-- section -->	

							</fieldset>
						
					</div>

				</div>
			</div>	

			</form>
		</div><!-- container -->
	</section>

@stop