@extends('layouts.masterpage_admin')

@section('title')
All Job
@endsection
@section('breadcrumb')
All Job
@endsection

@section('content')
<div class="row">
	
	<div class="col">
		
		<div class="card">
			<div class="card-header card-header-warning card-header-icon">
				<div class="card-icon">
					<i class="material-icons">playlist_add_check</i>
				</div>
				<h4 class="card-title">All Job</h4>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<!--        Here you can write extra buttons/actions for the toolbar              -->
				</div>
				<div class="material-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>Job Title</th>
								<th>Job Category</th>
								<th>Total Application</th>
								<th class="text-center">Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center">{{$jobs->links()}}</td>
							</tr>
						</tfoot>
						<tbody>
							@foreach($jobs->sortByDesc('created_at') as $job)
							<tr>
								<td>{{$job->title}}</td>
								<td>{{$job->job_category}}</td>
								<td>{{count($job->applications)}}</td>
								<td class="text-center">
									@if($job->availability == 0)
									<div class="alert">Draft</div>
									@elseif($job->availability == 1)
									<div class="alert alert-warning">Close</div>
									@else
									<div class="alert alert-success">Active</div>
									@endif
								</td>
								<td class="text-right">
									<a href="{{route('admin.viewjob', Crypt::encrypt($job->id))}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">search</i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- end content-->
		</div>
	</div>
	
</div>

@endsection