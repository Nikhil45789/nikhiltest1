<?php

/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Zozothemes
 */

get_header();

$container_class = $scroll_type = $scroll_type_class = '';
$post_type_layout = $excerpt_limit = '';
$data_attr = '';

$original_layout = '';
$original_layout = hydd_zozo_get_theme_option('zozo_blog_type');
$grid_columns = hydd_zozo_get_theme_option('zozo_blog_grid_columns');

$column_width = '';
$display_mode = '';

// Grid Style
if ($original_layout == 'grid') {
	$container_class = 'zozo-isotope-layout ';
	if ($grid_columns != '') {
		if ($grid_columns == 'two') {
			$container_class .= 'grid-layout grid-col-2';
			$grid_columns_num = 2;
		} elseif ($grid_columns == 'three') {
			$container_class .= 'grid-layout grid-col-3';
			$grid_columns_num = 3;
		} elseif ($grid_columns == 'four') {
			$container_class .= 'grid-layout grid-col-4';
			$grid_columns_num = 4;
		}
	}
	$post_class = 'isotope-post grid-posts ';
	$column_width = 12 / $grid_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;

	$image_size = 'hydd-blog-medium';
	$page_type_layout = 'grid';
	$display_mode = 'isotope';
	$excerpt_limit = hydd_zozo_get_theme_option('zozo_blog_excerpt_length_grid');
	$data_attr = 'data-type=masonry data-layout=fitRows data-columns=' . $grid_columns_num . ' data-gutter=20';
}
// Grid Overlay Style
elseif ($original_layout == 'grid-overlay') {
	$container_class = 'zozo-isotope-layout ';
	$grid_gutter = hydd_zozo_get_theme_option('zozo_blog_grid_overlay_gutter');
	if ($grid_columns != '') {
		if ($grid_columns == 'two') {
			$container_class .= 'grid-overlay-layout grid-col-2';
			$grid_columns_num = 2;
		} elseif ($grid_columns == 'three') {
			$container_class .= 'grid-overlay-layout grid-col-3';
			$grid_columns_num = 3;
		} elseif ($grid_columns == 'four') {
			$container_class .= 'grid-overlay-layout grid-col-4';
			$grid_columns_num = 4;
		}
	}
	$post_class = 'isotope-post grid-overlay-posts ';
	$column_width = 12 / $grid_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;

	$thumb_width = 510;
	$thumb_height = 340;
	$page_type_layout = 'grid-overlay';
	$display_mode = 'isotope';
	$excerpt_limit = '';
	if (isset($grid_gutter) && $grid_gutter == '') {
		$grid_gutter = 0;
	}
	$data_attr = 'data-layout=masonry data-columns=' . $grid_columns_num . ' data-gutter=' . $grid_gutter . '';
}
// Large Style
elseif ($original_layout == 'large') {
	$container_class = 'large-layout';
	$post_class = 'large-posts';
	$image_size = 'hydd-blog-large';
	$post_type_layout = 'large';
	$excerpt_limit = hydd_zozo_get_theme_option('zozo_blog_excerpt_length_large');
}
// List Style
elseif ($original_layout == 'list') {
	$container_class = 'list-layout';
	$post_class = 'list-posts clearfix';
	$image_size = 'hydd-blog-medium';
	$page_type_layout = 'list';
	$excerpt_limit = hydd_zozo_get_theme_option('zozo_blog_excerpt_length_list');
}
// Classic Style
elseif ($original_layout == 'classic') {
	$container_class = 'classic-layout';
	$post_class = 'classic-posts clearfix';
	$image_size = 'thumbnail';
	$page_type_layout = 'classic';
	$excerpt_limit = hydd_zozo_get_theme_option('zozo_blog_excerpt_length_classic');
}
// Masonry Style
elseif ($original_layout == 'masonry') {
	$container_class = 'zozo-isotope-layout ';
	if (isset($grid_columns) && $grid_columns != '') {
		if ($grid_columns == 'two') {
			$container_class .= 'masonry-layout metro-col-2';
			$grid_columns_num = 2;
		} elseif ($grid_columns == 'three') {
			$container_class .= 'masonry-layout metro-col-3';
			$grid_columns_num = 3;
		} elseif ($grid_columns == 'four') {
			$container_class .= 'masonry-layout metro-col-4';
			$grid_columns_num = 4;
		}
	}

	$post_class = 'isotope-post masonry-posts ';
	$column_width = 12 / $grid_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;

	$thumb_width = 530;
	$thumb_height = null;
	$page_type_layout = 'masonry';
	$display_mode = 'isotope';
	$excerpt_limit = hydd_zozo_get_theme_option('zozo_blog_excerpt_length_masonry');
	$data_attr = 'data-layout=masonry data-columns=' . $grid_columns_num . ' data-gutter=20';
}
// Metro Style
elseif ($original_layout == 'metro') {
	$container_class = 'zozo-isotope-layout ';
	$metro_columns = hydd_zozo_get_theme_option('zozo_blog_metro_columns');
	$metro_gutter = hydd_zozo_get_theme_option('zozo_blog_metro_gutter');

	if (isset($metro_columns) && $metro_columns != '') {
		if ($metro_columns == 'two') {
			$container_class .= 'metro-layout metro-col-2';
			$metro_columns_num = 2;
		} elseif ($metro_columns == 'three') {
			$container_class .= 'metro-layout metro-col-3';
			$metro_columns_num = 3;
		} elseif ($metro_columns == 'four') {
			$container_class .= 'metro-layout metro-col-4';
			$metro_columns_num = 4;
		}
	}

	$post_class = 'isotope-post metro-posts ';
	$column_width = 12 / $metro_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;

	$thumb_width = 530;
	$thumb_height = null;
	$page_type_layout = 'metro';
	$display_mode = 'isotope';
	if (isset($metro_gutter) && $metro_gutter == '') {
		$metro_gutter = 0;
	}
	$data_attr = 'data-layout=masonry data-columns=' . $metro_columns_num . ' data-gutter=' . $metro_gutter . '';
}

