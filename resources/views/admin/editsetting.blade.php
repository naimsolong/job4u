@extends('layouts.masterpage_admin')

@section('title')
Edit Setting
@endsection
@section('breadcrumb')
Edit Setting
@endsection

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-12 p-0">
				<form method="post" action="{{route('admin.updatesetting')}}">
					{{csrf_field()}}
					<table class="table">
						<tbody>
							<tr>
								<td>First Name</td>
								<td>
									<input type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" placeholder="Update first name" value="{{ $user->firstname }}">

		                            @if ($errors->has('firstname'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('firstname') }}</strong>
		                                </span>
		                            @endif
								</td>
							</tr>
							<tr>
								<td>Last Name</td>
								<td>
									<input type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" placeholder="Update last name" value="{{ $user->lastname }}">
									
		                            @if ($errors->has('lastname'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('lastname') }}</strong>
		                                </span>
		                            @endif
								</td>
							</tr>
							<tr>
								<td>Gender</td>
								<td>
									<select class="form-control" name="gender">
										@if($user->gender == "M")
											<option value="M" selected>Male</option>
											<option value="F">Female</option>
										@else
											<option value="M">Male</option>
											<option value="F" selected>Female</option>
										@endif
									</select>
								</td>
							</tr>
							<tr>
								<td>Username</td>
								<td>
									<input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" placeholder="Update username" value="{{ !$errors->has('username') ? $user->username : old('username') }}">
									
		                            @if ($errors->has('username'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('username') }}</strong>
		                                </span>
		                            @endif
		                        </td>
							</tr>
							<tr>
								<td>Email address</td>
								<td>
									<input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Update email" value="{{ !$errors->has('email') ? $user->email : old('email') }}">
									
		                            @if ($errors->has('email'))
		                                <span class="invalid-feedback">
		                                    <strong>{{ $errors->first('email') }}</strong>
		                                </span>
		                            @endif
								</td>
							</tr>
							<tr>
								<td></td>
								<td><button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button></td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>



@endsection