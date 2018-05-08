@extends('layouts.masterpage')

@section('title')
Edit Personal Info
@endsection

@section('content')
	<div class="row">
		<div class="container">
		    <h4>
		      <a href="{{route('alumniprofile.view')}}">Profile</a>
		      <i class="fas fa-chevron-right"></i>
		      Personal Info
		    </h4>
			<div class="row">
				<div class="col-sm-4 col-lg-2">
					
					<div class="profile-pic" style="background-image: url('{{asset('img/profile_picture.jpg')}}')"  style="border-radius: 50%;">
						<span>
							<input type="file" class="c" id="customFile" style="display: none;">
							<label class="custom-fel" for="customFile"><i class="fas fa-upload"></i> Change Image</label>
						</span>

					</div>

				</div>
				<div class="col-sm-8 col-lg-10 m-0">
					<form method="post" action="{{route('alumniprofile.update.info')}}">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-12">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text""><i class="fas fa-user-circle"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" placeholder="Update first name" value="{{ $errors->has('firstname') ? old('firstname') : $user->firstname }}">
									<input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" placeholder="Update last name" value="{{ $errors->has('lastname') ? old('lastname') : $user->lastname }}">

		                            @if ($errors->has('firstname'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('firstname') }}</strong>
		                                </span>
		                            @endif
		                            @if ($errors->has('lastname'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('lastname') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">
											@if($user->gender == 'M')
												<i class="fas fa-mars"></i>
											@else
												<i class="fas fa-venus"></i>
											@endif
										</span>
									</div>
									<select class="form-control" name="gender">
										@if($user->gender == 'M')
											<option value="M" selected>Male</option>
											<option value="F">Female</option>
										@elseif($user->gender == 'F')
											<option value="M">Male</option>
											<option value="F" selected>Female</option>
										@else
											<option value="M">Male</option>
											<option value="F">Female</option>
										@endif
									</select>
		                            @if ($errors->has('gender'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('gender') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text""><i class="fas fa-id-card"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" placeholder="Update identity card number" value="{{ $errors->has('identity_card') ? old('identity_card') : $user->alumni->identity_card }}">

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
										<span class="input-group-text""><i class="fas fa-envelope"></i></span>
									</div>
									<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Update email" value="{{ $errors->has('email') ? old('email') : $user->email }}">

		                            @if ($errors->has('email'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('email') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text""><i class="fas fa-phone"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Update phone number" value="{{ $errors->has('phone') ? old('phone') : $user->alumni->phone }}">

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
										<span class="input-group-text""><i class="fas fa-birthday-cake"></i></span>
									</div>
									<input type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" placeholder="Update birth date" value="{{ $errors->has('birth_date') ? old('birth_date') : date('Y-m-d', strtotime($user->alumni->birth_date)) }}">

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
										<span class="input-group-text""><i class="fas fa-h-square"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('birth_state') ? ' is-invalid' : '' }}" name="birth_state" placeholder="Update birth state" value="{{ $errors->has('birth_state') ? old('birth_state') : $user->alumni->birth_state }}">

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
										<span class="input-group-text""><i class="fas fa-user"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race" placeholder="Update race" value="{{ $errors->has('race') ? old('race') : $user->alumni->race }}">

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
										<span class="input-group-text""><i class="fas fa-hand-peace"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('religion') ? ' is-invalid' : '' }}" name="religion" placeholder="Update religion" value="{{ $errors->has('religion') ? old('religion') : $user->alumni->religion }}">

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
										<span class="input-group-text""><i class="fas fa-venus-mars"></i></span>
									</div>
									<select class="form-control" name="marriage_status">
										@if($user->alumni->marriage_status == 'Single')
											<option value="Single" selected>Single</option>
											<option value="Married">Married</option>
										@elseif($user->alumni->marriage_status == 'Married')
											<option value="Single">Single</option>
											<option value="Married" selected>Married</option>
										@else
											<option value="Single">Single</option>
											<option value="Married">Married</option>
										@endif
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
										<span class="input-group-text""><i class="fas fa-wheelchair"></i></span>
									</div>
									<select class="form-control" name="disability">
										@if($user->alumni->disability == 'Y')
											<option value="Y" selected>Yes</option>
											<option value="N">No</option>
										@elseif($user->alumni->disability == 'N')
											<option value="Y">Yes</option>
											<option value="N" selected>No</option>
										@else
											<option value="Y">Yes</option>
											<option value="N">No</option>
										@endif
									</select>

		                            @if ($errors->has('disability'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('disability') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>
							<div class="col-12">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('address_1') ? ' is-invalid' : '' }}" name="address_1" placeholder="Update first line address" value="{{ $errors->has('address_1') ? old('address_1') : $user->alumni->address_1 }}">

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
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('address_2') ? ' is-invalid' : '' }}" name="address_2" placeholder="Update second line address" value="{{ $errors->has('address_2') ? old('address_2') : $user->alumni->address_2 }}">

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
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('postal') ? ' is-invalid' : '' }}" name="postal" placeholder="Update postcode" value="{{ $errors->has('postal') ? old('postal') : $user->alumni->postal }}">

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
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" placeholder="Update city" value="{{ $errors->has('city') ? old('city') : $user->alumni->city }}">

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
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" placeholder="Update state" value="{{ $errors->has('state') ? old('state') : $user->alumni->state }}">

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
										<span class="input-group-text""><i class="fas fa-address-book"></i></span>
									</div>
									<input type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" placeholder="Update country" value="{{ $errors->has('country') ? old('country') : $user->alumni->country }}">

		                            @if ($errors->has('country'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('country') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>
							<div class="col-lg-6">
								<button type="submit" name="submit" class="btn btn-primary mb-3"><i class="fas fa-save"></i> Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection