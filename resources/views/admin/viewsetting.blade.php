@extends('layouts.masterpage_admin')

@section('title')
View Setting
@endsection
@section('breadcrumb')
View Setting
@endsection

@section('content')
		
<div class="card">
	<div class="card-body">
		<a class="btn btn-default btn-sm" href="{{route('admin.editsetting')}}">Edit</a>

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
					<td><a class="btn btn-default" href="{{route('admin.editpassword')}}">Change Password</a></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@endsection