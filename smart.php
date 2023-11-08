<?php
/*
Plugin Name: smart
Plugin URI: http://www.smartinfosys.net
Description: custom post type
Version: 1.0 
Author: Smart Infosys
Author URI: http://smartinfosys.net/
*/



function add_my_custom_scripts()
{
  /*----------------------------------css----------------------------------------------------- */
  // wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
  // wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css' );
  wp_enqueue_style( 'font-awwesome', 'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
  wp_enqueue_style('owl-style', get_stylesheet_directory_uri() . '/css/owl.carousel.css');
  wp_enqueue_style('fancy-box', get_stylesheet_directory_uri() . '/css/jquery.fancybox.css');
  wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/css/custom.css');
  wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/main-style.css');
  wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
  // wp_enqueue_style('owl-style', get_stylesheet_directory_uri() . '/css/font-awesome.css');
  /*-----------------------------------------js-------------------------------------------------------- */
  wp_enqueue_script('owl-carousel', get_stylesheet_directory_uri() . '/js/owl-carousel.js', array('jquery'));
  wp_enqueue_script('fancy-box-js', get_stylesheet_directory_uri() . '/js/jquery.fancybox.pack.js', array('jquery'));
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'add_my_custom_scripts');
add_filter('wpcf7_autop_or_not', '__return_false');

// function yikes_mailchimp_filter_success_text( $response_text, $form_id) {
//   if( $form_id == '#mc4wp-form-2') {
//       $response_text = 'Thanks for subscribing , please check your inbox.';
//   }
//   return $response_text;
// }
// add_filter( 'yikes-mailchimp-success-response', 'yikes_mailchimp_filter_success_text', 10, 3 );

function theme_settings_page()
{
?>
  <div class="wrap">
    <h1>Theme panel</h1>
    <form method="post" action="options.php">
      <?php
      settings_fields("section");
      do_settings_sections("Theme-panel");
      submit_button();
      ?>
    </form>
  </div>
<?php
}

function add_theme_menu_item()
{
  add_menu_page("Theme panel", "Theme panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_instagram_element()
{
?>
  <input type="url" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
<?php
}

function display_facebook_element()
{
?>
  <input type="url" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
<?php
}

function display_tiktok_element()
{
?>
  <input type="url" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
<?php
}

function display_linkedin_url_element()
{
?>
  <input type="url" name="linkedin_url" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" />
<?php
}

function display_address_element()
{
?>
  <input type="text" name="address" id="address" value="<?php echo get_option('address'); ?>" />
<?php
}
function display_welcome_element()
{
    $welcome_message = get_option('welcome'); // Get the existing value if it exists
    ?>
    <textarea cols="40" rows="10" name="welcome" id="welcome"><?php echo esc_attr($welcome_message); ?></textarea>
    <?php
}


function display_theme_panel_fields()
{
  add_settings_section("section", "All Settings", null, "Theme-panel");
  add_settings_field("instagram_url", "Instagram Url", "display_instagram_element", "Theme-panel", "section");
  add_settings_field("facebook_url", "Facebook Url", "display_facebook_element", "Theme-panel", "section");
  add_settings_field("twitter_url", "Twitter Url", "display_tiktok_element", "Theme-panel", "section");
  add_settings_field("linkedin_url", "Linkedin Url", "display_linkedin_url_element", "Theme-panel", "section");
  //   add_settings_field("fphoneno", "Phone No", "display_fphoneno_element", "Theme-panel", "section");
  //   add_settings_field("openinghour", "Opening Hours", "display_openinghour_element", "Theme-panel", "section");
  add_settings_field("address", "Email", "display_address_element", "Theme-panel", "section");
  // add_settings_field("welcome", "welcome", "display_welcome_element", "Theme-panel", "section");
  add_settings_section("theme_panel_section", "Theme Panel Section", null, "Theme-panel");

    add_settings_field("welcome", "Welcome Message", "display_welcome_element", "Theme-panel", "theme_panel_section");

  register_setting("section", "instagram_url");
  register_setting("section", "facebook_url");
  register_setting("section", "twitter_url");
  register_setting("section", "linkedin_url");
  register_setting("section", "address");
  // register_setting("section", "welcome");
  register_setting("theme_panel_section", "welcome");

  //   register_setting("section", "openinghour");
  //   register_setting("section", "fphoneno");
}

add_action("admin_init", "display_theme_panel_fields");

function welcome_message(){
  ob_start();
 $wel= get_option('welcome');
 echo "<div>Dummy</div>";
 var_dump($wel); 
  return ob_clean();

}
add_shortcode('welcome-message','welcome_message');

// Shortcodes

function sociallink()
{
  ob_start();
  $facebook = get_option('facebook_url');
  $instagram = get_option('instagram_url');
  $tiktok = get_option('twitter_url');
  $linkedin = get_option('linkedin_url');
?>
  <ul class="socialicon-link">
    <?php if (!empty($facebook)) { ?>
      <li class="facebook"><a target="_blank" href="<?php echo esc_url($facebook); ?>">Facebook</a></li>
    <?php } ?>

    <?php if (!empty($tiktok)) { ?>
      <li class="twitter"><a target="_blank" href="<?php echo esc_url($tiktok); ?>">Twitter</a></li>
    <?php } ?>

    <?php if (!empty($linkedin)) { ?>
      <li class="instagram"><a target="_blank" href="<?php echo esc_url($linkedin); ?>">Instagram</a></li>
    <?php } ?>

    <?php if (!empty($instagram)) { ?>
      <li class="linkedin url"><a target="_blank" href="<?php echo esc_url($instagram); ?>">Linkedin</a></li>
    <?php } ?>
  </ul>
<?php
  return ob_get_clean();
}

add_shortcode('sociallink', 'sociallink');

// Address Shortcode

function redfern_address()
{
  ob_start();
  $phone = get_option('fphoneno');
?>
  <ul class='contact_us'>
    <?php if (!empty(get_option('address'))) { ?>
      <li class="address">
        <p class='cname-next-line'>
          <!-- <label class="address-labal">Address</label> -->
        <p class="address-text"><a href="mailto:<?php echo esc_attr(get_option('address')); ?>">
            <?php echo esc_attr(get_option('address')); ?></a></p>
        </p>
      </li>
    <?php } ?>
  </ul>
<?php
  return ob_get_clean();
}

add_shortcode('address', 'redfern_address');

// Crazy Footer Styles

function my_crazy_admin_footer()
{
  echo '<style type="text/css">
  #wp-admin-bar-wp-logo, #wp-admin-bar-updates, #wp-admin-bar-comments, #wp-admin-bar-new-content,
  #dashboard_right_now .b-tags,
  #dashboard_right_now .tags, #wpfooter,
  #dashboard_right_now .b-comments,
  #dashboard_right_now .comments,#dashboard_right_now .b-posts,
  #dashboard_right_now .posts,#dashboard_right_now .table_discussion, .plugin-version-author-uri, .plugin-update-tr, .update-plugins, .update-nag, #wp-version-message, #dashboard_right_now .main p {
    display:none !important;
  }
  </style>';
}
add_action('admin_footer', 'my_crazy_admin_footer');

// Admin Logo

function replace_wp_logo()
{ ?>
  <style type="text/css">
    #login h1 a,
    .login h1 a {
      background-image: url(<?php echo get_site_url();
                            ?>/wp-content/uploads/2023/09/header-logo.png) !important;
      height: 100px;
      width: 320px;
      background-size: 320px 100px;
      background-repeat: no-repeat;
      /* background-color: black; */
      background-position: center;
      background-size: contain;
      padding-bottom: 30px;
    }
  </style>
  <?php
}
add_action('login_head', 'replace_wp_logo');

add_filter('login_headerurl', 'fnAdminLogoURL');
function fnAdminLogoURL($url)
{
  return home_url();
}

function page_url_function()
{
  ob_start();
  global $post;

  if (!is_front_page()) {
  ?>
    <div class="container">
      <ul class="breadcrumb">
        <?php
        $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $ul = explode("/", $path);
        $site_url = esc_url(site_url());
        $current_url = esc_url(add_query_arg(array()));

        if (is_404()) { ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <li>404 ERROR</li>
        <?php } elseif (is_home()) { ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <li class="brdcum-page">Blog</li>
        <?php } elseif (strpos($current_url, '/pre-op-primer/') !== false ||strpos($current_url, '/hormone-harmony/') !== false || strpos($current_url, '/rechargex/') !== false|| strpos($current_url, '/purecleanse-detox/') !== false ) { ?>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li class="brdcum-li"><a href="<?php echo site_url(); ?>/#programs-page" class="">Programs</a></li>
          <li class="brdcum-li"><a href="<?php echo site_url(); ?>/individual-programs">Individual Programs</a></li>
          <li class="brdcum-page"><?php echo get_the_title(); ?></li>
        <?php } elseif (strpos($current_url, '/corporate-program/') !== false || strpos($current_url, '/individual-programs/') !== false) { ?>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li class="brdcum-li"><a href="<?php echo site_url(); ?>/#programs-page" class="">Programs</a></li>
          <li class="brdcum-page"><?php echo get_the_title(); ?></li>
        <?php } elseif (strpos($current_url, '/our-credentials/') !== false)  { ?>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li class="brdcum-li"><a href="<?php echo site_url(); ?>/#about-us" class="">About us</a></li>
          <li class="brdcum-page"><?php echo get_the_title(); ?></li>
        <?php } elseif (strpos($current_url, '/category/') !== false) { ?>
          <li><a href="<?php echo site_url(); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a></li>
          <li class="brdcum-li">Category</li>
          <li class="brdcum-page">
            <?php
            $category = get_queried_object(); // Get the current category object
            echo $category->name; // Display the category name
            ?>
          </li>
        <?php } elseif (is_single()) { ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <?php if (class_exists('WooCommerce') && is_product()) { ?>
            <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_shop_page_id'))); ?>">Shop</a></li>
            <?php
            global $product;
            if ($product) {
              $product_categories = get_the_terms($product->get_id(), 'product_cat');
              if ($product_categories && !is_wp_error($product_categories)) {
                $product_category = array_shift($product_categories); // Assuming the product belongs to only one category
            ?>
                <li><a href="<?php echo esc_url(get_term_link($product_category)); ?>"><?php echo esc_html($product_category->name); ?></a></li>
              <?php }
              ?>
              <li class="brdcum-page"><?php echo esc_html($product->get_title()); ?></li>
            <?php
            }
          } else { ?>
            <li><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">Blog</a></li>
            <li class="brdcum-page"><?php echo get_the_title(); ?></li>
          <?php }
        } elseif (is_shop()) { // Check if it's the shop page 
          ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <li class="brdcum-li">Shop</li>
        <?php } elseif (is_product_category()) { ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <li><a href="<?php echo esc_url(get_permalink(get_option('woocommerce_shop_page_id'))); ?>">Shop</a></li>
          <li class="brdcum-li"><?php echo single_cat_title(); ?></li>
        <?php } elseif (is_account_page()) {
        ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
          <li ><a href="<?php echo  wc_get_page_permalink('myaccount'); ?>">My Account</a></li>
        <?php echo '<li> My ' . esc_html(get_the_title()) . '</li>';
        } else { ?>
          <li><a href="<?php echo esc_url(site_url()); ?>">Home</a></li>
        <?php echo '<li>' . esc_html(get_the_title()) . '</li>';
        } ?>
      </ul>
    </div>
  <?php
  }
  return ob_get_clean();
}

add_shortcode('breadcrumb', 'page_url_function');






/* ---------------------------------------Testimonial--------------------------------------*/


function display_all_Testimonial()
{
  ob_start();
  $args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => -1
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {

    $result = '<div class="testimonial-main-wrap">';
    $result .= '<div class="testimonial-container owl-carousel">';
    while ($query->have_posts()) {
      $query->the_post();

      $result .= '<div class="Testimonial-section">';
      // $result .= '<h2 class= "testimonial-title">' . get_the_excerpt() . '</h2>';
      $result .= '<span class="testimonial-contact">' . get_the_content() . ' </span>';
      $result .= '<span class="testimonial-name"> ' . get_the_title() . ' </span>';
       $result .= '</div>';
    }
    $result .= '</div>';
    $result .= '</div>';
    wp_reset_postdata();
  }
  echo $result;
  return ob_get_clean();
}
add_shortcode("Testimonial", "display_all_Testimonial");

/*----------------------------------Blog--------------------------------- */
function display_all_post()
{
  ob_start();
  $args = array(
    'post_type' => 'post',

    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'title',
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {

    $result = '<div class="blog-wrap">';
    $result .= '<div class="post-container owl-carousel">';
    while ($query->have_posts()) : $query->the_post();

      $result .= '<div class="blog-section">';
      $result .= '<span class="blog-image Workplace-image"> <a class="read-more" href="' . get_the_permalink() . '">' . get_the_post_thumbnail(get_the_ID(), 'full') . '</a> </span>';
      $result .= '<span class="post-date">' . sprintf('%02d', get_the_time('j')) . ' ' . get_the_time('M') . ', ' . get_the_time('Y') . ' </span>';
      $result .= '<span class="post-name"><a class="read-more" href="' . get_the_permalink() . '"> ' . get_the_title() . ' </a></span>';
      if (is_home() || is_front_page()) {
        $result .= '<div class="cremation-details">' . substr(get_the_excerpt(), 0, 151) . '...</div>';

        $result .= '<span class="post-read-more common-btn"><a class="read-more" href="' . get_the_permalink() . '">READ MORE </a></span>';
      }

      $result .= '</div>';
    endwhile;
    $result .= '</div>';
    $result .= '</div>';
  }
  echo $result;
  wp_reset_postdata();
  return ob_get_clean();
}
add_shortcode("blog", "display_all_post");


function widgets_articles()
{
  ob_start();
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
  );
  $query = new WP_Query($args);
  if ($query->have_posts()) {

    $result = '<div class="widget recent-posts-widget-with-thumbnails">';
    $result .= '<div class="rpwwt-widget">';
    $result .= '<h4 class="widget_title"><span>Articles</span></h4>';
    $result .= '<ul class="articles-list">'; // Add a class to the <ul> for easier manipulation with JavaScript
    $count = 0; // Initialize a counter

    while ($query->have_posts()) {
      $query->the_post();
      $result .= '<li class="article-item'; // Add a class to each <li> for manipulation
      if ($count >= 3) {
        $result .= ' hidden'; // Initially hide items beyond the first 3
      }
      $result .= '">';
      $result .= '<div class="articles-wrap">';
      $result .= '<span class="articles-img">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</span>';
      $result .= '<span class="title-text-wrap">';
      $result .= '<a href="' . get_the_permalink() . '">';
      $result .= '<h3 class="articles-title">' . substr(get_the_title(), 0, 17) . '</h3>';
      $result .= '</a>';
      $result .= '<span class="articles-text">' . substr(get_the_excerpt(), 0, 92) . '...';
      $result .= '</span>';
      $result .= '</span>';
      $result .= '</div>';
      $result .= '</li>';
      $count++;
    }
    $result .= '</ul>';

    if ($count > 3) {
      // If there are more than 3 items, add a "show more" button
      $result .= '<button class="show-more-button">Expand All</button>';
    }

    $result .= '</div>';
    $result .= '</div>';
    wp_reset_postdata();
  }
  echo $result;
  return ob_get_clean();
}
add_shortcode("widgets-article", "widgets_articles");


/*-----------------------------------pagination- code ------------------- */
function custom_pagination_shortcode($atts)
{
  $atts = shortcode_atts(array(
    'query' => null,
    'paged' => 1,
    'max_pages' => 1,
  ), $atts);

  return custom_pagination($atts['query'], $atts['paged'], $atts['max_pages']);
}

add_shortcode('custom_pagination', 'custom_pagination_shortcode');

/*---------------Mini <Cart----------------*/

function custom_mini_cart()
{
  if (WC()->cart) {
    $items_count = WC()->cart->get_cart_contents_count();
    $items_sub_total = WC()->cart->get_cart_subtotal();
    echo '<div class="minicart-dropdown">';
    echo '<a href="' . get_site_url() . '/cart" class="dropdown-back" data-toggle="dropdown"> ';
    echo '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
    echo '<div class="basket-item-count" style="display: inline;">';
    echo '<span class="cart-items-count count">';
    echo $items_count ? $items_count : '0';
    echo '</span>';
    echo '</div>';
    echo '<div class="basket-price">';
    echo '<p>CART</p>';
    // echo '<span class="cart-item-price price">';
    // echo $items_sub_total ? $items_sub_total : get_woocommerce_currency_symbol() . '0.00';
    echo '</span>';
    echo '</div>';
    echo '</a>';
    echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
    echo '<li> <div class="widget_shopping_cart_content">';
    woocommerce_mini_cart();
    echo '</div></li></ul>';
    echo '</div>';
  }
}
add_shortcode('custom_mini_cart', 'custom_mini_cart');
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments)
{
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
  ?>
  <span class="cart-items-count count"><?php echo $items_count ? $items_count : '0'; ?></span>
<?php
  $fragments['.cart-items-count'] = ob_get_clean();
  return $fragments;
}

add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_subtotal');
function wc_refresh_mini_cart_subtotal($fragments)
{
  ob_start();
  $items_sub_total = WC()->cart->get_cart_subtotal();
?>
  <span class="cart-item-price price"><?php echo $items_sub_total ? $items_sub_total : '0.00'; ?></span>
<?php
  $fragments['.cart-item-price'] = ob_get_clean();
  return $fragments;
}

add_filter('woocommerce_cart_item_removed', 'wc_refresh_mini_cart_count_second');
function wc_refresh_mini_cart_count_second($fragments)
{
  ob_start();
  $items_count = WC()->cart->get_cart_contents_count();
?>
  <span class="cart-items-count count"><?php echo $items_count ? $items_count : '0'; ?></span>
<?php
  $fragments['.cart-items-count'] = ob_get_clean();
  return $fragments;
}

add_filter('woocommerce_cart_item_removed', 'wc_refresh_mini_cart_subtotal_second');
function wc_refresh_mini_cart_subtotal_second($fragments)
{
  ob_start();
  $items_sub_total = WC()->cart->get_cart_subtotal();
?>
  <span class="cart-item-price price"><?php echo $items_sub_total ? $items_sub_total : '0.00'; ?></span>
<?php
  $fragments['.cart-item-price'] = ob_get_clean();
  return $fragments;
}

/*---------------------------NEWS LETTER POP ----------------------- */
function news_letter_pop()
{
  ob_start();
  $pop = '<div class="popup-main-wrap subscribe-wrap" style="display: none;">';
  $pop .= '<span class="close-popup"><a href="javascript:void(0);" class="close-popup-btn">X</a></span>';
  $pop .= '<div class="common-wrap">';
  $pop .= '<div class="popup-left-img">';
  $pop .= '<span class="popup-img-wap">';
  $pop .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/09/pop-img.png" class="popup-img"/>';
  $pop .= '</span>';
  $pop .= '</div>';
  $pop .= '<div class="rigth-content-wrap">';
  $pop .= '<h2 class="newsletter-text">Subscribe To Our Newsletter!</h2>';
  $pop .= '<p class="newsletter-receive-text">Subscribe to our fortnightly newsletter to receive a free e-cookbook</p>';
  $pop .= '<div class="newletter-form">' . do_shortcode("[mc4wp_form id=49]") . '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  echo $pop;
  // wp_reset_postdata();
}

add_shortcode('news-letterpop', 'news_letter_pop');

/* ----------------------------------- --------------programmer page popup------------------- ---------------------------------- ------------------------------ */

function our_credentials_popup()
{
  ob_start();
  $pop = '<div class="popup-main-wrap our-programmer-popup" style="display: none;">';
  $pop .= '<span class="close-popup"><a href="javascript:void(0);" class="close-popup-btn">X</a></span>';
  $pop .= '<div class="common-wrap our-common-wrap">';
  $pop .= '<div class="popup-left-img our-popup-left-img">';
  $pop .= '<span class="popup-img-wap our-popup-img-wrap">';
  $pop .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/09/pop-img.png" class="popup-img our-popup-img"/>';
  $pop .= '</span>';
  $pop .= '</div>';
  $pop .= '<div class="rigth-content-wrap our-rigth-wrap">';
  $pop .= '<h2 class="newsletter-text our-newsletter-text ">Would you like to find out more?</h2>';
  $pop .= '<div class="newletter-form our-newetter">' . do_shortcode("[contact-form-7 id='30c8898' title='home-popup']") . '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  echo $pop;
  wp_reset_postdata();
}
add_shortcode('our-credentialspopup', 'our_credentials_popup');



function individual_popup()
{
  ob_start();
  $pop = '<div class="popup-main-wrap Individual-popup" style="display: none;">';
  $pop .= '<span class="close-popup"><a href="javascript:void(0);" class="close-popup-btn">X</a></span>';
  $pop .= '<div class="common-wrap our-common-wrap">';
  $pop .= '<div class="popup-left-img our-popup-left-img">';
  $pop .= '<span class="popup-img-wap our-popup-img-wrap">';
  $pop .= '<img src="' . get_site_url() . '/wp-content/uploads/2023/09/pop-img.png" class="popup-img our-popup-img"/>';
  $pop .= '</span>';
  $pop .= '</div>';
  $pop .= '<div class="rigth-content-wrap our-rigth-wrap">';
  $pop .= '<h2 class="newsletter-text our-newsletter-text ">Would you like to find out more?</h2>';
  $pop .= '<div class="newletter-form our-newetter">' . do_shortcode('[contact-form-7 id="71016db" title="Individual popup"]') . '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  $pop .= '</div>';
  echo $pop;
  wp_reset_postdata();
}
add_shortcode('Individualpopup', 'individual_popup');

/*---------------programmer-------------- */
function add_gallery($attr)
{
  ob_start();
  $arg = shortcode_atts(array(
    'name' => ''
  ), $attr);
  $args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'tax_query' => array(
      array(
        'taxonomy' => 'product_cat',
        'field' => 'slug',
        'terms' => $arg['name'],
      )
    )
  );

  $query = new WP_Query($args);
  $result = '<div class="programs-main-wrap">';
  $result .= '<div class="program-wrap">';
  while ($query->have_posts()) {
    $query->the_post();

    $result .= '<div class="programs-hover-wrap">';
    $result .= '<div class="programs-image-title-wrap">';
    $result .= '<div class="program-image-item">';
    $result .= '<div class="program-image">' . get_the_post_thumbnail() . '</div>';
    $result .= '</div>';
    $result .= '<div class="program-title">';
    $result .= '<h2 class="title-wrap">' . get_the_title() . '</h2>';
    $result .= '</div>';
    $result .= '</div>';

    $result .= '<div class="program-hover-effect">';
    $result .= '<div class="program-weeks">';
    $result .= '<span class="program-week-text">' . get_field('week_program') . '</span>';
    $result .= '</div>';
    $result .= '<div class="btn-wrap">';
    $result .= '<a href="' . get_the_permalink() . '" class="learn-btn-">LEARN MORE</a>';
    $result .= '</div>';
    $result .= '</div>';
    $result .= '</div>';
  }
  $result .= '</div>';
  $result .= '</div>';
  wp_reset_postdata();


  // return $result;
  return ob_get_clean() . $result;
}
add_shortcode('programs', 'add_gallery');

