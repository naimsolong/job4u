@extends('layouts.masterpage_alumni')

@section('title')
Event
@endsection

@section('content')

<div class="row text-center">
	<div class="col-12">
		<h4>Event</h4>
		<h6>Keep in touch and get involved for every event to stay connected.</h6>
	</div>
	<div class="col-12">
		<div id="carousel_event" class="carousel slide mt-3" data-ride="carousel">
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
</div>

<div class="row">
	<div class="col-md-4 py-4">
		<div class="card">
			<img class="card-img-top" src="../img/thumbnail-post.jpg"></img>
			<div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      	<button class="btn btn-primary">Read More</button>
			</div>
		</div>
	</div>
	<div class="col-md-4 py-4">
		<div class="card">
			<img class="card-img-top" src="../img/thumbnail-post.jpg"></img>
			<div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      	<button class="btn btn-primary">Read More</button>
			</div>
		</div>
	</div>
	<div class="col-md-4 py-4">
		<div class="card">
			<img class="card-img-top" src="../img/thumbnail-post.jpg"></img>
			<div class="card-body">
			    <h5 class="card-title">Card title</h5>
			    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
			    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
		      	<button class="btn btn-primary">Read More</button>
			</div>
		</div>
	</div>
</div>

@endsection