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
                        <li class="bring_right"><a href="{{route('category.index')}}">All Categories</a></li>
                    </ul>
                </div>
                <!--/End system bath-->

                <div class="page_content">
                    <h1 class="heading_title">Show All Categories</h1>

                    @include('includes.errors')

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td>image</td>
                                <td>Name</td>
                                <td>Control</td>
                            </tr>

                        @if(count($categories) > 0)

                            <?php $no=1; ?>
                            @foreach($categories as $cat)
                            <tr>
                                <td>{{$no++}}</td>
                                <td><img src="{{$cat->image}}" class="img-rounded user_thumb"></td>
                                <td>{{ $cat->name }}</td>
                               
                                <td>
                                    
                                    <a href="{{route('category.edit',['id' => $cat->id])}}" class="btn btn-info btn-xs" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></a> 
                                   
                                    <button class="btn btn-danger btn-xs" data-title="Edit" data-toggle="modal" data-target="#deleteModal" ><span class="glyphicon glyphicon-trash"></span>
                                    <input type="hidden" value="{{$deletedid = $cat->id}}">
                                    </button> 
                                </td>
                            </tr>
                            @endforeach
                            <!-- Modal -->
                            <div id="deleteModal" class="modal fade" role="dialog">
                              <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Delete Category !</h4>
                                  </div>
                                  <div class="modal-body">
                                    <p>Are you Sure to Delete this Category and All Advertising insid it </p>
                                  </div>
                                  <div class="modal-footer">

                                  <span>
                                     <form action="{{route('category.destroy',['id' => $deletedid])}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                  </span>  
                                    
                                  </div>
                                </div>

                              </div>
                            </div>
                        @else

                        @endif
                        </table>

                        <nav class="text-center">
                            {{$categories->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

@stop