/* ------------------------------- Lost popup --------------------------------- */

function ranvirsinh_lost_pass_custom()
{
  ob_start();
?>
  <div class="lost-password">
    <span class="lost-close-popup"><a href="javascript:void(0);" class="close-popup-btn">X</a></span>
    <div class="lost-pass-wrap">
      <div class="popup-left-img our-popup-left-img">
        <span class="popup-img-wap our-popup-img-wrap">
          <img src="<?php get_site_url(); ?>/wp-content/uploads/2023/09/pop-img.png" class="popup-img our-popup-img" />
        </span>
      </div>
      <div class="loast-pass-form">
        <h2 class="forget-pass-title"> Forget Password</h2>
        <p class="lost-text">Enter the email address associated with your account, and we'll send a magic link to
          your inbox. </p>
        <?php
        do_action('woocommerce_before_lost_password_form');
        ?>


        <form method="post" class="woocommerce-ResetPassword lost_reset_password">


          <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
            <label for="user_login"><?php esc_html_e('Email', 'woocommerce'); ?><em>*</em></label>
            <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
          </p>

          <div class="clear"></div>

          <?php do_action('woocommerce_lostpassword_form'); ?>

          <p class="woocommerce-form-row form-row">
            <input type="hidden" name="wc_reset_password" value="true" />
            <button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e('Reset password', 'woocommerce'); ?>"><?php esc_html_e('SEND PASSWORD RECOVERY EMAIL', 'woocommerce'); ?></button>
          </p>

          <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>

        </form>
        <?php
        do_action('woocommerce_after_lost_password_form');
        ?>
      </div>
    </div>
  </div>
<?php
  return ob_get_clean();
}
add_shortcode('ranvirsinh-custom-lost', 'ranvirsinh_lost_pass_custom');
/*---------------------------------login pass word ------------------- */
function ranvirsinh_login_pass_custom()
{
  ob_start();
?>
  <div class="login-password">
    <span class="login-close-popup"><a href="javascript:void(0);" class="close-popup-btn">X</a></span>
    <div class="login-pop-wrap">
      <div class="popup-left-img our-popup-left-img">
        <span class="popup-img-wap our-popup-img-wrap">
          <img src="<?php get_site_url(); ?>/wp-content/uploads/2023/09/pop-img.png" class="popup-img our-popup-img" />
        </span>
      </div>
      <div class="loing-pass-form">
        <h2 class="login-pass-title">Sign in</h2>
        <p class="lost-text">To login enter the email address associated with your account, and the password.</p>
        <?php
        do_action('woocommerce_before_customer_login_form'); ?>

        <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

          <div class="u-columns col2-set" id="customer_login">

            <div class="u-column1 col-1">

            <?php endif; ?>



            <form class="woocommerce-form woocommerce-form-login login" method="post">
  <?php do_action('woocommerce_login_form_start'); ?>

  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" />
  </p>
  <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide show-icon">
    <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
    <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
    <span class="toggle-password">Show Password</span>
  </p>

  <?php do_action('woocommerce_login_form'); ?>

  <p class="form-row">
    <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Sign in', 'woocommerce'); ?></button>
  </p>
  <p class="woocommerce-LostPassword lost_password">
    <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
  </p>

  <?php do_action('woocommerce_login_form_end'); ?>

</form>

<script>
jQuery(document).ready(function() {
  jQuery(".toggle-password").click(function() {
    var passwordField = jQuery("#password");
    if (passwordField.attr("type") === "password") {
      passwordField.attr("type", "text");
      jQuery(this).text("Hide Password");
    } else {
      passwordField.attr("type", "password");
      jQuery(this).text("Show Password");
    }
  });
});
</script>

            <?php do_action('woocommerce_after_customer_login_form'); ?>
            </div>

          </div>
        <?php
        return ob_get_clean();
      }
      add_shortcode('ranvirsinh-custom-Login', 'ranvirsinh_login_pass_custom');


      add_shortcode('suplements_products', 'suplements_products');
      function suplements_products()
      {
        ?>
          <div class="content" role="main">

            <ul class="suplement-products">
              <?php
              $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'product_cat' => 'suplements', // Category slug "clothing"

              );
              $loop = new WP_Query($args);
              while ($loop->have_posts()) : $loop->the_post();
                global $product; ?>
                <li class="suplement-product">
                  <div class="suplement-img">
                    <a href="<?php echo get_permalink($loop->post->ID) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
                      <?php woocommerce_show_product_sale_flash($product); ?>
                      <?php if (has_post_thumbnail($loop->post->ID))
                        echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog');
                      else
                        echo '<img src="' . woocommerce_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />'; ?>
                    </a>
                  </div>
                  <div class="suplement-con">
                    <h3>
                      <?php the_title(); ?>
                    </h3>
                    <span class="price">
                      <?php echo $product->get_price_html(); ?>
                    </span>
                    <p class="suplement-link"><a href="<?php echo get_the_permalink(); ?>">View Detail</a></p>
                  </div>
                </li>
              <?php endwhile; ?>
              <?php wp_reset_query(); ?>
            </ul>
          </div><!-- #content -->
          <?php
        }


        /*   --------------------------------auto_complete_order ------------------------------------- */
        add_action('woocommerce_thankyou', 'custom_woocommerce_auto_complete_order');

        function custom_woocommerce_auto_complete_order($order_id)
        {
          if (!$order_id) {
            return;
          }

          $order = wc_get_order($order_id);

          $virtual_order = true;

          foreach ($order->get_items() as $item_id => $item) {
            // Get the product object for the item
            $product = $item->get_product();

            // Check if the product is virtual
            if (!$product || !$product->is_virtual()) {
              $virtual_order = false;
              break;
            }
          }

          if ($virtual_order) {
            $order->update_status('completed');
          }
        }



        /* ----------------------------- Woo Coomerece Hook ------------------------------- */
        function remove_related_products()
        {
          remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
        }
        add_action('init', 'remove_related_products');

        add_filter('woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options');

        function ud_update_woo_flexslider_options($options)
        {

          $options['directionNav'] = true;
          $options['sync'] = '.flex-control-thumbs';

          return $options;
        }

        function exclude_virtual_products_from_shop($q)
        {
          if (is_shop()) {
            $q->set('meta_key', '_virtual');
            $q->set('meta_value', 'no');
          }
        }
        add_action('woocommerce_product_query', 'exclude_virtual_products_from_shop');

        /* ------------------------ shop page  product hook  -------------------------------- */
        remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

        /**
         * WooCommerce Loop Product Thumbs
         **/
        if (!function_exists('woocommerce_template_loop_product_thumbnail')) {
          function woocommerce_template_loop_product_thumbnail()
          {
            echo "<div class='wc-img-wrapper-wrap'>";
            echo "<div class='wc-img-wrapper'>";
            echo woocommerce_get_product_thumbnail();
            echo "</div>";
            echo "</div>";
          }
        }


        /* ----------------------------- THR LIBRARY  ---------------------------------- */
        function create_posttype_new()
        {
          register_post_type(
            'thr_library', // Use a valid, lowercase name for the post type
            // CPT Options
            array(
              'labels' => array(
                'name' => __('THR Library'),
                'singular_name' => __('THR Library')
              ),
              'public' => true,
              'has_archive' => true,
              'rewrite' => array('slug' => 'thrlibrary'),
              'show_in_rest' => true,
              'supports' => array('title', 'thumbnail', 'editor', 'page-attributes', 'excerpt'),
            )
          );
        }
        add_action('init', 'create_posttype_new');
        function add_custom_taxonomiesnew()
        {
          // Add new "thr_library_taxonomy" taxonomy to "thr_library" post type
          register_taxonomy('thr_library_taxonomy', 'thr_library', array(
            'hierarchical' => true,
            'labels' => array(
              'name' => _x('THR Library Categories', 'taxonomy general name'),
              'singular_name' => _x('THR Library Category', 'taxonomy singular name'),
              'search_items' =>  __('Search THR Library Categories'),
              'all_items' => __('All THR Library Categories'),
              'parent_item' => __('Parent THR Library Category'),
              'parent_item_colon' => __('Parent THR Library Category:'),
              'edit_item' => __('Edit THR Library Category'),
              'update_item' => __('Update THR Library Category'),
              'add_new_item' => __('Add New THR Library Category'),
              'new_item_name' => __('New THR Library Category Name'),
              'menu_name' => __('THR Library Categories'),
            ),
            'rewrite' => array(
              'slug' => 'thr-library-category', // Adjust the slug as needed
              'with_front' => false,
              'hierarchical' => true
            ),
          ));
        }
        add_action('init', 'add_custom_taxonomiesnew', 0);



        function thr_library_page($attr)
        {
          ob_start();
          $arg = shortcode_atts(array(
            'name' => ''
          ), $attr);

          $args = array(
            'post_type' => 'thr_library',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            'tax_query' => array(
              array(
                'taxonomy' => 'thr_library_taxonomy',
                'field' => 'slug',
                'terms' => $arg['name'],
              ),
            ),
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) {
          ?>
            <div class="THR-Library-main-wrap" role="main">
              <ul class="THR-Library-ul">
                <?php
                while ($query->have_posts()) {
                  $query->the_post();

                ?>
                  <li class="THR-Library-li">
                    <?php
                    if (has_post_thumbnail()) { // Check if there's a featured image
                    ?>
                      <div class="THR-Library-left-image">
                        <div class="THR-Library-main-image">
                          <?php the_post_thumbnail('full'); ?>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="THR-Library-Rigth-content-wrap THR-Library-without-image">
                      <span class="THR-Library-Date-wrap">
                        <p class="THR-Library-Date-p"><?php echo sprintf('%02d', get_the_time('j'));
                                                      echo " ";
                                                      echo get_the_time('M');
                                                      echo ", ";
                                                      echo get_the_time('Y'); ?></p>
                      </span>
                      <span class="THR-Library-Title THR-pop-title">
                        <h2 class="THR-Library-h2" post-id="<?php echo get_the_ID(); ?>"><?php the_title(); ?></h2>
                      </span>
                      <span class="THR-Library-Content">
                        <span class="THR-Library-text"><?php echo get_the_excerpt(); ?></span>
                      </span>
                      <?php
                      // var_dump(get_field('thr_options'));
                      if (get_field('thr_options') == 'Attachment Upload') { // Check if ACF field exists

                      ?>
                        <span class="THR-Library-button view-pdf-btn">


                          <a href="<?php echo get_field('upload_pdf')['url'] ?>" target="_blank" rel="noopener noreferrer">VIEW PDF</a>
                        </span>
                      <?php
                      } elseif (get_field('thr_options') == "External Link") {          ?>
                        <span class="THR-Library-button view-video-btn">
                          <a href="<?php echo get_field('external_link'); ?>" target="_blank" rel="noopener noreferrer">VIEW VIDEO</a>
                        </span>
                      <?php
                      }
                      ?>
                    </div>
                  </li>
                <?php
                }
                ?>
              </ul>
              <div class="pagination-custom"><?php

                                              $big = 999999999; // Set a large number to ensure all pages are shown

                                              echo paginate_links(
                                                array(
                                                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                                  'format' => '?paged=%#%',
                                                  'current' => max(1, get_query_var('paged')),
                                                  'total' =>   $query->max_num_pages,
                                                )
                                              ); ?>


              </div>
            </div>
          <?php
            wp_reset_postdata();
          } else {
            echo 'No posts found.';
          }

          return ob_get_clean();
        }

        add_shortcode('THR-LIBRARY', 'thr_library_page');


        /* -------------------------------------- ---------------------------------------- */
        function custom_modify_cart_notice($message, $product_id)
        {
          // Get the product title
          $product = wc_get_product($product_id);
          $product_title = $product ? $product->get_title() : '';

          // Customize the cart notice message
          $message = sprintf('<h2>%s</h2> has been added to your cart.', esc_html($product_title));

          return $message;
        }

        add_filter('woocommerce_cart_messages', 'custom_modify_cart_notice', 10, 2);


        /*--------------------- 'External Resources Hub  --------------------*/
        function create_posttype_external()
        {
          register_post_type(
            'external_resources',
            array(
              'labels' => array(
                'name' => __('External Resources Hub'), // Consistent with the lowercase post type name
                'singular_name' => __('External Resources Hub'), // Consistent with the lowercase post type name
              ),
              // ...

              'public' => true,
              'has_archive' => true,
              'rewrite' => array('slug' => 'external_resources_hub'),
              'show_in_rest' => true,
              'supports' => array('title', 'thumbnail', 'editor', 'page-attributes', 'excerpt'),
            )
          );
        }
        add_action('init', 'create_posttype_external');

        function add_external_taxonomiesnew()
        {

          register_taxonomy('resources_taxonomy', 'external_resources', array(
            'labels' => array(
              'name' => _x('External Resources Hub Categories', 'taxonomy general name'), // Consistent with the lowercase taxonomy name
              'singular_name' => _x('External Resources Hub Category', 'taxonomy singular name'), // Consistent with the lowercase taxonomy name

              'search_items' =>  __('Search EXTERNAL RESOURCES HUB Categories'),
              'all_items' => __('All EXTERNAL RESOURCES HUB Categories'),
              'parent_item' => __('Parent EXTERNAL RESOURCES HUB Category'),
              'parent_item_colon' => __('Parent EXTERNAL RESOURCES HUB Category:'),
              'edit_item' => __('Edit EXTERNAL RESOURCES HUB Category'),
              'update_item' => __('Update EXTERNAL RESOURCES HUB Category'),
              'add_new_item' => __('Add New EXTERNAL RESOURCES HUB Category'),
              'new_item_name' => __('New EXTERNAL RESOURCES HUB Category Name'),
              'menu_name' => __('EXTERNAL RESOURCES HUB Categories'),
            ),
            'rewrite' => array(
              'slug' => 'external_resources_hub_category', // Adjust the slug as needed
              'with_front' => false,
              'hierarchical' => true
            ),
          ));
        }
        add_action('init', 'add_external_taxonomiesnew', 0);

        function add_external_page($attr)
        {
          ob_start();
          $arg = shortcode_atts(array(
            'name' => ''
          ), $attr);

          $args = array(
            'post_type' => 'external_resources',
            'post_status' => 'publish',
            'posts_per_page' => 6,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
            // 'tax_query' => array(
            //   array(
            //     'taxonomy' => 'thr_library_taxonomy',
            //     'field' => 'slug',
            //     'terms' => $arg['name'],
            //   ),
            // ),
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) {
          ?>
            <div class="THR-Library-main-wrap" role="main">
              <ul class="THR-Library-ul">
                <?php
                while ($query->have_posts()) {
                  $query->the_post();

                ?>
                  <li class="THR-Library-li">
                    <?php
                    if (has_post_thumbnail()) { // Check if there's a featured image
                    ?>
                      <div class="THR-Library-left-image">
                        <div class="THR-Library-main-image">
                          <?php the_post_thumbnail('full'); ?>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="THR-Library-Rigth-content-wrap THR-Library-without-image">
                      <span class="THR-Library-Date-wrap">
                        <p class="THR-Library-Date-p"><?php echo sprintf('%02d', get_the_time('j'));
                                                      echo " ";
                                                      echo get_the_time('M');
                                                      echo ", ";
                                                      echo get_the_time('Y'); ?></p>
                      </span>
                      <span class="THR-Library-Title">
                        <h2 class="THR-Library-h2" ><?php the_title(); ?></h2>
                      </span>
                      <span class="THR-Library-Content">
                        <span class="THR-Library-text"><?php the_content(); ?></span>
                      </span>
                      <?php
                      // var_dump(get_field('thr_options'));
                      if (get_field('thr_options') == 'Attachment Upload') { // Check if ACF field exists

                      ?>
                        <span class="THR-Library-button view-pdf-btn">


                          <a href="<?php echo get_field('upload_pdf')['url'] ?>" target="_blank" rel="noopener noreferrer">VIEW PDF</a>
                        </span>
                      <?php
                      } elseif (get_field('thr_options') == "External Link") {          ?>
                        <span class="THR-Library-button view-video-btn">
                          <a data-fancybox data-fancybox-type="iframe" href="<?php echo get_field('external_link'); ?>" target="_blank" rel="noopener noreferrer">VIEW VIDEO</a>
                        </span>
                      <?php
                      }
                      ?>
                    </div>
                  </li>
                <?php
                }
                ?>
              </ul>
              <div class="pagination-custom"><?php

                                              $big = 999999999; // Set a large number to ensure all pages are shown

                                              echo paginate_links(
                                                array(
                                                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                                  'format' => '?paged=%#%',
                                                  'current' => max(1, get_query_var('paged')),
                                                  'total' =>   $query->max_num_pages,
                                                )
                                              ); ?>


              </div>
            </div>
          <?php
            wp_reset_postdata();
          } else {
            echo 'No posts found.';
          }

          return ob_get_clean();
        }

        add_shortcode('external_resources', 'add_external_page');

        function ajaxlogin()
        {


          $info = array();
          $info['user_login'] = $_POST['username'];
          $info['user_password'] = $_POST['password'];
          // $info['remember'] = true;

          $user_signon = wp_signon($info, false);
          if (is_wp_error($user_signon)) {
            echo 'false';
          } else {
            echo 'true';
          }
          die();
        }
        // Hook into AJAX to run our function
        add_action('wp_ajax_nopriv_ajaxlogin', 'ajaxlogin');
        add_action('wp_ajax_ajaxlogin', 'ajaxlogin');

        /* ------------------------------------20-10-2023--03 :21 PM------------------------- */
        function filter_woocommerce_account_orders_columns($columns)
        {

          $columns['order-number'] = __('Order ID ', 'woocommerce');

          return $columns;
        }
        add_filter('woocommerce_account_orders_columns', 'filter_woocommerce_account_orders_columns', 10, 1);

        add_shortcode('purchase-course', 'purchase_course_list');
        function purchase_course_list($attr)
        {
          ob_start();
          $arg = shortcode_atts(
            array(
              'name' => ''
            ),
            $attr
          );
          $args = array(
            'post_type' => 'course',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'course-cat',
                'field' => 'slug',
                'terms' => $arg['name'],
              ),
            ),
          );
          $userid = get_current_user_id();
          $query = new WP_Query($args);
          // var_dump($userid);
          ?>
          <ul id="course-list" class="item-list" role="main">
            <?php
            $count=0;
            while ($query->have_posts()) {
              $query->the_post();
              $id = get_the_id();
              $status = get_user_meta(strval($userid), 'course_status' . $id);
              if ($status[0] == 2) {
                $count++;
                global $post;
                $cache_duration = vibe_get_option('cache_duration');
                if (!isset($cache_duration)) $cache_duration = 86400;
                if ($cache_duration) {
                  $course_key = 'course_' . $post->ID;
                  if (is_user_logged_in()) {
                    $user_id = bp_displayed_user_id();

                    $user_meta = get_user_meta($user_id, $post->ID, true);
                    if (isset($user_meta)) {
                      $course_key = 'course_' . $user_id . '_' . get_the_ID();
                    }
                  }
                  $result = wp_cache_get($course_key, 'course_loop');
                } else {
                  $result = false;
                }

                if (false === $result) {
                  ob_start();
                  ob_start();
if (function_exists('bp_course_item_view')) {
    bp_course_item_view();

    // The code within bp_course_item_view() generates content, including the button.
    // If the button text is generated here, you can modify it.
    $generated_content = ob_get_clean();
    
    // Modify the button text within the generated content.
    $modified_content = str_replace('<span class="subs"> COURSE</span>', 'Program', $generated_content);

    echo vibe_sanitizer($modified_content);
}

                  $result = ob_get_clean();
                }
                if ($cache_duration)
                  wp_cache_set($course_key, $result, 'course_loop', $cache_duration);

                echo vibe_sanitizer($result);
            ?>


              <?php

              } 

                
              }
         if($count==0){
       ?>
       <div class="error-massge">
        <P class="data-not-found"> You have not purchased any course.</P>
       </div>
<?php         }
            
            ?>
            </ul>
        <?php
            wp_reset_postdata();


            // return $result;
            return ob_get_clean();
          }
