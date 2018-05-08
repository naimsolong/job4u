@extends('layouts.masterpage')

@section('title')
Update Profile
@endsection

@section('content')
<div class="row">
	<div class="col-12 text-justify">
		<div class="card my-3 p-3">
			<div class="container">
				<form method="post" action="{{route('alumniprofile.update')}}">
					{{ csrf_field() }}
					
					{{-- Personal Info --}}
					<div class="row">
						<div class="container">
							<div class="row m-0">
								<h4>Personal Info</h4>
							</div>
							<div class="row">
								<div class="col-lg-2 mb-3"><img src="{{asset('img/profile_picture.jpg')}}" class="img-thumbnail" style="border-radius: 50%;"></div>
								<div class="col-lg-10 m-0">
									<div class="row">
										<div class="col-lg-6 mb-3">
											<i class="fas fa-user-circle"></i>
											<b>
												@if($user->gender == "M")
												{{ $user->firstname }} bin {{ $user->lastname }}
												@else
												{{ $user->firstname }} binti {{ $user->lastname }}
												@endif
											</b>
											@if($user->gender == "M")
											(Male)
											@else
											(Female)
											@endif
										</div>
										<div class="col-lg-6 mb-3">
											<i class="fas fa-envelope"></i> {{ $user->email }}
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">I/C Number</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" placeholder="Update I/C Number" value="{{old('identity_card')}}" data-toggle="tooltip" data-placement="right" title="Please fill in only number with no dash (-).">

							                    @if ($errors->has('identity_card'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('identity_card') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Phone Number</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Update Phone Number" value="{{old('phone')}}" data-toggle="tooltip" data-placement="right" title="Please fill in only number with no dash (-).">

							                    @if ($errors->has('phone'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('phone') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Birth Date</span>
												</div>
												<input type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" placeholder="Update Birth Date" value="{{old('birth_date')}}">

							                    @if ($errors->has('birth_date'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('birth_date') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Birth State</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('birth_state') ? ' is-invalid' : '' }}" name="birth_state" placeholder="Update Birth State" value="{{old('birth_state')}}">

							                    @if ($errors->has('birth_state'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('birth_state') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Race</span>
												</div>

												<select class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race">
													<option value="" {{old('race')?'':'selected'}}>Choose Race</option>
													<option value="Malay" {{old('race')==='Malay'?'selected':''}}>Malay</option>
													<option value="Chinese" {{old('race')==='Chinese'?'selected':''}}>Chinese</option>
													<option value="Indian" {{old('race')==='Indian'?'selected':''}}>Indian</option>
													<option value="Others" {{old('race')==='Others'?'selected':''}}>Others</option>
												</select>

							                    @if ($errors->has('race'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('race') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Religion</span>
												</div>

												<select class="custom-select{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion">
													<option value="" {{old('religion')?'':'selected'}}>Choose Religion</option>
													<option value="Islam" {{old('religion')==='Islam'?'selected':''}}>Islam</option>
													<option value="Christian" {{old('religion')==='Christian'?'selected':''}}>Christian</option>
													<option value="IndHinduian" {{old('religion')==='Hindu'?'selected':''}}>Hindu</option>
													<option value="Buddha" {{old('religion')==='Buddha'?'selected':''}}>Buddha</option>
													<option value="Others" {{old('religion')==='Others'?'selected':''}}>Others</option>
												</select>

							                    @if ($errors->has('religion'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('religion') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Marriage Status</span>
												</div>

												<select class="custom-select{{ $errors->has('marriage_status') ? ' is-invalid' : '' }}" name="marriage_status">
													<option value="" {{old('marriage_status')?'':'selected'}}>Choose Marriage Status</option>
													<option value="Malay" {{old('marriage_status')==='Malay'?'selected':''}}>Single</option>
													<option value="Married" {{old('marriage_status')==='Married'?'selected':''}}>Married</option>
												</select>

							                    @if ($errors->has('marriage_status'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('marriage_status') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Disability</span>
												</div>

												<select class="custom-select{{ $errors->has('disability') ? ' is-invalid' : '' }}" name="disability">
													<option value="" {{old('disability')?'':'selected'}}>Choose Disability</option>
													<option value="Y" {{old('disability')==='Y'?'selected':''}}>Yes</option>
													<option value="N" {{old('disability')==='N'?'selected':''}}>No</option>
												</select>

							                    @if ($errors->has('disability'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('disability') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Line Address 1</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('address_1') ? ' is-invalid' : '' }}" name="address_1" placeholder="Update Line Address 1" value="{{old('address_1')}}">

							                    @if ($errors->has('address_1'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('address_1') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3" data-toggle="tooltip" data-placement="right" title="Optional.">
												<div class="input-group-prepend">
													<span class="input-group-text"">Line Address 2</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('address_2') ? ' is-invalid' : '' }}" name="address_2" placeholder="Update Line Address 2" value="{{old('address_2')}}">

							                    @if ($errors->has('address_2'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('address_2') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">City</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="Update City" value="{{old('city')}}">

							                    @if ($errors->has('city'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('city') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Postal</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" placeholder="Update Postal" value="{{old('postal')}}" data-toggle="tooltip" data-placement="right" title="Please fill in five digit number only.">

							                    @if ($errors->has('postal'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('postal') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">State</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" placeholder="Update State" value="{{old('state')}}">

							                    @if ($errors->has('state'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('state') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Country</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" placeholder="Update Country" value="{{old('country')}}">

							                    @if ($errors->has('country'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('country') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Personal Info --}}

					<hr>

					{{-- About Me --}}
					<div class="row">
						<div class="container">
							<div class="row m-0">
								<h4>About Me</h4>
							</div>
							<p><small>* more than 200 words</small></p>
							
							<div class="form-group">
								<textarea id="summernote" class="form-control{{ $errors->has('about_me') ? ' is-invalid' : '' }}" rows="10" name="about_me" placeholder="Update About Me">{{old('about_me')}}</textarea>

								@if ($errors->has('about_me'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('about_me') }}</strong>
								</span>
								@endif

								<div class="row">
									<div class="col"><span id="total-characters">0</span> Words</div>
								</div>
							</div>

						</div>
					</div>
					{{-- About Me --}}

					<hr>

					{{-- Working Experience --}}
					<div class="row">
						<div class="container my-2">
							<div class="row m-0">
								<h4>Working Experience
								</h4>
							</div>
							<p><small>* Leave this section empty if doesn't have working experience</small></p>
							<div class="row">
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Position Title</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('position_title') ? ' is-invalid' : '' }}" name="position_title" placeholder="Update Position Title" value="{{old('position_title')}}">

					                    @if ($errors->has('position_title'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('position_title') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Position Level</span>
										</div>

										<select class="form-control{{ $errors->has('position_level') ? ' is-invalid' : '' }}" name="position_level" >
											<option value="" {{ $errors->has('position_level') ? 'selected' : '' }}>Select Position Level</option>
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Company Name</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" placeholder="Update Company Name" value="{{old('company_name')}}">

						                    @if ($errors->has('company_name'))
						                        <span class="invalid-feedback">
						                            <strong>{{ $errors->first('company_name') }}</strong>
						                        </span>
						                    @endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Job Category</span>
										</div>
										<select class="form-control{{ $errors->has('job_category') ? ' is-invalid' : '' }}" name="job_category" >
											<option value="" {{ $errors->has('job_category') ? 'selected' : '' }}>Select Job Category</option>
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Year Start</span>
										</div>
										
										<select class="form-control{{ $errors->has('start_duration') ? ' is-invalid' : '' }}" name="start_duration" >
											<option value="" {{ $errors->has('start_duration') ? 'selected' : '' }}>Select Year Start</option>
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Year End</span>
										</div>

										<select class="form-control{{ $errors->has('end_duration') ? ' is-invalid' : '' }}" name="end_duration" >
											<option value="" {{ $errors->has('end_duration') ? 'selected' : '' }}>Select Year End</option>
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Monthly Salary</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" placeholder="Update Monthly Salary" value="{{old('salary')}}" data-toggle="tooltip" data-placement="right" title="Please fill in only digit number.">

					                    @if ($errors->has('salary'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('salary') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Working Experience --}}
					
					<hr>

					{{-- Education --}}
					<div class="row">
						<div class="container my-2">
							<div class="row m-0">
								<h4>Education</h4>
								<p><small>* required</small></p>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Major</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}" name="major" placeholder="Update Major" value="{{old('major')}}">

					                    @if ($errors->has('major'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('major') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Education Level</span>
										</div>
										
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Institution</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('institution') ? ' is-invalid' : '' }}" name="institution" placeholder="Update Institution" value="{{old('institution')}}">

					                    @if ($errors->has('institution'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('institution') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Qualification Level</span>
										</div>
										
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
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Graduate Month</span>
										</div>
										<select class="form-control{{ $errors->has('graduate_month') ? ' is-invalid' : '' }}" name="graduate_month">

											<option value="" {{ old('graduate_month') ? '' : 'selected' }}>Select graduation month</option>

											@foreach($months as $month)
												<option value="{{$month}}"  {{ old('graduate_month') === $month ? 'selected' : '' }} >{{$month}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('graduate_month'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('graduate_month') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Graduate Year</span>
										</div>
										<select class="form-control{{ $errors->has('graduate_year') ? ' is-invalid' : '' }}" name="graduate_year" >

											<option value="" {{ old('graduate_year') ? '' : 'selected' }}>Select graduation year</option>

											@for($year = Carbon\Carbon::now()->year; $year > Carbon\Carbon::now()->year-40; $year-=1)
												<option value="{{$year}}" {{ old('graduate_year') == $year ? 'selected' : '' }} >{{$year}}</option>
											@endfor

										</select>

					                    @if ($errors->has('graduate_year'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('graduate_year') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Education --}}
					
					<hr>

					{{-- Skills and Expertise --}}
					<div class="row">
						<div class="container my-2">
							<div class="row m-0">
								<h4>Skills & Expertise</h4>
							</div>
							<p><small>* required only 1 skill</small></p>
							<div class="row">
								<div class="col-12">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Skills #1</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('skillName_1') ? ' is-invalid' : '' }}" name="skillName_1" placeholder="Update Skill Name #1" value="{{old('skillName_1')}}">

										<select class="form-control{{ $errors->has('skillProficiency_1') ? ' is-invalid' : '' }}" name="skillProficiency_1" >

											<option value="" {{ old('skillProficiency_1') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('skillProficiency_1') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('skillName_1'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillName_1') }}</strong>
					                        </span>
					                    @endif
					                    @if ($errors->has('skillProficiency_1'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillProficiency_1') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-12">
									<div class="input-group mb-3" data-toggle="tooltip" data-placement="right" title="Optional.">
										<div class="input-group-prepend">
											<span class="input-group-text"">Skills #2</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('skillName_2') ? ' is-invalid' : '' }}" name="skillName_2" placeholder="Update Skill Name #2" value="{{old('skillName_2')}}">
										
										<select class="form-control{{ $errors->has('skillProficiency_2') ? ' is-invalid' : '' }}" name="skillProficiency_2" >

											<option value="" {{ old('skillProficiency_2') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('skillProficiency_2') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('skillName_2'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillName_2') }}</strong>
					                        </span>
					                    @endif

					                    @if ($errors->has('skillProficiency_2'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillProficiency_2') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-12">
									<div class="input-group mb-3" data-toggle="tooltip" data-placement="right" title="Optional.">
										<div class="input-group-prepend">
											<span class="input-group-text"">Skills #3</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('skillName_3') ? ' is-invalid' : '' }}" name="skillName_3" placeholder="Update Skill Name #3" value="{{old('skillName_3')}}">
										
										<select class="form-control{{ $errors->has('skillProficiency_3') ? ' is-invalid' : '' }}" name="skillProficiency_3" >

											<option value="" {{ old('skillProficiency_3') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('skillProficiency_3') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('skillName_3'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillName_3') }}</strong>
					                        </span>
					                    @endif

					                    @if ($errors->has('skillProficiency_3'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('skillProficiency_3') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Skills and Expertise --}}
					
					<hr>

					{{-- Language --}}
					<div class="row">
						<div class="container my-2">
							<div class="row m-0">
								<h4>Language</h4>
							</div>
							<p><small>* required only 1 language</small></p>
							<div class="row">
								<div class="col-12">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"">Language #1</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('langName_1') ? ' is-invalid' : '' }}" name="langName_1" placeholder="Update Language Name #1" value="{{old('langName_1')}}">
										
										<select class="form-control{{ $errors->has('langProficiency_1') ? ' is-invalid' : '' }}" name="langProficiency_1" >

											<option value="" {{ old('langProficiency_1') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('langProficiency_1') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('langName_1'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langName_1') }}</strong>
					                        </span>
					                    @endif
					                    @if ($errors->has('langProficiency_1'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langProficiency_1') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-12">
									<div class="input-group mb-3" data-toggle="tooltip" data-placement="right" title="Optional.">
										<div class="input-group-prepend">
											<span class="input-group-text"">Language #2</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('langName_2') ? ' is-invalid' : '' }}" name="langName_2" placeholder="Update Language Name #2" value="{{old('langName_2')}}">
										
										<select class="form-control{{ $errors->has('langProficiency_2') ? ' is-invalid' : '' }}" name="langProficiency_2" >

											<option value="" {{ old('langProficiency_2') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('langProficiency_2') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('langName_2'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langName_2') }}</strong>
					                        </span>
					                    @endif
					                    @if ($errors->has('langProficiency_2'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langProficiency_2') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
								<div class="col-12">
									<div class="input-group mb-3" data-toggle="tooltip" data-placement="right" title="Optional.">
										<div class="input-group-prepend">
											<span class="input-group-text"">Language #3</span>
										</div>
										<input type="text" class="form-control{{ $errors->has('langName_3') ? ' is-invalid' : '' }}" name="langName_3" placeholder="Update Language Name #3" value="{{old('langName_3')}}">
										
										<select class="form-control{{ $errors->has('langProficiency_3') ? ' is-invalid' : '' }}" name="langProficiency_3" >

											<option value="" {{ old('langProficiency_3') ? '' : 'selected' }}>Select Proficiency</option>
											
											@foreach($proficiencies as $proficiency)
												<option value="{{$proficiency->name}}" {{ old('langProficiency_3') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
											@endforeach

										</select>

					                    @if ($errors->has('langName_3'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langName_3') }}</strong>
					                        </span>
					                    @endif
					                    @if ($errors->has('langProficiency_3'))
					                        <span class="invalid-feedback">
					                            <strong>{{ $errors->first('langProficiency_3') }}</strong>
					                        </span>
					                    @endif
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- Language --}}

					{{-- Button --}}
					<div class="row">
						<div class="col-12">
							<div class="input-group mb-3">
								<button type="submit" class="btn btn-primary ml-auto"><i class="fas fa-save"></i> Update</button>
							</div>
						</div>
					</div>
					{{-- Button --}}

				</form>
			</div>
		</div>
	</div>
</div>

@include('widget.totop')
@endsection