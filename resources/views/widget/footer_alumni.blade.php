<footer id="footer" style="background-color: grey;">
	<div class="container">
		<div class="row">
			<div class="col-md mt-5">
				<a href="{{route('alumnihome.index')}}">UTM JOB4U</a>
			</div>
			<div class="col-md mt-5">
				<b>UTM JOB4U</b>
				<ul class="list-group">
					
					<li class="list-group-item">
						<a href="{{route('alumnihome.aboutus')}}">About Us</a>
					</li>
					<li class="list-group-item">
						<a href="{{route('alumnihome.event')}}">Event</a>
					</li>
					<li class="list-group-item">
						<a href="{{route('alumnihome.contactus')}}">Contact Us</a>
					</li>
				</ul>
			</div>
			<div class="col-md mt-5">
				<b>Employer</b>
				<ul class="list-group">
					<li class="list-group-item">Create Free Employer Account</li>
					<li class="list-group-item">
						<a href="{{route('employerhome.index')}}">Employer Center</a>
					</li>
					{{-- <li class="list-group-item">Post a Job</li> --}}
				</ul>
			</div>
			<div class="col-md mt-5">
				<b>Need Help</b>
				<ul class="list-group">
					<li class="list-group-item">FAQ</li>
					<li class="list-group-item">Term of Service</li>
					<li class="list-group-item">Privacy Policy</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="my-5 mx-auto">
				Copyright © {{ date("Y") }} UTM Job4U | All Right Reserved.
			</div>
		</div>
	</div>
</footer>