if (hydd_zozo_get_theme_option('zozo_disable_blog_pagination')) {
	$scroll_type = "infinite";
	if (isset($display_mode) && $display_mode == 'isotope') {
		$scroll_type_class = " posts-isotope-infinite";
	} else {
		$scroll_type_class = " posts-infinite";
	}
} else {
	$scroll_type = "pagination";
	$scroll_type_class = " posts-pagination";
}

// Meta 
$morelink = $post_author = $post_comments = $post_date = $thumbnail = '';
$meta_array = array();

$morelink = hydd_zozo_get_theme_option('zozo_blog_read_more');
$post_author = hydd_zozo_get_theme_option('zozo_blog_post_meta_author');
$post_comments = hydd_zozo_get_theme_option('zozo_blog_post_meta_comments');
$post_date = hydd_zozo_get_theme_option('zozo_blog_post_meta_date');
$post_cat = hydd_zozo_get_theme_option('zozo_blog_post_meta_categories');
$thumbnail = hydd_zozo_get_theme_option('zozo_blog_post_featured_image');

$meta_array = array(
	'more' 	=> $morelink,
	'thumbnail' => $thumbnail,
	'author' 	=> $post_author,
	'comments' 	=> $post_comments,
	'date' 		=> $post_date,
	'categories' => $post_cat
);
?>

<div class="container">
	<div id="main-wrapper" class="zozo-row row">
		<div id="single-sidebar-container" class="<?php hydd_zozo_content_sidebar_classes(); ?>">
			<div class="zozo-row row">
				<div id="primary" class="content-area <?php hydd_zozo_primary_content_classes(); ?>">
					<div id="content" class="site-content ">

						<?php // Featured Post Slider
						if (hydd_zozo_get_theme_option('zozo_show_blog_featured_slider') == 1 && hydd_zozo_get_theme_option('zozo_featured_slider_type') == 'above_content') {
							get_template_part('partials/blog/featured', 'slider');
						} ?>
						<section class="blog-page section-gapping">
						<h2 class="vc_custom_heading sub-title">Blog</h2>
						<h2 class="vc_custom_heading"> Blog Post</h2>
						<div class="blog-warp">
						<div id="zozo-blog-posts-container" class="zozo-blog-posts-wrapper zozo-isotope-grid-system">

							<?php if (isset($display_mode) && $display_mode == 'isotope') { ?>
								<div class="zozo-isotope-wrapper blog-isotope-wrapper">
								<?php } ?>

								<div id="archive-posts-container index" class="zozo-posts-container <?php echo esc_attr($container_class); ?><?php echo esc_attr($scroll_type_class); ?> clearfix" <?php echo esc_attr($data_attr); ?>>

									<?php if (have_posts()) :
										while (have_posts()) : the_post();
											// if( isset( $original_layout ) && ( $original_layout == 'large' || $original_layout == 'list' || $original_layout == 'classic' ) ) {
											// 	echo hydd_zozo_output_blog_large_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array, $original_layout );
											// } 

											// else if( isset( $original_layout ) && $original_layout == 'grid' ) {
											// 	echo hydd_zozo_output_blog_grid_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array );
											// }

											// else if( isset( $original_layout ) && $original_layout == 'grid-overlay' ) {
											// 	echo hydd_zozo_output_blog_grid_overlay_layout( $post->ID, $post_class, $thumb_width, $thumb_height, $meta_array );
											// }

											// else if( isset( $original_layout ) && $original_layout == 'masonry' ) {
											// 	echo hydd_zozo_output_blog_masonry_layout( $post->ID, $post_class, $thumb_width, $thumb_height, $excerpt_limit, $meta_array );
											// }

											// else if( isset( $original_layout ) && $original_layout == 'metro' ) {
											// 	echo hydd_zozo_output_blog_metro_layout( $post->ID, $post_class, $thumb_width, $thumb_height, $meta_array );
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
												echo '<div class="post-content">' . apply_filters("the_excerpt", get_the_excerpt()) . '</div>';
												echo '<div class="read-wrap">';
													echo '<div class="post-readmore"><a href="' . get_the_permalink() . '">Read More</a></div>';
												echo '</div>';
											echo '</div>';
										endwhile;

									else :
										get_template_part('content', 'none');
									endif; ?>

								</div>

								<?php if (isset($display_mode) && $display_mode == 'isotope') { ?>
								</div>
							<?php } ?>

							<div class="zozo-blog-pagination-wrapper">
								<?php echo hydd_zozo_pagination($pages = '', $scroll_type); ?>
							</div>
						</div>
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
					</section>
					</div><!-- #content -->
				</div><!-- #primary -->

				<?php //get_sidebar(); ?>
			</div>
		</div><!-- #single-sidebar-container -->

		<?php //get_sidebar('second'); ?>

	</div><!-- #main-wrapper -->
</div><!-- .container -->
<?php get_footer(); ?>