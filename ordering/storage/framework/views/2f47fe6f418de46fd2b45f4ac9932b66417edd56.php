<?php $__env->startSection('content'); ?>

<style type="text/css">
    [type=checkbox]:checked, [type=checkbox]:not(:checked){
        position: inherit !important;
        left: 1px !important;
            opacity: 11;
    }
</style>

<div class="row page-titles">
    <div class="col-md-10 align-self-center">
        <h3 class="text-themecolor">Locations</h3>
    </div>
    <div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Location</button>
	</div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <?php if(Session::has('success')): ?>
            <div class="alert alert-success"> <i class="fa fa-check-circle"></i> <?php echo e(Session::get('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <?php endif; ?>
            <?php if(Session::has('error')): ?>
            <div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo e(Session::get('error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">                    
                    <div class="table-responsive">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th hidden="">#</th>
                                    <th>ID</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th hidden="">#</th>
                                    <th>ID</th>
                                    <th>Address Line 1</th>
                                    <th>Address Line 2</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td hidden=""><?php echo e($row['sequence']); ?></td>
                                <input type="hidden"  class="index_temp" id="index_<?php echo e($row['id']); ?>" value="<?php echo e($row['id']); ?>">
                                <td class="index_cnt"><?php echo e($row['id']); ?></td>
                                <td><?php echo e($row['address1']); ?></td>
                                <td><?php echo e($row['address2']); ?></td>
                                <td><?php echo e($row['city']); ?></td>
                                <td><?php echo e($row['state']); ?></td>
                                <td><?php echo e($row['zip']); ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#edit<?php echo e($row['id']); ?>" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a onclick="return confirm('Are you sure want to delete?')" href="<?php echo e(url('location/destroy/'.$row['id'])); ?>" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
				<h4 class="modal-title">Add new Location</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="<?php echo e(url('/location/create')); ?>" class="form-material" method="POST">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<h6 class="modal-title"><strong>Shipping Address</strong></h6>
					<hr>
					<div class="form-group">
						<label for="example-email">Address Line 1 </label>
						<input type="text" name="address1" required class="form-control" maxlength="50">
					</div>
                    <div class="form-group">
                        <label for="example-email">Address Line 2 </label>
                        <input type="text" name="address2" required class="form-control" maxlength="50">
                    </div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="example-email">City </label>
							<input type="text" name="city" required class="form-control" maxlength="25">
						</div>
						<div class="form-group col-md-4">
							<label for="example-email">State </label>
							<input type="text" name="state" required class="form-control" maxlength="15">
						</div>
						<div class="form-group col-md-4">
							<label for="example-email">Zip </label>
							<input type="text" name="zip" required class="form-control" maxlength="10">
						</div>
					</div>					
					<div class="form-group">
						<label for="example-text-input" class="col-md-2 col-form-label"></label>
						<div class="col-md-10">
							<input type="checkbox" id="billing_addess_same_as_shipping" name="billing_addess_same_as_shipping" onclick="fn_billing_address()" class="chk-col-indigo" checked value="1" />
							Billing address same as shipping address
						</div>
					</div>
					<br>
					<div id="a_billing_address">
						<h6 class="modal-title"><strong>Billing Address</strong></h6>
						<hr>
						<div class="form-group">
							<label for="example-email">Address Line 1 </label>
							<input type="text" name="billing_address1" class="form-control" maxlength="50" id="billing_address1">
						</div>
						<div class="form-group">
							<label for="example-email">Address Line 2 </label>
							<input type="text" name="billing_address2" class="form-control" maxlength="50" id="billing_address2">
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="example-email">City </label>
								<input type="text" name="billing_city" class="form-control" maxlength="25" id="billing_city">
							</div>
							<div class="form-group col-md-4">
								<label for="example-email">State </label>
								<input type="text" name="billing_state" class="form-control" maxlength="15" id="billing_state">
							</div>
							<div class="form-group col-md-4">
								<label for="example-email">Zip </label>
								<input type="text" name="billing_zip" class="form-control" maxlength="10" id="billing_zip">
							</div>
						</div>
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

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="edit<?php echo e($row['id']); ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Location</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="<?php echo e(url('/location/update')); ?>" class="form-material" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Address Line 1 </label>
						<input type="text" name="address1" required class="form-control" value="<?php echo e($row['address1']); ?>" maxlength="50">
					</div>
                    <div class="form-group">
                        <label for="example-email">Address Line 2 </label>
                        <input type="text" name="address2" required class="form-control" value="<?php echo e($row['address2']); ?>" maxlength="50">
                    </div>
					<div class="row">
						<div class="form-group col-md-4">
							<label for="example-email">City </label>
							<input type="text" name="city" required class="form-control" value="<?php echo e($row['city']); ?>" maxlength="25">
						</div>
						<div class="form-group col-md-4">
							<label for="example-email">State </label>
							<input type="text" name="state" required class="form-control" value="<?php echo e($row['state']); ?>" maxlength="15">
						</div>
						<div class="form-group col-md-4">
							<label for="example-email">Zip </label>
							<input type="text" name="zip" required maxlength="10" class="form-control" value="<?php echo e($row['zip']); ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="example-text-input" class="col-md-2 col-form-label"></label>
						<div class="col-md-10">
							<input type="checkbox" id="billing_addess_same_as_shipping<?php echo e($row['id']); ?>" name="billing_addess_same_as_shipping" onclick="fn_billing_address_update(<?php echo e($row['id']); ?>)" class="chk-col-indigo" <?php if($row['billing_same_as_shipping']==1): ?> checked <?php endif; ?> value="1" />
							Billing address same as shipping address
						</div>
					</div>
					<br>
					<div id="u_billing_address<?php echo e($row['id']); ?>" <?php if($row['billing_same_as_shipping']==1): ?> style="display:none;" <?php endif; ?> >
						<h6 class="modal-title"><strong>Billing Address</strong></h6>
						<hr>
						<div class="form-group">
							<label for="example-email">Address Line 1 </label>
							<input type="text" name="billing_address1" class="form-control" maxlength="50" value="<?php echo e($row['billing_address1']); ?>" id="billing_address1<?php echo e($row['id']); ?>">
						</div>
						<div class="form-group">
							<label for="example-email">Address Line 2 </label>
							<input type="text" name="billing_address2" class="form-control" maxlength="50" value="<?php echo e($row['billing_address2']); ?>" id="billing_address2<?php echo e($row['id']); ?>">
						</div>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="example-email">City </label>
								<input type="text" name="billing_city" class="form-control" maxlength="25" value="<?php echo e($row['billing_city']); ?>" id="billing_city<?php echo e($row['id']); ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="example-email">State </label>
								<input type="text" name="billing_state" class="form-control" maxlength="15" value="<?php echo e($row['billing_state']); ?>" id="billing_state<?php echo e($row['id']); ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="example-email">Zip </label>
								<input type="text" name="billing_zip" class="form-control" maxlength="10" value="<?php echo e($row['billing_zip']); ?>" id="billing_zip<?php echo e($row['id']); ?>">
							</div>
						</div>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
                url:"<?php echo e(URL::to('/category/sequence')); ?>"+"/"+values,
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
	<script>
		function fn_billing_address()
		{
			if($('#billing_addess_same_as_shipping').prop("checked") == true){
				$('#a_billing_address').css('display', 'none');
				$("#billing_address1").prop('required', false);
				$("#billing_address2").prop('required', false);
				$("#billing_city").prop('required', false);
				$("#billing_state").prop('required', false);
				$("#billing_zip").prop('required', false);
			}
			if($('#billing_addess_same_as_shipping').prop("checked") == false){
				$('#a_billing_address').css('display', 'block');
				$("#billing_address1").prop('required', true);
				$("#billing_address2").prop('required', true);
				$("#billing_city").prop('required', true);
				$("#billing_state").prop('required', true);
				$("#billing_zip").prop('required', true);
			}
		}
		function fn_billing_address_update(id)
		{
			if($('#billing_addess_same_as_shipping'+id).prop("checked") == true){
				$('#u_billing_address'+id).css('display', 'none');
				$("#billing_address1"+id).prop('required', false);
				$("#billing_address2"+id).prop('required', false);
				$("#billing_city"+id).prop('required', false);
				$("#billing_state"+id).prop('required', false);
				$("#billing_zip"+id).prop('required', false);
			}
			if($('#billing_addess_same_as_shipping'+id).prop("checked") == false){
				$('#u_billing_address'+id).css('display', 'block');
				$("#billing_address1"+id).prop('required', true);
				$("#billing_address2"+id).prop('required', true);
				$("#billing_city"+id).prop('required', true);
				$("#billing_state"+id).prop('required', true);
				$("#billing_zip"+id).prop('required', true);
			}
		}
		$(document).ready(function(){			
			$('#a_billing_address').css('display', 'none');
		});
	</script>
     <style type="text/css">
        td:hover{
                cursor:move;
        }
     </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.companyapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/company/location.blade.php ENDPATH**/ ?>