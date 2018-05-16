<div class="page-header page-header-inverse">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-transparent navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ url('/') }}"><img src="/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li>
					<a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a>
				</li>
			</ul>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{  url('/') }}">home</a></li>
			@if(Auth::check())
				<li><a href="{{ url('mybooks') }}">  
					<i class=" icon-bookmarks"></i>   my books</a>
				</li>
			@endif
		</ul>

		<div class="navbar-collapse collapse" id="navbar-mobile">

			<ul class="nav navbar-nav navbar-right">
	            @guest
	                <li>
	                	<a class="nav-link" href="{{ route('login') }}"> 
		                	{{ __('Login') }}
		                </a>
	                </li>
	                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
	            @else
		            <li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="/images/image.png" alt="">
							<span>{{ Auth::user()->name }}</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
							<li class="divider"></li>
							<li>
								<a class="dropdown-item" href="{{ route('logout') }}"
		                           onclick="event.preventDefault();
		                                         document.getElementById('logout-form').submit();">
		                                         <i class="icon-switch2"></i>
		                            {{ __('Logout') }}
		                        </a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		                            @csrf
		                        </form>
		                    </li>
						</ul>
					</li>
	            @endguest

			</ul>
		</div>
	</div>
	<!-- /main navbar -->

</div>