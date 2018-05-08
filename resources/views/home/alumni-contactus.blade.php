@extends('layouts.masterpage_alumni')

@section('title')
Contact Us
@endsection

@section('content')

<div class="row text-center">
	<iframe class="col-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d854.7450534668881!2d103.63474747589895!3d1.5604597995100125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da76ad1e69d1c5%3A0xd605d60cf15c3801!2sUtm+Career+Centre+L51!5e0!3m2!1sen!2smy!4v1519975935895" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="row mt-5">
	<div class="col-12">
		<h3>Contact Us</h3>
	</div>
	<div class="col-md-6">
		<ul class="p-0" style="list-style: none;">
			<li><i class="fas fa-phone"></i> +607 5538833</li>
			<li><i class="fas fa-envelope"></i> ecareer@utm.my</li>
			<li><i class="fas fa-address-book"></i> UTM Career Centre, L51, Universiti Teknologi Malaysia, 81310 UTM Johor Bahru, Johor, Malaysia.</li>
			<li><i class="fab fa-facebook"></i> <a href="https://www.facebook.com/CDUUTM" target="_blank">UTM Career Centre UTM Johor Bahru</a></li>
		</ul>
	</div>

	<div class="col-md-6">
		<form>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
			</div>
			<div class="form-group">
				<label for="email">Email address</label>
				<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<textarea class="form-control" id="message" placeholder="Enter message"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>

@endsection