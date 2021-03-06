<section id="contact">
	<h3 class="section-title"><span><?php esc_html_e( 'Contact', 'realty' ); ?></span></h3>
  <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
  <?php
	  global $realty_theme_option;

	  // Use Contact Form 7 instead of theme contact form
	  if ( is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && $realty_theme_option['property-contact-form-cf7-shortcode'] ) {
  		echo do_shortcode( '[contact-form-7 id="' . $realty_theme_option['property-contact-form-cf7-shortcode'] . ']' );
  	} else {
 	?>
	  <form id="contact-form" method="post" action="<?php echo admin_url( 'admin-ajax.php' ); ?>">
			<div class="form-group">
				<input type="text" name="name" id="name" class="form-control" title="<?php esc_html_e( 'Please enter your name.', 'realty' ); ?>" placeholder="<?php esc_html_e( 'Name', 'realty' ); ?>" />
			</div>
			<div class="form-group">
				<input type="text" name="email" id="email" class="form-control" title="<?php esc_html_e( 'Please enter your email.', 'realty' ); ?>" placeholder="<?php esc_html_e( 'Email', 'realty' ); ?>" />
			</div>
			<div class="form-group">
				<input type="text" name="phone" id="phone" class="form-control" title="<?php esc_html_e( 'Please enter only digits for your phone number.', 'realty' ); ?>" placeholder="<?php esc_html_e( 'Phone', 'realty' ); ?>" />
			</div>
			<div class="form-group">
				<textarea name="message" rows="5" id="message" class="form-control" title="<?php esc_html_e( 'Please enter your message.', 'realty' ); ?>" placeholder="<?php esc_html_e( 'Message', 'realty' ); ?>"></textarea>
			</div>

			<?php	if ( empty( $realty_theme_option['google-recaptcha-site-key'] ) ) { ?>
				<p class="alert alert-info"><?php esc_html_e( 'Please enter your Google reCaptcha site keys under "Appearance > Theme Options > General".', 'realty' ); ?></p>
			<?php } else { ?>
				<div class="form-group" id="recaptcha_contact_form"></div>
				<input type="hidden" name="recaptcha">
			<?php } ?>

			<input type="submit" name="submit" value="<?php esc_html_e( 'Send Message', 'realty' ); ?>" >
			<input type="hidden" name="action" value="submit_property_contact_form" />
			<input type="hidden" name="nonce" value="<?php echo wp_create_nonce(); ?>" />
			<?php if ( isset( $email ) && ! empty( $email ) ) { // Check If Agent Has An Email Address ?>
				<input type="hidden" name="agent_email" value="<?php echo antispambot( $email ); ?>">
			<?php } else { // No Agent Email Address Found -> Send Email To Site Administrator ?>
				<input type="hidden" name="agent_email" value="<?php echo antispambot( $property_contact_form_default_email ); ?>">
			<?php } ?>
			<input type="hidden" name="property_title" value="<?php echo get_the_title( get_the_ID() ); ?>" />
			<input type="hidden" name="property_url" value="<?php echo get_permalink( get_the_ID() ); ?>" />
		</form>
	<?php } ?>

	<div id="form-success" class="hide alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<?php esc_html_e( 'Message has been sent successfully.', 'realty' ); ?>
	</div>
	<div id="form-submitted"></div>

	<script>
  	var contactFormCaptcha;
  	var getResponseContactForm;

    var onloadCallback = function() {
      contactFormCaptcha = grecaptcha.render('recaptcha_contact_form', {
        'sitekey' : '<?php echo $realty_theme_option['google-recaptcha-site-key']; ?>',
        'callback' : getResponseContactForm,
      });
    };
	</script>

	<script type="text/javascript" src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>

	<script>
		(function($) {
		  "use strict";

			$(document).ready(function() {

			  $('#contact-form').validate({
				  ignore: [],
					rules: {
						email: {
							required: true,
							email: true
						},
						message: {
							required: true
						},
						recaptcha: {
							required:
							function() {
								getResponseContactForm = grecaptcha.getResponse(contactFormCaptcha);
								if(getResponseContactForm.length == 0) {
									//reCaptcha not verified
									return true;
								}
								else {
									//reCaptcha verified
									return false;
								}
							}
						}
					},
					messages: {
						email: "<?php esc_html_e( 'Please enter your email address.', 'realty' ); ?>",
						message: "<?php esc_html_e( 'Please enter a message.', 'realty' ); ?>",
						recaptcha: "<?php esc_html_e( 'Please verify the reCaptcha.', 'realty' ); ?>",
					},
					submitHandler: function(form) {
						$(form).ajaxSubmit({
							error: function() {
								alert(getResponseContactForm);
								$('#form-success').addClass('hide');
							},
							success: function() {
								var formData = $('#contact-form').serialize();
								$('#form-success').removeClass('hide');
								$.ajax({
									type: 'GET',
									url: ajax_object.ajax_url,
									data: formData,
									success:function(){
										//console.log(formData);
										console.log("Message sent.");
					       	},
					       	error:function(){
						       	console.log("Error: "+formData);
					       	}
								});
							}
						});
					}
				});

			});

		})(jQuery);
	</script>

</section>