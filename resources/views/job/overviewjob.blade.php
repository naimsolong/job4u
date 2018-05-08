@extends('layouts.masterpage')

@section('title')
Overview
@endsection

@section('content')

<div class="row mt-3">
	<div class="col-9">
		<h4>Overview</h4>
	</div>
	<div class="col-3 text-right">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewJob">
			<i class="fas fa-search"></i> View Job
		</button>

		<a href="{{route('job.edit', Crypt::encrypt($job->id))}}" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Job</a>
	</div>
</div>
<div class="row">
	<div class="col-lg-9">
		<h2>{{$job->title}}
			@if($job->availability == 2)
			<small class="h5 text-muted">(ACTIVE)</small>
			@elseif($job->availability == 1)
			<small class="h5 text-muted">(CLOSE)</small>
			@elseif($job->availability == 0)
			<small class="h5 text-muted">(DRAFT)</small>
			@endif
		</h2>
	</div>
	<div class="col-lg-3 my-auto">
		<p class="text-lg-right my-auto">Total Applications: {{count($job->applications)}}</p>
	</div>
</div>
<div class="card">
	<div class="card-body pt-1">
		<div class="row">

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-primary mb-0">
					<h5 class="alert-heading my-0"><b>NEW</b></h5>
					<h3>{{count($job->applications->where('status', 1))}}</h3>
				</div>
			</div>

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-primary mb-0">
					<h5 class="alert-heading my-0"><b>SHORTLISTED</b></h5>
					<h3>{{count($job->applications->where('status', 2))}}</h3>
				</div>
			</div>

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-primary mb-0">
					<h5 class="alert-heading my-0"><b>INTERVIEWS</b></h5>
					<h3>{{count($job->applications->where('status', 3))}}</h3>
				</div>
			</div>

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-info mb-0">
					<h5 class="alert-heading my-0"><b>KIV</b></h5>
					<h3>{{count($job->applications->where('status', 4))}}</h3>
				</div>
			</div>

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-danger mb-0">
					<h5 class="alert-heading my-0"><b>REJECTED</b></h5>
					<h3>{{count($job->applications->where('status', 5))}}</h3>
				</div>
			</div>

			<div class="col-xl-2 col-md-4 col-sm-6 p-1 text-center text-lg-right">
				<div class="alert alert-success mb-0">
					<h5 class="alert-heading my-0"><b>HIRED</b></h5>
					<h3>{{count($job->applications->where('status', 6))}}</h3>
				</div>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-12">
				<table id="table_candidate" class="table">
					<thead>
						<tr>
							<th width="30%">Candidates</th>
							<th width="30%" class="text-center">Status</th>
							<th width="10%" class="text-right">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($job->applications->sortBy('status') as $application)
						<tr>

							<td>{{$application->alumni->user->firstname}}</td>
							<td class="text-center">
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
								<div class="alert alert-info mb-0">KIV</div>
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
							</td>
							<td class="text-right">
								<a class="btn btn-primary mt-1" href="{{route('application.viewalumni', Crypt::encrypt($application->id))}}"><i class="fas fa-search"></i> View</a>
							</td>

						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="viewJob" tabindex="-1" role="dialog" style="width: 100vw;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Job: {{$job->title}}</h5>
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
									RM {{$job->salary_min}} - RM {{$job->salary_max}}
								</p>
								<p>
									<i class="fas fa-male"></i>
									{{$job->position_level}}
								</p>
								<p>
									<i class="fas fa-map-marker"></i>
									{{$job->location_city .', '. $job->location_state}}
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
			</div>
		</div>
	</div>
</div>

@endsection