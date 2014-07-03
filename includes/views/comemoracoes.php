<div class="freepage">
	
	<?php echo Core::load_view("includes/views/sidebar.php") ?>

	<div class="page-main-content">

		<div class="main-image">
			<div class="lang">
				<ul>
					<li><a <?php echo (Core::lang() == "pt") ? "class='active'" : "" ?>href="<?php echo base_url("lang/pt") ?>"><img src="<?php echo base_url("images/icons/flags/pt.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
					<li><a <?php echo (Core::lang() == "en") ? "class='active'" : "" ?>href="<?php echo base_url("lang/en") ?>"><img src="<?php echo base_url("images/icons/flags/en.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
					<li><a <?php echo (Core::lang() == "es") ? "class='active'" : "" ?>href="<?php echo base_url("lang/es") ?>"><img src="<?php echo base_url("images/icons/flags/es.png") ?>" alt="Yoga Worlds Day" /></a></li>
					<li><a <?php echo (Core::lang() == "fr") ? "class='active'" : "" ?>href="<?php echo base_url("lang/fr") ?>"><img src="<?php echo base_url("images/icons/flags/fr.png") ?>" alt="Yoga Worlds Day" /></a></li>
					<li><a <?php echo (Core::lang() == "cn") ? "class='active'" : "" ?>href="<?php echo base_url("lang/cn") ?>"><img src="<?php echo base_url("images/icons/flags/cn.png") ?>" alt="Yoga Worlds Day" /></a></li>
				</ul>
			</div>
			<img src="<?php echo base_url("images/dia-mundial-do-yoga.jpg") ?>" />
		</div>

		<div class="widget widget-blue"><span class="widget-title"><?php echo $data->comemoracao->title ?></span></div>

		<?php if (!empty($data->comemoracao->video)): ?>
		<div class="video-embed">
			<iframe width="100%" height="415" src="//www.youtube.com/embed/<?php echo $data->comemoracao->video ?>" frameborder="0" allowfullscreen></iframe>
		</div>	
		<?php endif ?>
		

		<div class="freepage-content">
			<?php echo $data->comemoracao->content ?>
		</div>

		<!-- outras comemoracoes -->
		<div class="highlight highlight-dark-yellow">
			<span class="highlight-title">Outras comemorações</span>
			<div class="slider-container">
				<!-- carousel -->
				<div class="carousel carousel-comemoracoes-wrapper" data-items="3">
					<!-- controls -->
					<button type="button" class="carousel-controls carousel-prev"></button>
					<button type="button" class="carousel-controls carousel-next"></button>
					<!-- /controls -->

					<!-- carousel itself -->
					<div class="carousel-this">
						<?php foreach ($data->outras_comemoracoes as $item): ?>				
						<!-- item -->
						<div class="carousel-item carousel-comemoracoes">
							<a href="<?php echo base_url(Core::lang() . "/comemoracoes/" . $item->url) ?>">
								<span class="carousel-item-title"><?php echo $item->title ?></span>
								<img class="carousel-item-image" src="<?php echo base_url( "client_files/".$item->imagem ); ?>" alt="<?php echo $item->title; ?>" />
								<span class="carousel-item-description"><?php echo $item->description ?></span>
							</a>
						</div>
						<!-- /item -->
						<?php endforeach ?>
					</div>
					<!-- /carousel itself -->
				</div>
				<!-- /carousel -->
			</div>
		</div>
		<!-- /outras comemoracoes -->

	</div>

	<div class="clearfix"></div>

</div>