<div class="ad-profile section">	
					<div class="user-profile">
						<div class="user-images">
							<img src="{{asset('images/user.jpg')}}" alt="User Images" class="img-responsive">
						</div>
						<div class="user">
							<h2>Hello, <a href="#">{{Auth::user()->name}}</a></h2>
							<h5 style="margin-top: 15px !important;">You last logged in at: {{Auth::user()->last_login_at}}</h5>
						</div>

						<div class="favorites-user">

							@if(Auth::user()->type == 1)
							<div class="my-ads" style="display: block !important;">
								<a href="{{route('ads.index')}}">{{\App\Ads::where('user_id',Auth::user()->id)->get()->count()}}<small>All ADS</small></a>
							</div>
							@elseif(Auth::user()->type == 0)

							<div class="my-ads" style="display: block !important;">
								<a href="{{route('show.myrequests')}}">{{\App\Requestt::where('user_id',Auth::user()->id)->get()->count()}}<small>My Requests</small></a>
							</div>
							@endif

							<div class="favorites">
								<a href="{{route('favorite.index')}}">{{\App\Favorite::where('user_id',Auth::user()->id)->get()->count()}}<small>Favorites</small></a>
							</div>
						</div>								
					</div><!-- user-profile -->
							
					<ul class="user-menu">
						<li class="
							{{ Request::is('profile') ? 'active' : '' }}
						"><a href="{{route('profile.show')}}">Profile</a></li>
						
						@if(Auth::user()->type == 1)
						<li class="
							{{ Request::is('ads') ? 'active' : '' }}
						"><a href="{{route('ads.index')}}">All Ads</a></li>

						@elseif(Auth::user()->type == 0)
						<li class="
							{{ Request::is('myrequest') ? 'active' : '' }}
						"><a href="{{route('show.myrequests')}}">My Requests</a></li>
						@endif

						<li class="
							{{ Request::is('favorite') ? 'active' : '' }}
						"><a href="{{route('favorite.index')}}">Favourite ads</a></li>

					</ul>
			
			</div>