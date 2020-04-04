@extends('layouts.adminapp')

@section('content')
<div class="row page-titles">
    <div class="col-md-10 align-self-center">
        <h3 class="text-themecolor">Assigned to {{ $company_name['company_name'] }}</h3>
    </div>
    <div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Assign Product</button>
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
					<form action="{{ url('/company-product/bulk_upload') }}" method="post" class="form" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="company_id" value="{{ $id }}">
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
									<th hidden="">#</th>
									<th>ID</th>
									<th>Category</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Strength</th>
									<th>Qty / Size</th>
									<th>Actions</th>
								</tr>
                            </thead>
                            <tfoot>
								<tr>
									<th hidden="">#</th>
									<th>ID</th>
									<th>Category</th>
									<th>Product Name</th>
									<th>Price</th>
									<th>Strength</th>
									<th>Qty / Size</th>
									<th>Actions</th>
								</tr>
                            </tfoot>
                            <tbody>
                            @foreach($products as $row)
                            <tr>
                            	<input type="hidden"  class="index_temp" id="index_{{ $row['id'] }}" value="{{$row['id']}}">
                            	<th hidden="">{{ $row['sequence'] }}</th>
								<td>{{ $row['id'] }}</td>
								<td>{{ $row['category']['category'] }}</td>
								<td>{{ $row['product_name'] }}</td>
								<td>$ {{ $row['price'] }}</td>
								<td>{{ $row['strength'] }}</td>
								<td>{{ $row['pellet_size'] }}</td>
								<td>
                                    <a data-toggle="modal" data-target="#edit{{$row['id']}}" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a onclick="return confirm('Are you sure want to delete?')" href="{{ url('/company-product/destroy/'.$row['id']) }}" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
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
				<h4 class="modal-title">Assign new Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="{{ url('/company-product/create') }}" class="form-material" method="POST">
				@csrf
				<input type="hidden" name="company_id" value="{{ $id }}">
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
						<label for="example-email">Price </label><br>
						<input type="number" name="price" step="any" min="0.01" max="9999999999.99"  class="form-control" value="0">
					</div>
					<div class="form-group">
						<label for="example-email">Strength </label><br>
						<input type="text" name="strength" class="form-control">
					</div>
					<div class="form-group">
						<label for="example-email">Qty / Size</label>
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
			<form enctype="multipart/form-data" action="{{ url('/company-product/update') }}" class="form-material" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{$row['id']}}">
				<input type="hidden" name="company_id" value="{{ $id }}">
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
						<label for="example-email">Price </label><br>
						<input type="number" name="price" min="0.01" step="any" max="9999999999.99" class="form-control" value="{{ $row['price'] }}">
					</div>
					<div class="form-group">
						<label for="example-email">Strength </label><br>
						<input type="text" name="strength" class="form-control" value="{{$row['strength']}}">
					</div>
					<div class="form-group">
						<label for="example-email">Qty / Size</label>
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

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

     <script type="text/javascript">
         // $(document).ready(function(){
            var numItems = $('.index_cnt').length;
            var index_sequence = []; 
            var seq_num = 1;
            var seq_num_val;
            

        var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });

        return $helper;
    },
        updateIndex = function(e, ui) {
            $('td.index', ui.item.parent()).each(function (i) {
                $(this).html(i+1);

            });
            
            $('input[type=text]', ui.item.parent()).each(function (i) {
                $(this).val(i + 1);
            });
           
        };

    $("#example23 tbody").sortable({
        helper: fixHelperModified,
        stop: updateIndex
    }).disableSelection();
    
        $("tbody").sortable({
        distance: 5,
        delay: 100,
        opacity: 0.6,
        cursor: 'move',
        update: function() {
            var values = $('.index_temp').map(function() { return this.value; }).get();
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type:'GET',
                url:"{{ URL::to('/company/product/sequence') }}"+"/"+values+"/"+{{$id}},
                data:{ _token: token},
                success:function(data){
                    
                } ,error:function() { 
                    alert("Something went wrong"); 
                }
            });
            
            //alert(values);
        }
        });
     </script>
     <style type="text/css">
        td:hover{
                cursor:move;
        }
     </style>

@endsection
