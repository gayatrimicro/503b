<?php $__env->startSection('content'); ?>
<div class="row page-titles">
    <div class="col-md-10 align-self-center">
        <h3 class="text-themecolor">Products</h3>
    </div>
    <div class="col-lg-2 col-md-2">
		<button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Product</button>
	</div>
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
        	<?php if(Session::has('company_product_success')): ?>
            <div class="alert alert-success"> <i class="fa fa-check-circle"></i> <?php echo e(Session::get('company_product_success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <?php endif; ?>
            <?php if(Session::has('company_product_error')): ?>
            <div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo e(Session::get('company_product_error')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <?php endif; ?>
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
									<th>Qty./Pellet size</th>
									<th>Actions</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
									<th>ID</th>
									<th>Category</th>
									<th>Product Name</th>
									<th>Strength</th>
									<th>Qty./Pellet size</th>
									<th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($row['id']); ?></td>
                                <td><?php echo e($row['category']['category']); ?></td>
                                <td><?php echo e($row['product_name']); ?></td>
                                <td><?php echo e($row['strength']); ?></td>
                                <td><?php echo e($row['pellet_size']); ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#edit<?php echo e($row['id']); ?>" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                    <a onclick="return confirm('Are you sure want to delete?')" href="<?php echo e(url('/company/product/destroy/'.$row['id'])); ?>" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
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
				<h4 class="modal-title">Add new Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="<?php echo e(url('/company/product/create')); ?>" class="form-material m-t-40" method="POST">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Category </label>
						<select id="cat" required name="category_id" class="form-control">
							<option value="">Select Category</option>
							<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($row['id']); ?>"><?php echo e($row['category']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div id="edit<?php echo e($row['id']); ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Product</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form enctype="multipart/form-data" action="<?php echo e(url('/company/product/update')); ?>" class="form-material m-t-40" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="recipient-name" class="control-label">Category </label>
						<select id="cat" required name="category_id" class="form-control">
							<option value="">Select Category</option>
							<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option <?php if($row1['id']==$row['category_id']): ?> selected="" <?php endif; ?> value="<?php echo e($row1['id']); ?>"><?php echo e($row1['category']); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					</div>
					<div class="form-group">
						<label for="example-email">Product name </label>
						<input type="text" name="product_name" required class="form-control" value="<?php echo e($row['product_name']); ?>">
					</div>
					<div class="form-group">
						<label for="example-email">Strength </label><br>
						<input type="text" name="strength" class="form-control" value="<?php echo e($row['strength']); ?>">
					</div>
					<div class="form-group">
						<label for="example-email">Qty./Pellet size</label>
						<input type="text" name="pellet_size" class="form-control" value="<?php echo e($row['pellet_size']); ?>">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.companyapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/company/products.blade.php ENDPATH**/ ?>