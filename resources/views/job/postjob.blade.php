@extends('layouts.masterpage')

@section('title')
Post Job
@endsection

@section('content')

<div class="row py-3 justify-content-center">
	<div class="col-9 mb-3 text-center">
		<h3>Job Details</h3>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{route('job.save')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Title</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" placeholder="Enter Job Title" value="{{ old('title') }}">

			                    @if ($errors->has('title'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('title') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Position Level</span>
								</div>

								<select class="form-control{{ $errors->has('position_level') ? ' is-invalid' : '' }}" name="position_level" >
									<option value="" {{ $errors->has('position_level') ? 'selected' : '' }}>Select position level</option>
									@foreach($positionLevels as $level)
										<option value="{{$level->name}}" {{ old('position_level') === $level->name ? 'selected' : '' }} >{{$level->name}}</option>
									@endforeach
								</select>

			                    @if ($errors->has('position_level'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('position_level') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Job Category</span>
								</div>

								<select class="form-control{{ $errors->has('job_category') ? ' is-invalid' : '' }}" name="job_category" >
									<option value="" {{ $errors->has('job_category') ? 'selected' : '' }}>Select position level</option>
									@foreach($jobCategories as $category)
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

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Location</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('location_city') ? ' is-invalid' : '' }}" name="location_city" placeholder="Enter City" value="{{ old('location_city') }}">

								<input type="text" class="form-control{{ $errors->has('location_state') ? ' is-invalid' : '' }}" name="location_state" placeholder="Enter State" value="{{ old('location_state') }}">

			                    @if ($errors->has('location_city'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('location_city') }}</strong>
			                        </span>
			                    @endif

			                    @if ($errors->has('location_state'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('location_state') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Salary</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('salary_min') ? ' is-invalid' : '' }}" name="salary_min" placeholder="Enter Minimum Salary" value="{{ old('salary_min') }}">

								<input type="text" class="form-control{{ $errors->has('salary_max') ? ' is-invalid' : '' }}" name="salary_max" placeholder="Enter Maximum Salary" value="{{ old('salary_max') }}">

			                    @if ($errors->has('salary_min'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('salary_min') }}</strong>
			                        </span>
			                    @endif

			                    @if ($errors->has('salary_max'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('salary_max') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-1">
								<div>
									<span class="input-group-text">Requirements</span>
								</div>
							</div>
							<textarea  id="summernote-requirements" type="text" class="form-control{{ $errors->has('requirements') ? ' is-invalid' : '' }}" name="requirements" placeholder="Enter Job Requirements" >{{ old('requirements') }}</textarea>

		                    @if ($errors->has('requirements'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('requirements') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="col-12 mt-3">
							<div class="input-group mb-1">
								<div>
									<span class="input-group-text">Responsibilities</span>
								</div>
							</div>
							<textarea  id="summernote-responsibilities" type="text" class="form-control{{ $errors->has('responsibilities') ? ' is-invalid' : '' }}" name="responsibilities" placeholder="Enter Job Responsibilities">{{ old('responsibilities') }}</textarea>

		                    @if ($errors->has('responsibilities'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('responsibilities') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="col-12 mt-3">
							<div class="input-group mb-1">
								<div>
									<span class="input-group-text">Benefits</span>
								</div>
							</div>
							<textarea  id="summernote-benefits" type="text" class="form-control{{ $errors->has('benefits') ? ' is-invalid' : '' }}" name="benefits" placeholder="Enter Job Benefits">{{ old('benefits') }}</textarea>

		                    @if ($errors->has('benefits'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('benefits') }}</strong>
		                        </span>
		                    @endif
						</div>

						<div class="col-12 mt-3">
							<div class="input-group mb-1">
								<div>
									<span class="input-group-text">Descriptions</span>
								</div>
							</div>
							<textarea  id="summernote-descriptions" type="text" class="form-control{{ $errors->has('descriptions') ? ' is-invalid' : '' }}" name="descriptions" placeholder="Enter Job Descriptions">{{ old('descriptions') }}</textarea>

		                    @if ($errors->has('descriptions'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('descriptions') }}</strong>
		                        </span>
		                    @endif
		                    
						</div>

						<div class="col-12 mt-3">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Status</span>
								</div>
								
								<select class="form-control{{ $errors->has('availability') ? ' is-invalid' : '' }}" name="availability" >
									<option value="" {{ $errors->has('availability') ? 'selected' : '' }}>Select Status</option>
									<option value="2" {{ old('availability') === 2 ? 'selected' : '' }} >Active</option>
									<option value="0" {{ old('availability') === 0 ? 'selected' : '' }} >Draft</option>
								</select>

			                    @if ($errors->has('availability'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('availability') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group">
								<button type="submit" class="form-control btn btn-primary"><i class="fas fa-save"></i> Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection