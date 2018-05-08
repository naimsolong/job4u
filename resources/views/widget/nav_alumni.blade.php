
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	
		<div class="container">
            <a class="navbar-brand" href="{{route('alumnihome.index')}}">UTM Job4U</a>
			

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
					<li class="nav-item mt-1">
						<a class="nav-link" href="{{ route('login') }}">Log In</a>
					</li>
					<li class="nav-item mt-1">
						<a class="nav-link" href="{{ route('register') }}">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('employerhome.index') }}"><button class="btn btn-sm btn-primary">Employer</button></a>
					</li>
				</ul>

			</div>

		</div>
		
	</nav>