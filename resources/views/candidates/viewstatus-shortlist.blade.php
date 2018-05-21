<form method="POST" action="{{route('application.action', [Crypt::encrypt($application->id), Crypt::encrypt(3)])}}">
	{{ csrf_field() }}

	<div class="row">
		<div class="col-md col-lg-9">
			<div class="alert alert-primary text-center">
				<h2 class="alert-heading"><b>SHORTLISTED</b></h2>
			</div>
			<h2 class="mt-3">Job: {{$application->job->title}} <small><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewJob">
				<i class="fas fa-search"></i> View Job</button></small>
			</h2>
			<p class="mb-0">Applied on: {{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</p>

			<div class="input-group mt-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Interview Location</span>
				</div>
				<input type="text" class="form-control {{ $errors->has('interview_location') ? ' is-invalid' : '' }}" name="interview_location" value="{{old('interview_location')}}">

                @if ($errors->has('interview_location'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('interview_location') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group mt-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Interview Date</span>
				</div>
				<input type="date" class="form-control {{ $errors->has('interview_date') ? ' is-invalid' : '' }}" name="interview_date" value="{{old('interview_date')}}">

                @if ($errors->has('interview_date'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('interview_date') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group mt-3">
				<div class="input-group-prepend">
					<span class="input-group-text">Interview Time</span>
				</div>
				<input type="time" class="form-control {{ $errors->has('interview_time') ? ' is-invalid' : '' }}" name="interview_time" value="{{old('interview_time')}}">

                @if ($errors->has('interview_time'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('interview_time') }}</strong>
                    </span>
                @endif
			</div>

			<div class="input-group mt-3">
				<textarea id="summernote" name="remarks" class="form-control {{ $errors->has('remarks') ? ' is-invalid' : '' }}"> {{old('remarks')?old('remarks'):'Remarks'}}</textarea>

                @if ($errors->has('remarks'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('remarks') }}</strong>
                    </span>
                @endif
			</div>

		</div>

		<div class="col-md-3 text-right">
			<a href="{{route('application.action', [Crypt::encrypt($application->id), Crypt::encrypt(5)])}}" class="btn btn-danger mt-md-0 mt-3"> Reject</a>
			<button type="submit" class="btn btn-primary mt-lg-0 mt-md-1 mt-3"> Interview</button>
		</div>
	</div>
</form>


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
								{!!$application->job->descriptions!!}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Requirements</div>
							<div class="card-body">
								{!! $application->job->requirements !!}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Responsiblity</div>
							<div class="card-body">
								{!!$application->job->responsibilities!!}
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card mt-3">
							<div class="card-header">Benefits</div>
							<div class="card-body">
								{!!$application->job->benefits!!}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	