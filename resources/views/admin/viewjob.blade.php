@extends('layouts.masterpage_admin')

@section('title')
View Job
@endsection
@section('breadcrumb')
View Job
@endsection

@section('content')

<div class="row">
	<div class="col">
		<div class="page-categories">
			<h3 class="title text-center mb-1">{{$job->title}}</h3>
			<h5 class="text-center">{{$job->job_category}}</h5>
			<br />
			<ul class="nav nav-pills nav-pills-info nav-pills-icons justify-content-center" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#description" role="tablist">
						<i class="material-icons">info</i> Description
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#details" role="tablist">
						<i class="material-icons">library_books</i> More Details
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#applications" role="tablist">
						<i class="material-icons">assessment</i> Applications
					</a>
				</li>
			</ul>
			<div class="tab-content tab-space tab-subcategories pt-0">
				<div class="tab-pane active" id="description">
					<div class="card">
						<div class="card-body">
							
							
							<div class="row my-3">
								<div class="col">
									<h4>Position Level: {{$job->position_level}}</h4>
									<h6>Company: {{$job->company->name}}</h6>
									<h6>Location: {{$job->location_city . ' ' . $job->location_state}}</h6>
								</div>
								<div class="col-lg-3 text-lg-right">
									<h6><small>Posted on {{$job->created_at->format('d M Y')}}</small></h6>
									<h6><small>View: {{$job->job_view}}</small></h6>
								</div>
							</div>
							<div class="row my-3">
								<div class="col-lg">
									<div class="row">
									<span class="col-1"><i class="fas fa-dollar-sign"></i></span><span class="col-11">RM {{$job->salary_min}} - RM {{$job->salary_max}}</span>
									</div>
								</div>
								<div class="col-lg">
									<div class="row">
									<span class="col-1"><i class="fas fa-male"></i></span><span class="col-11">{{$job->position_level}}</span>
									</div>
								</div>
								<div class="col-lg">
									<div class="row">
									<span class="col-1"><i class="fas fa-map-marker"></i></span><span class="col-11">{{$job->location_city .', '. $job->location_state}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="details">
					<div class="row">
						<div class="col-12">
							<div class="card my-3">
								<div class="card-header">
									<h4 class="card-title">Descriptions</h4>
								</div>
								<div class="card-body text-justify">
									{{$job->descriptions}}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card my-3">
								<div class="card-header">
									<h4 class="card-title">Requirements</h4>
								</div>
								<div class="card-body">
									{{$job->requirements}}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card my-3">
								<div class="card-header">
									<h4 class="card-title">Responsiblity</h4>
								</div>
								<div class="card-body">
									{{$job->responsibilities}}
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="card mt-3">
								<div class="card-header">
									<h4 class="card-title">Benefits</h4>
								</div>
								<div class="card-body">
									{{$job->benefits}}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="applications">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">All Application</h4>
							<p class="card-category">
								Total: {{count($job->applications)}}
							</p>
						</div>
						<div class="card-body">
							<div class="material-datatables">
								<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
									<thead>
										<tr>
											<th width="30%">Alumni</th>
											<th class="text-center">Applied On</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>
										@foreach($job->applications->sortByDesc('status') as $application)
										<tr>
											<td width="30%">{{$application->alumni->user->firstname}}</td>
											<td class="text-center">{{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</td>
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
														<div class="alert alert-warning mb-0">Rejected</div>
														@break
													
													@case(6)
														<div class="alert alert-success mb-0">Hired</div>
														@break
													
													@default
														<div class="alert alert-dark mb-0">Unknown</div>
												@endswitch
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection