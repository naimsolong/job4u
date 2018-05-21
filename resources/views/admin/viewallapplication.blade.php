@extends('layouts.masterpage_admin')

@section('title')
All Application
@endsection
@section('breadcrumb')
All Application
@endsection

@section('content')
<div class="row">
	
	<div class="col">
		
		<div class="card">
			<div class="card-header card-header-primary card-header-icon">
				<div class="card-icon">
					<i class="material-icons">folder_shared</i>
				</div>
				<h4 class="card-title">All Company</h4>
			</div>
			<div class="card-body">
				<div class="toolbar">
					<!--        Here you can write extra buttons/actions for the toolbar              -->
				</div>
				<div class="material-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>Name</th>
								<th class="text-right">Job</th>
								<th class="text-center">Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center">{{$applications->links()}}</td>
							</tr>
						</tfoot>
						<tbody>
							@foreach($applications->sortByDesc('status') as $application)
							<tr>
								<td>{{$application->alumni->user->firstname . ' ' . $application->alumni->user->lastname}}</td>
								<td class="text-right">{{$application->job->title}}</td>
								<td class="text-center">

									@switch($application->status)
										@case(1)
											<div class="alert alert-primary mb-0">New</div>
											@break
										
										@case(2)
											<div class="alert alert-primary mb-0">Shortlisted</div>
											@break
										
										@case(3)
											<div class="alert alert-primary mb-0">Interviews</div>
											@break
										
										@case(4)
											<div class="alert alert-info mb-0">KIV</div>
											@break
										
										@case(5)
											<div class="alert alert-danger mb-0">Rejected</div>
											@break
										
										@case(6)
											<div class="alert alert-success mb-0">Hired</div>
											@break
										
										@default
											<div class="alert alert-dark mb-0">Unknown</div>
									@endswitch

								</td>
								<td class="text-right">
									<a href="{{route('admin.viewapplication', Crypt::encrypt($application->id))}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">search</i></a>
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
