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
<div class="<?php echo esc_attr($contai); ?> blog  single-post-container">
	<div class="blog found default-max-width">
		<div class="banner about-banner">
			<?
			if (is_active_sidebar('blog-banner-content')):
				$result .= dynamic_sidebar('blog-banner-content');
			endif; ?>



		</div>
	</div>
	<div class="blog-details inner-gap">
		<div class="container">

			<div class="row blog-content-wrap blog-wrap">
				<?php do_action('neve_do_sidebar', 'single-post', 'left'); ?>
				<div class="nv-index-posts blog col">
					<section class="blog-page section-gapping">
						<h2 class="vc_custom_heading sub-title">Blog</h2>
						<h2 class="vc_custom_heading"> Latest Blog</h2>
						<div class="blog-warp">
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
														<div class="blog-detail-date post-date">
															<?php
															$date = get_the_date('j <b> M Y</b>');
															echo $date;
															?>
														</div>
														<div class="auther-category-wrap">
															<div class="post-title"><a href="#">
																	<?php echo get_the_title(); ?>
																</a></div>
															<div class="post-author"><span>Posted By : &nbsp;</span>
																<?php
																echo get_the_author_meta('display_name', $author_id); ?>
															</div>
															<div class="blog-category-title"><span>Category</span> : &nbsp;
																<?php the_category(); ?>
															</div>
														</div>
													</div>
													<div class="blog-thumbnail">

														<?php echo the_post_thumbnail(); ?>

													</div>
													<div class="blog-content">

														<?php echo apply_filters("the_content", get_the_content()); ?>
													</div>
													<div class="shar-this">
														<?php echo do_shortcode('[addtoany]'); ?>
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
							<div class="sidebar-wrap">
								<?php
								if (is_active_sidebar('custom-searchbar-widget')): ?>
									<div class="custom-searchbar">
										<aside class="custom-searchbar-menu">
											<?php dynamic_sidebar('custom-searchbar-widget'); ?>
										</aside><!-- .widget-area -->
									</div>
								<?php endif; ?>
								<?php
								if (is_active_sidebar('custom-cate-widget')): ?>
									<div class="custom-cate-widget">
										<aside class="cate-menu">
											<?php dynamic_sidebar('custom-cate-widget'); ?>
										</aside><!-- .widget-area -->
									</div>
								<?php endif; ?>
								<?php
								if (is_active_sidebar('custom-blogrecent-widget')): ?>
									<div class="custom-recent-widget">
										<aside class="recent-menu">
											<?php dynamic_sidebar('custom-blogrecent-widget'); ?>
										</aside><!-- .widget-area -->
									</div>
								<?php endif; ?>
								<?php
								if (is_active_sidebar('custom-archive-widget')): ?>
									<div class="custom-archive">
										<aside class="custom-archive-menu">
											<?php dynamic_sidebar('custom-archive-widget'); ?>
										</aside><!-- .widget-area -->
									</div>
								<?php endif; ?>
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