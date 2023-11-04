404
<?php
/*
Plugin Name: smart
*/
?>
<?php
//all shortcodes

$post1 = "";
$post1slug = "";
$post2 = "";
$post2slug = "";
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
function display_google()
{ ?>
	<input type="text" name="google" id="google" value="<?php echo get_option('google'); ?>" />
	<?php
}
function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	add_settings_field("email", "Email ID", "display_email", "theme-options", "section");
	add_settings_field("phone", "Phone No", "display_phone", "theme-options", "section");
	add_settings_field("address", "Address", "display_address", "theme-options", "section");
	add_settings_field("facebook", "Facebook URL", "display_facebook", "theme-options", "section");
	add_settings_field("google", "Google URL", "display_google", "theme-options", "section");

	register_setting("section", "email");
	register_setting("section", "phone");
	register_setting("section", "address");
	register_setting("section", "facebook");
	register_setting("section", "google");
}
add_action("admin_init", "display_theme_panel_fields");


//---------------custom post type owl

function wporg_custom_post_type()
{
	register_post_type(
		$GLOBALS['post1'],
		array(
			'labels' => array(
				'name' => __($GLOBALS['post1'], 'textdomain'),
			),
			'public' => true,
			'hierarchical' => true,
			'has_archive' => true,
			// 'show_in_rest' => true,


			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'custom-fields',
			),
			'rewrite' => array('slug' => $GLOBALS['post1slug']),
		)
	);
}
add_action('init', 'wporg_custom_post_type');
//--owl carousel post type


function wporg_custom_post_type1()
{
	register_post_type(
		$GLOBALS['post2'],
		array(
			'labels' => array(
				'name' => __($GLOBALS['post2'], 'textdomain'),

			),
			'public' => true,
			'hierarchical' => true,
			'has_archive' => true,
			// 'show_in_rest' => true,


			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'author',
				'thumbnail',
				'comments',
				'revisions',
				'custom-fields',
			),
			'rewrite' => array('slug' => $GLOBALS['post2slug']),
		)
	);
}
add_action('init', 'wporg_custom_post_type1');



function shortcodes_init()
{
	add_shortcode('owl_carousel', 'owl_carousel');
	add_shortcode('community_gallery', 'community_gallery');
	add_shortcode('community_gallery1', 'community_gallery1');
	add_shortcode('contact', 'contact');
	add_shortcode('menu', 'print_menu_shortcode');
	add_shortcode('copyright', 'copyright');
	add_shortcode('news_letter', 'news_letter');
	add_shortcode('bread_crumb', 'bread_crumb');
}

add_action('init', 'shortcodes_init');

function owl_carousel()
{
	ob_start();
	$args = array(
		'post_type' => 'gallery',
	);
	$loop = new WP_Query($args);
	?>
	<div id="what-carousel">
		<div class="owl-theme owl-carousel">
			<?php
			while ($loop->have_posts()):
				$loop->the_post(); ?>

				<div class="item">
					<div class="carosel-image">
						<?php echo get_the_post_thumbnail(); ?>
					</div>
					<div class="carosel-title">
						<h4>
							<?php the_title(); ?>
						</h4>
					</div>

				</div>
			<?
			endwhile;
			?>
		</div>
	</div>
	<?php
	wp_reset_query();
	return ob_get_clean();
}
//---------------custom post type community gallery
// shortcode for community gallery
function community_gallery()
{
	ob_start();
	$args = array(
		'post_type' => 'community',
	);
	$loop = new WP_Query($args);
	?>
	<div class="community-gallery-wrap" id="community-carousel">
		<?php
		$i = 0;
		while ($loop->have_posts()):
			$loop->the_post();
			if ($i % 2 == 0) {
				?>
				<div class="community-gallery item">
				<?php } ?>
				<div class="community-gallery-item">
					<?php echo get_the_post_thumbnail(); ?>
				</div>
				<?php
				if ($i % 2 != 0) {
					?>
				</div>
			<?
				}
				$i++;
		endwhile;
		?>
	</div>
	<?php
	wp_reset_query();
	return ob_get_clean();
}

