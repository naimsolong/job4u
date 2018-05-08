@extends('layouts.masterpage')

@section('title')
Add Working Experience
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<h4>
				<a href="{{route('alumniprofile.view')}}">Profile</a>
				<i class="fas fa-chevron-right"></i>
				<a href="{{route('alumniprofile.view.work')}}">Working Experience</a>
				<i class="fas fa-chevron-right"></i>
				Add New
			</h4>

			
			<form method="post" action="{{route('alumniprofile.save.work')}}">
				{{ csrf_field() }}
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Position Title</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('position_title') ? ' is-invalid' : '' }}" name="position_title" placeholder="Add position title" value="{{ old('position_title') }}">

	                    @if ($errors->has('position_title'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('position_title') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Position Level</label>
					<div class="col-md-8">
						<select class="form-control{{ $errors->has('position_level') ? ' is-invalid' : '' }}" name="position_level" >
							<option value="" {{ $errors->has('position_level') ? 'selected' : '' }}>Select position level</option>
							@foreach($jobPositionLevel as $positionLevel)
								<option value="{{$positionLevel->name}}" {{ old('position_level') === $positionLevel->name ? 'selected' : '' }} >{{$positionLevel->name}}</option>
							@endforeach
						</select>

	                    @if ($errors->has('position_level'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('position_level') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Job Category</label>
					<div class="col-md-8">

						<select class="form-control{{ $errors->has('job_category') ? ' is-invalid' : '' }}" name="job_category" >
							<option value="" {{ $errors->has('job_category') ? 'selected' : '' }}>Select category</option>
							@foreach($jobCategory as $category)
								<option value="{{$category->name}}" {{ old('job_category') === $category->name ? 'selected' : '' }} >{{$category->name}}</option>
							@endforeach
						</select>

	                    @if ($errors->has('job_category'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('job_category') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Company Name</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" placeholder="Add company name">

	                    @if ($errors->has('company_name'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('company_name') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Year End</label>
					<div class="col-md-8">

						<select class="form-control{{ $errors->has('end_duration') ? ' is-invalid' : '' }}" name="end_duration" >
							<option value="" {{ $errors->has('end_duration') ? 'selected' : '' }}>Select year end</option>
							@for($year = Carbon\Carbon::now()->year; $year > Carbon\Carbon::now()->year-40; $year-=1)
								<option value="{{$year}}" {{ old('end_duration') == $year ? 'selected' : '' }} >{{$year}}</option>
							@endfor
						</select>

	                    @if ($errors->has('end_duration'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('end_duration') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Year Start</label>
					<div class="col-md-8">

						<select class="form-control{{ $errors->has('start_duration') ? ' is-invalid' : '' }}" name="start_duration" >
							<option value="" {{ $errors->has('start_duration') ? 'selected' : '' }}>Select year start</option>
							@for($year = Carbon\Carbon::now()->year; $year > Carbon\Carbon::now()->year-40; $year-=1)
								<option value="{{$year}}" {{ old('start_duration') == $year ? 'selected' : '' }} >{{$year}}</option>
							@endfor
						</select>

	                    @if ($errors->has('start_duration'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('start_duration') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Salary</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" placeholder="Add salary">

	                    @if ($errors->has('salary'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('salary') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12 offset-md-2">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection