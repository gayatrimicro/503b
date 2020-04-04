<?php $__env->startSection('content'); ?>
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
			<?php if(Session::has('company_success')): ?>
			<div class="alert alert-success"> <i class="fa fa-check-circle"></i> <?php echo e(Session::get('company_success')); ?>

				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
			</div>
			<?php endif; ?>
			<?php if(Session::has('company_error')): ?>
			<div class="alert alert-danger"> <i class="fa fa-times-circle"></i> <?php echo e(Session::get('company_error')); ?>

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
							<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($row['id']); ?></td>
								<td><a href="<?php echo e(url('/company-products/'.$row['id'])); ?>"><?php echo e($row['name']); ?></a></td>
								<td><?php echo e($row['company_name']); ?></td>
								<td><?php echo e($row['email']); ?></td>
								<td>
									<a class="btn btn-sm btn-success" data-toggle="modal" data-target="#change-password<?php echo e($row['id']); ?>" style="cursor: pointer;"> Change Password </a>
								</td>
								<td>
									<a data-toggle="modal" data-target="#edit<?php echo e($row['id']); ?>" style="cursor: pointer;"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
									<a onclick="return confirm('Are you sure want to delete?')" href="<?php echo e(url('company/destroy/'.$row['id'])); ?>" data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a>
									<!-- <a data-toggle="tooltip" > <i class="fa fa-close text-danger"></i> </a> -->
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
				<h4 class="modal-title">Add new Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<form  enctype="multipart/form-data" action="<?php echo e(url('/company/create')); ?>" class="form-material m-t-40" method="POST">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Name </label>
						<input type="text" name="name" required class="form-control" placeholder="Enter Name" value="<?php echo e(old('name')); ?>">
						<?php if($errors->has('name')): ?>
							<div class="form-control-feedback">
								<small><?php echo e($errors->first('name')); ?></small>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Company Name </label>
						<input type="text" name="company_name" required class="form-control" placeholder="Enter Company Name" value="<?php echo e(old('company_name')); ?>">
						<?php if($errors->has('company_name')): ?>
							<div class="form-control-feedback">
								<small><?php echo e($errors->first('company_name')); ?></small>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" name="email" required class="form-control" placeholder="Enter Email" value="<?php echo e(old('email')); ?>">
						<?php if($errors->has('email')): ?>
							<div class="form-control-feedback">
								<small><?php echo e($errors->first('email')); ?></small>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Password </label>
						<input type="password" minlength="8" name="password" required class="form-control" placeholder="Enter Password">
						<?php if($errors->has('password')): ?>
							<div class="form-control-feedback">
								<small><?php echo e($errors->first('password')); ?></small>
							</div>
						<?php endif; ?>
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
				<h4 class="modal-title">Edit Company</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>			
			<form  enctype="multipart/form-data" action="<?php echo e(url('/company/update')); ?>" class="form-material m-t-40" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Name </label>
						<input type="text" name="name" required class="form-control" placeholder="Enter Name" value="<?php echo e(old('name', $row['name'])); ?>">
						<?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
							<div class="form-control-feedback">
								<small><?php echo e($message); ?></small>
							</div>
						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Company Name </label>
						<input type="text" name="company_name" required class="form-control" placeholder="Enter Company Name" value="<?php echo e(old('company_name', $row['company_name'])); ?>">
						<?php if ($errors->has('company_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('company_name'); ?>
							<div class="form-control-feedback">
								<small><?php echo e($message); ?></small>
							</div>
						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" name="email" required class="form-control" placeholder="Enter Email" value="<?php echo e(old('email', $row['email'])); ?>">
						<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
							<div class="form-control-feedback">
								<small><?php echo e($message); ?></small>
							</div>
						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
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
<div id="change-password<?php echo e($row['id']); ?>" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>			
			<form  enctype="multipart/form-data" action="<?php echo e(url('/company/change-password')); ?>" class="form-material m-t-40" method="POST">
				<?php echo csrf_field(); ?>
				<input type="hidden" name="id" value="<?php echo e($row['id']); ?>">
				<input type="hidden" name="name" value="<?php echo e($row['name']); ?>">
				<input type="hidden" name="email" value="<?php echo e($row['email']); ?>">
				<input type="hidden" name="company_name" value="<?php echo e($row['company_name']); ?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Email </label>
						<input type="email" required readonly="" class="form-control" value="<?php echo e($row['email']); ?>">
						<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
							<div class="form-control-feedback">
								<small><?php echo e($message); ?></small>
							</div>
						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="example-email">Password </label>
						<input type="password" minlength="8" name="password" required class="form-control" placeholder="Enter Password">
						<?php if($errors->has('password')): ?>
							<div class="form-control-feedback">
								<small><?php echo e($errors->first('password')); ?></small>
							</div>
						<?php endif; ?>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/coffeeoverchat.com/503-admin.coffeeoverchat.com/ordering/resources/views/company.blade.php ENDPATH**/ ?>