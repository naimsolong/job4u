
	<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	
		<div class="container">
            <a class="navbar-brand" href="{{route('employerhome.index')}}">UTM Job4U</a>
			

		  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAlumni" aria-controls="navbarAlumni" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		  	</button>

			<div class="collapse navbar-collapse" id="navbarAlumni">
      			
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{route('employerhome.features')}}">Features</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('employerhome.jobboard')}}">Job Boards</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('employerhome.faqs')}}">FAQS</a>
					</li>
				</ul>
      			<div class="dropdown-divider"></div>
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item mt-1">
						<a class="nav-link" href="{{ route('employer.login') }}">Log In</a>
					</li>
					<li class="nav-item mt-1">
						<a class="nav-link" href="{{ route('employer.register') }}">Create Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('alumnihome.index') }}"><button class="btn btn-sm btn-primary">Alumni</button></a>
					</li>
				</ul>
			</div>

		</div>
		
	</nav>