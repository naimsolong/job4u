@extends('layouts.masterpage')

@section('title')
Overview
@endsection

@php
	$user = $application->alumni->user;
@endphp

@section('content')

<div class="row my-3">
	<div class="col-8">
		<h3>Application's Status:</h3>
	</div>
	<div class="col-4 text-right d-none d-md-block">
		<h5 class="my-1">Action</h5>
	</div>
</div>
@switch($application->status)
	@case(1)
		@include('candidates.viewstatus-new')
		@break

	@case(2)
		@include('candidates.viewstatus-shortlist')
		@break

	@case(3)
		@include('candidates.viewstatus-interview')
		@break

	@case(4)
		@include('candidates.viewstatus-kiv')
		@break

	@case(5)
		@include('candidates.viewstatus-reject')
		@break

	@case(6)
		@include('candidates.viewstatus-hire')
		@break

	@default
		<div class="row">
			<div class="col-12">
				<div class="alert danger">SYSTEM ERROR</div>
			</div>
		</div>		
@endswitch
<hr>
<div class="row py-3">

	<div class="col-lg-3 col-md-4">
		<div class="d-md-none d-sm-block text-center mb-3">
			<h1>
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
			</h1>
        </div>
		<img src="{{asset('img/profile_picture.jpg')}}" class="img-fluid mb-3 mx-auto d-block">	
		<div class="card">

			<div class="card-header">
				<h5 class="mb-0">
					<b>
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#info">
				          Personal Information
				        </button>
			        </b>
			    </h5>
		    </div>
			<div  id="info" class="card-body collapse">
				<h6><b>IC Number</b></h6>
				<p>{{ $user->alumni->identity_card }}</p>
				<h6><b>Date of Birth</b></h6>
				<p>{{ date('d F Y', strtotime($user->alumni->birth_date)) }}</p>
				<h6><b>State of Birth</b></h6>
				<p>{{ $user->alumni->birth_state }}</p>
				<h6><b>Address</b></h6>
				<p>{{ $user->alumni->address_1 .', '. $user->alumni->address_2 }}
				<br>
					{{$user->alumni->postal .', '. $user->alumni->city}}
				<br>
					{{$user->alumni->state .', '. $user->alumni->country }}</p>
				<h6><b>Phone Number</b></h6>
				<p>{{ $user->alumni->phone }}</p>
				<h6><b>Email</b></h6>
				<p>{{ $user->email }}</p>
				<h6><b>Race</b></h6>
				<p>{{ $user->alumni->race }}</p>
				<h6><b>Religion</b></h6>
				<p>{{ $user->alumni->race }}</p>
				<h6><b>Disability</b></h6>
				<p class="mb-0">
					@if($user->alumni->disability == 'Y')
						Yes
					@else
						No
					@endif
				</p>
			</div>
		</div>
		<div class="card my-3 p-2">
			<h4>Resume</h4>
		</div>
	</div>
	<div class="col-lg-9 col-md-8 p-0">
		<div class="container">

			<div class="row d-md-block d-none ">
				<div class="col-12">
					<h1>
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
					</h1>
	            </div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h4>Objective</h4>
				            <p class="mb-0">
				            	{!!$user->alumni->about_me!!}
				            </p>
						</div>
					</div>
	            </div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="card my-3">

						{{-- WORKING COLLAPSE --}}
						<div class="card-header">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#working">
						          Working Experiences
						        </button>
						    </h5>
						</div>
						<div id="working" class="collapse">
							<div class="card-body p-3">
								<div class="container">
									<div class="row">
										<div class="container my-2">
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
													<h6>I don't have any working experience.</h6>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- WORKING COLLAPSE --}}


						{{-- EDUCATION COLLAPSE --}}
						<div class="card-header">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#educations">
						          Educations
						        </button>
						    </h5>
						</div>
						<div id="educations" class="collapse"\>
							<div class="card-body p-3">
								<div class="container">
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
													<h6>I don't have any education.</h6>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- EDUCATION COLLAPSE --}}


						{{-- SKILLS COLLAPSE --}}
						<div class="card-header">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#skills">
						          Skills & Expertise
						        </button>
						    </h5>
						</div>
						<div id="skills" class="collapse">
							<div class="card-body p-3">
								<div class="container">
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
												<h6 class="px-4">I don't have any skills and expertise.</h6>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- SKILLS COLLAPSE --}}


						{{-- LANGUAGES COLLAPSE --}}
						<div class="card-header">
							<h5 class="mb-0">
								<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#languages">
						          Languages
						        </button>
						    </h5>
						</div>
						<div id="languages" class="collapse" aria-labelledby="headingTwo">
							<div class="card-body p-3">
								<div class="container">
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
												<h6 class="px-4">I don't know any languages.</h6>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
						{{-- LANGUAGES COLLAPSE --}}

					</div>
				</div>
			</div>

		</div>
	</div>
</div>

@endsection