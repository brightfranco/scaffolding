<?php 
	$comemoracoes_menu = Home::get_comemoracoes_menu();
	$main_links_menu = Home::get_menu("dmy_menu_sidebar");

?>

<div class="sidebar">

		<?php foreach ($main_links_menu as $item): ?>
		<div class="widget widget-yellow"><a target="<?php echo $item->target ?>" href="<?php echo Tools::in_out_url($item->link) ?>"><span class="widget-title"><?php echo $item->title ?></span></a></div>	
		<?php endforeach ?>

		<!-- comemoracoes -->
		<div class="collumn collumn-left">
			<div class="widget widget-yellow">
				<span class="widget-title"><?php echo translate("COMEMORACOES_LABEL") ?></span>
				<div class="widget-container widget-container-full-height">
					<ul class="lista-comemoracoes-yoga">
						<?php foreach ($comemoracoes_menu as $item): ?>
						<li><a href="<?php echo base_url(Core::lang() . "/comemoracoes/" . $item->url) ?>"><?php echo $item->title ?></a></li>	
						<?php endforeach ?>
					</ul>
					<span class="widget-show-rest"></span>
				</div>
			</div>
		</div>
		<!-- /comemoracoes -->

		<!-- links -->
		<div class="widget widget-blue"><a target="_blank" href="http://www.confederacaoportuguesadoyoga.pt"><span class="widget-title">Associação Lusa do Yoga - ALYO</span></a></div>
		<div class="widget widget-blue"><a target="_blank" href="http://www.federacaolusadoyoga.pt/"><span class="widget-title">Federação Lusa do Yoga - FLY</span></a></div>
		<!-- /links -->

		<div class="widget-facebook"><a target="_blank" href="https://www.facebook.com/events/650680681652891"><img src="<?php echo base_url("images/facebook.jpg") ?>" /></a></div>

		<?php echo Core::load_view("includes/views/newsletter-widget.php") ?>
	</div>