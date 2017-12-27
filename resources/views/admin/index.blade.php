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
                            <a href="#" style="background-color: #c0392b">
                                <h4>Website Home</h4>
                            </a>
                            <a href="options.html" style="background-color: #2980b9">
                                <h4>Site Information</h4>
                            </a>
                            <a href="view_all_users.html" style="background-color: #8e44ad">
                                <h4>View Users</h4>
                            </a>
                            <a href="add_new_topic.html" style="background-color: #d35400">
                                <h4>Add Topic</h4>
                            </a>
                            <a href="add_new_photo.html" style="background-color: #2c3e50">
                                <h4>Add photo</h4>
                            </a>
                        </div>
                        <div class="home_statics text-center">
                            <h1 class="heading_title">Website Statics</h1>

                            <div style="background-color: #9b59b6">
                                <span class="bring_right glyphicon glyphicon-home"></span>

                                <h3>Site Visits</h3>

                                <p class="h4">55</p>
                            </div>

                            <div style="background-color: #34495e">
                                <span class="bring_right glyphicon glyphicon-phone-alt"></span>

                                <h3>Users Online</h3>

                                <p class="h4">55</p>
                            </div>
                            <div style="background-color: #00adbc">
                                <span class="bring_right glyphicon glyphicon-user"></span>

                                <h3>All Users</h3>

                                <p class="h4">55</p>
                            </div>
                            <div style="background-color: #f39c12">
                                <span class="bring_right glyphicon glyphicon-pencil"></span>

                                <h3>All Topics</h3>

                                <p class="h4">55</p>
                            </div>
                            <div style="background-color: #2ecc71">
                                <span class="bring_right glyphicon glyphicon-calendar"></span>

                                <h3>Site Old</h3>

                                <p class="h4">55</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/End Main content container-->


        </div>

@stop