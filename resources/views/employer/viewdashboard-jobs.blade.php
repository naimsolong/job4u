<div class="row">
	<div class="col-12">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text">Choose Job</span>
			</div>
			
			<select id="selectJob" class="form-control">
				<option value="" selected>Select Job</option>
				@foreach($jobs->whereIn('availability', [1, 2])->sortByDesc('availability') as $job)
					@if($job->availability == 1)
					<option value="{{Crypt::encrypt($job->id)}}">{{ $job->title }} (Close)</option>
					@else
					<option value="{{Crypt::encrypt($job->id)}}">{{ $job->title }}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>

<div id="loadingAjax">
</div>

<div class="row">
	<div class="col-md text-center text-md-left mb-3">
		Job View : <span id="jobView">0</span>
	</div>
	<div class="col-md text-center text-md-right mb-3">
		Total Applications : <span id="totalApplication">0</span>
	</div>
</div>
<div class="row text-center text-lg-right">
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-primary">
				<h4 class="alert-heading"><b>NEW APPLICANTS</b></h4>
				<h1 id="newApplication">0</h1>
				<hr>
				<p class="mb-0">Require attention</p>
			</div>
	</div>
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-primary">
				<h4 class="alert-heading"><b>SHORTLISTED</b></h4>
				<h1 id="shortlistedApplication">0</h1>
				<hr>
				<p class="mb-0">From new applicants</p>
			</div>
	</div>
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-primary">
				<h4 class="alert-heading"><b>INTERVIEWS</b></h4>
				<h1 id="interviewsApplication">0</h1>
				<hr>
				<p class="mb-0">Filter applicants</p>
			</div>
	</div>
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-info">
				<h4 class="alert-heading"><b>KIV</b></h4>
				<h1 id="kivApplication">0</h1>
				<hr>
				<p class="mb-0">For future use</p>
			</div>
	</div>
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-danger">
				<h4 class="alert-heading"><b>REJECTED</b></h4>
				<h1 id="rejectedApplication">0</h1>
				<hr>
				<p class="mb-0">Unfortunately</p>
			</div>
	</div>
	<div class="col-lg-4 col-md-6">
			<div class="alert alert-success">
				<h4 class="alert-heading"><b>HIRED</b></h4>
				<h1 id="hiredApplication">0</h1>
				<hr>
				<p class="mb-0">Congratulation</p>
			</div>
	</div>
</div>
<div id="buttonAjax" class="row text-center text-lg-right" style="visibility: hidden;">
	<div class="col-12">
		<a id="jobLink" href=""><button class="btn btn-primary"><i class="fas fa-search"></i> View</button></a>
	</div>
</div>

<hr class="my-5">

<div class="row text-center mb-3">
	<div class="col-12">
		<h2>Job Listing</h2>
	</div>
</div>

@if(count($user->employer->jobs) > 0)
<div class="row">
	<div class="col-12">
		<table id="table_job" class="table">
			<thead>
				<tr>
					<th width="25%">Jobs</th>
					<th width="10%" class="text-center">Status</th>
					<th width="20%" class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($user->employer->jobs->sortByDesc('availability') as $job)
				<tr>
					<td>{{$job->title}}</td>
					<td class="text-center">
						@if($job->availability == 2)
							<div class="alert alert-primary mb-0">Active</div>
						@elseif($job->availability == 1)
							<div class="alert alert-info mb-0">Close</div
						@elseif($job->availability == 0)
							<div class="alert alert-secondary mb-0">Draft</div>
						@endif
					</td>
					<td class="text-right">
						<a href="{{route('job.overview', Crypt::encrypt($job->id))}}"><button class="btn btn-primary mt-1"><i class="fas fa-search"></i> View</button></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@else
<div class="row">
	<div class="col">
		<i class="fas fa-exclamation-circle"></i> No job added.
	</div>
	<div class="col text-right">
		<a href="{{route('job.post')}}"><button class="btn btn-sm btn-primary">Post a Job</button></a>
	</div>
</div>
@endif