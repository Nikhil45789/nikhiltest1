<?php
/*
Plugin Name: smart
*/
?>
<?php
//theme panel

function theme_settings_page()
{ ?>
	<div class="wrap">
		<h1>Theme Panel</h1>
		<form method="post" action="options.php">
			<?php
			submit_button();
			settings_fields("section");
			do_settings_sections("theme-options");
			submit_button();
			?>
		</form>
	</div>
<?php }
function add_theme_menu_item()
{
	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");
function display_email()
{ ?>
	<input type="text" name="email" id="email" value="<?php echo get_option('email'); ?>" />
<?php }
function display_phone()
{ ?>
	<input type="text" name="phone" id="phone" value="<?php echo get_option('phone'); ?>" />
<?php }
function display_address()
{ ?>
	<input type="text" name="address" id="address" value="<?php echo get_option('address'); ?>" />
	<?php
}
function display_facebook()
{ ?>
	<input type="text" name="facebook" id="facebook" value="<?php echo get_option('facebook'); ?>" />
	<?php
}
function display_instagram()
{ ?>
	<input type="text" name="instagram" id="instagram" value="<?php echo get_option('instagram'); ?>" />
	<?php
}
function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	add_settings_field("email", "Email ID", "display_email", "theme-options", "section");
	add_settings_field("phone", "Phone No", "display_phone", "theme-options", "section");
	add_settings_field("address", "Address", "display_address", "theme-options", "section");
	add_settings_field("facebook", "Facebook URL", "display_facebook", "theme-options", "section");
	add_settings_field("instagram", "instagram URL", "display_instagram", "theme-options", "section");

	register_setting("section", "email");
	register_setting("section", "phone");
	register_setting("section", "address");
	register_setting("section", "facebook");
	register_setting("section", "instagram");
}
add_action("admin_init", "display_theme_panel_fields");


//.................Admin Logo.................................................//
function replace_wp_logo()
{
	echo '<style type="text/css">
		h1 a { background-image:url(' . site_url() . '/wp-content/uploads/2023/07/logo.png) !important; 
				background-size: 175px 59px !important;
				height: 60px !important;
				width: 315px !important;
			}
		</style>';
	add_filter('login_headerurl', 'fnAdminLogoURL');
	function fnAdminLogoURL($url)
	{
		return home_url();
	}
}
add_action('login_head', 'replace_wp_logo');
add_shortcode('header_call_button', 'header_call_button');
function header_call_button()
{
	ob_start();
	$phone = get_option('phone');
	?>
	<div class="call-wrap">
		<p class="call-text">CALL</p>
		<a href="tel: <?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo $phone ?> </a>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode('footer_info', 'footer_info');

function footer_info()
{
	ob_start();
	$fb = get_option('facebook');
	$ig = get_option('instagram');
	$address = get_option('address');
	$phone = get_option('phone');
	$email = get_option('email');
	?>
	<div class="footer-info-wrap">
		<ul class="footer-info-ul">
			<li class="address-li">
				<p>
					<?php
					echo $address;
					?>
				</p>
			</li>
			<li class="phone-li">
				<p class="call-text">CALL</p>
				<a href="tel: <?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo $phone ?> </a>
			</li>
			<li class="email-li">
				<p>Email</p>
				<a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a>
			</li>
		</ul>
		<ul class="social-wrap">
			<li class="facebook-li">
				<a href="<?php echo $fb; ?>">facebook</a>
			</li>
			<li class="instagram-li">
				<a href="<?php echo $ig; ?>">instagram</a>
			</li>
		</ul>
	</div>
	<?php
	return ob_get_clean();
}
add_shortcode('site_title', 'site_title');
function site_title()
{
	ob_start();
	echo '<a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a>';
	return ob_get_clean();
}