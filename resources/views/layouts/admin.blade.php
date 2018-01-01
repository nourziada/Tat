<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin panel</title>
    <link href="{{asset('admin_files/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/css/icon.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/css/en.css')}}" rel="stylesheet" class="lang_css arabic">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container-fluid">
    <!--Start header-->
    <div class="row header_section">
        <div class="col-sm-3 col-xs-12 logo_area bring_right">
            <h1 class="inline-block"><img src="{{asset('admin_files/img/logo.png')}}" alt="">TAT Admin panel</h1>
            <span class="glyphicon glyphicon-align-justify bring_left open_close_menu" data-toggle="tooltip"
                  data-placement="right" title="Tooltip on left"></span>
        </div>
        <div class="col-sm-3 col-xs-12 head_buttons_area bring_right hidden-xs">
            
            <div class="inline-block full_screen bring_right hidden-xs">
                <span class="glyphicon glyphicon-fullscreen" data-toggle="tooltip" data-placement="left"
                      title="fullscreen"></span>
            </div>
        </div>
        <div class=" col-sm-4 col-xs-12 user_header_area bring_left left_text">
           

            <div class="user_info inline-block">
                
                <span class="h4 nomargin user_name">{{Auth::user()->name}}</span>
                <span class="glyphicon glyphicon-cog"></span>
            </div>
        </div>
    </div>
    <!--/End header-->

    <!--Start body container section-->
    <div class="row container_section">

        <!--Start left sidebar-->
        <div class="user_details close_user_details  bring_left">
            <div class="user_area">
                <img class="img-thumbnail img-rounded bring_right" src="{{asset('admin_files/img/images.jpg')}}">

                <h1 class="h3">{{Auth::user()->name}}</h1>

                <p><a href="{{route('show.admin.password')}}">Change password</a></p>

                <p>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </p>
            </div>
            
        </div>
        <!--/End left sidebar-->

        <!--Start Side bar main menu-->
        <div class="main_sidebar bring_right">
            <div class="main_sidebar_wrapper">
                <form class="form-inline search_box text-center">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="Search Word">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                        </button>
                    </div>
                </form>

                <ul>

                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-home"></span>
                        <a href="{{route('admin.home')}}">Home Page</a>
                    </li>

                    <li class="{{ Request::is('admin/category') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-th-large"></span>
                        <div id="myDropdown">
                            <a href=""  class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                            <ul class="drop_main_menu">
                                <li><a href="{{route('category.create')}}">Add New Category</a></li>
                                <li><a href="{{route('category.index')}}">Show All Categories</a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="{{ Request::is('admin/advertising') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-bookmark"></span>
                        <a href="{{route('show.admin.ads')}}">All Advertising</a>
                    </li>

                    <li class="{{ Request::is('admin/request') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-bullhorn"></span>
                        <a href="{{route('show.admin.request')}}">All Requests</a>
                    </li>

                    <li class="{{ Request::is('admin/report') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-info-sign"></span>
                        <a href="{{route('report.index')}}"><span class="badge badge-light" style="float: right !important;
    padding: 6px;
    margin: 0px;
    font-size: 15px;
    padding-left: 11px;
    padding-right: 11px;
    padding-top: 5px;
    padding-bottom: 7px;">{{$reportsAll->count()}}</span> All Reports </a>
                    </li>

                    <li class="{{ Request::is('admin/setting') ? 'active' : '' }}">
                        <span class="glyphicon glyphicon-cog"></span>
                        <a href="{{route('show.admin.setting')}}">WebSite Settings</a>
                    </li>

                   


                </ul>
            </div>
        </div>
        <!--/End side bar main menu-->

        <!--Start Main content container-->
            @yield('content')
        <!--/End body container section-->
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script type="text/javascript" src="{{asset('admin_files/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('admin_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_files/js/js.js')}}"></script>
</body>

</html>