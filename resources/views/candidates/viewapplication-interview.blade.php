@extends('layouts.masterpage')

@section('title')
List of Interview
@endsection

@php
$nums = 1;
@endphp

@section('content')

	@if(count($applications->where('status', 3)) > 0)
	<div class="row mt-3">
		<div class="col">
			<div class="alert alert-primary text-center">
				<h2 class="alert-heading"><b>INTERVIEW</b></h2>
			</div>
		</div>
	</div>
	@foreach($applications->where('status', 3)->sortByDesc('application_datetime') as $application)
		<div class="row mb-4">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h2>Job: {{$application->job->title}}</h2>
						<p class="mb-0">Applied on: {{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</p>

						<div class="row">
							<div class="col-lg">
								<div class="input-group mt-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-location-arrow"></i></span>
									</div>
									<input type="text" name="interview_location" class="form-control" value="{{$application->interview_location}}" readonly>
								</div>
							</div>
							<div class="col-lg">
								<div class="input-group mt-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
									</div>
									<input type="date" name="interview_date" class="form-control" value="{{Carbon\Carbon::parse($application->interview_datetime)->format('Y-m-d')}}" readonly>
								</div>
							</div>
							<div class="col-lg">
								<div class="input-group mt-3">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fas fa-clock"></i></span>
									</div>
									<input type="time" name="interview_time" class="form-control" value="{{Carbon\Carbon::parse($application->interview_datetime)->format('H:i:s')}}" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	@else
	<div class="row mt-3">
		<div class="col">
			<div class="alert alert-info text-center">
				<h2 class="alert-heading"><b>Please wait for the employer to sort out.</b></h2>
			</div>
		</div>
	</div>
	@endif
@endsection