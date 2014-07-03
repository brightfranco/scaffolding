<?php include("includes/placeholders.php"); ?>

	<div class="lang">
		<ul>
			<li><a <?php echo (Core::lang() == "pt") ? "class='active'" : "" ?>href="<?php echo base_url("lang/pt") ?>"><img src="<?php echo base_url("images/icons/flags/pt.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
			<li><a <?php echo (Core::lang() == "en") ? "class='active'" : "" ?>href="<?php echo base_url("lang/en") ?>"><img src="<?php echo base_url("images/icons/flags/en.png") ?>" alt="Yoga Worlds Day in English" /></a></li>
			<li><a <?php echo (Core::lang() == "es") ? "class='active'" : "" ?>href="<?php echo base_url("lang/es") ?>"><img src="<?php echo base_url("images/icons/flags/es.png") ?>" alt="Yoga Worlds Day" /></a></li>
			<li><a <?php echo (Core::lang() == "fr") ? "class='active'" : "" ?>href="<?php echo base_url("lang/fr") ?>"><img src="<?php echo base_url("images/icons/flags/fr.png") ?>" alt="Yoga Worlds Day" /></a></li>
			<li><a <?php echo (Core::lang() == "cn") ? "class='active'" : "" ?>href="<?php echo base_url("lang/cn") ?>"><img src="<?php echo base_url("images/icons/flags/cn.png") ?>" alt="Yoga Worlds Day" /></a></li>
		</ul>
	</div>
	
	<!-- destaque principal -->
	<div class="main-highlight">
		<div class="slider">
			<?php foreach ($data->home_sliders as $slider): ?>
			<div class="main-slider-item">
				<p class="slider-item-caption"><?php echo $slider->caption ?></p>
				<?php if(!empty($slider->link)): ?>
				<?php $url = strpos("http://", $slider->link === false) ? base_url($slider->link) : $slider->link ?>
				<a target="<?php echo $slider->target ?>" href="<?php echo $url ?>">
					<img src="<?php echo base_url("client_files/" . $slider->image) ?>" alt="<?php echo $slider->caption ?>" />
				</a>
				<?php else: ?>
				<img src="<?php echo base_url("client_files/" . $slider->image) ?>" alt="<?php echo $slider->caption ?>" />
				<?php endif; ?>
			</div>
			<?php endforeach ?>
		</div>
	</div>
	<!-- /destaque principal -->

	<!-- slider em destaque -->
	<div class="highlight highlight-dark-yellow">
		<span class="highlight-title"><?php echo translate("EM_DESTAQUE_LABEL") ?></span>
		<div class="slider-container">
			<!-- carousel -->
			<div class="carousel">
				<!-- controls -->
				<button type="button" class="carousel-controls carousel-prev"></button>
				<button type="button" class="carousel-controls carousel-next"></button>
				<!-- /controls -->

				<!-- carousel itself -->
				<div class="carousel-this">
					<?php foreach ($em_destaque as $item): ?>				
					<!-- item -->
					<div class="carousel-item">
						<a target="<?php echo $item["target"] ?>" href="<?php echo $item["link"]; ?>">
							<span class="carousel-item-title"><?php echo $item["title"] ?></span>
							<img class="carousel-item-image" src="<?php echo $item["image"] ?>" alt="" />
							<span class="carousel-item-description"><?php echo $item["description"] ?></span>
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
	<!-- /slider em destaque -->

	<!-- static video right -->
	<div class="static-highlight-video">
		<div class="left">
			<div class="countdown-wrapper">
				<div id="countdown"></div>
			</div>
			<p style="padding-top: 5px; font-family: Oswald; color:#65a2ff; text-transform: uppercase; text-align: center; font-size: 26px; line-height: 40px; ">
				Dia Mundial do Yoga<br />
				World Yoga Day - WYD<br />
				Inter Étnico - Inter Cultural<br />
				Inter Religioso<br />
				<span style="font-size: 20px; line-height: 25px;">Candidato a primeiro dia Global da<br /> Humanidade<br />
				junto das nações unidas  e unesco</span>
			</p>
		</div>
		<div class="right">
			<iframe width="100%" height="320" src="//www.youtube.com/embed/PWdaYnX0XyA" frameborder="0" allowfullscreen></iframe>
			<div class="static-video-caption">Grande Comemoração do Dia Mundial do Yoga 2013 - Lisboa - Portugal - mais de 1000 praticantes celebraram este Dia em Portugal e mais de 30 cidades em todo o Mundo</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- static video right -->

	<!-- triple uneven collumn -->
	<div class="triple-collumn">

		<!-- comemoracoes -->
		<div class="collumn collumn-left">
			<div class="widget widget-yellow">
				<span class="widget-title"><?php echo translate("COMEMORACOES_LABEL") ?></span>
				<div class="widget-container widget-container-full-height">
					<ul class="lista-comemoracoes-yoga">
						<?php foreach ($data->comemoracoes_menu as $item): ?>
						<li><a href="<?php echo base_url(Core::lang() . "/comemoracoes/" . $item->url) ?>"><?php echo $item->title ?></a></li>	
						<?php endforeach ?>
					</ul>
					<span class="widget-show-rest"></span>
				</div>
			</div>
		</div>
		<!-- /comemoracoes -->

		<!-- noticias -->
		<div class="collumn collumn-center">
			<div class="widget widget-news widget-yellow">
				<span class="widget-title"><?php echo translate("NOTICIAS_LABEL") ?></span>
				<div class="widget-container widget-container-full-height">
					<p><?php echo $data->noticias->lead ?></p>
					<?php if (!empty($data->noticias->video)): ?>
					<iframe width="100%" height="85%" src="//www.youtube.com/embed/<?php echo $data->noticias->video ?>" frameborder="0" allowfullscreen></iframe>	
					<?php else: ?>
					<p><?php echo $data->noticias->content ?></p>
					<?php endif ?>					
				</div>
			</div>
		</div>
		<!-- /noticias -->

		<!-- dia mundial yoga -->
		<div class="collumn collumn-right">
			<div class="widget widget-dia-yoga widget-yellow">
				<span class="widget-title"><?php echo translate("O_DMY_LABEL") ?></span>
				<div class="widget-container">
					<ul class="mini-menu-dia-mundial-yoga">
						<?php foreach ($data->menu_dia_yoga as $item): ?>
						<li><a target="<?php echo $item->target ?>" href="<?php echo Tools::in_out_url($item->link) ?>"><?php echo $item->title ?></a></li>
						<?php endforeach ?>
					</ul>
					<span class="widget-show-rest"></span>
				</div>
			</div>

			<!-- apoiantes -->
			<div class="widget widget-apoiantes widget-yellow">
				<span class="widget-title"><?php echo translate("APOIANTES_LABEL") ?></span>
				<div class="widget-container">
					<ul class="widget-apoiantes-rotator">
						<?php foreach ($data->apoiantes as $apoiante): ?>
						<li><img src="<?php echo base_url("client_files/" . $apoiante->image) ?>" alt="<?php echo $apoiante->title ?>" /></li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
			<!-- /apoiantes -->

		</div>
		<!-- /dia mundial yoga -->

		<div class="clearfix"></div>
	</div>
	<!-- /triple uneven collumn -->

	<!-- triple uneven collumn -->
	<div class="triple-collumn">
		<div class="collumn collumn-left">
			<div class="collumn collumn-left">
				<!-- widget -->
				<?php /*
				<div class="widget widget-yellow">
					<span class="widget-title">Galeria</span>
					<div class="widget-container">
						<ul class="gallery-sections">
							<li class="icon icon-imprensa"><a href="#">Imprensa</a></li>
							<li class="icon icon-fotos"><a href="#">Fotos</a></li>
							<li class="icon icon-videos"><a href="#">Vídeos</a></li>
						</ul>
					</div>
				</div>
				*/ ?>
				<!-- /widget -->

				<?php echo Core::load_view("includes/views/newsletter-widget.php") ?>
				
			</div>
		</div>
		<div class="collumn collumn-center">
			<!-- widget -->
			<div class="widget widget-yellow">
				<span class="widget-title"><?php echo translate("ORADORES_LABEL") ?></span>
				<div class="widget-container widget-container-extra-padding">
					<!-- carousel -->
					<div class="carousel">
						<!-- controls -->
						<button type="button" class="carousel-controls-small carousel-prev"></button>
						<button type="button" class="carousel-controls-small carousel-next"></button>
						<!-- /controls -->

						<!-- carousel itself -->
						<div class="carousel-this">
							<?php foreach ($data->oradores as $item): ?>				
							<!-- item -->
							<div class="carousel-item-oradores">
								<?php if(!empty($item->link)): ?>
								<a target="<?php echo $item->target ?>" href="<?php echo Tools::in_out_url($item->link) ?>">
									<img class="carousel-item-image" src="<?php echo base_url("client_files/" . $item->image) ?>" alt="<?php echo $item->title ?>" />
								</a>
								<?php else: ?>
								<img class="carousel-item-image" src="<?php echo base_url("client_files/" . $item->image) ?>" alt="<?php echo $item->title ?>" />
								<?php endif; ?>
							</div>
							<!-- /item -->
							<?php endforeach ?>
						</div>
						<!-- /carousel itself -->
					</div>
					<!-- /carousel -->
				</div>
			</div>
			<!-- /widget -->
		</div>
		<div class="collumn collumn-right">
			<!-- widget -->
			<div class="widget widget-social widget-yellow">
				<span class="widget-title"><?php echo translate("REDES_SOCIAIS_LABEL") ?></span>
				<div class="widget-container">
					<div class="left">
						<a class="social-facebook" href="https://www.facebook.com/WORLDYOGADAY?ref=hl" target="_blank"><img src="<?php echo base_url("images/icons/facebook.gif") ?>" alt="Facebook" /><span>Acompanhe-nos no facebook!</span></a>
					</div>
					<div class="right">
						<a class="social-youtube" href="http://www.youtube.com/channel/UCqJ7q0XqpIcEnAIkftHYj2Q" target="_blank"><img src="<?php echo base_url("images/icons/youtube.gif") ?>" alt="Facebook" /><span>Assista aos nossos videos!</span></a>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- /widget -->
		</div>
	</div>
	<!-- triple uneven collumn -->

	<div class="clearfix"></div>

	<div class="yoga-mensagens">
		<ul>
			<?php foreach ($data->citacoes as $citacao): ?>
			<li>
				<div class="yoga-mensagem-imagem">
					<div class="quote">
						<p class="message"><?php echo nl2br($citacao->text) ?></p>
						<span class="author"><?php echo $citacao->autor ?></span>
					</div>
					<img src="<?php echo base_url("client_files/" . $citacao->image) ?>" alt="<?php echo $citacao->autor ?>" />
				</div>
			</li>
			<?php endforeach ?>
		</ul>
	</div>

	<!-- slider em destaque -->
	<div class="highlight highlight-dark-yellow">
		<span class="highlight-title"><?php echo SPONSORS_LABEL ?></span>
		<div class="slider-container white-background">
			<ul class="widget-sponsors-rotator">
				<?php foreach ($data->sponsors as $sponsor): ?>
					<li><img alt="<?php echo $sponsor->title ?>" src="<?php echo base_url("client_files/" . $sponsor->image) ?>" /></li>
				<?php endforeach ?>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>