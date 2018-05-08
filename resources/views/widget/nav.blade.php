@if(Auth::user()->role_id == 4)
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	
		<div class="container">
            <a class="navbar-brand" href="{{route('employerdashboard')}}">UTM Job4U</a>

		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEmployer" aria-controls="navbarAlumni" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

			<div class="collapse navbar-collapse" id="navbarEmployer">      			
				<ul class="navbar-nav ml-auto
					<li class="nav-item">
						<a class="nav-link" href="{{route('job.post')}}"><button class="btn btn-sm btn-primary">Post a Job</button></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="iconProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-cogs fa-lg"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="iconProfile">
							<a class="dropdown-item" href="{{route('company.view')}}"><i class="fas fa-building"></i> Company Profile</a>
							<hr>
							<a class="dropdown-item" href="{{ route('employerprofile.view') }}"><i class="fas fa-user"></i> My Profile</a>
							<a class="dropdown-item" href="{{ route('employersetting.view') }}"><i class="fas fa-cogs"></i> Setting</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            <i class="fas fa-sign-out-alt"></i> Log Out
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>
						</div>
					</li>
				</ul>
			</div>

		</div>
		
	</nav>
@elseif(Auth::user()->role_id == 5)
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	
		<div class="container">
            <a class="navbar-brand" href="{{route('alumnidashboard')}}">UTM Job4U</a>

		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAlumni" aria-controls="navbarAlumni" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

			<div class="collapse navbar-collapse" id="navbarAlumni">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{route('job.top')}}">Top Jobs</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('job.categories')}}">Jobs Category</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('company.viewtopcompany')}}">Companies</a>
					</li>
				</ul>
	      		<div class="dropdown-divider"></div>
				<ul class="navbar-nav ml-auto">
					{{-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="iconNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="fa-layers fa-fw">
								<i class="fas fa-bell fa-lg"></i>
								<span class="fa-layers-counter fa-2x"  style="background:Tomato">1</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="iconNotification">
							<a class="dropdown-item">Notification 1</a>
							<a class="dropdown-item">Notification 2</a>
							<a class="dropdown-item">Notification 3</a>
						</div>
					</li>
 --}}
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="iconProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-user-circle fa-lg"></i> {{ !empty($user->firstname) ? $user->firstname : Auth::user()->firstname }}
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="iconProfile">
							<a class="dropdown-item" href="{{route('application.viewall')}}"><i class="fas fa-clipboard"></i> Application</a>
							<a class="dropdown-item" href="{{route('application.viewinterview')}}"><i class="fas fa-comment-alt"></i> Interview</a>
							{{-- <a class="dropdown-item" href="#"><i class="fas fa-briefcase"></i> Employment History</a> --}}
							<hr>
							<a class="dropdown-item" href="{{route('alumniprofile.view')}}"><i class="fas fa-user"></i> My Profile</a>
							<a class="dropdown-item" href="{{route('alumnisetting.view')}}"><i class="fas fa-cogs"></i> Setting</a>
							<a class="dropdown-item" href="{{ route('logout') }}"
	                           onclick="event.preventDefault();
	                                         document.getElementById('logout-form').submit();">
	                            <i class="fas fa-sign-out-alt"></i> Log Out
	                        </a>

	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                            @csrf
	                        </form>
						</div>
					</li>
				</ul>
			</div>

		</div>
		
	</nav>
@endif