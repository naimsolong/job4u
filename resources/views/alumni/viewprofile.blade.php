@extends('layouts.masterpage')

@section('title')
Profile
@endsection

@section('content')
<div class="row">
	<div class="col-lg-3 text-center">
		<div class="card my-3 p-2">
			<h4><i class="fas fa-user"></i> My Profile</h4>
			<ul id="navProfile" class="smooth-scroll list-group" style="list-style: none;">
				<li><a class="list-group-item" href="#personal">Personal Info</a></li>
				<li><a class="list-group-item" href="#aboutme">About Me</a></li>
				<li><a class="list-group-item" href="#working">Working Experience</a></li>
				<li><a class="list-group-item" href="#education">Education</a></li>
				<li><a class="list-group-item" href="#skills">Skills & Expertise</a></li>
				<li><a class="list-group-item" href="#language">Language</a></li>
			</ul>
		</div>
		<div class="card my-3 p-2">
			<h4>Resume</h4>
		</div>
	</div>
	<div class="col-lg-9 text-justify">
		<div id="personal" class="card my-3 p-3">
			<div class="container">
				<div class="row">
					<div class="container">
						<div class="row m-0">
							<h4>Personal Info</h4> <span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.edit.info')}}" style="border-radius: 50%;">Edit</a></span>
						</div>
						<div class="row">
							<div class="col-4 col-lg-2"><img src="{{asset('img/profile_picture.jpg')}}" class="img-thumbnail"></div>
							<div class="col-8 col-lg-10 m-0">
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
					</div>
				</div>
				<hr id="aboutme">
				<div class="row">
					<div class="container">
						<div class="row m-0">
							<h4>About Me</h4> <span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.edit.about')}}">Edit</a></span>
						</div>
			            <p>
			            	{!!$user->alumni->about_me!!}
			            </p>
					</div>
				</div>
				{{-- <hr id="graduate">
				<div class="row">
					<div class="container">
						<div class="row m-0">
							<h4>UTM Graduate</h4> <span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.edit.info')}}" style="border-radius: 50%;">Edit</a></span>
						</div>
						<div class="row">
							<div class="col-12 mt-2">
								<i class="fas fa-book"></i>
								<b>{{ $user->alumni->graduate->degree_type . ' of ' . $user->alumni->graduate->course_name }}</b>
							</div>
							<div class="col-12 mt-1">
								<i class="fas fa-university"></i> {{ $user->alumni->graduate->faculty }}
							</div>
							<div class="col-12 mt-1">
								<i class="fas fa-graduation-cap"></i> {{$user->alumni->graduate->graduate_month . ' ' .$user->alumni->graduate->graduate_year }}
							</div>
						</div>
					</div>
				</div> --}}
				<hr id="working">
				<div class="row">
					<div class="container my-2">
						<div class="row m-0">
							<h4>Working Experience</h4> 
							
							@if(count($user->alumni->works) > 0)
								<span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.view.work')}}">Edit</a></span>
							@else
								<span class="ml-auto"><a class="btn btn-primary btn-sm" href="{{route('alumniprofile.add.work')}}"><i class="fas fa-plus-circle"></i> Add</a></span>
							@endif
							
						</div>
						<div class="timeline px-4">
							@if(count($user->alumni->works) > 0)
								@foreach($user->alumni->works->sortByDesc('start_duration')->sortByDesc('end_duration') as $work)
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
													<h6 class='small text-muted'><i class="fas fa-clock"></i>	
														@if(empty($work->end_duration))
														{{ 'Started at ' . $work->start_duration }}
														@else
														{{ $work->start_duration .' - '. $work->end_duration }}
														@endif
													</h6>
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
				<hr id="education">
				<div class="row">
					<div class="container my-2">
						<div class="row m-0">
							<h4>Education</h4>

							@if(count($user->alumni->educations) > 0)
								<span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.view.edu')}}">Edit</a></span>
							@else
								<span class="ml-auto"><a class="btn btn-primary btn-sm" href="{{route('alumniprofile.add.edu')}}"><i class="fas fa-plus-circle"></i> Add</a></span>
							@endif
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
				<hr id="skills">
				<div class="row">
					<div class="container my-2">
						<div class="row m-0">
							<h4>Skills & Expertise</h4>

							@if(count($user->alumni->skills) > 0)
								<span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.view.skills')}}">Edit</a></span>
							@else
								<span class="ml-auto"><a class="btn btn-primary btn-sm" href="{{route('alumniprofile.add.skills')}}"><i class="fas fa-plus-circle"></i> Add</a></span>
							@endif
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
				<hr id="language">
				<div class="row">
					<div class="container my-2">
						<div class="row m-0">
							<h4>Language</h4>

							@if(count($user->alumni->languages) > 0)
								<span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('alumniprofile.view.lang')}}">Edit</a></span>
							@else
								<span class="ml-auto"><a class="btn btn-primary btn-sm" href="{{route('alumniprofile.add.lang')}}"><i class="fas fa-plus-circle"></i> Add</a></span>
							@endif
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

@include('widget.totop')
@endsection