function community_gallery1()
{
	ob_start();
	$args = array(
		'post_type' => 'community',
	);
	$loop = new WP_Query($args);
	?>
	<div class="community-gallery-wrap">
		<?php
		while ($loop->have_posts()):
			$loop->the_post(); ?>

			<div class="community-gallery">
				<a data-fancybox="galleries">
					<?php echo get_the_post_thumbnail(); ?>
				</a>
			</div>
		<?
		endwhile;
		?>
	</div>
	<?php
	wp_reset_query();
	return ob_get_clean();
}
//short code for contact
function contact()
{
	ob_start();
	$email = get_option('email');
	$phone = get_option('phone');
	$address = get_option('address');
	?>
	<div class="contact-wrap">
		<div class="adress-wrap">
			<?php echo $address ?>
		</div>
		<div class="phone-wrap">
			<h4>Phone</h4> <a href="tel: <?php echo preg_replace('/[^0-9]/', '', $phone); ?>"><?php echo $phone ?> </a>
		</div>
		<div class="email-wrap">
			<h4>Email</h4> <a href="mailto:<?php echo $email; ?>"><?php echo $email ?></a>
		</div>

	</div>


	<?php
	return ob_get_clean();
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
function copyright()
{
	ob_start();
	?>
	<h3>©
		<?php echo date("Y"); ?><a href="<?php echo get_site_url(); ?>"> <?php echo get_bloginfo('name'); ?></a>. All Rights
		Reserved.
	</h3>
	<?php
	return ob_get_clean();
}
function news_letter()
{
	ob_start();
	$output = '';

	$output .= '<div class="news_letter">' . get_epicwin_box() . '</div>';

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
function bread_crumb()
{
	ob_start();
	if (function_exists('yoast_breadcrumb')) {
		?>
		<div class="bread-crumb">
			<?php
			yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
			?>
		</div>
		<?php
	}
	return ob_get_clean();

}

function get_breadcrumb()
{
	ob_start();
	global $post;

	?>

	<?php if (!is_front_page()) {
		//die("318");
		?>
		<div Class="breadcrumbs">
			<div class="container">
				<ul class="breadcrumb ">

					<?php

					if (is_404()) { ?>
						<li><a href="<?php echo site_url(); ?>">Home</a></li>
						<li>404 ERROR</li>
						<?php
					} else if (is_home()) { ?>
							<li><a href="<?php echo site_url(); ?>">Home</a></li>
							<li>Articles</li>
						<?php
					} else {

						?>
							<li><a href="<?php echo site_url(); ?>">Home</a></li>
							<?php

							if (is_single()) {

								$categories = get_the_category();

								if (is_category()) {

									echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Articles</a></li>';
									//~ echo '<li>Category</li>'; 
									?>
									<li>
									<?php echo single_cat_title(); ?>
									</li>
								<?php


								}
								echo '<li><a href="https://welderswisdom.webmasterindia.net/articles/" class="article-list">Articles</a></li>';
								echo '<li>' . get_the_title() . '</li>';
							}
							if (is_category()) {
								echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Articles</a></li>';
								echo '<li>CATEGORY</li>';
								?>
								<li>
								<?php echo strtoupper(single_cat_title()); ?>
								</li>
							<?php


							}


							if (is_tag()) {
								echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Articles</a></li>';
								echo '<li>TAG</li>';

								?>
								<li>
								<?php echo strtoupper(single_tag_title()); ?>
								</li>
							<?php
							}

							if (is_page() && $post->post_parent) {
								// echo 'hello';
								$parent_id = $post->post_parent;

								$breadcrumbs = array();
								while ($parent_id) {
									$page = get_page($parent_id);
									//var_dump($page);
									$replace = get_the_title($page->ID);
									$parent_link = get_permalink($page->ID);
									//echo '<pre>'; print_r($parent_link);
				
									$parent_id = $page->post_parent;
								}
								//echo '<pre>';
								//print_r($breadcrumbs);
				
								$breadcrumbs = array_reverse($breadcrumbs);
								foreach ($breadcrumbs as $crumb)
									echo $crumb . ' ' . $delimiter . ' ';
							}

							if (is_search()) {

								echo '<li><a href="' . get_permalink(get_option('page_for_posts')) . '">Articles</a></li>';
								?>
								<li>Search results for "
								<?php echo get_search_query(); ?>"
								</li>
							<?php
							}
							if (!is_home() && !is_front_page() && !is_tag() && !is_category() && !is_single() && !is_search()) {
								echo '<li>' . get_the_title() . '</li>';
							}
					}
					?>
				</ul>
			</div>
		</div>
		<?php
	}
	return ob_get_clean();
}

add_shortcode("get_breadcrumb", "get_breadcrumb");


add_shortcode('site_title', 'site_title');
function site_title()
{
	ob_start();
	echo '<a href="' . get_site_url() . '">' . get_bloginfo('name') . '</a>';
	return ob_get_clean();
}

function case_list()
{
	ob_start();
	$args = array(
		'post_type' => 'Case studies',
		'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
		'posts_per_page' => 9,

	);

	$query = new WP_Query($args);
	//print_r($query);
	if ($query->have_posts()) {
		$result = '<div class="whitepapers-full-wrap">';
		$result .= '<div class="whitepapers-wrap">';
		while ($query->have_posts()):
			$query->the_post();
			$result .= '<div class="whitepapers-item-wrap">';
			$result .= '<div class="whitepapers-image">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</div>';
			$result .= '<div class="news-client-name">' . get_the_title() . '</div>';
			$result .= '<div class ="whitepapers-date">' . get_the_date() . '</div>';
			$result .= '<span class="ai-algo-title">' . substr(get_the_content(), 0, 300) . '</span>';
			$result .= '<a href="' . get_the_permalink() . '" class="read-btn">Read More</a>';
			$result .= '</div>';
		endwhile;
		$result .= '</div>';

		$result .= '</div>';
		$result .= '<div class="Pagination-wrap">';
		$big = 999999999; // need an unlikely integer
		$result .= paginate_links(
			array(
				'base' => str_replace($big, '%#%', get_pagenum_link($big)),
				'format' => '?paged=%#%',
				'current' => max(1, get_query_var('paged')),
				'total' => $query->max_num_pages
			)
		);
		$result .= '</div>';
	}
	wp_reset_postdata();
	echo $result;
	return ob_get_clean();
}


function case_studies()
{
	register_post_type(
		'Casestudies',
		// CPT Options

		array(
			'labels' => array(
				'name' => __('Case studies'),
				'singular_name' => __('Case studies')
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'new-case-studies'),
			'taxonomies' => array('category'),
			'show_in_rest' => true,
			'supports' => array('title', 'thumbnail', 'editor', 'page-attributes', 'excerpt'),
		)
	);
}
add_action('init', 'case_studies');


function my_register_banner()
{
	/* 
			  ==========================================404-PAGE-BANNER===============================================
		  */
	register_sidebar(
		array(

			'id' => '404-banner',
			'name' => __('Custom 404 banner'),
			'description' => __('This widget will be created for displaying 404 banner'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		)
	);

}
add_action('widgets_init', 'my_register_banner');

//.................Admin Logo.................................................//
function replace_wp_logo()
{
	echo '<style type="text/css">
		h1 a { background-image:url(' . site_url() . '/wp-content/uploads/2023/06/logo.png) !important; background-size: 280px 50px !important;
		height: 60px !important;
		width: 315px !important;
		background-color: black;
		}
		    div#login h1 a {
			   
				background-color:black;
			}
		</style>';
	add_filter('login_headerurl', 'fnAdminLogoURL');
	function fnAdminLogoURL($url)
	{
		return home_url();
	}
}
add_action('login_head', 'replace_wp_logo');