// --------------------------------------------------------------------------------------------------------------------------------------------------------------
/*-----------------------------------------------------------------21-10-2023---------------------------------------------------------------------------------- */
/* ------------------------------------------------------------thr-library-popup--------------------- */

function thr_library_popup($attr) {
  ob_start();
  $arg = shortcode_atts(array(
    'name' => ''
  ), $attr);

  $args = array(
    'post_type' => 'thr_library',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
      array(
        'taxonomy' => 'thr_library_taxonomy',
        'field' => 'slug',
        'terms' => $arg['name'],
      ),
    ),
  );

  $query = new WP_Query($args);
  if ($query->have_posts()) {
    ?>
    <div class="thr-library-popup-main-wrap" style="display: none;">
      <span class="thr-popup-close"><a href="javascript:void(0)">X</a></span>
      <div class="thr-library-popup">
        <?php 
        while ($query->have_posts()) {
          $query->the_post();
          ?>
          <div class="thr-popup-main-wrap" style="display: none;"  post-id="<?php echo get_the_ID(); ?>">
            <span class="title-wrap">
              <h2 class="thr-title"><?php echo get_the_title(); ?></h2>
            </span>
            <span class="image-wrap">
              <?php the_post_thumbnail('full'); ?>
            </span>
            <span class="content-wrap">
              <?php the_content(); ?>
            </span>
          </div>
          <?php
        }
        wp_reset_postdata(); // Reset the post data
        ?>
      </div>
    </div>
    <?php
  } else {
    echo "No posts found."; // Display a message when no posts are found.
  }
  return ob_get_clean();
}
add_shortcode('thr-library-popup', 'thr_library_popup');


