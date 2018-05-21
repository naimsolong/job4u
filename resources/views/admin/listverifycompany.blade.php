@extends('layouts.masterpage_admin')

@section('title')
All Company
@endsection
@section('breadcrumb')
All Company
@endsection

@section('content')
<div class="row">
	
	<div class="col">
		
		<div class="card">
			<div class="card-header card-header-warning card-header-icon">
				<div class="card-icon">
					<i class="material-icons">playlist_add_check</i>
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
								<th>Company Name</th>
								<th>SSM No.</th>
								<th class="text-center">Status</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="4" class="text-center">{{$companies->links()}}</td>
							</tr>
						</tfoot>
						<tbody>
							@foreach($companies->where('verification', 0)->sortByDesc('created_at') as $company)
							<tr>
								<td>{{$company->name}}</td>
								<td>{{$company->ssm}}</td>
								<td class="text-center">
									@if($company->verification == 1)
									<div class="alert alert-success">Verified</div>
									@else
									<div class="alert alert-warning">Pending</div>
									@endif
								</td>
								<td class="text-right">
									<a href="{{route('admin.viewcompany', Crypt::encrypt($company->id))}}" class="btn btn-link btn-info btn-just-icon edit"><i class="material-icons">search</i></a>
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