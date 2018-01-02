@extends('layouts.frontend')

@section('content')


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


                <!-- recommended-ads -->
                <div class="col-sm-12 col-md-12">
                    <div class="section recommended-ads">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h4>All Categories</h4>
                                <hr/>
                                <div class="tab-content">

                                    <div id="a2" class="tab-pane active">
                                        <div class="row">

                                        @forelse($categories as $cat)
                                            <div class="sub_cat_box">
                                                <a href="{{route('show.categories.ads',['id' => $cat->id,'type' => 1])}}">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                                                        <div class="sub_img sb-img">
                                                            <img src="{{$cat->image}}"
                                                                 class="img-responsive">
                                                            <span>{{$cat->name}}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                         @empty

                                         	No Categories Addes Yet
                                         	
                                         @endforelse   
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- recommended-ads -->

        </div>
    </div>
    </div><!-- container -->
</section>
<!-- main -->

<section id="something-sell" class="clearfix parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2 class="title">Do you have something-sell?</h2>
                <h4>Post your ad for free on tattrade.com</h4>
                <a href="{{route('ads.create')}}" class="btn btn-primary">Post Your Ad</a>
            </div>
        </div><!-- row -->
    </div><!-- contaioner -->
</section>

@stop