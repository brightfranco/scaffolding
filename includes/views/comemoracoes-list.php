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
		

		<div class="widget widget-blue"><span class="widget-title">Comemorações</span></div>

		<div class="comemoracoes-list">
			<ul>
				<?php $i = 0; ?>
				<?php foreach ($data->comemoracoes as $comemoracao): $i++; ?>
				<?php $center = ($i %2 == 0) ? "center" : "" ?>
				<li>
					<div class="comemoracao">
						<a href="<?php echo base_url(Core::lang() . "/comemoracoes/" . $comemoracao->url) ?>">
							<span class="comemoracao-title"><?php echo $comemoracao->title ?></span>
							<span class="comemoracao-image"><img src="<?php echo base_url("client_files/".$comemoracao->imagem); ?>" alt="<?php echo $comemoracao->title ?>" /></span>
							<span class="comemoracao-description"><?php echo $comemoracao->description ?></span>
						</a>
					</div>
				</li>
				<?php endforeach ?>
			</ul>
			<div class="clearfix"></div>
		</div>

	</div>

	<div class="clearfix"></div>

</div>