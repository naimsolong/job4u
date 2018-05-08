@extends('layouts.masterpage')

@section('title')
Update Profile
@endsection

@section('content')
<div class="row">
	<div class="col-12 text-justify">
		<div class="card my-3 p-3">
			<div class="container">
				<form method="post" action="{{route('employerprofile.update')}}">
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
												<input type="text" class="form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" placeholder="Update I/C Number" value="{{!empty($user->employer->identity_card)?$user->employer->identity_card:old('identity_card')}}" data-toggle="tooltip" data-placement="right" title="Please fill in only number with no dash (-).">

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
												<input type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Update Phone Number" value="{{!empty($user->employer->phone)?$user->employer->phone:old('phone')}}" data-toggle="tooltip" data-placement="right" title="Please fill in only number with no dash (-).">

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
												<input type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" placeholder="Update Birth Date" value="{{!empty($user->employer->birth_date)?$user->employer->birth_date:old('birth_date')}}">

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
													<span class="input-group-text"">Race</span>
												</div>

												<select class="form-control{{ $errors->has('race') ? ' is-invalid' : '' }}" name="race">
													<option value="" {{old('race')?'':'selected'}}>Choose Race</option>

													@if(!empty($user->employer->race))
													<option value="Malay" {{old('race')==='Malay'?'selected':$user->employer->race==='Malay'?'selected':''}}>Malay</option>
													<option value="Chinese" {{old('race')==='Chinese'?'selected':$user->employer->race==='Chinese'?'selected':''}}>Chinese</option>
													<option value="Indian" {{old('race')==='Indian'?'selected':$user->employer->race==='Indian'?'selected':''}}>Indian</option>
													<option value="Others" {{old('race')==='Others'?'selected':$user->employer->race==='Others'?'selected':''}}>Others</option>
													@else
													<option value="Malay" {{old('race')==='Malay'?'selected':''}}>Malay</option>
													<option value="Chinese" {{old('race')==='Chinese'?'selected':''}}>Chinese</option>
													<option value="Indian" {{old('race')==='Indian'?'selected':''}}>Indian</option>
													<option value="Others" {{old('race')==='Others'?'selected':''}}>Others</option>
													@endif
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

													@if(!empty($user->employer->race))
													<option value="Islam" {{old('religion')==='Islam'?'selected':$user->employer->religion==='Islam'?'selected':''}}>Islam</option>
													<option value="Christian" {{old('religion')==='Christian'?'selected':$user->employer->religion==='Christian'?'selected':''}}>Christian</option>
													<option value="IndHinduian" {{old('religion')==='Hindu'?'selected':$user->employer->religion==='Hindu'?'selected':''}}>Hindu</option>
													<option value="Buddha" {{old('religion')==='Buddha'?'selected':$user->employer->religion==='Buddha'?'selected':''}}>Buddha</option>
													<option value="Others" {{old('religion')==='Others'?'selected':$user->employer->religion==='Others'?'selected':''}}>Others</option>
													@else
													<option value="Islam" {{old('religion')==='Islam'?'selected':''}}>Islam</option>
													<option value="Christian" {{old('religion')==='Christian'?'selected':''}}>Christian</option>
													<option value="IndHinduian" {{old('religion')==='Hindu'?'selected':''}}>Hindu</option>
													<option value="Buddha" {{old('religion')==='Buddha'?'selected':''}}>Buddha</option>
													<option value="Others" {{old('religion')==='Others'?'selected':''}}>Others</option>
													@endif
												</select>

							                    @if ($errors->has('religion'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('religion') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6"></div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Current Position</span>
												</div>
												<input type="text" class="form-control{{ $errors->has('current_position') ? ' is-invalid' : '' }}" name="current_position" placeholder="Update Current Position" value="{{!empty($user->employer->current_position)?$user->employer->current_position:old('current_position')}}">

							                    @if ($errors->has('current_position'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('current_position') }}</strong>
							                        </span>
							                    @endif
											</div>
										</div>
										<div class="col-lg-6">
											<div class="input-group mb-3">
												<div class="input-group-prepend">
													<span class="input-group-text"">Employer Type</span>
												</div>

												<select class="custom-select{{ $errors->has('employer_type') ? ' is-invalid' : '' }}" name="employer_type">
													<option value="" {{old('employer_type')?'':'selected'}}>Choose Employer Type</option>

													@if(!empty($user->employer->employer_type))
													@foreach($employerType as $type)													
													<option value="{{$type->name}}" {{old('employer_type') == $type->name ? 'selected' : $user->employer->employer_type == $type->name ? 'selected' : ''}}>{{$type->name}}</option>
													@endforeach
													@else
													@foreach($employerType as $type)													
													<option value="{{$type->name}}" {{old('employer_type') == $type->name ? 'selected' : ''}}>{{$type->name}}</option>
													@endforeach
													@endif
												</select>

							                    @if ($errors->has('employer_type'))
							                        <span class="invalid-feedback">
							                            <strong>{{ $errors->first('employer_type') }}</strong>
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