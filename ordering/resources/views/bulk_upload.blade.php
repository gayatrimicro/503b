@extends('layouts.adminapp')

@section('content')
<style type="text/css">
	[type=checkbox]:checked, [type=checkbox]:not(:checked){
		position: inherit !important;
		left: 1px !important;
	}
</style>
	<!-- ============================================================== -->
	<!-- Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<div class="row page-titles">
		<div class="col-md-5 align-self-center">
			<h3 class="text-themecolor">Bulk Import</h3>
		</div>
		<div class="col-md-7 align-self-center">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
			</ol>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- End Bread crumb and right sidebar toggle -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Container fluid  -->
	<!-- ============================================================== -->
	<div class="container-fluid">
		
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<div class="row">
			<div class="col-12">
				<div class="card card-outline-info">
					<div class="card-body">
						@if(Session::has('bulk_upload_success'))
						<div class="alert alert-success"> <i class="fa fa-check-circle"></i> {{ Session::get('bulk_upload_success') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
						</div>
						@endif
						@if(Session::has('bulk_upload_error'))
						<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('bulk_upload_error') }}
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
						</div>
						@endif
						<div class="form-group row">
							<label for="example-text-input" class="bluktext col-md-6 col-form-label">Bulk Import</label>
							<label for="example-text-input" class="bluktext col-md-6 col-form-label"><a href="{{url('/').'/sample.csv'}}" class="downloadtext">Download sample file for bulk import</a></label>
						</div>
						<form action="{{ url('/bulk-import') }}" method="post" class="form" enctype="multipart/form-data">
							@csrf
							<div class="form-group row {{ $errors->has('import_file') ? 'has-danger' : '' }}">
								<div class="fileinput input-group fileinput-new col-md-8" data-provides="fileinput">
									<span class="input-group-addon btn btn-secondary btn-file" style="background-color: aliceblue;"> 
										<span class="fileinput-new">Upload CSV</span>
										<span class="fileinput-exists">Change</span>
										<input type="hidden" value="" name="import_file"><input accept=".csv" required="" type="file" name="import_file">
									</span>
									<div class="form-control" data-trigger="fileinput">
										<i class="fa fa-file fileinput-exists"></i>
										<span class="fileinput-filename"></span>
									</div>
									<a href="#" class="input-group-addon btn btn-secondary fileinput-exists" data-dismiss="fileinput" style="background-color: #ececec;">Remove</a>
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn btn-info waves-effect waves-light m-r-10">Import</button>
								</div>
								@if ($errors->has('import_file'))
									<span class="help-block">
										<small>{{ $errors->first('import_file') }}</small>
									</span>
								@endif
							</div>
						</form><br>
						<!-- <div class="row">
							<label class="col-md-12 note">Note :
								<ul class="noteul">
									<li class="note">First/Middle name, Last name, Specialty, Office phone, Address, Zip are mandatory fields</li>
									<li class="note">Do not use any special characters and check for spaces, if any, before uploading failing which shall render the database with errors.</li>
								</ul>
							</label>
						</div> -->
					</div>
				</div>
			</div>
		</div>
		
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Container fluid  -->
	<!-- ============================================================== -->
@endsection
