@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{route('index.home')}}">Home</a></li>
                <li>All request</li>
            </ol><!-- breadcrumb -->
            <h2 class="title">All request</h2>
        </div>
        <div class="banner">

            <!-- banner-form -->
            @include('includes.search')
        </div>


        <div class="category-info">
            <div class="row">

                <!-- recommended-ads -->
                <div class="col-sm-12 col-md-12">
                    <div class="section recommended-ads">
                        <!-- featured-top -->

                        <div class="featured-top">
                            <h4></h4>
                            <div class="dropdown drop-down">

                                <!-- category-change -->
                                <div class="dropdown category-dropdown sort-b">
                                    <h5 class="short-b">Sort by:</h5>
                                    <a data-toggle="dropdown" href="#"><span class="change-text filters">All</span></a>


                                   
                                </div><!-- category-change -->
                            </div>
                        </div><!-- featured-top -->


                    @forelse($requests as $req)

                        <div class="ad-item row" style="display: block !important;">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <a href="{{route('request.show',['id' => $req->id])}}">
                                    <img src="

                                    @if($req->image != null)
                                    	{{$req->image}}
                                    @else	
                                    	{{asset('images/default.jpg')}}
                                    @endif

                                    " alt="Image" class="img-responsive" style="max-height: 130px;"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price"><a href="{{route('request.show',['id' => $req->id])}}">{{$req->title}}</a></h3>
                                    <h4 class="item-title">

                                    <a href="{{route('request.show',['id' => $req->id])}}">
                                    {{str_limit($req->desc,190)}} </a></h4>
                                    
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"> {{$req->created_at->diffForHumans()}}</span>
                                        
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$req->city}}"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{\App\User::find($req->user_id)->name}}"><i class="fa fa-user"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->


                            </div><!-- item-info -->
                        </div>

                    @empty

                        <center>No results found!</center>

                    @endforelse
                    

                        <div class="text-center">
                            {{$requests->links()}}
                        </div>
                    </div>
                </div><!-- recommended-ads -->

            </div>
        </div>
    </div><!-- container -->
</section><!-- main -->


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