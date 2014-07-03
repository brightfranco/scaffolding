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
		

		<div class="widget widget-blue"><span class="widget-title">Contactos</span></div>

		<div class="freepage-content">
			<div class="google-maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12448.246096631763!2d-9.154379301916153!3d38.73935037673312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd19518bb9a290dd%3A0xc6b8dd8088d7da68!2sConfedera%C3%A7%C3%A3o+Portuguesa+do+Yoga!5e0!3m2!1spt-PT!2spt!4v1401991733562" width="100%" height="450" frameborder="0" style="border:0"></iframe>
			</div>

			<div class="talk-to-us">
				<h3>Fale connosco</h3>
				<p class="legend">Caso pretenda entrar em contacto, preencha o formulário abaixo. Seremos breves na resposta.</p>
			</div>

			<div class="contact-form">
				<div class="split-left">
					<address>
						<span><strong>CONFEDERAÇÃO PORTUGUESA DO YOGA</strong></span>
						<span>Av. 5 de Outubro, 70 - Gal. Esq.</span>
						<span>1050 - 059 Lisboa</span>
						<span>PORTUGAL</span>
						<span>Tel.: (+ 351) 217 802 810</span>
						<span>Email: info[at]diamundialdoyoga.pt</span>
					</address>
				</div>

				<div class="split-right form-fields">
					<form method="post" action="<?php echo base_url("ajax/contact_send") ?>" name="contact-form">
						<div class="form-control-group form-control-half">
							<label>Nome:</label>
							<input type="text" name="form_contact_nome" required="required" />
						</div>

						<div class="form-control-group form-control-half">
							<label>Email:</label>
							<input type="text" name="form_contact_email" required="required" />
						</div>

						<div class="form-control-group">
							<label>Mensagem:</label>
							<textarea name="form_contact_mensagem" required="required"></textarea>
						</div>

						<div class="form-control-group align-right">
							<input type="submit" value="Enviar" />
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>

	<div class="clearfix"></div>

</div>