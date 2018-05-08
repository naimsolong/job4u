@extends('layouts.masterpage_admin')

@section('title')
Verify Company
@endsection
@section('breadcrumb')
Verify Company
@endsection

@section('content')

<div class="row">
	<div class="col">
		<div class="page-categories">
			<div class="row justify-content-center text-center">
				<div class="col">
					<a href="{{route('admin.verifycompany', [Crypt::encrypt($company->id), Crypt::encrypt(0)])}}" class="btn btn-warning"><i class="material-icons">warning</i> Pending</a>
					<a href="{{route('admin.verifycompany', [Crypt::encrypt($company->id), Crypt::encrypt(1)])}}" class="btn btn-success"><i class="material-icons">verified_user</i> Verify</a>
				</div>
			</div>
			<h3 class="title text-center mb-1">{{$company->name}}</h3>
			<h5 class="text-center">( {{$company->ssm}} )</h5>
			<br />
			<ul class="nav nav-pills nav-pills-info nav-pills-icons justify-content-center" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#description" role="tablist">
						<i class="material-icons">info</i> Description
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#location" role="tablist">
						<i class="material-icons">location_on</i> Location
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#employer" role="tablist">
						<i class="material-icons">people</i> Employer
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#job" role="tablist">
						<i class="material-icons">work</i> Job Offered
					</a>
				</li>
			</ul>
			<div class="tab-content tab-space tab-subcategories pt-0">
				<div class="tab-pane active" id="description">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">About Us</h4>
							<p>
								{{$company->about_us}}
							</p>
						</div>
						<div class="card-body">
							
							<div class="row">
								<div class="col-lg-4 mb-2"><b>Industry:</b><br>{{$company->job_category}}</div>
								<div class="col-lg-4 mb-2"><b>Company Type:</b><br>{{$company->company_type}}</div>
								<div class="col-lg-4 mb-2"><b>Company Size:</b><br>{{$company->company_size}}</div>
								@if(!empty($company->dress_code))
								<div class="col-lg-4 mb-2"><b>Dress Code:</b><br>{{$company->dress_code}}</div>
								@endif
								<div class="col-lg-4 mb-2"><b>Working Hour:</b><br>{{$company->work_days .', '. $company->work_hours}}</div>
								<div class="col-12"><b>Website:</b><br>{{$company->website_url}}</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="location">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Location of company office</h4>
							<p class="card-category">
								Location of the Office
							</p>
						</div>
						<div class="card-body">
							<ul class="p-0" style="list-style: none;">
								<li>{{$company->address_1}}</li>
								<li>{{$company->address_2}}</li>
								<li>{{$company->postal .', '. $company->city}}</li>
								<li>{{$company->state}}</li>
								<li>{{$company->country}}</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="employer">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Employer Details</h4>
							<p class="card-category">
								Person in Charge of this Company
							</p>
						</div>
						<div class="card-body">
							
							<div class="row">
								<div class="col-12">
									<i class="fas fa-user-circle"></i>
									<b>
										{{ $company->employer->user->firstname . ' ' . $company->employer->user->lastname }}
									</b>
								</div>
								<div class="col-lg-6">
									@if($company->employer->user->gender == "M")
									<i class="fas fa-mars"></i> Male
									@else
									<i class="fas fa-venus"></i> Female
									@endif
								</div>
								<div class="col-lg-6">
									<i class="fas fa-id-card"></i> {{ $company->employer->identity_card }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-envelope"></i> {{ $company->employer->user->email }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-phone"></i> {{ $company->employer->phone }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-birthday-cake"></i> {{ date('d F Y', strtotime($company->employer->birth_date)) }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-user"></i> {{ $company->employer->race }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-hand-peace"></i> {{ $company->employer->religion }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-briefcase"></i> {{ $company->employer->current_position }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-building"></i> {{ $company->employer->employer_type }}
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="job">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Job Offered by Company</h4>
							<p class="card-category">
								All listing of job offered
							</p>
						</div>
						<div class="card-body">
							
							@foreach($company->jobs->sortByDesc('availability') as $job)
							<div class="row mx-0">
								<div class="card mt-3">
									<div class="card-body px-5">
										<div class="row">
											
											<div class="col">
												<h2>{{$job->title}}
													@switch($job->availability)
														@case(0)
															<small class="h5">( DRAFT )</small>
															@break
														@case(1)
															<small class="h5">( CLOSE )</small>
															@break
														@case(2)
															<small class="h5">( ACTIVE )</small>
															@break
													@endswitch
												</h2>
											</div>
											<div class="col-lg-3 px-0 text-lg-right">
												<h6><small>Posted on {{$job->created_at->format('d M Y')}}</small></h6>
											</div>
										</div>
										<div class="row my-1">
											<div class="col-lg">
												<span class="col-1 p-0"><i class="fas fa-dollar-sign"></i></span><span class="col-11">RM {{$job->salary_min}} - RM {{$job->salary_max}}</span>
											</div>
											<div class="col-lg">
												<span class="col-1 p-0"><i class="fas fa-male"></i></span><span class="col-11">{{$job->position_level}}</span>
											</div>
											<div class="col-lg">
												<span class="col-1 p-0"><i class="fas fa-map-marker"></i></span><span class="col-11">{{$job->location_city .', '. $job->location_state}}</span>
											</div>
										</div>
										<div class="row">
											<div class="col">
												{{str_limit($job->descriptions, 250)}}
											</div>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection