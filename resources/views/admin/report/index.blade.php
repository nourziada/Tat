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
                        <li class="bring_right"><a href="{{route('report.index')}}">All Reports</a></li>
                    </ul>
                </div>
                <!--/End system bath-->

                <div class="page_content">
                    <h1 class="heading_title">Show All Ads Reports</h1>

                    

                    @include('includes.errors')

                    <div class="wrap">
                        <table class="table table-bordered">
                            <tr>
                                <td>#</td>
                                <td style="width: 40%;">Ads title</td>
                                <td>Report Description</td>
                                <td>Control</td>
                            </tr>

                        @if($reports->count() > 0)

                            <?php $no=1; ?>
                            @foreach($reports as $report)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ \App\Ads::find($report->ads_id)->title }}</td>
                                <td>{{ $report->desc }}</td>
                               
                                <td>
                                    
                                    <a target="_blank" href="{{route('ads.show',['id' => $report->ads_id])}}" class="btn btn-primary btn-xs" data-title="Show"><span class="glyphicon glyphicon-eye-open"></span></a> 
                                   
                                    <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#deleteModal" ><span class="glyphicon glyphicon-trash"></span>
                                    </button> 

                                    <!-- Modal -->
                                    <div id="deleteModal" class="modal fade" role="dialog">
                                      <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Delete Advertising !</h4>
                                          </div>
                                          <div class="modal-body">
                                            <p>Are you Sure to Delete this Advertising </p>
                                          </div>
                                          <div class="modal-footer">

                                          <span>
                                             <form action="{{route('delete.admin.ads',['id' => $report->ads_id])}}" method="post">
                                                {{ csrf_field() }}
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                          </span>  
                                            
                                          </div>
                                        </div>

                                      </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        @else

                        @endif
                        </table>

                        <nav class="text-center">
                            {{$reports->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

@stop