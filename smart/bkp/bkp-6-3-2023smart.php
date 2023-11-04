<?php
/*
Plugin Name: smart
*/
?>
<?php
//all shortcodes
function shortcodes_init()
{
	add_shortcode('owl_carousel', 'owl_carousel');
	add_shortcode('community_gallery', 'community_gallery');
	add_shortcode('contact', 'contact');
	add_shortcode('menu', 'print_menu_shortcode');
	add_shortcode('copyright', 'copyright');
}

add_action('init', 'shortcodes_init');

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

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	add_settings_field("email", "email", "display_email", "theme-options", "section");
	add_settings_field("phone", "phone", "display_phone", "theme-options", "section");
	add_settings_field("address", "address", "display_address", "theme-options", "section");
	
	register_setting("section", "email");
	register_setting("section", "phone");
	register_setting("section", "address");
}
add_action("admin_init", "display_theme_panel_fields");


//---------------custom post type owl

function wporg_custom_post_type()
{
	register_post_type(
		'gallery',
		array(
			'labels'      => array(
				'name'          => __('gallery', 'textdomain'),
				
			),
			'public'      => true,
			'hierarchical' => true,
			'has_archive' => true,
			// 'show_in_rest' => true,


			'supports'    => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
			'rewrite'     => array('slug' => 'owl'),
		)
	);
}
add_action('init', 'wporg_custom_post_type');
//--owl carousel post type
function owl_carousel(){
$args = array(
    'post_type' => 'gallery',
);
$loop = new WP_Query($args);
?>
<div class="owl-theme owl-carousel">
<?php
while($loop->have_posts()): $loop->the_post();?>

<div class="item">	
<?php the_content(); ?>
<h4><?php the_title(); ?></h4>
</div>
<?
endwhile;
?>
</div>
<?php
wp_reset_query();
}
//---------------custom post type community gallery

function wporg_custom_post_type1()
{
	register_post_type(
		'community',
		array(
			'labels'      => array(
				'name'          => __('community', 'textdomain'),
				
			),
			'public'      => true,
			'hierarchical' => true,
			'has_archive' => true,
			// 'show_in_rest' => true,


			'supports'    => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
			'rewrite'     => array('slug' => 'owl'),
		)
	);
}
add_action('init', 'wporg_custom_post_type1');
// shortcode for community gallery
function community_gallery(){
	$args = array(
		'post_type' => 'community',
	);
	$loop = new WP_Query($args);
	?>
	<div class="community-gallery-wrap">
	<?php
	while($loop->have_posts()): $loop->the_post();?>
	<div class="community-gallery">	
	<?php the_content(); ?>
	</div>
	<?
	endwhile;
	?>
	</div>
	<?php
	wp_reset_query();
}
//short code for contact
function contact(){
	$email = get_option('email');
	$phone =get_option('phone');
	$address=get_option('address');
	?>
	<div class="contact-wrap">
<p><?php echo $address ?> </p>
<p> <h4>Phone</h4> <a href="tel: <?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo $phone ?> </a></p>
<p> <h4>Email</h4> <a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a></p>

	</div>

<?php
}
// short code for menu
function print_menu_shortcode($atts = [], $content = null)
{
	$shortcode_atts = shortcode_atts(['name' => '', 'class' => ''], $atts);
	$name = $shortcode_atts['name'];
	$class = $shortcode_atts['class'];
	return wp_nav_menu(array('menu' => $name, 'menu_class' => $class, 'echo' => false));
}

//[menu name="menu name" class=""]
function copyright(){
	?>
<h3>© <?php echo date("Y");?><a href="<?php echo get_site_url();?>"> <?php echo get_bloginfo('name'); ?></a>. All Rights Reserved.</h3>
	<?php
}