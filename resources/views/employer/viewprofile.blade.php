@extends('layouts.masterpage')

@section('title')
Profile
@endsection

@section('content')
<div class="row">
	<div class="card my-3 p-3">
		<div class="container">
			<div class="row">
				<div class="container">
					<div class="row m-0">
						<h4>Profile</h4> <span class="ml-auto"><a class="btn btn-default btn-sm" href="{{route('employerprofile.edit')}}">Edit</a></span>
					</div>
					<div class="row">
						<div class="col-4 col-lg-2"><img src="{{asset('img/profile_picture.jpg')}}" class="img-thumbnail" style="border-radius: 50%;"></div>
						<div class="col-8 col-lg-10 m-0">
							<div class="row">
								<div class="col-12">
									<i class="fas fa-user-circle"></i>
									<b>
										@if($user->employer->race === 'Malay')
											@if($user->gender == "M")
											{{ $user->firstname }} bin {{ $user->lastname }}
											@else
											{{ $user->firstname }} binti {{ $user->lastname }}
											@endif
										@elseif($user->employer->race === 'Indian')
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
									<i class="fas fa-id-card"></i> {{ $user->employer->identity_card }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-envelope"></i> {{ $user->email }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-phone"></i> {{ $user->employer->phone }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-birthday-cake"></i> {{ date('d F Y', strtotime($user->employer->birth_date)) }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-user"></i> {{ $user->employer->race }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-hand-peace"></i> {{ $user->employer->religion }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-briefcase"></i> {{ $user->employer->current_position }}
								</div>
								<div class="col-lg-6">
									<i class="fas fa-building"></i> {{ $user->employer->employer_type }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@include('widget.totop')
@endsection