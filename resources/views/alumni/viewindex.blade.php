@extends('layouts.masterpage')

@section('title')
Dashboard
@endsection

@section('content')
{{-- @include('widget.search') --}}
<div class="row">
	<div class="col-lg-9 order-lg-2">

	@if(count($jobs) > 0)
		@foreach($jobs->sortByDesc('created_at') as $job)
		<div class="row mx-0">
			<div class="card mt-3">
				<div class="card-body px-5">
					<div class="row">
						<div class="col-2 my-auto"><img src="{{asset('/img/logo.png')}}" width="100%"></div>
						<div class="col-7">
							<h4><a href="{{route('job.view', Crypt::encrypt($job->id))}}">{{$job->title}}</a></h4>
							<h6><a href="{{route('company.viewprofile', Crypt::encrypt($job->company_id))}}">{{$job->company->name}}</a></h6>
						</div>
						<div class="col-lg-3 px-0 text-lg-right">
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
					<div class="row">{!!str_limit($job->descriptions, 250)!!}</div>
				</div>
				<div class="card-footer p-1 text-center">
					<div class="row">
						<div class="col mx-auto my-auto">
							<a class="card-link" href=""><i class="fas fa-share-square"></i> Share</a>
						</div>
						<div class="col mx-auto">
							<a class="card-link btn btn-primary" href="{{route('job.view', Crypt::encrypt($job->id))}}"><i class="fas fa-search"></i> View</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	@else
		<div class="row mx-0">
			<div class="card mt-3">
				<div class="card-body">
					<h3>Unfortunately, there's no available job.</h3>
				</div>
			</div>
		</div>
	@endif
		
		<div class="my-3">{{$jobs->links()}}</div>	
	</div>


	<div class="col-lg-3 order-lg-1">
		@if(count($companies) > 0)
		<div class="card my-3">
			<div class="card-header border-secondary">Top Company</div>
			<ul class="list-group list-group-flush">
				@foreach($companies as $company)
				<li class="list-group-item">
					<div class="row">
						<div class="col-5 my-auto"><img src="../img/logo.png" class="img-thumbnail" width="100%"></div>
						<div class="col-7 pl-0 my-auto">
							<small>
							<a href="{{route('company.viewprofile', Crypt::encrypt($company->id))}}">{{$company->name}}</a>
							<br>
							<span class="text-muted">{{count($company->jobs)}} Job Available</span>
							</small>
						</div>
					</div>
				</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="card my-3">
			<div class="card-header border-secondary">Events</div>
			<ul class="list-group list-group-flush">
				<li class="list-group-item"><small>Cerita Pelatih SL1M 2018 <br> <span class="blockquote-footer">1 day ago</span></small></li>
				<li class="list-group-item"><small>Cerita BR1M 2018 <br> <span class="blockquote-footer">5 days ago</span></small></li>
				<li class="list-group-item"><small>Cerita Temuduga <br> <span class="blockquote-footer">1 week ago</span></small></li>
			</ul>
		</div>
	</div>
</div>
@include('widget.totop')
@endsection