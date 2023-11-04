<?php
/**
 * 404 template.
 *
 * @package Neve
 */

get_header();
//do_action( 'neve_do_404' );

?> 

<div class="banner-section inner-banner-section">
	<?php if(is_active_sidebar('404-banner')):?>
		<div id="custom-widget-404-banner" class="chw-widget-area widget-area" role="complementary">
			<?php dynamic_sidebar( '404-banner' ); ?>
		</div>
	<?php endif; ?>
</div>
<div class="error-404 not-found erro-page-heading">
	<div class="container error-wrapper">
		<div class="404-error-heading">
			<h1 class="section-heading"><span class="red">404</span> Error</h1>
		</div>

		<div class="error-page-content">
			<div class="page-content">
				<h2><?php esc_html_e( 'Hey there mate! Your lost treasure is not found here...', 'neve' ); ?></h2>
				<p><?php esc_html_e( 'Sorry! The page you are looking for was not found!', 'neve' ); ?></p>
				<div class="custom-btn common-btn red-btn">
					<a class="home-btn" href ="<?php echo site_url(); ?> ">HOME</a>
				</div>
			</div>
		</div>

	</div>
</div>
<?php
get_footer();
