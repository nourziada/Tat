<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Theme Region">
    <meta name="description" content="">
    <title>TAT | Index‎</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('css/slidr.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link id="preset" rel="stylesheet" href="{{asset('css/presets/preset1.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/style@tashleeh.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/space.css')}}" rel="stylesheet">
    <link href="{{asset('css/costume.css')}}" rel="stylesheet">
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet'
          type='text/css'>

    <!-- icons -->
    <link rel="icon" href="{{asset('images/ico/favicon.ico')}}">
    <!-- icons -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        #ui-id-1 {
            max-height: 200px !important;
            overflow-y: scroll !important;
            overflow-x: hidden !important;
        }

        .ad-item {
            min-height: 120px !important;
            max-height: 120px !important;
        }

        .item-image-box {
            max-height: 120px !important;
        }

        .item-info {
            min-height: 120px !important;
        }

        .ad-info {
            padding: 10px 25px !important;
        }

        #want-ads a.btn {
            padding: 5px 25px 7px;
            background-color: #0072bc;
            font-weight: 400;
            font-size: 14px;
            color: #fff;
            margin-left: 20px;
        }

        .wa-block {
            display: block !important;
        }

        .table-responsive {
            overflow-x: inherit !important;
        }
    </style>
</head>
<body>
<!-- header -->

<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('index.home')}}">TAT</a>
            </div>
            <!-- /navbar-header -->
            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">

                        <li><a href="all-categories.php">categories</a></li>
                        <li><a href="signin.php">advertisement</a></li>

                        <li><a href="contact-us.php">Contact us</a></li>
                    </ul>
                </div>
            </div>
            <!-- nav-right -->
            <div class="nav-right">
                <ul class="sign-in">
                    <li><i class="fa fa-user"></i></li>
                    <li><a href="{{route('login')}}"> Log in </a></li>
                    <li><a href="">Sign up</a></li>
                </ul>
                <!-- sign-in -->
                <a href="signin.php?ad_post=1" class="btn">Post your ad</a>
            </div>
            <!-- nav-right -->
        </div>
        <!-- container -->
    </nav>
    <!-- navbar -->
</header>
<!-- End header -->


<!-- main -->
    
    @yield('content')

<!-- main -->


<!-- footer -->
<footer id="footer" class="clearfix">
    <!-- footer-top -->
    <section class="footer-top clearfix">
        <div class="container">
            <div class="row">
                <!-- footer-widget -->
                <div class="col-sm-4">
                    <div class="footer-widget">
                        <h3>About Us</h3>
                        <p>{{$settings->desc}}</p>
                        
                    </div>
                </div>
                <!-- footer-widget -->
                <!-- footer-widget -->
                <div class="col-sm-4">
                    <div class="footer-widget social-widget">
                        <h3>Follow us</h3>
                        <ul>
                            <li><a href="{{$settings->facebook}}"><i class="fa fa-facebook-square"></i>Face book</a>
                            </li>
                            <li><a href="{{$settings->twitter}}"><i class="fa fa-twitter-square"></i>Twitter</a></li>
                            <li><a href="{{$settings->email}}"><i class="fa fa-envelope-square"></i>Mail</a>
                            </li>
                            <!-- <li><a href="http://www.youtube.com/"><i class="fa fa-youtube-play"></i>youtube</a></li> -->
                        </ul>
                    </div>
                </div>
                <!-- footer-widget -->
                <!-- footer-widget -->
                <div class="col-sm-4">
                    <div class="footer-widget news-letter">
                        <h3>Latest news</h3>
                        <form name="newsletter_form" id="newsletter_form" method="post" action="process.php">
                            <input type="email" class="form-control" required="required"
                                   placeholder="E-mail" name="newsletter_email"
                                   id="newsletter_email">
                            <input type="hidden" name="action" value="signup_newsletter">
                            <div class="error" id="invalid_email">E-mail address is not valid</div>
                            <div class="success" id="reg_completed">Success</div>
                            <button type="button" id="send_newsletter" class="btn btn-primary">Subscribe now</button>
                        </form>
                        <!-- form -->
                    </div>
                </div>
                <!-- footer-widget -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!-- footer-top -->
    <div class="footer-bottom clearfix text-center">
        <div class="container">
            <p>حقوق النشر &copy; 2017. طورت بواسطة <a href="http://www.bakkar.com.sa/">bakkar.com.sa</a></p>
        </div>
    </div>
    <!-- footer-bottom -->

    <div class="modal fade" id="newsletterModal" role="dialog">
        <div class="modal-dialog modal-md">

            <!-- Modal content-->
            <div class="modal-content" id="recover_content">
                <div class="modal-header hide">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">حذف العنصر</h4>
                </div>
                <div class="modal-body text-center">
                    <div class="top-30 bottom-40">عزيزي العميل<br><br>يبدو أنك اشتركت بالفعل في نشرتنا الإخبارية.
                        <br><br>تتمتع موقعنا على الانترنت.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-lg btn-default modal_close col-xs-12 col-xs-offset-0 col-sm-8 col-sm-offset-2 bottom-10"
                            data-dismiss="modal" data-annulla="Cancel" data-text="Close">حسنا
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript">
        $("#send_newsletter").click(function () {
            $("#invalid_email").hide();
            $("#reg_completed").hide();

            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var news_email = $("#newsletter_email").val();
            if (regex.test(news_email) == false) {
                $("#invalid_email").show();
                return;
            }
            newsletter();
        });

        function newsletter() {
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: $("#newsletter_form").serialize(),
                success: function (response) {
                    if (response == 1) {
                        $("#reg_completed").show();
                    } else {
                        $("#invalid_email").hide();
                        $("#reg_completed").hide();
                        $('#newsletterModal').modal('toggle');
                    }
                }
            });
        }
    </script>
</footer>      <!-- footer -->

<!-- JS -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/modernizr.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/scrollup.min.js')}}"></script>
<script src="{{asset('js/price-range.js')}}"></script>
<script src="{{asset('js/jquery.countdown.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/switcher.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    $(function () {
        $("#skills").autocomplete({

            source: 'search.php',
            minLength: 2,
            limit: 10,
            change: function (event, ui) {
                if (ui.item) {
                    $.post("ajax.php", {"action": "getmaincatname", "queryname": ui.item.value}, function (data) {
                        if (data) {
                            res = JSON.parse(data);
                            $("#search_form").find('input[name="category"]').val(res["category_id"]);
                            $("#search_form").find('.change-text').html(res["category_name"]);
                        }
                    });
                }
            }
        });
    });

    function selectmain(id) {
        var data = $("#" + id).attr("data-slug");
        $("input[name='category']").val(data);
    }

    $(document).ready(function () {
        // var owl = $('.owl-carousel');
        // owl.owlCarousel({
        //     items:4,
        //     loop:true,
        //     margin:10,
        //     autoplay:true,
        //     autoplayTimeout:1000,
        //     rtl: false,
        //     autoplayHoverPause:true
        // });

        $('.owl-carousel').owlCarousel({
            rtl: false,
            nav: true,
            items: 3,
            responsiveRefreshRate: true
        });
    });


</script>
</body>

</html>