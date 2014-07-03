<?php require_once("includes/core.php"); $core = new core; ?>

<?php tools::notify_add("All systems set", "success")  ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo !empty($core->meta->title) ? $core->meta->title . "" : "" ?></title>
	<meta name="description" content="<?php echo $core->meta->description ?>" />
	<meta name="keywords" content="<?php echo $core->meta->keywords ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/styles.css") ?>" />
</head>

<div id="notify-messages">
	<?php tools::notify_list(); ?>
</div>

<body>

<input type="hidden" name="base_url" value="<?php echo base_url() ?>">
<script type="text/javascript" src="<?php echo base_url("js/jquery-1.11.1.min.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js") ?>"></script>
<!-- noty -->
<script type="text/javascript" src="<?php echo base_url('js/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/noty/themes/default.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("js/onload.js") ?>"></script>

</body>
</html>