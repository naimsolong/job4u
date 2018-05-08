@extends('layouts.masterpage')

@section('title')
Apply Job
@endsection

@php
$education = $user->alumni->educations->sortByDesc('graduate_year')->first();
$work = $user->alumni->works->sortByDesc('end_duration')->first();
@endphp
@section('content')

<div class="row">
	<div class="col-lg-9 order-lg-2">
		
		{{-- ALERT --}}
		<div class="row mt-3">
			<div class="col-12">
				<div class="alert alert-danger mb-0">
					<h5 class="alert-heading font-weight-bold">IMPORTANT NOTICE</h5>
					<p><small>Please be sure to upload a resume and keep your profile up-to-date before apply to this job.</small>
					</p>
				</div>
			</div>
		</div>
		{{-- ALERT --}}

		{{-- RESUME --}}
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">Resume</div>
					<div class="card-body">
						Resume
					</div>
				</div>
			</div>
		</div>
		{{-- RESUME --}}

		{{-- PROFILE --}}
		<div class="row">
			<div class="col-12">
				<div class="card mt-3">
					<div class="card-header">
						<div class="row">
						<div class="col">Profile</div>
						<div class="col-2 text-right"><a class="btn btn-primary btn-sm" href="{{route('alumniprofile.view')}}">View / Edit</a></div>
						</div>
					</div>
					<div class="card-body text-justify">
						<div class="container">

							<div class="row">
								<div class="container">
									<div class="row m-0">
										<h4>Personal Info</h4>
									</div>
									<div class="row">
										<div class="col-12">
											<i class="fas fa-user-circle"></i>
											<b>
												@if($user->alumni->race === 'Malay')
													@if($user->gender == "M")
													{{ $user->firstname }} bin {{ $user->lastname }}
													@else
													{{ $user->firstname }} binti {{ $user->lastname }}
													@endif
												@elseif($user->alumni->race === 'Indian')
													@if($user->gender == "M")
													{{ $user->firstname }} A/L {{ $user->lastname }}
													@else
													{{ $user->firstname }} A/P {{ $user->lastname }}
													@endif
												@else
													{{ $user->firstname }} {{ $user->lastname }}
												@endif
											</b>
										</div>
										<div class="col-lg-6">
											@if($user->gender == "M")
											<i class="fas fa-mars"></i> Male
											@else
											<i class="fas fa-venus"></i> Female
											@endif
										</div>
										<div class="col-lg-6">
											<i class="fas fa-id-card"></i> {{ $user->alumni->identity_card }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-envelope"></i> {{ $user->email }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-phone"></i> {{ $user->alumni->phone }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-birthday-cake"></i> {{ date('d F Y', strtotime($user->alumni->birth_date)) }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-h-square"></i> {{ $user->alumni->birth_state }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-user"></i> {{ $user->alumni->race }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-hand-peace"></i> {{ $user->alumni->religion }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-venus-mars"></i> {{ $user->alumni->marriage_status }}
										</div>
										<div class="col-lg-6">
											<i class="fas fa-wheelchair"></i> 	
											@if($user->alumni->disability == 'Y')
												Yes
											@else
												No
											@endif
										</div>
										<div class="col-12">
											<i class="fas fa-address-book"></i> 
											{{ $user->alumni->address_1 .', '. $user->alumni->address_2 .', '. $user->alumni->postal .', '. $user->alumni->city .', '. $user->alumni->state .', '. $user->alumni->country }}
										</div>
									</div>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="container">
									<div class="row m-0">
										<h4>About Me</h4>
									</div>
						            <p>
						            	{{$user->alumni->about_me}}
						            </p>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="container my-2">
									<div class="row m-0">
										<h4>Working Experience</h4> 
									</div>
									<div class="timeline px-4">
										@if(count($user->alumni->works) > 0)
											@foreach($user->alumni->works->sortByDesc('end_duration') as $work)
												<div class="timeline-line text-muted "></div>
												<div class='row'>
													<div class="card-group m-3 mx-md-0 w-100">
														<svg class='timeline-icon text-secondary pull-left d-none d-md-block' width="8" height="8" viewBox="0 0 8 8"><path d="M0 0v8l4-4-4-4z" style="fill:#868E96;" transform="translate(2)" /></svg>
														<div class="card">
															<div class="card-body">
																<h4 class='text-capitalize'> {{ $work->position_title }}</h4>
																<h6 class='small text-muted'><i class="fas fa-briefcase"></i> {{ $work->position_level }}</h6>
																<h6 class='small text-muted'><i class="fas fa-list-alt"></i> {{ $work->job_category }}</h6>
																<h6 class='small text-muted'><i class="fas fa-building"></i> {{ $work->company_name }}</h6>
																<h6 class='small text-muted'><i class="fas fa-clock"></i> {{ $work->start_duration .' - '. $work->end_duration}}</h6>
																<h6 class='small text-muted'><i class="fas fa-dollar-sign"></i> RM{{ $work->salary }}</h6>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@else
											<h6><i class="fas fa-search"></i> I'm still searching for experience.</h6>
										@endif

										
									</div>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="container my-2">
									<div class="row m-0">
										<h4>Education</h4>
									</div>
									<div class="timeline px-4">
										@if(count($user->alumni->educations) > 0)
											@foreach($user->alumni->educations->sortByDesc('graduate_year') as $edu)
												<div class="timeline-line text-muted "></div>
												<div class='row'>
													<div class="card-group m-3 mx-md-0 w-100">
														<svg class='timeline-icon text-secondary pull-left d-none d-md-block' width="8" height="8" viewBox="0 0 8 8"><path d="M0 0v8l4-4-4-4z" style="fill:#868E96;" transform="translate(2)" /></svg>
														<div class="card">
															<div class="card-body">
																<h4 class='text-capitalize'>{{ $edu->major }}</h4>
																<h6 class='small text-muted'><i class="fas fa-book"></i> {{ $edu->education_level }}</h6>
																<h6 class='small text-muted'><i class="fas fa-university"></i> {{ $edu->institution }}</h6>
																<h6 class='small text-muted'><i class="fas fa-check"></i> {{ $edu->qualification_level }}</h6>
																<h6 class='small text-muted'><i class="fas fa-graduation-cap"></i> {{ $edu->graduate_month .' '. $edu->graduate_year}}</h6>
															</div>
														</div>
													</div>
												</div>
											@endforeach
										@else
											<h6><i class="fas fa-search"></i> I'm still searching for education.</h6>
										@endif
									</div>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="container my-2">
									<div class="row m-0">
										<h4>Skills & Expertise</h4>
									</div>
									@if(count($user->alumni->skills) > 0)
										@foreach($user->alumni->skills->sortBy('name') as $skill)
											<div class="row">
												<div class="col-6"><h6>{{ $skill->name }}</h6></div>
												<div class="col-6"><h6 class="text-muted text-right">{{ $skill->proficiency }}</h6></div>
											</div>
										@endforeach
									@else
										<h6 class="px-4"><i class="fas fa-search"></i> I'm still searching for skills and expertise.</h6>
									@endif
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="container my-2">
									<div class="row m-0">
										<h4>Language</h4>
									</div>
									@if(count($user->alumni->languages) > 0)
										@foreach($user->alumni->languages->sortBy('name') as $language)
											<div class="row">
												<div class="col-6"><h6>{{ $language->name }}</h6></div>
												<div class="col-6"><h6 class="text-muted text-right">{{ $language->proficiency }}</h6></div>
											</div>
										@endforeach
									@else
										<h6 class="px-4"><i class="fas fa-search"></i> I'm still searching for languages.</h6>
									@endif
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- PROFILE --}}

		<div class="row">
			<div class="col-12">
				<a class="col-12 btn btn-primary my-3" href="{{route('application.submit', Crypt::encrypt($job->id))}}" onclick="return confirm('Submit application?')"><i class="fas fa-edit"></i> Apply</a>
			</div>
		</div>
	</div>
	<div class="col-12 d-block d-lg-none">
		<hr>
	</div>
	<div class="col-lg-3 order-lg-1">
		<div class="card my-3">
			<div class="card-header border-secondary">
				<h5>
					Overview
				</h5>
			</div>
			
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li class="mb-3">Job: <br> <b>{{$job->title}}</b></li>
						<small>
							<li><b>Position Level:</b><br>{{$job->position_level}}</li>
							<li><b>Job Category:</b><br>{{$job->job_category}}</li>
							<li><b>Job Location:</b><br>{{$job->location_city .', '. $job->location_state}}</li>
							<li><b>Salary:</b><br>RM{{$job->salary_min . ' - RM' . $job->salary_max}}</li>
						</small>
					</ul>
				</li>
			
		</div>
		<div class="card my-3">
			<div class="card-header border-secondary">
				<h6>
					<a data-toggle="collapse" href="#descriptions">
						Descriptions
					</a>
				</h6>
			</div>
			<small class="collapse" id="descriptions">
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li>{{$job->descriptions}}</li>
					</ul>
				</li>
			</small>
		</div>
		<div class="card my-3">
			<div class="card-header border-secondary">
				<h6>
					<a data-toggle="collapse" href="#requirements">
						Requirements
					</a>
				</h6>
			</div>
			<small class="collapse" id="requirements">
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li>{{$job->requirements}}</li>
					</ul>
				</li>
			</small>
		</div>
		<div class="card my-3">
			<div class="card-header border-secondary">
				<h6>
					<a data-toggle="collapse" href="#responsibilities">
						Responsibilities
					</a>
				</h6>
			</div>
			<small class="collapse" id="responsibilities">
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li>{{$job->responsibilities}}</li>
					</ul>
				</li>
			</small>
		</div>
		<div class="card my-3">
			<div class="card-header border-secondary">
				<h6>
					<a data-toggle="collapse" href="#benefits">
						Benefits
					</a>
				</h6>
			</div>
			<small class="collapse" id="benefits">
				<li class="list-group-item">
					<ul class="p-0" style="list-style: none;">
						<li>{{$job->benefits}}</li>
					</ul>
				</li>
			</small>
		</div>
	</div>
</div>

@endsection