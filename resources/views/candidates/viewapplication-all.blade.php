@extends('layouts.masterpage')

@section('title')
List of Applications
@endsection

@php
$nums = 1;
$num = 1;
@endphp

@section('content')

<ul class="nav nav-tabs mt-4" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#active" role="tab">Active Applications</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#pending" role="tab">Pending Applications</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#all" role="tab">All Applications</a>
	</li>
</ul>



<div class="tab-content">

	<div class="tab-pane fade show active p-4" id="active" role="tabpanel">
		
		<table id="table_application">
			<thead>
				<tr>
					<th>#</th>
					<th>Job</th>
					<th class="text-center">Applied On</th>
					<th class="text-center">Status</th>
					<th class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($applications->whereIn('status', [1,2,3])->sortByDesc('status') as $application)
				<tr>
					<th>{{$nums++}}</th>
					<td>{{$application->job->title}}</td>
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
							
							@default
								<div class="alert alert-dark mb-0">Unknown</div>
						@endswitch
					</td>
					<td class="text-right">
						<a href="{{route('application.viewapplication', Crypt::encrypt($application->id))}}" class="btn btn-primary"><i class="fas fa-search"></i> View</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="tab-pane fade p-4" id="pending" role="tabpanel">
		
		<table id="table_pending">
			<thead>
				<tr>
					<th>#</th>
					<th>Job</th>
					<th class="text-center">Applied On</th>
					<th class="text-center">Status</th>
					<th class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($applications->where('status', 4)->sortByDesc('status') as $application)
				<tr>
					<th>{{$num++}}</th>
					<td>{{$application->job->title}}</td>
					<td class="text-center">{{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</td>
					<td class="text-center">
						<div class="alert alert-info mb-0">Pending</div>
					</td>
					<td class="text-right">
						<a href="{{route('application.viewapplication', Crypt::encrypt($application->id))}}" class="btn btn-primary"><i class="fas fa-search"></i> View</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="tab-pane fade p-4" id="all" role="tabpanel">
		
		<table id="table_applications">
			<thead>
				<tr>
					<th>#</th>
					<th>Job</th>
					<th class="text-center">Applied On</th>
					<th class="text-center">Status</th>
					<th class="text-right">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($applications->sortByDesc('status') as $application)
				<tr>
					<th>{{$num++}}</th>
					<td>{{$application->job->title}}</td>
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
					</td>
					<td class="text-right">
						<a href="{{route('application.viewapplication', Crypt::encrypt($application->id))}}" class="btn btn-primary"><i class="fas fa-search"></i> View</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@endsection