
			<div class="row">				
				<div class="col-md">
					<div class="row">
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									NEW : {{count($applications->where('status', 1))}}
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									SHORTLIST : {{count($applications->where('status', 2))}}
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									INTERVIEW : {{count($applications->where('status', 3))}}
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									KIV : {{count($applications->where('status', 4))}}
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									HIRE : {{count($applications->where('status', 5))}}
								</div>
							</div>
						</div>
						<div class="col-sm-6 mb-3">
							<div class="card">
								<div class="card-body">
									REJECT : {{count($applications->where('status', 6))}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>