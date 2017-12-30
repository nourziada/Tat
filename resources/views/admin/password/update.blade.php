@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.home')}}">Admin panel home page</a></li>
                        <li class="bring_right"><a href="{{route('show.admin.password')}}">Update Password</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">Update Admin Password</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('update.admin.password')}}" method="post">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">Old Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input0" name="old_password" placeholder="Enter the Olde Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input2" class="col-sm-2 control-label bring_right left_text">New Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input2" name="password" placeholder="Enter the New Password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="input3" class="col-sm-2 control-label bring_right left_text">New Password Confirmation</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="input3" name="password_confirmation" placeholder="Re-Type New Password" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">Update Password</button>
                                    <button type="reset" class="btn btn-default">Clear Fields</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop