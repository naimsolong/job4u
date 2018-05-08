
@if(Session::has('success'))
<div id="mdialog" class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <span><b>Success!</b> {{ session('success') }}</span>
</div>
@endif
@if(Session::has('fail'))
<div id="mdialog" class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <span><b>Error!</b> {{ session('fail') }}</span>
</div>
@endif

@php
Session::forget('success');
Session::forget('fail');
@endphp
