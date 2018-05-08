@extends('layouts.masterpage')

@section('title')
View Job
@endsection

@php
$alumni_id = Auth::user()->alumni->id;

if(count($job->applications->where('alumni_id', $alumni_id)) > 0)
	$check = 1;
else
	$check = 0;
@endphp


@section('content')

{{-- @if(Auth::user()->role_id == 5)	
@include('widget.search')
@endif --}}

@if($check == 1)
<div class="row mt-3">
	<div class="col">
		<div class="jumbotron alert-danger mb-0">
			You have applied this job. Please continue to application process.
		</div>
	</div>
</div>
@endif

<div class="row mt-3">
	<div class="col-lg-9 order-lg-2">
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<img class="card-img-top" src="{{asset('img/banner.png')}}">				
					<div class="card-body px-5">
						<div class="row">
							<div class="col-2 my-auto"><img src="{{asset('img/logo.png')}}" width="100%"></div>
							<div class="col-7">
								<h4>{{$job->title}}</h4>
								<h6>{{$job->company->name}}</h6>
							</div>
							<div class="col-lg-3 text-lg-right">
								<h6><small>Posted on {{$job->created_at->format('d M Y')}}</small></h6>
							</div>
						</div>
						<div id="jobDetails" class="row my-1">
							<div class="col-lg p-0">
								<span class="col-1 p-0"><i class="fas fa-dollar-sign"></i></span><span class="col-11">RM {{$job->salary_min}} - RM {{$job->salary_max}}</span>
							</div>
							<div class="col-lg p-0">
								<span class="col-1 p-0"><i class="fas fa-male"></i></span><span class="col-11">{{$job->position_level}}</span>
							</div>
							<div class="col-lg p-0">
								<span class="col-1 p-0"><i class="fas fa-map-marker"></i></span><span class="col-11">{{$job->location_city .', '. $job->location_state}}</span>
							</div>
						</div>
					</div>
					<div class="card-footer p-1 text-center">
						<div class="row">
							@if(Auth::user()->role_id == 4)

							<div class="col mx-auto">
								<a class="card-link btn btn-primary" href="{{route('job.overview', Crypt::encrypt($job->id))}}"><i class="fas fa-edit"></i> Overview</a>
							</div>

							@elseif(Auth::user()->role_id == 5)

							<div class="col mx-auto my-auto">
								<a class="card-link" href=""><i class="fas fa-share-square"></i> Share</a>
							</div>
							<div class="col mx-auto">
								<a class="card-link btn btn-primary {{$check == 1?'disabled':''}}" href="{{route('job.apply', Crypt::encrypt($job->id))}}" ><i class="fas fa-edit"></i> Apply</a>
							</div>

							@endif

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">Descriptions</div>
					<div class="card-body text-justify">
						{!!$job->descriptions!!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">Requirements</div>
					<div class="card-body">
						{!!$job->requirements!!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">Responsiblity</div>
					<div class="card-body">
						{!!$job->responsibilities!!}
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">Benefits</div>
					<div class="card-body">
						{!!$job->benefits!!}
					</div>
				</div>
			</div>
		</div>
		@if(Auth::user()->role_id == 5)
		<div class="row">
			<div class="col-12">
				<a class="col-12 btn btn-primary my-3 {{$check == 1?'disabled':''}}" href="{{route('job.apply', Crypt::encrypt($job->id))}}"><i class="fas fa-edit"></i> Apply</a>
			</div>
		</div>
		@endif
	</div>
	<div class="col-12 d-block d-lg-none">
		<hr>
	</div>
	<div class="col-lg-3 order-lg-1">
		<div class="card mb-3">
			<div class="card-header border-secondary">Company Overview</div>
			<small>
				<li class="list-group-item text-justify">
					<p>
						{{str_limit($job->company->about_us, 150)}}
					</p>
					<a href="{{route('company.viewprofile', Crypt::encrypt($job->company_id))}}">View Company</a>
				</li>
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li><b>Industry:</b><br>{{$job->company->job_category}}</li>
						<li><b>Company Type:</b><br>{{$job->company->company_type}}</li>
						<li><b>Working Hour:</b><br>{{$job->company->work_days .', '. $job->company->work_hours}}</li>
					</ul>
				</li>
			</small>
		</div>

		@if(count($other_jobs) > 0)
		<div class="card mt-3">
			<div class="card-header border-secondary">Other Job Offer</div>
			<div class="list-group-item">
				<ul class="m-0 p-0" style="list-style: none;">
					@foreach($other_jobs as $job)
					<li class="mb-3"><a href="{{route('job.view', Crypt::encrypt($job->id))}}">{{$job->title}}</a> <br><i class="fas fa-map-marker"></i> {{$job->location_city .', '. $job->location_state}}</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif

		@if(count($similar_companies) > 0)
		<div class="card mt-3">
			<div class="card-header border-secondary">Similar Companies</div>
			<div class="list-group-item">
				<ul class="m-0 p-0" style="list-style: none;">
					@foreach($similar_companies as $company)
					<li class="mb-3"><a href="{{route('company.viewprofile', Crypt::encrypt($company->id))}}">{{$company->name}}</a> <br><i class="fas fa-map-marker"></i> {{$company->city .', '. $company->state}}</li>
					@endforeach
				</ul>
			</div>
		</div>
		@endif
	</div>
</div>

@include('widget.totop')
@endsection