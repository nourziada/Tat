@extends('layouts.admin')

@section('content')

 <!-- All Sliders -->

        <div class="main_content_container">
            <div class="main_container  main_menu_open">

                <!--Start system bath-->
                <div class="home_pass hidden-xs">
                    <ul>
                        <li class="bring_right"><span class="glyphicon glyphicon-home "></span></li>
                        <li class="bring_right"><a href="{{route('admin.home')}}">Admin panel home page</a></li>
                        <li class="bring_right"><a href="{{route('show.admin.request')}}">All Requests</a></li>
                    </ul>
                </div>
                <!--/End system bath-->

                <div class="page_content">
                    <h1 class="heading_title">Show All Requests</h1>

                    <div class="col-md-6 col-md-offset-3">
                        <form action="{{route('show.admin.request.search')}}" method="get" class="form-inline search_box text-center" style="margin: 20px 0;background-color: #30343e;border-radius: 40px;">
                            
                            <div class="form-group">
                                <input type="search" name="search" class="form-control" placeholder="Search Word">
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>

                    @include('includes.errors')

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td style="width: 60%;">title</td>
                                <td>User Name</td>
                                <td>Control</td>
                            </tr>

                        @if(count($requests) > 0)

                            <?php $no=1; ?>
                            @foreach($requests as $request)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ $request->title }}</td>
                                <td>{{ \App\User::find($request->user_id)->name }}</td>
                               
                                <td>
                                    
                                    <a target="_blank" href="{{route('request.show',['id' => $request->id])}}" class="btn btn-primary btn-xs" data-title="Show"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                   
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteModal{{$request->id}}" ><span class="glyphicon glyphicon-trash"></span>
                                    </button> 
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div id="deleteModal{{$request->id}}" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Request !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you Sure to Delete this Request </p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('delete.admin.request',['id' => $request->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>
                            @endforeach
                            


                        @else

                        @endif
                        </table>

                        <nav class="text-center">
                            {{$requests->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

@stop