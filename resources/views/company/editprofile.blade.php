@extends('layouts.masterpage')

@section('title')
Edit Company Profile
@endsection

@section('content')

<div class="row py-3 justify-content-center">
	<div class="col-9 mb-3 text-center">
		<h3>Edit Company Details</h3>
	</div>
	<div class="col-lg-9">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{route('company.update')}}">
					{{ csrf_field() }}
					<div class="row">				
						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Company Name</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Enter Company Name" value="{{ $errors->any() ? old('name') : $company->name }}">

			                    @if ($errors->has('name'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('name') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">SSM Number</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('ssm') ? ' is-invalid' : '' }}" name="ssm" placeholder="Enter SSM Number" value="{{ $errors->any() ? old('ssm') : $company->ssm }}">

			                    @if ($errors->has('ssm'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('ssm') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Industry</span>
								</div>

								<select class="form-control{{ $errors->has('job_category') ? ' is-invalid' : '' }}" name="job_category" >
									
									<option value="" {{ old('job_category') ? '' : 'selected' }}>Select Industry</option>
									
									@if($errors->any())
										@foreach($jobCategories as $category)
											<option value="{{$category->name}}" {{ old('job_category') === $category->name ? 'selected' : '' }} >{{$category->name}}</option>
										@endforeach
									@else
										@foreach($jobCategories as $category)
											<option value="{{$category->name}}" {{ $company->job_category === $category->name ? 'selected' : '' }} >{{$category->name}}</option>
										@endforeach
									@endif

								</select>
								
			                    @if ($errors->has('job_category'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('job_category') }}</strong>
			                        </span>
			                    @endif

							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Company Type</span>
								</div>

								<select class="form-control{{ $errors->has('company_type') ? ' is-invalid' : '' }}" name="company_type" >
									
									<option value="" {{ old('company_type') ? '' : 'selected' }}>Select Company Type</option>
									
									@if($errors->any())
										@foreach($companyTypes as $type)
											<option value="{{$type->name}}" {{ old('company_type') === $type->name ? 'selected' : '' }} >{{$type->name}}</option>
										@endforeach
									@else
										@foreach($companyTypes as $type)
											<option value="{{$type->name}}" {{ $company->company_type === $type->name ? 'selected' : '' }} >{{$type->name}}</option>
										@endforeach
									@endif										

								</select>
								
			                    @if ($errors->has('company_type'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('company_type') }}</strong>
			                        </span>
			                    @endif

							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Company Size</span>
								</div>

								<select class="form-control{{ $errors->has('company_size') ? ' is-invalid' : '' }}" name="company_size" >
									
									<option value="" {{ old('company_size') ? '' : 'selected' }}>Select Company Size</option>
									
									
									@if($errors->any())
										@foreach($companySizes as $size)
											<option value="{{$size->name}}" {{ old('company_size') === $size->name ? 'selected' : '' }} >{{$size->name}}</option>
										@endforeach
									@else
										@foreach($companySizes as $size)
											<option value="{{$size->name}}" {{ $company->company_size === $size->name ? 'selected' : '' }} >{{$size->name}}</option>
										@endforeach
									@endif
										

								</select>
								
			                    @if ($errors->has('company_size'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('company_size') }}</strong>
			                        </span>
			                    @endif

							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Address 1</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('address_1') ? ' is-invalid' : '' }}" name="address_1" placeholder="Enter Address 1" value="{{ $errors->any() ? old('address_1') : $company->address_1 }}">

			                    @if ($errors->has('address_1'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('address_1') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Address 2</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('address_2') ? ' is-invalid' : '' }}" name="address_2" placeholder="Enter Address 2 (Optional)" value="{{ $errors->any() ? old('address_2') : $company->address_2 }}">

			                    @if ($errors->has('address_2'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('address_2') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">City</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="Enter City" value="{{ $errors->any() ? old('city') : $company->city }}">

			                    @if ($errors->has('city'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('city') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Postal</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" placeholder="Enter Postal" value="{{ $errors->any() ? old('postal') : $company->postal }}">

			                    @if ($errors->has('postal'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('postal') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">State</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" placeholder="Enter State" value="{{ $errors->any() ? old('state') : $company->state }}">

			                    @if ($errors->has('state'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('state') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Country</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" placeholder="Enter Country" value="{{ $errors->any() ? old('country') : $company->country }}">

			                    @if ($errors->has('country'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('country') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Dress Code</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('dress_code') ? ' is-invalid' : '' }}" name="dress_code" placeholder="Enter Dress Code (Default: Formal Dress)" value="{{ $errors->any() ? old('dress_code') : $company->dress_code }}">

			                    @if ($errors->has('dress_code'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('dress_code') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Working Days</span>
								</div>

								<select class="form-control{{ $errors->has('work_days') ? ' is-invalid' : '' }}" name="work_days" >
									
									<option value="" {{ old('work_days') ? '' : 'selected' }}>Select Working Days</option>

									@if($errors->any())
										<option value="Mon to Fri" {{ old('work_days') === 'Mon to Fri' ? 'selected' : '' }}>Mon to Fri</option>
										<option value="Sun to Thu" {{ old('work_days') === 'Sun to Thu' ? 'selected' : '' }}>Sun to Thu</option>
									@else
										<option value="Mon to Fri" {{ $company->work_days === 'Mon to Fri' ? 'selected' : '' }}>Mon to Fri</option>
										<option value="Sun to Thu" {{ $company->work_days === 'Sun to Thu' ? 'selected' : '' }}>Sun to Thu</option>
									@endif


								</select>
								
			                    @if ($errors->has('work_days'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('work_days') }}</strong>
			                        </span>
			                    @endif

							</div>
						</div>

						<div class="col-md-6">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Working Hours</span>
								</div>

								<select class="form-control{{ $errors->has('work_hours') ? ' is-invalid' : '' }}" name="work_hours" >
									
									<option value="" {{ old('work_hours') ? '' : 'selected' }}>Select Working Hours</option>


									@if($errors->any())
										<option value="8AM to 5PM" {{ old('work_hours') === '8AM to 5PM' ? 'selected' : '' }}>8AM to 5PM</option>
										<option value="9AM to 6PM" {{ old('work_hours') === '9AM to 6PM' ? 'selected' : '' }}>9AM to 6PM</option>
									@else
										<option value="8AM to 5PM" {{ $company->work_hours === '8AM to 5PM' ? 'selected' : '' }}>8AM to 5PM</option>
										<option value="9AM to 6PM" {{ $company->work_hours === '9AM to 6PM' ? 'selected' : '' }}>9AM to 6PM</option>
									@endif

										

								</select>
								
			                    @if ($errors->has('work_hours'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('work_hours') }}</strong>
			                        </span>
			                    @endif

							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">Company Website</span>
								</div>
								<input type="text" class="form-control{{ $errors->has('website_url') ? ' is-invalid' : '' }}" name="website_url" placeholder="Enter Company Website" value="{{ $errors->any() ? old('website_url') : $company->website_url }}">

			                    @if ($errors->has('website_url'))
			                        <span class="invalid-feedback">
			                            <strong>{{ $errors->first('website_url') }}</strong>
			                        </span>
			                    @endif
							</div>
						</div>

						<div class="col-12">
							<div class="input-group mb-3">
								<span class="input-group-text">Company Description</span>
							</div>

							<textarea id="summernote" type="text" class="form-control{{ $errors->has('about_us') ? ' is-invalid' : '' }}" name="about_us" placeholder="Enter Company Description">{!! $company->about_us !!}</textarea>

		                    @if ($errors->has('about_us'))
		                        <span class="invalid-feedback">
		                            <strong>{{ $errors->first('about_us') }}</strong>
		                        </span>
		                    @endif

							<div class="row">
								<div class="col"><span id="total-characters">0</span> Words</div>
							</div>
						</div>

						<div class="col-12 mt-3">
							<div class="input-group">
								<button type="submit" class="form-control btn btn-primary"><i class="fas fa-save"></i> Update</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection