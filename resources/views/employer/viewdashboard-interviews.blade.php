
@if(count($applications) > 0)
<table id="table_interview" class="table">
	<thead>
		<tr>
			<th width="30%">Candidates</th>
			<th width="20%" class="text-center">Location</th>
			<th width="10%" class="text-center">Date</th>
			<th width="10%" class="text-center">Time</th>
			<th width="20%" class="text-right">Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($applications->where('status', 3)->sortBy('interview_datetime') as $application)
		<tr>
			
			<td><a href="{{route('application.viewalumni', Crypt::encrypt($application->id))}}">{{$application->alumni->user->firstname}}</a></td>
			<td class="text-center">{{$application->interview_location}}</td>
			<td class="text-center">{{Carbon\Carbon::parse($application->interview_datetime)->format('d M Y')}}</td>
			<td class="text-center">{{Carbon\Carbon::parse($application->interview_datetime)->format('h:i A')}}</td>
			<td class="text-right">
				<a href=""><button class="btn btn-danger"><i class="fas fa-times"></i> Reject</button></a>
				<a href=""><button class="btn btn-success"><i class="fas fa-check"></i> Hire</button></a>
			</td>
			
		</tr>
		@endforeach
	</tbody>
</table>
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