/* ---------------------------------------------26-10-2023------------------------------------------------------- */
add_action('woocommerce_order_details_before_order_table', 'custom_order_details');
		function custom_order_details($order) {
			// Get the order ID, order date, and order status
			$order_id = $order->get_order_number();
			$order_date = $order->get_date_created()->format('j F Y');
			$order_status = wc_get_order_status_name($order->get_status());
		
			// Output the custom order details
			echo '<p class="order-notice-custom">Order #' . $order_id . ' was placed on <mark class="order-date">' . $order_date . '</mark> and is currently <mark class="order-status">' . $order_status . '</mark>.</p>';
		}


    function member_code()
{
    ob_start();
    global $post;
    ?>
    <div class="container">
        <ul class="breadcrumb">
            <?php
            $site_url = esc_url(site_url());
            $current_url = esc_url(add_query_arg(array()));

                if (strpos($current_url, '/#edit/') !== false) {
                    ?>
                    <li><a href="<?php echo $site_url; ?>">Home</a></li>
                    <li ><a href="<?php echo get_permalink('my-account'); ?>">My Account</a></li>
                    <li>My Treatment Plans</li>
                    <li>Edit Treatment Plans</li>
                    <?php
                } 
                elseif (strpos($current_url, '/buddydrive/') !== false) {
                    ?>
                    <li><a href="<?php echo $site_url; ?>">Home</a></li>
                    <li ><a href="<?php echo get_permalink('my-account'); ?>">My Account</a></li>
                    <li>My Treatment Plans</li>
                    <?php
                } 
                elseif (strpos($current_url, '/messages/') !== false) {
                    ?>
                    <li><a href="<?php echo $site_url; ?>">Home</a></li>
                    <li ><a href="<?php echo get_permalink('my-account'); ?>">My Account</a></li>
                    <li>Messages</li>
                    <?php
                } 
                elseif (strpos($current_url, '/profile/') !== false) {
                    ?>
                    <li><a href="<?php echo $site_url; ?>">Home</a></li>
                    <li ><a href="<?php echo get_permalink('my-account'); ?>">My Profile</a></li>
                    <li>Edit Profile</li>
                    <?php
                } 
                elseif(bp_is_user_profile()) {
                    ?>
                    <li><a href="<?php echo $site_url; ?>">Home</a></li>
                    <li>My Profile</li>
                    <?php
                }
            
            ?>
        </ul>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('memberbreadcrumb', 'member_code');

    
/*----------------------------------**-*/
function page_title()
{
    ob_start();
    global $post;
    ?>           <?php
            $site_url = esc_url(site_url());
            $current_url = esc_url(add_query_arg(array()));

                if (strpos($current_url, '/#edit/') !== false) {
                    ?>
                   <h1>Edit Treatment Plans</h1>
                    <?php
                } 
                elseif (strpos($current_url, '/buddydrive/') !== false) {
                    ?>
                   <h1>My Treatment Plans</h1>
                    <?php
                } 
                elseif (strpos($current_url, '/messages/') !== false) {
                    ?>
                    <h1>Messages</h1>
                    <?php
                } 
                              
            
            ?>
      
    <?php
    return ob_get_clean();
}

add_shortcode('page-title', 'page_title');

function custom_function_to_hook() {
  ?>
  <div class="right-wrap course-status-right-wrap">
	<!-- <div class="title">
		<h1>Your Subscription:</h1>
	</div> -->
	<?php
$currentpostid=$_POST['course_id'];
	$args = array(
		'post_type' => 'course',
		'post_status' => 'publish',
		'posts_per_page' => -1,
	);

	$userid = get_current_user_id();
	$query = new WP_Query($args);

	global $wpdb;

	while ($query->have_posts()) {
		$query->the_post();
		$id = get_the_ID();
		$type = 'start_course';
		$status = get_user_meta(strval($userid), 'course_status' . $id, true);

		if ($status == 2 && $currentpostid == $id) {
			$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}bp_activity WHERE user_id = %d AND item_id = %d AND type = %s", $userid, $id, $type);
			$results = $wpdb->get_results($sql, ARRAY_A);

			if ($results) {
				// Process the results here
				foreach ($results as $result) {
					// Access data from the $result associative array
					$date_recorded = $result['date_recorded'];

					// You can access other columns in a similar way
				}
				$timestamp = strtotime($date_recorded);

				// Format the timestamp to the "dd-M-yyyy" format
				$formattedDate = date("d M Y", $timestamp);

			}
			$percentage = bp_course_get_user_progress($userid, $id);

			$units = array();

			if (function_exists('bp_course_get_curriculum_units')) {
				$units = bp_course_get_curriculum_units($id);
			}

			$total_units = count($units);

			if (empty($total_units)) {
				$total_units = 1;
			}

			if (empty($percentage)) {
				$percentage = 0;
			}

			if ($percentage > 100) {
				$percentage = 100;
			}

			$unit_increase = round(((1 / $total_units) * 100), 2);
			$course_duration = get_post_meta($id, 'vibe_duration', true);
			// Define the target date
			$targetDate = strtotime($formattedDate); // October 13, 2023
	
			// Get the current date
			$currentDate = time();

			// Add 2 days to the current date
			$currentDate += $course_duration * 24 * 60 * 60; // 2 days in seconds (2 * 24 hours * 60 minutes * 60 seconds)
	
			// Calculate the number of seconds remaining
			$secondsRemaining = $targetDate - $currentDate;


			$daysRemaining = floor($secondsRemaining / (60 * 60 * 24));

$author=get_the_author($currentpostid);
//  bp_get_course_certificate_url();
			echo '<div class="course-inner-wrap"><div class="course-title"><h1>' . get_the_title() . '</h1></div>';
      echo '<div class="instructor-wrap"><p class="text">Instructor:<span>' .$author . '</span></p></div>';
			echo '<div class="start-date"><p class="text">Start date:<span>' . $formattedDate . '</span></p></div>';
      echo '<div class="course_certificate_single">Program certificate<i class="icon-certificate-file"></i></div>';
			echo '<div class="days-remain"><p class="text">Time remainig:<span>' . $daysRemaining . ' DAYS</span></p></div>';


			echo '
			<div class="course-details">
			<div class="text">
			<h5>Course Progress:</h5>
			</div>
            <div class="progress course_progressbar" data-increase-unit="' . $unit_increase . '" data-value="' . $percentage . '">
                <div class="bar animate cssanim stretchRight load" style="width: ' . $percentage . '%;"><span>' . $percentage . '%</span></div>
				</div></div></div>
			';
		}
	}
	?>

</div>
<?php
}
add_action('wplms_course_action_points', 'custom_function_to_hook');

function url_to_body_class($classes) {
  $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $ul = explode("/", $path);

  // Add custom classes based on the URL or URL parameters
  if ($ul[count($ul)-2]=="my-account") {
      $classes[] = 'woocommerce-my-account-class';
      }
  

  return $classes;
}

add_filter('body_class', 'url_to_body_class');

add_filter( 'auto_update_theme', '__return_false' );


