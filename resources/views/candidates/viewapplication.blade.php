@extends('layouts.masterpage')

@section('title')
Applications
@endsection

@section('content')

<div class="row mt-3">
	<div class="col-md">
		<h5>Job:</h5>
		<h3>{{$application->job->title}}
			<small><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewJob">
				<i class="fas fa-search"></i> View Job</button>
			</small>
		</h3>
		<p class="mb-0">Applied on: {{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</p>
	</div>
	<div class="col-md-3">
		<h5>Status:</h5>
		@switch($application->status)
			@case(1)
				<div class="alert alert-primary mb-0">New</div>
				@break
			
			@case(2)
				<div class="alert alert-primary mb-0">Shortlisted</div>
				@break
			
			@case(3)
				<div class="alert alert-primary mb-0">Interviews</div>
				@break
			
			@case(4)
				<div class="alert alert-info mb-0">Pending</div>
				@break
			
			@case(5)
				<div class="alert alert-danger mb-0">Rejected</div>
				@break
			
			@case(6)
				<div class="alert alert-success mb-0">Hired</div>
				@break
			
			@default
				<div class="alert alert-dark mb-0">Unknown</div>
		@endswitch
	</div>
</div>

<hr>

<div class="row">
	@if($application->status > 2)
	<div class="col-6">

		<div class="input-group">
			<div class="input-group-prepend">
				<span class="input-group-text">Interview Location</span>
			</div>
			<input type="text" name="interview_location" class="form-control" value="{{$application->interview_location}}" readonly>
		</div>

		<div class="input-group mt-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Interview Date</span>
			</div>
			<input type="date" name="interview_date" class="form-control" value="{{Carbon\Carbon::parse($application->interview_datetime)->format('Y-m-d')}}" readonly>
		</div>

		<div class="input-group mt-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Interview Time</span>
			</div>
			<input type="time" name="interview_time" class="form-control" value="{{Carbon\Carbon::parse($application->interview_datetime)->format('H:i:s')}}" readonly>
		</div>
	</div>
	@endif

	<div class="col">
		<h3>Person In Charge</h3>
		<h2>{{$application->employer->user->firstname . ' ' . $application->employer->user->lastname}}</h2>
		<h6>Position: {{$application->employer->current_position}}</h6>
		<h6>Employer Type: {{$application->employer->employer_type}}</h6>
	</div>
</div>



<div class="modal fade" id="viewJob" tabindex="-1" role="dialog" style="width: 100vw;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Job: {{$application->job->title}}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">Overview</div>
							<div class="card-body">
								<p>
									<i class="fas fa-dollar-sign"></i>
									RM {{$application->job->salary_min}} - RM {{$application->job->salary_max}}
								</p>
								<p>
									<i class="fas fa-male"></i>
									{{$application->job->position_level}}
								</p>
								<p>
									<i class="fas fa-map-marker"></i>
									{{$application->job->location_city .', '. $application->job->location_state}}
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Descriptions</div>
							<div class="card-body text-justify">
								{{$application->job->descriptions}}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Requirements</div>
							<div class="card-body">
								{{$application->job->requirements}}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Responsiblity</div>
							<div class="card-body">
								{{$application->job->responsibilities}}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Benefits</div>
							<div class="card-body">
								{{$application->job->benefits}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection