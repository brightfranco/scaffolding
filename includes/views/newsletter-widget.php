<!-- widget newsletter -->
		<div class="widget widget-newsletter widget-yellow">
			<span class="widget-title"><?php echo translate("NEWSLETTER_LABEL") ?></span>
			<div class="widget-container">
				<p><?php echo translate("NEWSLETTER_CAPTION") ?></p>
				<div class="newsletter-subscribe">
					<form name="subscriber-add" method="post" action="<?php echo base_url("ajax/subscriber_add") ?>">
						<input type="text" class="placeholder" name="subscriber_email" placeholder="<?php echo translate("INSERT_EMAIL_LABEL") ?>" />
						<input type="submit" value="OK" />
						<div class="clearfix"></div>
					</form>
				</div>
			</div>
		</div>
		<!-- /widget newsletter -->