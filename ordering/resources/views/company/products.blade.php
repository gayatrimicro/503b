@extends('layouts.companyapp')

@section('content')
<div class="row page-titles">
	<div class="col-md-8 align-self-center">
		<h3 class="text-themecolor">Products</h3>
	</div>
	<div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#category-modal" class="btn btn-rounded btn-block btn-outline-secondary btn-sm model_img img-responsive">Category List</button>
	</div>
	<div class="col-lg-2 col-md-2">
		<!-- <button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Product</button> -->
	</div>
</div>
<div class="container-fluid">

	<div class="row">
		<div class="col-12">
			@if(Session::has('company_product_success'))
				<div class="alert alert-success"> <i class="fa fa-check-circle"></i> {{ Session::get('company_product_success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			@endif
			@if(Session::has('company_product_error'))
				<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('company_product_error') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			@endif
			@if(Session::has('files_done'))
				<div class="alert alert-success"> <i class="fa fa-check-circle"></i> {{ Session::get('files_done') }} rows inserted successfully
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			@endif
			@if(Session::has('files_not_done'))
				<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('files_not_done') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
			@endif
			<div class="card card-outline-info">
				<div class="card-body">
					<div class="form-group row">
						<label for="example-text-input" class="bluktext col-md-6 col-form-label">Bulk Import</label>
						<label for="example-text-input" class="bluktext col-md-6 col-form-label"><a href="{{url('/').'/sample_data.csv'}}" class="downloadtext">Download sample file for bulk import</a></label>
					</div>
					<form action="{{ url('/company/product/bulk_upload') }}" method="post" class="form" enctype="multipart/form-data">
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
					<div class="row">
						<label class="col-md-12 note">Note :
							<ul class="noteul">
								<li class="note">Category, Product Name are mandatory fields</li>
								<li class="note">Do not use any special characters and check for spaces, if any, before uploading failing which shall render the database with errors.</li>
							</ul>
						</label>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Category</th>
									<th>Product Name</th>
									<th>Strength</th>
									<th>Qty / Size</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Category</th>
									<th>Product Name</th>
									<th>Strength</th>
									<th>Qty / Size</th>
									<th>Actions</th>
								</tr>
							</tfoot>
							<tbody>
							@foreach($products as $row)
							<tr>
								<td>{{ $row['id'] }}</td>
								<td>{{ $row['category']['category'] }}</td>
								<td>{{ $row['product_name'] }}</td>
								<td>{{ $row['strength'] }}</td>
								<td>{{ $row['pellet_size'] }}</td>
								<td>
									<a data-toggle="modal" data-target="#edit{{$row['id']}}" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
									<a onclick="return confirm('Are you sure want to delete?')" href="{{ url('/company/product/destroy/'.$row['id']) }}" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
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
				<h4 class="modal-title">Add new Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="{{ url('/company/product/create') }}" class="form-material m-t-40" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Category </label>
						<select id="cat" required name="category_id" class="form-control">
							<option value="">Select Category</option>
							@foreach($cat as $row)
							<option value="{{$row['id']}}">{{$row['category']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="example-email">Product name </label>
						<input type="text" name="product_name" required class="form-control">
					</div>
					<div class="form-group">
						<label for="example-email">Strength </label><br>
						<input type="text" name="strength" class="form-control">
					</div>
					<div class="form-group">
						<label for="example-email">Qty./Pellet size</label>
						<input type="text" name="pellet_size" class="form-control">
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

@foreach($products as $row)
<div id="edit{{$row['id']}}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form enctype="multipart/form-data" action="{{ url('/company/product/update') }}" class="form-material m-t-40" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{$row['id']}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Category </label>
						<select id="cat" required name="category_id" class="form-control">
							<option value="">Select Category</option>
							@foreach($cat as $row1)
							<option @if($row1['id']==$row['category_id']) selected="" @endif value="{{$row1['id']}}">{{$row1['category']}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="example-email">Product name </label>
						<input type="text" name="product_name" required class="form-control" value="{{$row['product_name']}}">
					</div>
					<div class="form-group">
						<label for="example-email">Strength </label><br>
						<input type="text" name="strength" class="form-control" value="{{$row['strength']}}">
					</div>
					<div class="form-group">
						<label for="example-email">Qty./Pellet size</label>
						<input type="text" name="pellet_size" class="form-control" value="{{$row['pellet_size']}}">
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
<div id="category-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Category List</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<table id="example24" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>ID</th>
							<th>Category</th>
						</tr>
					</thead>
					<tbody>
					@foreach($cat as $row)
					<tr>
						<td>{{ $row['id'] }}</td>
						<td>{{ $row['category'] }}</td>
					</tr>
					@endforeach
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript"></script>
@endsection
