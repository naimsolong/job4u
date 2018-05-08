
@if(count($user->employer->jobs) > 0)
<table id="table_candidate" class="table">
	<thead>
		<tr>
			<th width="30%">Candidates</th>
			<th width="30%" class="text-right">Job</th>
			<th width="30%" class="text-center">Status</th>
			<th width="10%" class="text-right">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($applications->sortBy('status') as $application)
		<tr>
			
			<td>{{$application->alumni->user->firstname}}</td>
			<td class="text-right">{{$application->job->title}}</td>
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
@else
<div class="row">
	<div class="col">
		<i class="fas fa-exclamation-circle"></i> No application yet.
	</div>
</div>
@endif