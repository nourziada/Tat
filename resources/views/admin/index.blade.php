@extends('layouts.admin')

@section('content')


 <div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="">Admin panel home page</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">
                    <div class="page_content">
                        <div class="quick_links text-center">
                            <h1 class="heading_title">Quick links</h1>
                            <a href="{{route('admin.home')}}" style="background-color: #c0392b">
                                <h4>Website Home</h4>
                            </a>
                            <a href="{{route('category.create')}}" style="background-color: #2980b9">
                                <h4>Add new Category</h4>
                            </a>
                            <a href="{{route('show.admin.ads')}}" style="background-color: #8e44ad">
                                <h4>View All Advertising</h4>
                            </a>
                            <a href="{{route('show.admin.request')}}" style="background-color: #d35400">
                                <h4>Add All Requests</h4>
                            </a>
                            <a href="{{route('report.index')}}" style="background-color: #2c3e50">
                                <h4>View All Reports </h4>
                            </a>
                        </div>
                        <div class="home_statics text-center">
                            <h1 class="heading_title">Website Statics</h1>

                            <div style="background-color: #9b59b6">
                                <span class="bring_right glyphicon glyphicon-bookmark"></span>

                                <h3>Ads Added</h3>

                                <p class="h4">{{$ads->count()}}</p>
                            </div>

                            <div style="background-color: #34495e">
                                <span class="bring_right glyphicon glyphicon-phone-alt"></span>

                                <h3>All Requests</h3>

                                <p class="h4">{{$requests->count()}}</p>
                            </div>
                            <div style="background-color: #00adbc">
                                <span class="bring_right glyphicon glyphicon-user"></span>

                                <h3>All Users</h3>

                                <p class="h4">{{$users->count()}}</p>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <!--/End Main content container-->


        </div>

@stop