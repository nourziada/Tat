@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.home')}}">Admin panel home page</a></li>
                        <li class="bring_right"><a href="{{route('show.admin.setting')}}">Update WebSite Settings</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">Update WebSite Settings</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('update.admin.setting')}}" method="post">
                            {{csrf_field()}}


                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">WebSite Footer Description</label>
                                <div class="col-sm-10">
                                    
                                    <textarea class="form-control" rows="8" id="input1" placeholder="Enter the WebSite Description less than 150 character" name="desc" required>{{$settings->desc}}</textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">Support Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="input0" name="email" value="{{$settings->email}}" placeholder="Enter the Support Customer Email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">FaceBook Account</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="facebook" value="{{$settings->facebook}}" placeholder="Enter the FaceBook Account" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Twitter Account</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="twitter" value="{{$settings->twitter}}" placeholder="Enter the Twitter Account" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">Google Plus Account</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="google" value="{{$settings->google}}" placeholder="Enter the Google Plus Account" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">WebSite Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="website" value="{{$settings->website}}" placeholder="Enter the WebSite Link" required>
                                </div>
                            </div>

                            


                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">Update WebSite Settings</button>
                                    <button type="reset" class="btn btn-default">Clear Fields</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop