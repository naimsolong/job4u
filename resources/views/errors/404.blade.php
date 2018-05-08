{{-- @if(Auutuser->role_id > 3) --}}
@extends('layouts.masterpage')
{{-- @else
@extends('layouts.masterpage_admin')
@endif --}}


@section('title')
Page Not Found
@endsection

@section('content')

<div class="container">
	<h1>TEST 404 Page</h1>
</div>
@endsection