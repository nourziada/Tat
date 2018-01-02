@extends('layouts.frontend')

@section('content')

<section id="main" class="clearfix home-default">
    <div class="container">

        @include('includes.search')
        <!-- main-content -->
        <div class="main-content">
            <!-- row -->
            <div class="row">
                <!-- product detail slider -->
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <!-- featureds -->
                    <div class="section featureds">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="section-title featured-top">
                                    <h4>Featured Ads</h4>
                                </div>
                            </div>
                        </div>

                        @if($featuredAds->count() > 0)
                            @foreach($featuredAds as $ads)
                            <div class="row pt-10 pb-10 post">
                                <div class="col-sm-10 col-xs-8">
                                    <a class="ads-tap-title" href="{{route('ads.show',['id' => $ads->id])}}"><h3>{{$ads->title}}</h3></a>

                                    <div class="row">
                                        <div class="col-xs-6">
                                            <span class="city" style="margin-top: 26px;color: #076daf"><i class="fa fa-map-marker"></i> {{$ads->city}}</span>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="post-time"><p>{{$ads->created_at->diffForHumans()}}</p></div>

                                            <a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}" class="d-block user-post"><i class="fa fa-th-large"></i> {{ \App\Category::find($ads->category_id)->name }} </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 col-xs-4">
                                    <a href="{{route('ads.show',['id' => $ads->id])}}"><img class="margin-auto img-responsive" src="{{$ads->image_1}}"></a>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        
                    </div>
                    <!-- featureds -->

                    <!-- trending-ads -->
                    <div class="section trending-ads">
                        <div class="section-title tab-manu">
                            <h4>Advertising</h4>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#recent-ads" data-toggle="tab">Recent
                                    ads</a></li>
                                <li role="presentation"><a href="#popular" data-toggle="tab">Common ads</a></li>
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- tab-pane -->
                            <div role="tabpanel" class="tab-pane fade in active" id="recent-ads">

                               	@if($newAds->count() > 0)

                               		@foreach($newAds as $ads)

                               		<div class="row pt-10 pb-10 post">
                                        <div class="col-sm-10 col-xs-8">
                                            <a class="ads-tap-title" href="{{route('ads.show',['id' => $ads->id])}}"><h3>{{$ads->title}}</h3></a>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="city" style="margin-top: 26px;color: #076daf"><i class="fa fa-map-marker"></i> {{$ads->city}}</span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="post-time"><p>{{$ads->created_at->diffForHumans()}}</p></div>
                                                    <a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}" class="d-block user-post"><i class="fa fa-th-large"></i> {{ \App\Category::find($ads->category_id)->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <a href="{{route('ads.show',['id' => $ads->id])}}"><img class="margin-auto img-responsive" src="{{$ads->image_1}}"></a>
                                        </div>
                                    </div>

                               		@endforeach

                               	@endif
                                
                            </div>
                            <!-- tab-pane -->
                            <!-- tab-pane -->
                            <div role="tabpanel" class="tab-pane fade" id="popular">

                                @if($commonAds->count()>0)
                                    @foreach($commonAds as $ads)
                                    <div class="row pt-10 pb-10 post">
                                        <div class="col-sm-10 col-xs-8">
                                            <a class="ads-tap-title" href="{{route('ads.show',['id' => $ads->id])}}"><h3>{{$ads->title}}</h3></a>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <span class="city" style="margin-top: 26px;color: #076daf"><i class="fa fa-map-marker"></i> {{$ads->city}}</span>
                                                </div>
                                                <div class="col-xs-6">
                                                    <div class="post-time"><p> {{$ads->created_at->diffForHumans()}}</p></div>

                                                    <a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}" class="d-block user-post"><i class="fa fa-th-large"></i>  {{ \App\Category::find($ads->category_id)->name }} </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 col-xs-4">
                                            <a href="{{route('ads.show',['id' => $ads->id])}}"><img class="margin-auto img-responsive" src="{{$ads->image_1}}"></a>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                                
                            </div>
                            <!-- tab-pane -->
                        </div>
                        <!-- trending-ads -->
                    </div>

                    <!-- table before adds section -->
                     <div class="recommended-info tble-sectn">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="section recommended-ads" id="want-ads">
                                    <h4 class="wa-block">Requests 
                                    <a href="{{route('request.index')}}" class="btn pull-right">All Requests</a></h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th width="60%">Title</th>
                                                <th width="20%">User Name</th>
                                                <th width="20%">Date of Add Request</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        @forelse($requests as $req)
                                            <tr>
                                                <td><b><a href="{{route('request.show',['id' => $req->id])}}">{{$req->title}}</a></b></td>
                                                <td>{{\App\User::find($req->user_id)->name }}</td>
                                                <td>{{$req->created_at->diffForHumans()}}</td>
                                            </tr>
                                        @empty
                                            <center>No Requestes Added Yet</center>
                                        @endforelse
                                            </tbody>
                                        </table>
                                        <!--<div class='text-center'>-->
                                        <!--<ul class='pagination'>-->
                                        <!--<li><a href='index.php?page=1'><i class='fa fa-chevron-left'></i></a>-->
                                        <!--</li>-->
                                        <!--<li class='active'><a href='index.php?page=1'>1</a></li>-->
                                        <!--<li><a href='index.php?page=1'><i class='fa fa-chevron-right'></i></a>-->
                                        <!--</li>-->
                                        <!--</ul>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div><!-- recommended-ads -->
                        </div><!-- row -->
                    </div>
                    <!--/. table before adds section -->

                </div>

                <!-- product-list  -->
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <!-- categorys -->
                    <div class="section category-ads text-center">
                        <ul class="category-list">

                        @if($categories->count() > 0)

                        	@foreach($categories as $cat)
                            <li class="category-item">
                                <a href="{{route('show.categories.ads',['id' => $cat->id,'type' => 1])}}">
                                    <div class="category-icon"><img src="{{$cat->image}}" alt="images"
                                                                    width="150" class="img-responsive"></div>
                                    <span class="category-title">{{$cat->name}}</span>
                                    <!-- <span class="category-quantity">(1298)</span> -->
                                </a>
                            </li>
                            @endforeach

                        @endif    

                        
                            <!-- category-item -->
                        </ul>
                    </div>
                    <!-- category-ad -->
                </div>
                <!-- product-list -->

                <!-- advertisement -->
            </div>
            <!-- row -->
        </div>
        <!-- main-content -->
    </div>
    <!-- container -->
</section>

@stop