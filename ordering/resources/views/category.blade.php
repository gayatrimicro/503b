@extends('layouts.adminapp')

@section('content')
<div class="row page-titles">
    <div class="col-md-10 align-self-center">
        <h3 class="text-themecolor">Category</h3>
    </div>
    <div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Category</button>
	</div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            @if(Session::has('category_success'))
            <div class="alert alert-success"> <i class="fa fa-check-circle"></i> {{ Session::get('category_success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            @endif
            @if(Session::has('category_error'))
            <div class="alert alert-danger"> <i class="fa fa-times-circle"></i> {{ Session::get('category_error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th hidden="">#</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden="">#</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td hidden="">{{$row['sequence']}}</td>
                                <input type="hidden"  class="index_temp" id="index_{{ $row['id'] }}" value="{{$row['id']}}">
                                <td class="index_cnt">{{ $row['id'] }}</td>
                                <td>{{ $row['category'] }}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#edit{{$row['id']}}" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a onclick="return confirm('Are you sure want to delete?')" href="{{ url('category/destroy/'.$row['id']) }}" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
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
				<h4 class="modal-title">Add new Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="{{ url('/category/create') }}" class="form-material m-t-40" method="POST">
				@csrf
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Category </label>
						<input type="text" name="category" required class="form-control" placeholder="Category">
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
				<h4 class="modal-title">Edit Category</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="{{ url('/category/update') }}" class="form-material m-t-40" method="POST">
				@csrf
				<input type="hidden" name="id" value="{{$row['id']}}">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Category </label>
						<input type="text" name="category" required class="form-control" placeholder="Category" value="{{$row['category']}}">
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
                url:"{{ URL::to('/category/sequence') }}"+"/"+values,
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
