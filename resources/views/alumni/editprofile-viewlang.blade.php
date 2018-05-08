@extends('layouts.masterpage')

@section('title')
Language
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<h4>
				<a href="{{route('alumniprofile.view')}}">Profile</a>
				<i class="fas fa-chevron-right"></i>
				Language
			</h4>
			<table class="table">
				<thead>
					<tr>
						<th width="50%">Language</th>
						<th width="25%" class="text-right">Proficiency</th>
						<th class="text-right">Action</th>
					</tr>
				</thead>
				<tbody>
					@if(count($user->alumni->languages) > 0)
						@foreach($user->alumni->languages->sortBy('name') as $language)
							<tr>
								<td>{{$language->name}}</td>
								<td class="text-right">{{$language->proficiency}}</td>
								<td class="text-right">
									<a href="{{route('alumniprofile.edit.lang', Crypt::encrypt($language->id))}}"><button class="btn btn-primary"><i class="fas fa-edit"></i> Edit</button></a>

									<a href="{{route('alumniprofile.delete.lang', Crypt::encrypt($language->id))}}" onclick="return confirm('Delete this skills and expertise?\nSkills and Expertise: {{ $language->name }}')"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</button></a>
								</td>
							</tr>
						@endforeach
					@else
						<h6><i class="fas fa-search"></i> I'm still searching for skills.</h6>
					@endif
				</tbody>
			</table>
			<hr class="my-5">
			<h5>Add New Language</h5>
			<form method="post" action="{{route('alumniprofile.save.lang')}}">
				{{csrf_field()}}
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Language</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter Language" name="name" value="{{old('name')}}">

	                    @if ($errors->has('name'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('name') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Proficiency</label>
					<div class="col-md-8">

						<select class="form-control{{ $errors->has('proficiency') ? ' is-invalid' : '' }}" name="proficiency" >

							<option value="" {{ old('proficiency') ? '' : 'selected' }}>Select Proficiency</option>
							
							@foreach($proficiencies as $proficiency)
								<option value="{{$proficiency->name}}" {{ old('proficiency') === $proficiency->name ? 'selected' : '' }} >{{$proficiency->name}}</option>
							@endforeach

						</select>

	                    @if ($errors->has('proficiency'))
	                        <span class="invalid-feedback">
	                            <strong>{{ $errors->first('proficiency') }}</strong>
	                        </span>
	                    @endif
					</div>
				</div>
				<div class="form-group row">
					<div class="col-md-10 offset-md-2">
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection