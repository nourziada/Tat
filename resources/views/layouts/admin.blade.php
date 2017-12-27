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

                <p><a href="">Change password</a></p>

                <p><a href="{{route('logout')}}">LogOut</a></p>
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
                    <li><span class="glyphicon glyphicon-home"></span><a href="index.html">Home Page</a></li>
                    <li><span class="glyphicon glyphicon-cog"></span><a href="options.html">Site Information</a></li>
                    <li><span class="glyphicon glyphicon-user"></span><a href="">Mange Users</a>
                        <ul class="drop_main_menu">
                            <li><a href="add_new_user.html">Add new user</a></li>
                            <li><a href="view_all_users.html">View all users</a></li>
                        </ul>
                    </li>
                    <li><span class="glyphicon glyphicon-edit"></span><a href="">Mange Topics</a>
                        <ul class="drop_main_menu">
                            <li><a href="add_new_topic.html">Add new topic</a></li>
                            <li><a href="view_all_topics.html">View all topics</a></li>
                        </ul>
                    </li>
                    <li><span class="glyphicon glyphicon-picture"></span><a href="">Photo Album</a>
                        <ul class="drop_main_menu">
                            <li><a href="add_new_photo.html">Add new photo</a></li>
                            <li><a href="view_all_photos.html">View all photos</a></li>
                        </ul>
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