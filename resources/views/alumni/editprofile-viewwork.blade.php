@extends('layouts.masterpage')

@section('title')
Working Experience
@endsection

@section('content')
<div class="row">
	<div class="container my-2">
		<div class="row">
			<div class="col-9">
				<h4>
					<a href="{{route('alumniprofile.view')}}">Profile</a>
					<i class="fas fa-chevron-right"></i>
					Working Experience
				</h4>
			</div>
			<div class="col-3 text-right">
				<a href="{{route('alumniprofile.add.work')}}"><button class="btn btn-primary mr-3"><i class="fas fa-plus-circle"></i> Add</button></a>
			</div>
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
								<div class="row">
									<div class="col-md-8">
										<h4 class='text-capitalize'> {{ $work->position_title }}</h4
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
									<div class="col-md-4 text-right">
										<a href="{{route('alumniprofile.edit.work', Crypt::encrypt($work->id))}}"><button class="btn btn-primary mb-2"><i class="fas fa-edit"></i> Edit</button></a>
										<a href="{{route('alumniprofile.delete.work', Crypt::encrypt($work->id))}}" onclick="return confirm('Delete this working experience?\nWork: {{ $work->position_title }}')"><button class="btn btn-danger mb-2"><i class="fas fa-trash-alt"></i> Delete</button></a>
									</div>
								</div>
								
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
@endsection
