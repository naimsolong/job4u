@extends('layouts.masterpage')

@section('title')
Dashboard
@endsection


@section('content')
<div class="row my-4">
	<div class="container justify-content-center">
		<div class="text-center">
			{{-- <img src="{{asset('img/profile_picture.jpg')}}" class="img-thumbnail my-3" style="border-radius: 50%;" width="10%"> --}}

			
			<div class="row ">
				<div class="col-12">
					<h5>
						{{ $user->firstname .' '. $user->lastname }}
					</h5>
				</div>
				<div class="col-md">
					<i class="fas fa-phone"></i>
					{{ $user->employer->phone }}
				</div>
				<div class="col-md">
					<i class="fas fa-briefcase"></i>
					{{ $user->employer->current_position }}
				</div>
				<div class="col-md">
					<i class="fas fa-building"></i>
					{{ $user->employer->employer_type }}
				</div>
			</div>
		</div>

	</div>
</div>
<div class="row">
	<div class="container">
		<ul class="nav nav-tabs nav-fill justify-content-center" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link {{empty($_GET['tab']) || $_GET['tab'] === 'job' ? 'active' : ''}}" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs" aria-selected="true">Manage Jobs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{!empty($_GET['tab']) ? $_GET['tab'] === 'interview' ? 'active' : '' : ''}}" id="interview-tab" data-toggle="tab" href="#interviews" role="tab" aria-controls="interviews" aria-selected="false">Interviews Schedule</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{!empty($_GET['tab']) ? $_GET['tab'] === 'candidate' ? 'active' : '' : ''}}" id="candidates-tab" data-toggle="tab" href="#candidates" role="tab" aria-controls="candidates" aria-selected="false">Candidates</a>
			</li>
			<li class="nav-item">
				<a class="nav-link {{!empty($_GET['tab']) ? $_GET['tab'] === 'report' ? 'active' : '' : ''}}" id="report-tab" data-toggle="tab" href="#report" role="tab" aria-controls="report" aria-selected="false">Report</a>
			</li>
		</ul>
	</div>
</div>
<div class="row">
	<div class="container">
		<div class="tab-content" id="myTabContent">

			{{-- JOB TAB --}}
			<div class="tab-pane fade {{empty($_GET['tab']) || $_GET['tab'] === 'job' ? 'show active' : ''}}" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
				<div class="container py-4">
					@include('employer.viewdashboard-jobs')
				</div>
			</div>
			{{-- JOB TAB --}}

			{{-- INTERVIEW TAB --}}
			<div class="tab-pane fade {{!empty($_GET['tab']) ? $_GET['tab'] === 'interview' ? 'show active' : '' : ''}}" id="interviews" role="tabpanel" aria-labelledby="interviews-tab">
				<div class="container py-4">
					@include('employer.viewdashboard-interviews')
				</div>
			</div>
			{{-- INTERVIEW TAB --}}

			{{-- CANDIDATE TAB --}}
			<div class="tab-pane fade {{!empty($_GET['tab']) ? $_GET['tab'] === 'candidate' ? 'show active' : '' : ''}}" id="candidates" role="tabpanel" aria-labelledby="candidates-tab">
				<div class="container py-4">
					@include('employer.viewdashboard-candidates')
				</div>
			</div>
			{{-- CANDIDATE TAB --}}


			{{-- REPORT TAB --}}
			<div class="tab-pane fade {{!empty($_GET['tab']) ? $_GET['tab'] === 'report' ? 'show active' : '' : ''}}" id="report" role="tabpanel" aria-labelledby="report-tab">
				<div class="container py-4">
					@include('employer.viewdashboard-reports')
				</div>
			</div>
			{{-- REPORT TAB --}}
		</div>
	</div>
</div>
@endsection