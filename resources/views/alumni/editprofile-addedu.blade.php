@extends('layouts.masterpage')

@section('title')
Add Education
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<h4>
				<a href="{{route('alumniprofile.view')}}">Profile</a>
				<i class="fas fa-chevron-right"></i>
				<a href="{{route('alumniprofile.view.edu')}}">Education</a>
				<i class="fas fa-chevron-right"></i>
				Add New
			</h4>

			<form method="post" action="{{route('alumniprofile.save.edu')}}">
				{{ csrf_field() }}
				
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Major</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}" name="major" placeholder="Enter major name" value="{{old('major')}}">

	                    @if ($errors->has('major'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('major') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Education Level</label>
					<div class="col-md-8">
						<select class="form-control{{ $errors->has('education_level') ? ' is-invalid' : '' }}" name="education_level" >
							
							<option value="" {{ old('education_level') ? '' : 'selected' }}>Select education level</option>
							
							@foreach($eduLevel as $level)
								<option value="{{$level->name}}" {{ old('education_level') === $level->name ? 'selected' : '' }} >{{$level->name}}</option>
							@endforeach

						</select>
						
	                    @if ($errors->has('education_level'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('education_level') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Institute</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('institution') ? ' is-invalid' : '' }}" name="institution" placeholder="Enter institute name">
						
	                    @if ($errors->has('institution'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('institution') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Qualification Level</label>
					<div class="col-md-8">
						<select class="form-control{{ $errors->has('qualification_level') ? ' is-invalid' : '' }}" name="qualification_level" >
							
							<option value="" {{ old('qualification_level') ? '' : 'selected' }}>Select qualification level</option>
							
							@foreach($eduQualificationLevel as $level)
								<option value="{{$level->name}}" {{ old('qualification_level') === $level->name ? 'selected' : '' }} >{{$level->name}}</option>
							@endforeach

						</select>

	                    @if ($errors->has('qualification_level'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('qualification_level') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Graduate</label>
					<div class="col-md-8 input-group">
						<select class="form-control{{ $errors->has('graduate_month') ? ' is-invalid' : '' }}" name="graduate_month">

							<option value="" {{ old('graduate_month') ? '' : 'selected' }}>Select graduation month</option>

							@foreach($months as $month)
								<option value="{{$month}}"  {{ old('graduate_month') === $month ? 'selected' : '' }} >{{$month}}</option>
							@endforeach

						</select>


						<select class="form-control{{ $errors->has('graduate_year') ? ' is-invalid' : '' }}" name="graduate_year" >

							<option value="" {{ old('graduate_year') ? '' : 'selected' }}>Select graduation year</option>

							@for($year = Carbon\Carbon::now()->year; $year > Carbon\Carbon::now()->year-40; $year-=1)
								<option value="{{$year}}" {{ old('graduate_year') == $year ? 'selected' : '' }} >{{$year}}</option>
							@endfor

						</select>

	                    @if ($errors->has('graduate_month'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('graduate_month') }}</strong>
	                        </span>
	                    @endif


	                    @if ($errors->has('graduate_year'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('graduate_year') }}</strong>
	                        </span>
	                    @endif

					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-10 offset-md-2">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection