<html>
	<head>
		<meta http-equiv='Content-Type' content='text/html;charset=ISO-8859-1'>
		<meta charset='UTF-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	</head>
	<body>
		<?php if($location != null && $location != ""): ?>
		<div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Order request from <?php echo e($email); ?> ( <?php echo e($company_name); ?> for <?php echo e($address1); ?>, <?php echo e($city); ?>),
		</div>
		<?php else: ?>
		<div style='font-family:'Open Sans', sans-serif;text-align:left; margin-bottom: 30px;'>Order request from <?php echo e($email); ?> ( <?php echo e($company_name); ?>),
		</div>
		<?php endif; ?>

		<br>
		<table style='font-family: 'Gotham', 'NotoSans', sans-serif !important;text-align:left; margin-bottom: 55px;' width='50%'>
			<?php echo $data1; ?>
		</table>
	</body>
</html><?php /**PATH /var/www/vhosts/503bfacility.com/httpdocs/ordering/resources/views/emails/order.blade.php ENDPATH**/ ?>