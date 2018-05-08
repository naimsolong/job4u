@extends('layouts.masterpage')

@section('title')
Edit Skills & Expertise
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<h4>
				<a href="{{route('alumniprofile.view')}}">Profile</a>
				<i class="fas fa-chevron-right"></i>
				<a href="{{route('alumniprofile.view.skills')}}">Skills and Expertise</a>
				<i class="fas fa-chevron-right"></i>
				{{ $skill->name }}
			</h4>

			<form method="post" action="{{route('alumniprofile.update.skills')}}">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{Crypt::encrypt($skill->id)}}">
				<div class="form-group row">
					<label class="col-md-2 col-form-label">Skill</label>
					<div class="col-md-8">
						<input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter Skills and Expertise" name="name" value="{{ $errors->any() ? old('name') : $skill->name }}">

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
							@if($errors->any())
								@foreach($proficiencies as $proficiency)
									<option value="{{$proficiency->name}}" {{ old('proficiency') === $proficiency->name ? 'selected' : '' }}>{{$proficiency->name}}</option>
								@endforeach
							@else
								@foreach($proficiencies as $proficiency)
									<option value="{{$proficiency->name}}" {{ $skill->proficiency === $proficiency->name ? 'selected' : '' }}>{{$proficiency->name}}</option>
								@endforeach
							@endif
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
						<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection