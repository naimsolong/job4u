@extends('layouts.masterpage')

@section('title')
Education
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<div class="row">
				<div class="col-9">
					<h4>
						<a href="{{route('alumniprofile.view')}}">Profile</a>
						<i class="fas fa-chevron-right"></i>
						Education
					</h4>
				</div>
				<div class="col-3 text-right">
					<a href="{{route('alumniprofile.add.edu')}}"><button class="btn btn-primary mr-3"><i class="fas fa-plus-circle"></i> Add</button></a>
				</div>
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
									<div class="row">
										<div class="col-md-8">
											<h4 class='text-capitalize'>{{ $edu->major }}</h4>
												<h6 class='small text-muted'><i class="fas fa-book"></i> {{ $edu->education_level }}</h6>
												<h6 class='small text-muted'><i class="fas fa-university"></i> {{ $edu->institution }}</h6>
												<h6 class='small text-muted'><i class="fas fa-check"></i> {{ $edu->qualification_level }}</h6>
												<h6 class='small text-muted'><i class="fas fa-graduation-cap"></i> {{ $edu->graduate_month .' '. $edu->graduate_year}}</h6>
										</div>
										<div class="col-md-4 text-right">
											<a href="{{route('alumniprofile.edit.edu', Crypt::encrypt($edu->id))}}"><button class="btn btn-primary mb-2"><i class="fas fa-edit"></i> Edit</button></a>
											<a href="{{route('alumniprofile.delete.edu', Crypt::encrypt($edu->id))}}" onclick="return confirm('Delete this education?\nWork: {{ $edu->major }}')"><button class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i> Delete</button></a>
										</div>
									</div>
									
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
@endsection