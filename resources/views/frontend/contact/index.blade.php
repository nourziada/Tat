@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix contact-us">
		<div class="container">

			<!-- breadcrumb -->
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li>Contact us</li>
			</ol><!-- breadcrumb -->						
			<h2 class="title">Contact Us</h2>

			<!-- gmap -->
			

			<div class="corporate-info">
				<div class="row">
					<!-- contact-info -->
					<div class="col-sm-4">
						<div class="contact-info">

							<h2>{{$settings->desc}}</h2>
							<address>
								<p><strong>  </strong></p>
								<p><strong>Email: </strong><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></p>
							</address>

							<ul class="social">
								<li><a href="{{$settings->facebook}}"><i class="fa fa-facebook"></i></a></li>
								<li><a href="{{$settings->twitter}}"><i class="fa fa-twitter"></i></a></li>
								<li><a href="{{$settings->google}}"><i class="fa fa-google-plus"></i></a></li>

							</ul>
						</div>
					</div><!-- contact-info -->
					
					<!-- feedback -->
					<div class="col-sm-8">
						@include('includes.errors')
						<div class="feedback">
							<h2>Send us your feedback </h2>
							<form id="contact-form" class="contact-form" name="contact-form" method="post" action="{{route('send.contact')}}">
							{{csrf_field()}}
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control" required="required" placeholder="Name" name="name">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="email" class="form-control" required="required" placeholder="Email" name="email">
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="text" class="form-control" required="required" placeholder="Subject" name="subject">
										</div> 
									</div> 
									
									<div class="col-sm-12">
										<div class="form-group">
											<textarea  id="message" required="required" class="form-control" rows="7" placeholder="Message" name="msg"></textarea>
										</div>             
									</div>     
								</div>
								<div class="form-group">
									<button type="submit" class="btn">Send </button>
								</div>
							</form>
						</div>				
					</div><!-- feedback -->				
				</div><!-- row -->
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	<div class="modal fade" id="successModal" role="dialog">
      <div class="modal-dialog modal-md">
      
        <!-- Modal content-->
        <div class="modal-content" id="recover_content">
          <div class="modal-header hide">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">شكرا!</h4>
          </div>
            <div class="modal-body text-center">
            	<div class="congratulations">
					<i class="fa fa-check-square-o"></i>
					<h2>thanks!</h2>
					<h4>Your message was sent successfully. We will contact you soon!</h4>
				</div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-lg btn-default modal_close col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 bottom-10" data-dismiss="modal" data-annulla="Cancel" data-text="Close">حسنا</button>
            </div>
        </div>
      </div>
    </div>

    


@stop