@extends('layouts.masterpage_admin')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
	<div class="col-sm">
		<div class="card card-stats">
			<div class="card-header card-header-info card-header-icon pb-3">
				<div class="card-icon">
					<i class="material-icons">perm_identity</i>
				</div>
				<p class="card-category">Total Alumni</p>
				<h3 class="card-title">{{count($users->where('role_id',5))}}</h3>
			</div>
		</div>
	</div>
	@if(Auth::user()->role_id != 3)
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-stats">
			<div class="card-header card-header-warning card-header-icon pb-3">
				<div class="card-icon">
					<i class="material-icons">store_mall_directory</i>
				</div>
				<p class="card-category">Total Company</p>
				<h3 class="card-title">{{count($companies)}}</h3>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6">
		<div class="card card-stats">
			<div class="card-header card-header-primary card-header-icon pb-3">
				<div class="card-icon">
					<i class="material-icons">work</i>
				</div>
				<p class="card-category">Total Job</p>
				<h3 class="card-title">{{count($jobs)}}</h3>
			</div>
		</div>
	</div>
	@endif
	<div class="col-sm">
		<div class="card card-stats">
			<div class="card-header card-header-success card-header-icon pb-3">
				<div class="card-icon">
					<i class="material-icons">folder_shared</i>
				</div>
				<p class="card-category">Total Hired</p>
				<h3 class="card-title">{{count($applications->where('status', 6))}}</h3>
			</div>
		</div>
	</div>
</div>

<div class="row">
	
	<div class="col">
		<div class="row">
			<div class="col">
				<div class="card card-chart">
					<div class="card-header card-header-info">
						<div id="simpleBarChart" class="ct-chart"></div>
					</div>
					<div class="card-body">
						<h4 class="card-title ">Overall Applications</h4>
						<p class="card-category">Based on Status</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card card-chart">
					<div class="card-header card-header-success">
						<div id="straightLinesChart" class="ct-chart"></div>
					</div>
					<div class="card-body">
						<h4 class="card-title">Successful Hired</h4>
						<p class="card-category">Year {{ Carbon\Carbon::now()->year }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(Auth::user()->role_id != 3)
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header card-header-warning card-header-icon">
				<div class="card-icon">
					<i class="material-icons">playlist_add_check</i>
				</div>
				<h4 class="card-title">Verify Company</h4>
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
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Company Name</th>
								<th>SSM No.</th>
								<th class="text-right">Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($companies->where('verification', 0)->sortByDesc('created_at') as $company)
							<tr>
								<td>{{$company->name}}</td>
								<td>{{$company->ssm}}</td>
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
	@endif
</div>

@endsection