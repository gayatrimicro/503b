<?php $__env->startSection('content'); ?>

<style type="text/css">
	[type=checkbox]:checked, [type=checkbox]:not(:checked){
		position: inherit !important;
		left: 1px !important;
		    opacity: 11;
	}
</style>
<div class="row page-titles">
    <div class="col-md-4 align-self-center">
        <h3 class="text-themecolor">My Catalog</h3>
    </div>
    <div class="col-lg-2 col-md-4">
		<!-- <button type="button" alt="default" data-toggle="modal" data-target="#responsive-modal" class="btn btn-rounded btn-block btn-outline-warning btn-sm model_img img-responsive">Add Product</button> -->
	</div>
</div>
<?php $i=0; ?>
<div class="container-fluid">

    <div class="row">
        <div class="col-11">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <form method="post" id="frm1">
                    	<?php echo csrf_field(); ?>
                    	<div class="form-group">
							<label for="recipient-name" class="control-label"><strong>Location </strong></label>
							<select id="location" name="location" class="form-control">
								<option value="">Select Location</option>
								<?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($loc['id']); ?>"><?php echo e($loc['address1']); ?>, <?php echo e($loc['city']); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(count($row['company_products']) > 0): ?>
						<?php if($i!=0): ?>
                        <br><hr><br>
                        <?php endif; ?>
						<h4 class="card-title"><?php echo e($row['category']); ?></h4>
						<table class="tablesaw table-striped table-hover table-bordered table">
							<thead>
								<tr>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="0" style="width: 5%;">#</th>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="width: 40%;">Product Name</th>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist" style="width: 10%;">Price</th>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-sortable-default-col data-tablesaw-priority="3" style="width: 25%;">Strength</th>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="0" style="width: 15%;">Qty/size</th>
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4" style="width: 10%;">Quantity</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $row['company_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inrow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<div class="demo-checkbox">
											<input type="checkbox" name="cb[]" value="<?php echo e($inrow['id']); ?>" id="checkbox<?php echo e($inrow['id']); ?>" />
										</div>
									</td>
                                    <td class="title">
                                    	<input hidden type="text" class="input-text" name="drugname<?php echo $inrow['id']; ?>" id="drugname" value="<?php echo $inrow['product_name'] ?>" required=""> <?php echo e($inrow['product_name']); ?>

                                	</td>
                                	<td>
                                    	<input hidden type="text" class="input-text" name="price<?php echo $inrow['id']; ?>" id="price" value="<?php echo $inrow['price']; ?>" > $ <?php echo e($inrow['price']); ?>

                                    </td>
                                    <td>
                                    	<input hidden type="text" class="input-text" name="strength<?php echo $inrow['id']; ?>" id="strength" value="<?php echo $inrow['strength']; ?>" > <?php echo e($inrow['strength']); ?>

                                    </td>
                                    <td>
                                    	<input hidden type="text" class="input-text" name="pellet-size<?php echo $inrow['id']; ?>" id="pellet-size" value="<?php echo $inrow['pellet_size']; ?>" > <?php echo e($inrow['pellet_size']); ?>

                                    </td>
                                    <td>
                                    	<input require type="number" class="input-text" name="qty<?php echo $inrow['id']; ?>" min="1" max="1000" id="qty" placeholder="Qty">
                                    </td>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
                        </table>
                        <?php $i++; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<div class="" style="position: fixed; top: 50%; right: 2%; z-index: 50;">
                            <input class="fixed flotingbtn btn btn-info" type="Submit" name="Submit">
                        </div>
					</form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$('#frm1').submit(function(e){
			e.preventDefault();
			var favorite = [];
			var flag = "0";
			$.each($("input[name='cb[]']:checked"), function(){
				var valu = "qty" + $(this).val();
				var vall = document.getElementsByName(valu)[0].value;
				if (vall === undefined || vall.length <= 0){
					//$('#popup12').fadeIn(350);
					flag = "1";
					alert("Please Fill up Quantity");
					return false;
				}
				else{
					flag = "2";
				} 
			}); 
			if(flag == "2"){
				var formData = $('#frm1').serialize();
				var total_price = 0;
				$.each($("input[name='cb[]']:checked"), function(){
						var valu = "qty" + $(this).val();
						var qty = document.getElementsByName(valu)[0].value;
						var pre_price = "price" + $(this).val();
						var price = document.getElementsByName(pre_price)[0].value;
						total_price += (qty * price);
					});
				var r = confirm("Total Price = $ " + total_price.toFixed(2));
				if (r == true) 
				{
					$.ajax({
							type	: 'POST',
							url 	: "<?php echo e(URL::to('/do-order')); ?>",
							data	: formData,
							cache	: false,
							success : function(data){
								alert("Order placed successfully");
								$('#frm1').trigger("reset");
							} ,error:function(){ alert( "Posting failed." ); }
						});
				} 
				else {
					//
				}	
			}
            else if(flag == "0") {
                
                alert("Please select at least one item.");
            }
           
          });
        });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.companyapp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/company/my_catalog.blade.php ENDPATH**/ ?>