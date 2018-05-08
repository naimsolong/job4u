<div class="row">
	<div class="col-md col-lg-9">
		<div class="alert alert-success text-center">
			<h2 class="alert-heading"><b>HIRED</b></h2>
		</div>
		<h2 class="mt-3">Job: {{$application->job->title}} <small><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewJob">
		<i class="fas fa-search"></i> View Job</button></small></h2>
		<p class="mb-0">Applied on: {{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</p>
		<textarea name="" class="form-control mt-3" disabled>{{$application->remarks}}</textarea>
	</div>

	<div class="col-md-3 text-right">
		Inform to respective departments.
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