<?php

/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      28/08/2018
 *
 * @package Neve
 */

$container_class = apply_filters('neve_container_class_filter', 'container', 'single-post');

get_header();

?>
<div class="<?php echo esc_attr($contai); ?> news  single-post-container">
	<div class="news found default-max-width">
		<div class="banner about-banner">
			<?
			if (is_active_sidebar('news-banner-content')):
				$result .= dynamic_sidebar('news-banner-content');
			endif; 
			
			?>



		</div>
	</div>
	<div class="news-details inner-gap">
		<div class="container">

			<div class="row news-content-wrap news-wrap">
				<?php do_action('neve_do_sidebar', 'single-post', 'left'); ?>
				<div class="nv-index-posts news col">
					<section class="news-page section-gapping">
						
						<h2 class="vc_custom_heading">Case Studies</h2>
						<div class="news-warp">
							<div class="posts-wrapper">
								<article id="post-<?php echo esc_attr(get_the_ID()); ?>"
									class="<?php echo esc_attr(join(' ', get_post_class('nv-single-post-wrap col'))); ?>">
									<?php
									/**
									 *  Executes actions before the post content.
									 *
									 * @since 2.3.8
									 */
									do_action('neve_before_post_content');
									?>

									<?php
									if (have_posts()) {
										while (have_posts()) {
											$author_id = $post->post_author;
											the_post(); ?>

											<div class="title-content-link-wrap">

												<div class="content-border-wrap">


													<div class="date-wrap">
														<div class="news-detail-date post-date">
															<?php
															$date = get_the_date('j <b> M Y</b>');
															echo $date;
															?>
														</div>
														<div class="auther-category-wrap">
															<div class="post-title"><a href="#">
																	<?php echo get_the_title(); ?>
																</a></div>
														</div>
													</div>
													<div class="news-thumbnail">

														<?php echo the_post_thumbnail(); ?>

													</div>
													<div class="news-content">

														<?php echo apply_filters("the_content", get_the_content()); ?>
													</div>
													
												</div>


												<!-- <div id="comments" class="<?php // echo esc_attr( apply_filters( 'neve_comments_area_class', 'comments-area-custom' ) ); 
														?>">
													<?php // comments_template(); 
															?> 
											</div> -->
											</div>

											<?php

											//get_template_part( 'template-parts/content', 'single' );
										}
									} else {
										get_template_part('template-parts/content', 'none');
									} ?>

									<?php
									/**
									 *  Executes actions after the post content.
									 *
									 * @since 2.3.8
									 */
									do_action('neve_after_post_content');
									?>
								</article>
							</div>
							
						</div>
					</section>
				</div>
				<?php //do_action( 'neve_do_sidebar', 'single-post', 'right' ); 
				?>
			</div>

		</div>
	</div>
	<?php
	get_footer();