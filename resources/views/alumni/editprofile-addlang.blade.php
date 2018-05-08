@extends('layouts.masterpage')

@section('title')
Languages
@endsection

@section('content')
	<div class="row">
		<div class="container my-2">
			<h4>
				<a href="{{route('alumniprofile.view')}}">Profile</a>
				<i class="fas fa-chevron-right"></i>
				<a href="{{route('alumniprofile.view.lang')}}">Language</a>
				<i class="fas fa-chevron-right"></i>
				Add New
			</h4>
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