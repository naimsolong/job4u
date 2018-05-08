@extends('layouts.masterpage_alumni')

@section('title')
JOB4U
@endsection

@section('content')

<div class="row text-center">
	<div class="jumbotron mb-0">
		<h4>UTM JOB4U is a platform for UTM Alumni and employer by providing comprehensive search for quality candidates and job vacancies.</h4>
		<button class="btn btn-primary mt-3">Jobs Offered</button>
	</div>
</div>

<div class="row mt-5 text-center">
	<div class="col-12 mb-5">
		<h4>Smart & Easy Platform for Job Hunt & Recruiters</h4>
		<h6>Everything is for UTM Alumni.</h6>
	</div>
	<div class="col-md-4">
		<i class="fas fa-search fa-7x" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i>
		<h5 class="mt-3">SEARCH THOUSANDS OF JOBS</h5>
		<p>Search for a thousands of jobs all over the Malaysia in just one site. Grab your dream jobs now.</p>
	</div>
	<div class="col-md-4">
		<i class="fas fa-globe fa-7x" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i>
		<h5 class="mt-3">LOCATION BASED SEARCH</h5>
		<p>Find your dream job near your location now and build a network with people near you.</p>
	</div>
	<div class="col-md-4">
		<i class="fas fa-chart-line fa-7x" data-fa-transform="shrink-6" data-fa-mask="fas fa-circle"></i>
		<h5 class="mt-3">TOP CAREERS</h5>
		<p>Get yourself hired by a top company with top careers.</p>
	</div>
</div>

<div class="row mt-5 justify-content-center text-center">
	<div class="col-12 mb-5">
		<h4>Top Company</h4>
		<h6>Join to build network the most top company in Malaysia.</h6>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_ii.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_lm.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">	
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mbjb.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mc.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mdp.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mds.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mphtj.png" alt="Card image">
		</div>
	</div>
	<div class="col-4 col-md-3 col-lg-2">
		<div class="card m-1">
			<img class="card-img" src="../img/logo-client/logo-client_mpjbt.png" alt="Card image">
		</div>
	</div>
</div>

<div class="row mt-5 text-center">
	<div class="col-12">
		<h4>Event</h4>
		<h6>Keep in touch and get involved for every event to stay connected.</h6>
	</div>
	<div id="carousel_event" class="carousel slide mt-5" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carousel_event" data-slide-to="0" class="active"></li>
			<li data-target="#carousel_event" data-slide-to="1"></li>
			<li data-target="#carousel_event" data-slide-to="2"></li>
			<li data-target="#carousel_event" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="card bg-dark text-white">
					<img class="card-img" src="../img/banner.png" alt="First slide">
					<div class="card-img-overlay">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="card bg-dark text-white">
					<img class="card-img" src="../img/banner.png" alt="Second slide">
					<div class="card-img-overlay">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="card bg-dark text-white">
					<img class="card-img" src="../img/banner.png" alt="Third slide">
					<div class="card-img-overlay">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
			<div class="carousel-item">
				<div class="card bg-dark text-white">
					<img class="card-img" src="../img/banner.png" alt="Forth image">
					<div class="card-img-overlay">
						<h5 class="card-title">Card title</h5>
						<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection