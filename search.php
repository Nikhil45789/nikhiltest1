<?php

/**
 * Author:          Andrei Baicus <andrei@themeisle.com>
 * Created on:      04/09/2018
 *
 * @package Neve
 */

$container_class = apply_filters('neve_container_class_filter', 'container', 'blog-archive');

get_header();

$wrapper_classes = ['posts-wrapper'];
$wrapper_classes = apply_filters('neve_posts_wrapper_class', $wrapper_classes); ?>
<div class="blog found default-max-width">

	<div class="banner about-banner">
		<?
		if (is_active_sidebar('news-banner-content')) :
			$result .= dynamic_sidebar('news-banner-content');
		endif;
		?>
	</div>


	<div class="<?php echo esc_attr($container_class); ?> archive-container">
		<div class="row">
			<?php

			/**
			 * Executes the rendering function for the sidebar.
			 *
			 * @param string $context Sidebar context.
			 * @param string $position Sidebar position.
			 *
			 * @since 1.0.0
			 */
			do_action('neve_do_sidebar', 'blog-archive', 'left');
			?>
			<div class="nv-index-posts blog col">
				<?php
				/**
				 * Executes actions before the posts loop start.
				 *
				 * @since 2.4.0
				 */
				do_action('neve_before_loop');

				/**
				 * Executes the rendering function for the page header.
				 *
				 * @param string $context Header display page.
				 *
				 * @since 2.3.10
				 */
				do_action('neve_page_header', 'index');

				/**
				 * Executes actions before the post loop.
				 *
				 * @since 2.3.10
				 */
				do_action('neve_before_posts_loop');
				?>

				<section class="blog-page section-gapping">
					<div>
						<h2 class="vc_custom_heading sub-title">Search</h2>
						<h2 class="vc_custom_heading"> Search Result</h2>

						<?php
						if (have_posts()) {
							/* Start the Loop. */
							echo '<div class="blog-warp"><div class="' . esc_attr(join(' ', $wrapper_classes)) . '">';


							$pagination_type = get_theme_mod('neve_pagination_type', 'number');
							if ($pagination_type !== 'infinite') {
								global $wp_query;

								$posts_on_current_page = $wp_query->post_count;
								$hook_after_post = -1;

								if ($posts_on_current_page >= 2) {
									$hook_after_post = (int) ceil($posts_on_current_page / 2);
								}
								$post_index = 1;
							}

							//neve_do_loop_hook('before');

							/**
							 * Exclude posts from the main loop
							 *
							 * @param array $excluded_posts Excluded post ids.
							 * @since 3.2
							 */
							$excluded_posts = apply_filters('nv_exclude_posts', []);

							while (have_posts()) {
								the_post();
								// $pid = get_the_ID();
								// if ( in_array( $pid, $excluded_posts, true ) ) {
								// 	continue;
								// }

								// neve_do_loop_hook( 'entry_before' );

								// if ( $load_before_after_hooks ) {
								// 	/**
								// 	 * Executes actions before rendering the post content.
								// 	 *
								// 	 * @since 2.11
								// 	 */
								// 	do_action( 'neve_loop_entry_before' );
								// }

								// get_template_part( 'template-parts/content', get_post_type() );

								// if ( $load_before_after_hooks ) {
								// 	/**
								// 	 * Executes actions after rendering the post content.
								// 	 *
								// 	 * @since 2.11
								// 	 */
								// 	do_action( 'neve_loop_entry_after' );
								// }

								// if ( $pagination_type !== 'infinite' && $load_before_after_hooks ) {
								// 	if ( $post_index === $hook_after_post && $hook_after_post !== - 1 ) {
								// 		/**
								// 		 * Executes actions in the middle of the loop.
								// 		 *
								// 		 * The actions only fires if the pagination is not set as "infinite scroll".
								// 		 *
								// 		 * @since 2.3.10
								// 		 */
								// 		do_action( 'neve_middle_posts_loop' );
								// 	}
								// 	$post_index ++;
								// }


								echo '<div class="content-wrap">';
								echo '<div class="date-wrap">';
								echo '<div class="post-date">' . get_the_date('j <b> M Y</b>') . '</div>';
								echo '<div class="auther-category-wrap">';
								echo '<div class="post-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
								echo '<div class="post-author"><span>Posted By:&nbsp; </span> ' . ucwords(get_the_author()) . '</div>';
								echo '<div class="blog-category-title"><span>Category</span> :&nbsp;  ';
								echo the_category();
								echo '</div>';
								echo '</div>';
								echo '</div>';

								echo '<div class="post-img"><a href="' . get_the_permalink() . '">' . get_the_post_thumbnail() . '</a></div>';
								//echo '<div class="post-content">' . apply_filters("the_excerpt", get_the_excerpt()) . '</div>';
								echo '<div class="post-content">' . substr(get_the_content(), 0, 300) . '</div>';
								echo '<div class="read-wrap">';
								echo '<div class="post-readmore"><a href="' . get_the_permalink() . '">Read More</a></div>';
								echo '</div>';
								echo '</div>';


								// neve_do_loop_hook('entry_after');
							}
							echo '</div>';
						} else {
							get_template_part('template-parts/content', 'none');
						}
						?>
						<!-- <div class="w-100"></div> -->
						<?php
						/**
						 * Executes actions after the post loop.
						 *
						 * @since 2.3.10
						 */
						do_action('neve_after_posts_loop');

						// neve_do_loop_hook('after');
						?>
						<div class="sidebar-wrap">
							<?php
							if (is_active_sidebar('custom-searchbar-widget')) : ?>
								<div class="custom-searchbar">
									<aside class="custom-searchbar-menu">
										<?php dynamic_sidebar('custom-searchbar-widget'); ?>
									</aside><!-- .widget-area -->
								</div>
							<?php endif; ?>
							<?php
							if (is_active_sidebar('custom-cate-widget')) : ?>
								<div class="custom-cate-widget">
									<aside class="cate-menu">
										<?php dynamic_sidebar('custom-cate-widget'); ?>
									</aside><!-- .widget-area -->
								</div>
							<?php endif; ?>
							<?php
							if (is_active_sidebar('custom-blogrecent-widget')) : ?>
								<div class="custom-recent-widget">
									<aside class="recent-menu">
										<?php dynamic_sidebar('custom-blogrecent-widget'); ?>
									</aside><!-- .widget-area -->
								</div>
							<?php endif; ?>
							<?php
							if (is_active_sidebar('custom-archive-widget')) : ?>
								<div class="custom-archive">
									<aside class="custom-archive-menu">
										<?php dynamic_sidebar('custom-archive-widget'); ?>
									</aside><!-- .widget-area -->
								</div>
							<?php endif; ?>
						</div>
					</div>


					<?php
					// if (!is_singular()) {
					// 	/**
					// 	 * Executes the rendering function for the pagination.
					// 	 *
					// 	 * @param string $context Pagination location context.
					// 	 */
					// 	do_action('neve_do_pagination', 'blog-archive');
					// }
					?>
			</div>
			</section>
			<?php

			// do_action('neve_do_sidebar', 'blog-archive', 'right');
			?>
		</div>
	</div>
</div>
<?php
get_footer();
