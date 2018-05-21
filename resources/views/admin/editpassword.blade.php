@extends('layouts.masterpage_admin')

@section('title')
Change Password
@endsection
@section('breadcrumb')
Change Password
@endsection

@section('content')
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-12 p-0">
				<form method="POST" action="{{route('admin.updatepassword')}}">
					{{csrf_field()}}
					<table class="table">
						<tbody>
							<tr>
								<td>Current Password</td>
								<td>
									<input type="password" class="form-control{{ $errors->has('current_password') || Session::has('check_password') ? ' is-invalid' : '' }}" name="current_password" placeholder="Enter Current Password" required>

		                            @if(Session::has('check_password'))
										<span class="invalid-feedback">
											<strong>{{ session('check_password') }}</strong>
		                                </span>
		                            @endif
		                            @if($errors->has('current_password'))
		                                <span class="invalid-feedback">
		                                	@foreach ($errors->get('current_password') as $message)
												<strong>{{ $message }}</strong>
											@endforeach
		                                </span>
		                            @endif
		                        </td>
							</tr>
							<tr>
								<td>New Password</td>
								<td>
									<input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter New Password" required>
	                            

		                            @if($errors->has('password'))
		                                <span class="invalid-feedback">
		                                	@foreach ($errors->get('password') as $message)
												<strong>{{ $message }}</strong> <br>
											@endforeach                                    
		                                </span>
		                            @endif
								</td>
							</tr>
							<tr>
								<td>New Password Confirmation</td>
								<td>
									<input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" placeholder="New Password Confirmation" required>

		                            @if($errors->has('password_confirmation'))
		                                <span class="invalid-feedback">
		                                	@foreach ($errors->get('password_confirmation') as $message)
												<strong>{{ $message }}</strong>
											@endforeach                                    
		                                </span>
		                            @endif
								</td>

							</tr>
							<tr>
								<td></td>
								<td>
									<button type="submit" id="submit" name="submit" class="btn btn-primary">Change Password</button>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>	
@endsection
