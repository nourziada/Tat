@extends('layouts.admin')

@section('content')

<div class="main_content_container">
            <div class="main_container  main_menu_open">
                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.home')}}">Admin panel home page</a></li>
                        <li class="bring_right"><a href="{{route('category.index')}}">All Categories</a></li>
                    </ul>
                </div>
                <!--/End system bath-->
                <div class="page_content">

                    <h1 class="heading_title">Create New Category</h1>


                    @include('includes.errors')


                    <div class="form" >
                        <form class="form-horizontal" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="input0" class="col-sm-2 control-label bring_right left_text">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input0" name="name" placeholder="Category Name less than 40 characters" required>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="input4" class="col-sm-2 control-label bring_right left_text">Category Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" style="height: unset;" name="image" id="input4">
                                </div>
                            </div>

    

                            <div class="form-group">
                                <div class="col-sm-12 left_text">
                                    <button type="submit" class="btn btn-success">Add Category</button>
                                    <button type="reset" class="btn btn-default">Clear Fields</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@stop