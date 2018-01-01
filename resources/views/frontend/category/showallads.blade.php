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
            <div class="banner-form banner-form-full">
                <form action="#" name="search_form" id="search_form" method="get">
                    <input type="hidden" name="category" value="83">
                    <input type="text" class="form-control ui-widget" id="skills" name="query" value=""
                           placeholder="Find a specific product" autocomplete="off">
                    <button type="submit" class="form-control srch" value="Search">Search</button>
                </form>
            </div><!-- banner-form -->
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
                                            	<a href="{{route('show.categories.ads',['id' => $cat->id])}}">
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
                                              

                                                <span>$60000 - <strong>$100 </strong></span>

                                                <input type="text" value="" data-slider-min="0" data-slider-max="60000"
                                                       data-slider-step="5" data-slider-value="[100,60000]"
                                                       id="price"><br/>       

                                                <form name="change_price" id="change_price" method="get"
                                                      action="/categories.php">
                                                    <input type="hidden" name="category" value="83">
                                                    <input type="hidden" name="minprice" value="" id="price_min">
                                                    <input type="hidden" name="maxprice" value="" id="price_max">
                                                    <button type="submit" class="btn btn-primary btn-xs custom-button">
Go!
                                                    </button>

                                                </form>
                                            </div>
                                        </div><!--/price-range-->
                                    </div><!-- panel-body -->
                                </div>
                            </div><!-- panel -->

                            <!-- panel -->
                            <!-- <div class="panel-default panel-faq"
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                        <h4 class="panel-title">
                                        Posted By
                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>

                                <div id="accordion-four" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <label for="individual"><input type="checkbox" name="individual" id="individual"> Individual</label>
                                        <label for="dealer"><input type="checkbox" name="dealer" id="dealer"> Dealer</label>
                                        <label for="reseller"><input type="checkbox" name="reseller" id="reseller"> Reseller</label>
                                        <label for="manufacturer"><input type="checkbox" name="manufacturer" id="manufacturer"> Manufacturer</label>
                                    </div>
                                </div>
                            </div> -->

                            <!-- panel -->
                            <!-- <div class="panel-default panel-faq">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#accordion-five">
                                        <h4 class="panel-title">
                                        Brand
                                        <span class="pull-right"><i class="fa fa-plus"></i></span>
                                        </h4>
                                    </a>
                                </div>

                                <div id="accordion-five" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <input type="text" placeholder="Search Brand" class="form-control">
                                        <label for="apple"><input type="checkbox" name="apple" id="apple"> Apple</label>
                                        <label for="htc"><input type="checkbox" name="htc" id="htc"> HTC</label>
                                        <label for="micromax"><input type="checkbox" name="micromax" id="micromax"> Micromax</label>
                                        <label for="nokia"><input type="checkbox" name="nokia" id="nokia"> Nokia</label>
                                        <label for="others"><input type="checkbox" name="others" id="others"> Others</label>
                                        <label for="samsung"><input type="checkbox" name="samsung" id="samsung"> Samsung</label>
                                            <span class="border"></span>
                                        <label for="acer"><input type="checkbox" name="acer" id="acer"> Acer</label>
                                        <label for="bird"><input type="checkbox" name="bird" id="bird"> Bird</label>
                                        <label for="blackberry"><input type="checkbox" name="blackberry" id="blackberry"> Blackberry</label>
                                        <label for="celkon"><input type="checkbox" name="celkon" id="celkon"> Celkon</label>
                                        <label for="ericsson"><input type="checkbox" name="ericsson" id="ericsson"> Ericsson</label>
                                        <label for="fly"><input type="checkbox" name="fly" id="fly"> Fly</label>
                                        <label for="g-fone"><input type="checkbox" name="g-fone" id="g-fone"> g-Fone</label>
                                        <label for="gionee"><input type="checkbox" name="gionee" id="gionee"> Gionee</label>
                                        <label for="haier"><input type="checkbox" name="haier" id="haier"> Haier</label>
                                        <label for="hp"><input type="checkbox" name="hp" id="hp"> HP</label>
                                    </div>
                                </div>
                            </div> -->
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
                                    <a data-toggle="dropdown" href="#"><span class="change-text filters">All</span></a>
                                    <i class="fa fa-caret-square-o-down"></i>
                                    <form name="shorting" id="shorting" method="get" action="/categories.php">
                                        <ul class="dropdown-menu drop-m category-change">
                                            <li><a href="
										http://tashlee7sa.com/categories.php?category=83&subcategory=164&featured=1											"
                                                   onchange="this.form.submit()">Featured</a></li>
                                            <li><a href="
										http://tashlee7sa.com/categories.php?category=83&subcategory=164&newest=1											"
                                                   onchange="this.form.submit()">Newest</a></li>
                                            <li><a href="
										http://tashlee7sa.com/categories.php?category=83&subcategory=164&all=1											"
                                                   onchange="this.form.submit()">All</a></li>
                                        </ul>

                                    </form>
                                </div><!-- category-change -->
                            </div>
                        </div><!-- featured-top -->
                        <div class="ad-item row">
                            <!-- item-image -->
                            <div class="item-image-box col-sm-3">
                                <div class="item-image">
                                    <a href="details.html"><img src="images/listing/1.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div>

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$800.00</h3>
                                    <h4 class="item-title"><a href="#">Apple TV - Everything you need to know!</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics &amp; Gedgets</a></span> /
                                        <span><a href="#">Tv &amp; Video</a></span>
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> New</a>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Individual"><i class="fa fa-user"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->


                            </div><!-- item-info -->
                        </div>
                        <!-- ad-item -->
                        <div class="ad-item row">
                            <div class="item-image-box col-sm-3">
                                <!-- item-image -->
                                <div class="item-image">
                                    <a href="details.html"><img src="images/listing/7.jpg" alt="Image" class="img-responsive"></a>
                                </div><!-- item-image -->
                            </div><!-- item-image-box -->

                            <!-- rending-text -->
                            <div class="item-info col-sm-9">
                                <!-- ad-info -->
                                <div class="ad-info">
                                    <h3 class="item-price">$890.00 <span>(Negotiable)</span></h3>
                                    <h4 class="item-title"><a href="#">Philips Streo Headphone</a></h4>
                                    <div class="item-cat">
                                        <span><a href="#">Electronics &amp; Gedgets</a></span> /
                                        <span><a href="#">Mobile Phone</a></span>
                                    </div>
                                </div><!-- ad-info -->

                                <!-- ad-meta -->
                                <div class="ad-meta">
                                    <div class="meta-content">
                                        <span class="dated"><a href="#">7 Jan, 16  10:10 pm </a></span>
                                        <a href="#" class="tag"><i class="fa fa-tags"></i> Used</a>
                                    </div>
                                    <!-- item-info-right -->
                                    <div class="user-option pull-right">
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Los Angeles, USA"><i class="fa fa-map-marker"></i> </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Individual"><i class="fa fa-user"></i> </a>
                                    </div><!-- item-info-right -->
                                </div><!-- ad-meta -->
                            </div><!-- item-info -->
                        </div>
                        <center>No results found!</center>
                        <div class="text-center">
                            <ul class="pagination ">
                                <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
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
                <a href="ad-post.html" class="btn btn-primary">Post Your Ad</a>
            </div>
        </div><!-- row -->
    </div><!-- contaioner -->
</section>

@stop