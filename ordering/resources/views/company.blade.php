@extends('layouts.adminapp')

@section('content')
<div class="row page-titles">
	<div class="col-md-10 align-self-center">
		<h3 class="text-themecolor">Company</h3>
	</div>
	<div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Company</button>
	</div>
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			@if(Session::has('company_success'))
			<div class="alert alert-success"> <i class="fa fa-check-circle"></i> {{ Session::get('company_success') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			@endif
			@if(Session::has('company_error'))
			<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('company_error') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			@endif
			<div class="card">
				<div class="card-body">
					
					<div class="table-responsive">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Change Password</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Company Name</th>
									<th>Email</th>
									<th>Change Password</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
							@foreach($data as $row)
							<tr>
								<td>{{ $row['id'] }}</td>
								<td><a href="{{ url('/company-products/'.$row['id']) }}">{{ $row['name'] }}</a></td>
								<td>{{ $row['company_name'] }}</td>
								<td>{{ $row['email'] }}</td>
								<td>
									<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#change-password{{$row['id']}}" style="cursor: pointer;"> Change Password </a>
								</td>
								<td>
									<a data-toggle="modal" data-target="#edit{{$row['id']}}" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
									<a onclick="return confirm('Are you sure want to delete?')" href="{{ url('company/destroy/'.$row['id']) }}" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
									<!-- <a data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a> -->
								</td>
							</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<div id="responsive-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add new Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="{{ url('/company/create') }}" class="form-material m-t-40" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Name </label>
						<input type="text" name="name" required class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
						@if ($errors->has('name'))
							<div class="form-control-feedback">
								<small>{{ $errors->first('name') }}</small>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Company Name </label>
						<input type="text" name="company_name" required class="form-control" placeholder="Enter Company Name" value="{{ old('company_name') }}">
						@if ($errors->has('company_name'))
							<div class="form-control-feedback">
								<small>{{ $errors->first('company_name') }}</small>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" name="email" required class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
						@if ($errors->has('email'))
							<div class="form-control-feedback">
								<small>{{ $errors->first('email') }}</small>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Password </label>
						<input type="password" minlength="8" name="password" required class="form-control" placeholder="Enter Password">
						@if ($errors->has('password'))
							<div class="form-control-feedback">
								<small>{{ $errors->first('password') }}</small>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>

@foreach($data as $row)
<div id="edit{{$row['id']}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>			
			<form  enctype="multipart/form-data" action="{{ url('/company/update') }}" class="form-material m-t-40" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{ $row['id'] }}">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Name </label>
						<input type="text" name="name" required class="form-control" placeholder="Enter Name" value="{{ old('name', $row['name']) }}">
						@error('name')
							<div class="form-control-feedback">
								<small>{{ $message }}</small>
							</div>
						@enderror
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Company Name </label>
						<input type="text" name="company_name" required class="form-control" placeholder="Enter Company Name" value="{{ old('company_name', $row['company_name']) }}">
						@error('company_name')
							<div class="form-control-feedback">
								<small>{{ $message }}</small>
							</div>
						@enderror
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" name="email" required class="form-control" placeholder="Enter Email" value="{{ old('email', $row['email']) }}">
						@error('email')
							<div class="form-control-feedback">
								<small>{{ $message }}</small>
							</div>
						@enderror
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="change-password{{$row['id']}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>			
			<form  enctype="multipart/form-data" action="{{ url('/company/change-password') }}" class="form-material m-t-40" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{ $row['id'] }}">
				<input type="hidden" name="name" value="{{ $row['name'] }}">
				<input type="hidden" name="email" value="{{ $row['email'] }}">
				<input type="hidden" name="company_name" value="{{ $row['company_name'] }}">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" required readonly="" class="form-control" value="{{ $row['email'] }}">
						@error('email')
							<div class="form-control-feedback">
								<small>{{ $message }}</small>
							</div>
						@enderror
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Password </label>
						<input type="password" minlength="8" name="password" required class="form-control" placeholder="Enter Password">
						@if ($errors->has('password'))
							<div class="form-control-feedback">
								<small>{{ $errors->first('password') }}</small>
							</div>
						@endif
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-danger waves-effect waves-light">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

@endsection
