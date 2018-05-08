@extends('layouts.masterpage')

@section('title')
Edit About Me
@endsection

@section('content')
<div class="row">
  <div class="container">
    <h4>
      <a href="{{route('alumniprofile.view')}}">Profile</a>
      <i class="fas fa-chevron-right"></i>
      About Me
    </h4>
    <form method="post" action="{{route('alumniprofile.update.about')}}">
      {{ csrf_field() }}
      <div class="form-group">
        <textarea id="summernote" class="form-control{{ $errors->has('about_me') ? ' is-invalid' : '' }}" rows="10" name="about_me">{!! $user->alumni->about_me !!}</textarea>


        @if ($errors->has('about_me'))
            <span class="invalid-feedback">
              <strong>{{ $errors->first('about_me') }}</strong>
            </span>
        @endif

        <div class="row">
          <div class="col"><span id="total-characters">0</span> Words</div>
        </div>
      </div>
      

      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary mb-3"><i class="fas fa-save"></i> Update</button>
      </div>
    </form>
  </div>
</div>
@endsection