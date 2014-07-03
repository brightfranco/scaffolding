<div class="freepage">
	
	<?php echo Core::load_view("includes/views/sidebar.php") ?>

	<div class="page-main-content">

		
		<div class="lang freepage-lang">
			<ul>
				<li><a <?php echo (Core::lang() == "pt") ? "class='active'" : "" ?>href="<?php echo base_url("lang/pt") ?>"><img src="<?php echo base_url("images/icons/flags/pt.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
				<li><a <?php echo (Core::lang() == "en") ? "class='active'" : "" ?>href="<?php echo base_url("lang/en") ?>"><img src="<?php echo base_url("images/icons/flags/en.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
				<li><a <?php echo (Core::lang() == "es") ? "class='active'" : "" ?>href="<?php echo base_url("lang/es") ?>"><img src="<?php echo base_url("images/icons/flags/es.png") ?>" alt="Yoga Worlds Day" /></a></li>
				<li><a <?php echo (Core::lang() == "fr") ? "class='active'" : "" ?>href="<?php echo base_url("lang/fr") ?>"><img src="<?php echo base_url("images/icons/flags/fr.png") ?>" alt="Yoga Worlds Day" /></a></li>
				<li><a <?php echo (Core::lang() == "cn") ? "class='active'" : "" ?>href="<?php echo base_url("lang/cn") ?>"><img src="<?php echo base_url("images/icons/flags/cn.png") ?>" alt="Yoga Worlds Day" /></a></li>
			</ul>
		</div>
		

		<div class="widget widget-blue"><span class="widget-title">Apoiantes</span></div>

		<?php $apoiantes = Home::get_apoiantes() ?>

		<div class="freepage-content">
		<ul class="page-apoiantes">
			<?php foreach ($apoiantes as $apoiante): ?>
				<?php 
				$sizes = tools::get_display_size("client_files/" . $apoiante->image, 147, 118);
				 ?>
			<li><img style="margin:<?php echo $sizes["margin_top"] ?>px <?php echo $sizes["margin_left"] ?>px;" src="<?php echo base_url("client_files/" . $apoiante->image) ?>" alt="<?php echo $apoiante->title ?>" width="<?php echo $sizes["width"] ?>" height="<?php echo $sizes["height"] ?>" /></li>
			<?php endforeach ?>
		</ul>
		</div>

	</div>

	<div class="clearfix"></div>

</div>