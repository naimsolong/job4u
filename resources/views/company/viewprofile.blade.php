@extends('layouts.masterpage')

@section('title')
Company Profile
@endsection

@section('content')

<div class="row">

	{{-- Company Name, Logo, Banner --}}
	<div class="col-12 d-none d-md-block">
		<div class="card bg-dark text-white">
			<img class="card-img" src="{{asset('img/banner.png')}}" alt="Card image">
			<div class="card-img-overlay">
				<div class="row">
					<div class="col-3">
						<img src="{{asset('img/profile_picture.jpg')}}" class="img-thumbnail" style="border-radius: 50%;">
					</div>
					<div class="col">
						<h3>{{$company->name}} <small>({{$company->ssm}})</small></h3>
						<h4>{{$company->job_category}}</h4>
					</div>
					@if(Auth::user()->role_id == 4)
					<div class="col-4 text-right d-none d-lg-block"><a href="{{route('company.edit')}}" class="btn btn-primary">Edit Company Profile</a></div>
					@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 d-block d-md-none text-center">
		<img class="img-thumbnail mb-3" src="{{asset('img/profile_picture.jpg')}}" style="border-radius: 50%;" width="50%">
		<h3>{{$company->name}} <br><small>({{$company->ssm}})</small></h3>
		<h4>{{$company->job_category}}</h4>
		
		@if($company->verification == 0)
		<h6 class="alert alert-secondary mb-0">Unverified</h6>
		@else
		<h6 class="alert alert-success mb-0">Verified</h6>
		@endif

	</div>
	{{-- Company Name, Logo, Banner --}}

	<div class="col-lg-9 order-lg-2">
		<div class="mt-3 d-lg-none d-none d-md-block">
			@if($company->verification == 0)
			<div class="alert alert-secondary">Unverified</div>
			@else
			<div class="alert alert-success">Verified</div>
			@endif
		</div>

		<div class="card mt-3">

			<div class="card-header border-secondary">
				About Us
				@if(Auth::user()->role_id == 4)
				<a href="{{route('company.edit')}}" class="btn btn-sm btn-primary d-block d-lg-none float-right text-white">Edit Company Profile</a>
				@endif
			</div>
			<div class="list-group-item text-justify">
				<p>
					{!!$company->about_us!!}
				</p>
			</div>
			<div class="list-group-item">
				<div class="row">
					<div class="col-lg-4 mb-2"><b>Industry:</b><br>{{$company->job_category}}</div>
					<div class="col-lg-4 mb-2"><b>Company Type:</b><br>{{$company->company_type}}</div>
					<div class="col-lg-4 mb-2"><b>Company Size:</b><br>{{$company->company_size}}</div>
					@if(!empty($company->dress_code))
					<div class="col-lg-4 mb-2"><b>Dress Code:</b><br>{{$company->dress_code}}</div>
					@endif
					<div class="col-lg-4 mb-2"><b>Working Hour:</b><br>{{$company->work_days .', '. $company->work_hours}}</div>
					<div class="col-12"><b>Website:</b><br>{{$company->website_url}}</div>
				</div>
			</div>
			<div class="list-group-item">
				<p><b>Company Address</b></p>
				<ul class="p-0" style="list-style: none;">
					<li>{{$company->address_1}}</li>
					<li>{{$company->address_2}}</li>
					<li>{{$company->postal .', '. $company->city}}</li>
					<li>{{$company->state}}</li>
					<li>{{$company->country}}</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="col-lg-3 order-lg-1">
		<div class="mt-3 d-none d-lg-block">
			@if($company->verification == 0)
			<div class="alert alert-secondary">Unverified</div>
			@else
			<div class="alert alert-success">Verified</div>
			@endif
		</div>
		@if(Auth::user()->role_id == 5)
		<div class="card mt-3">
			<div class="card-header border-secondary">Job Opening</div>
			<div class="list-group-item">
				<ul style="list-style: decimal;">

					@if(!empty($jobs))
					@foreach($jobs as $job)
					<li class="mb-3"><a href="{{route('job.view', Crypt::encrypt($job->id))}}">{{$job->title}}</a> <br><i class="fas fa-map-marker"></i> {{$job->location_city .', '. $job->location_state}}</li>
					@endforeach
					@else
					<li class="mb-3" style="list-style: none;"><i class="fas fa-exclamation"></i> No Job Available</li>
					@endif
				</ul>
			</div>
		</div>
		@endif
	</div>
</div>


@include('widget.totop')
@endsection