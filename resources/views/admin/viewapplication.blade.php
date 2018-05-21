@extends('layouts.masterpage_admin')

@section('title')
View Application
@endsection
@section('breadcrumb')
View Application
@endsection

@php
	$user = $application->alumni->user;
@endphp

@section('content')

<div class="row">
	<div class="col">
		<div class="page-categories">
			<h3 class="title text-center mb-1">{{$application->alumni->user->firstname . ' ' . $application->alumni->user->lastname}}</h3>
			<p class="text-center mb-0">Applied on: {{Carbon\Carbon::parse($application->created_at)->format('d M Y')}}</p>
			<br />


			<ul class="nav nav-pills nav-pills-info nav-pills-icons justify-content-center" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#status" role="tablist">
						<i class="material-icons">info</i> Status
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#details" role="tablist">
						<i class="material-icons">description</i> Details
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#employer" role="tablist">
						<i class="material-icons">work</i> Job Details
					</a>
				</li>
			</ul>


			<div class="tab-content tab-space tab-subcategories pt-0">
				<div class="tab-pane active" id="status">
					<div class="card">
						<div class="card-body">
							
							<div class="row">
								
								<div class="col-md-3">
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
								</div>


								@if($application->status > 2)
								<div class="col-md">

									<table class="table table-striped table-no-bordered table-hover">
										<tbody>
											<tr>
												<th width="30%;">Interview Location</th>
												<td>{{$application->interview_location}}</td>
											</tr>
											<tr>
												<th width="30%;">Interview Date</th>
												<td>{{Carbon\Carbon::parse($application->interview_datetime)->format('Y-m-d')}}</td>
											</tr>
											<tr>
												<th width="30%;">Interview Time</th>
												<td>{{Carbon\Carbon::parse($application->interview_datetime)->format('H:i:s')}}</td>
											</tr>
										</tbody>
									</table>
								</div>
								@endif
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="details">
					<div class="card">
						<div class="card-body">

							<div class="row py-3">

								<div class="col-lg-3 col-md-4">
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

										<div class="row">
											<div class="col-12">
												<div class="card mt-0">
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
												<div class="card mt-0">

													{{-- WORKING COLLAPSE --}}
													<div class="card-header">
														<h5 class="mb-0">
															<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#working">
													          Working Experiences
													        </button>
													    </h5>
													</div>
													<div id="working" class="collapse">
														<div class="card-body">
															<div class="container">
																	@if(count($user->alumni->works) > 0)
																		@foreach($user->alumni->works->sortByDesc('end_duration') as $work)
																			<div class='row'>
																				<div class="card-group mx-md-0 w-100">
																					<div class="card mt-0 mx-3">
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
													{{-- WORKING COLLAPSE --}}


													{{-- EDUCATION COLLAPSE --}}
													<div class="card-header">
														<h5 class="mb-0">
															<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#educations">
													          Educations
													        </button>
													    </h5>
													</div>
													<div id="educations" class="collapse">
														<div class="card-body p-3">
															<div class="container px-3">
																	@if(count($user->alumni->educations) > 0)
																		@foreach($user->alumni->educations->sortByDesc('graduate_year') as $edu)
																			<div class='row'>
																				<div class="card-group mx-md-0 w-100">
																					<div class="card mt-0 mx-3">
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
															<div class="container my-2">
																@if(count($user->alumni->skills) > 0)
																	@foreach($user->alumni->skills->sortBy('name') as $skill)
																		<div class="row mx-3">
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
															<div class="container my-2">
																@if(count($user->alumni->languages) > 0)
																	@foreach($user->alumni->languages->sortBy('name') as $language)
																		<div class="row mx-3">
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
													{{-- LANGUAGES COLLAPSE --}}

												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="employer">
					<div class="card">
						<div class="card-body">
							
							<div class="row">
								<div class="col-12">
									<div class="card mt-0">
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
									<div class="card mt-0">
										<div class="card-header">Descriptions</div>
										<div class="card-body text-justify">
											{!!$application->job->descriptions!!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card mt-0">
										<div class="card-header">Requirements</div>
										<div class="card-body">
											{!! $application->job->requirements !!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card mt-0">
										<div class="card-header">Responsiblity</div>
										<div class="card-body">
											{!!$application->job->responsibilities!!}
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card mt-0">
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
		</div>
	</div>
</div>
@endsection