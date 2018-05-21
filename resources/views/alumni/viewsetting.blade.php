@extends('layouts.masterpage')

@section('title')
Setting
@endsection

@section('content')

<div class="row">
	<div class="container">
		<div class="row m-0">
			<h4>General Setting</h4>
			<span class="ml-auto text-right"><a class="btn btn-default btn-sm" href="{{route('alumnisetting.edit')}}">Edit</a></span>

			<table class="table">
				<tbody>
					<tr>
						<td>Name</td>
						<td class="text-capitalize">
							{{ $user->firstname . ' ' . $user->lastname }}
						</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>{{ ($user->gender=='M') ? 'Male' : 'Female' }}</td>
					</tr>
					<tr>
						<td>Username</td>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td>Password</td>
						<td><a class="btn btn-default btn-sm p-0" href="{{route('alumnisetting.changepassword')}}">Change Password</a></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection