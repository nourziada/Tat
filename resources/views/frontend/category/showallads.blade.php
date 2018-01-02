@extends('layouts.frontend')

@section('content')


<style type="text/css">
        .custom-button {
            padding: 2px 10px 5px !important;
            font-size: 12px !important;
            float: right;
            margin-top: 12px;
            display: none;
        }

        #ui-id-1 {
            /*max-height:200px !important;
            overflow-y:scroll !important;
            overflow-x:hidden !important;
            top: 258px !important;
            max-width: 478px !important;
            width: 100% !important;*/
            max-height: 200px !important;
            overflow-y: scroll !important;
            overflow-x: hidden !important;
        }

        .featured .ad-meta .user-option a:hover {
            background-color: #ffff9c !important;
        }
    </style>


<section id="main" class="clearfix category-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="{{route('index.home')}}">Home</a></li>
                <li>Categories</li>
            </ol><!-- breadcrumb -->
            <h2 class="title"></h2>
        </div>
        <div class="banner">

            <!-- banner-form -->
            @include('includes.search')
        </div>


        <div class="category-info">
            <div class="row">
                <!-- accordion-->
                <div class="col-md-3 col-sm-4">
                    <div class="accordion">
                        <!-- panel-group -->
                        <div class="panel-group" id="accordion">

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                        <h4 class="panel-title">categories&nbsp;<span class="pull-right"><i
                                                        class="fa fa-minus"></i></span></h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-one" class="panel-collapse collapse in">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <!-- <h5><i class="fa fa-caret-down"></i> All Categories</h5> -->
                                        
                                        <ul>
                                            
                                        @forelse($categories as $cat)    
                                            <li class="
                                            	@if($cat->id == $id)
                                            		active-category
                                            	@endif	
                                            	">
                                            	<a href="{{route('show.categories.ads',['id' => $cat->id,'type' => 1])}}">
                                                <i class="fa fa-mobile" aria-hidden="true"></i> {{$cat->name}}
                                                </a>

                                                &nbsp;<span>({{\App\Ads::where('category_id',$cat->id)->get()->count()}})</span>
                                            </li>
                                        @empty

                                        	No Category Added Yet

                                        @endforelse


                                       	</ul>
                                        
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            

                            <!-- panel -->
                            <div class="panel-default panel-faq">
                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                        <h4 class="panel-title">Price &nbsp;
                                            <span class="pull-right"><i class="fa fa-minus"></i></span>
                                        </h4>
                                    </a>
                                </div><!-- panel-heading -->

                                <div id="accordion-three" class="panel-collapse collapse in">
                                    <!-- panel-body -->
                                    <div class="panel-body">
                                        <div class="price-range"><!--price-range-->
                                            <div class="price">
                                              

                                                <span>${{$maxPrice}} - <strong>${{$minPrice}} </strong></span>

                                                <input type="text" value="" data-slider-min="{{$minPrice}}" data-slider-max="{{$maxPrice}}"
                                                       data-slider-step="5" data-slider-value="[{{$minPrice}},{{$maxPrice}}]"
                                                       id="price"><br/>       

                                                <form name="change_price" id="change_price" method="post"
                                                      action="{{route('show.categories.ads.price')}}">
                                                      {{csrf_field()}}
                                                    <input type="hidden" name="category_id" value="{{$id}}">
                                                    <input type="hidden" name="minPrice" value="" id="price_min">
                                                    <input type="hidden" name="maxPrice" value="" id="price_max">
                                                    <button type="submit" class="btn btn-primary btn-xs custom-button">
Go!
                                                    </button>

                                                </form>
                                            </div>
                                        </div><!--/price-range-->
                                    </div><!-- panel-body -->
                                </div>
                            </div>
                            <!-- panel -->

                            
                        </div><!-- panel-group -->
                    </div>
                </div><!-- accordion-->

                <!-- recommended-ads -->
                <div class="col-sm-8 col-md-9">
                    <div class="section recommended-ads">
                        <!-- featured-top -->

                        <div class="featured-top">
                            <h4></h4>
                            <div class="dropdown drop-down">

                                <!-- category-change -->
                                <div class="dropdown category-dropdown sort-b">
                                    <h5 class="short-b">Sort by:</h5>


                                    <a data-toggle="dropdown" href="#">
                                        <span class="change-text filters">All</span>
                                    </a>


                                    <i class="fa fa-caret-square-o-down"></i>

                                    
                                    <ul class="dropdown-menu drop-m category-change">
                                        <li><a href="{{route('show.categories.ads',['id' => $id,'type' => 2])}}">Featured</a></li>
                                        <li><a href="{{route('show.categories.ads',['id' => $id,'type' => 3])}}">Newest</a></li>
                                        <li><a href="{{route('show.categories.ads',['id' => $id,'type' => 1])}}">All</a></li>
                                    </ul>

                                    
                                </div><!-- category-change -->
                            </div>
                        </div><!-- featured-top -->

                    @forelse($allAds as $ads)  
                        <div class="ads_item2 row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <a href="{{route('ads.show',['id' => $ads->id])}}"><img src="{{$ads->image_1}}" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">${{$ads->price}}</h3>
                                    <h4 class="item-title"><a href="{{route('ads.show',['id' => $ads->id])}}">{{$ads->title}}</a></h4>
                                    <div class="item-cat">
                                        <span><a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}">{{\App\Category::find($ads->category_id)->name}}</a></span> 
                                        
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated">{{$ads->created_at->diffforHumans()}}</span>


                                        <a href="{{route('show.categories.ads',['id' => $ads->category_id,'type' => 1])}}" class="tag"><i class="fa fa-tags"></i> {{\App\Category::find($ads->category_id)->name}}</a>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$ads->city}}"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{\App\User::find($ads->user_id)->name}}"><i class="fa fa-user"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->


                            </div><!-- item-info -->
                        </div>

                   
                    @empty
                        <center>No results found!</center>

                    @endforelse

                        <div class="text-center">
                            
                                {{$allAds->links()}}
                            
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