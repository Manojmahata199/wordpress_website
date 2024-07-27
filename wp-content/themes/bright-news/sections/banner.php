<?php
if ( ! get_theme_mod( 'bright_news_enable_banner_section', false ) ) {
	return;
}

$slider_content_ids        = $banner_posts_ids = array();
$slider_content_type       = get_theme_mod( 'bright_news_main_banner_slider_content_type', 'post' );
$banner_posts_content_type = get_theme_mod( 'bright_news_banner_posts_content_type', 'post' );

if ( $slider_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$slider_content_ids[] = get_theme_mod( 'bright_news_main_banner_slider_content_post_' . $i );
	}
	$banner_slider_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $slider_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
} else {
	$cat_content_id     = get_theme_mod( 'bright_news_main_banner_slider_content_category' );
	$banner_slider_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_slider_args = apply_filters( 'bright_news_main_banner_section_args', $banner_slider_args );

if ( $banner_posts_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$banner_posts_ids[] = get_theme_mod( 'bright_news_banner_posts_content_post_' . $i );
	}
	$banner_posts_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $banner_posts_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
} else {
	$cat_content_id    = get_theme_mod( 'bright_news_banner_posts_content_category' );
	$banner_posts_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$banner_posts_args = apply_filters( 'bright_news_main_banner_section_args', $banner_posts_args );

bright_news_render_banner_section( $banner_slider_args, $banner_posts_args );

/**
 * Render Banner Section.
 */
function bright_news_render_banner_section( $banner_slider_args, $banner_posts_args ) {
	?>

	<section id="bright_news_banner_section" class="banner-section ascendoor-customizer-section banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			bright_news_section_link( 'bright_news_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">
				<!-- Banner Slider Section -->
				<div class="banner-slider-part">
					<div class="banner-slider slick-button" data-slick='{"autoplay": false }'>
						<?php
						$banner_slider_query = new WP_Query( $banner_slider_args );
						if ( $banner_slider_query->have_posts() ) {
							while ( $banner_slider_query->have_posts() ) :
								$banner_slider_query->the_post();
								?>
								<div class="blog-post-container tile-layout">
									<div class="blog-post-inner">
										<div class="blog-post-image">
											<?php the_post_thumbnail( 'full' ); ?>
										</div>
										<div class="blog-post-detail">
											<div class="post-categories">
												<?php bright_news_categories_list(); ?>
											</div>
											<h2 class="entry-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h2>
											<p class="post-excerpt">
												<?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 15 ) ); ?>
											</p>
											<div class="post-meta">
												<?php bright_news_posted_by(); ?>
												<span class="post-date">
													<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
												</span>
											</div>
										</div>
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
				<!-- End Banner Slider Section -->

				<!-- Banner Posts Section -->
				<?php
				$banner_posts_query = new WP_Query( $banner_posts_args );
				if ( $banner_posts_query->have_posts() ) {
					while ( $banner_posts_query->have_posts() ) :
						$banner_posts_query->the_post();
						?>
						<div class="blog-post-container tile-layout">
							<div class="blog-post-inner">
								<div class="blog-post-image">
									<?php the_post_thumbnail( 'full' ); ?>
								</div>
								<div class="blog-post-detail">
									<div class="post-categories">
										<?php bright_news_categories_list(); ?>
									</div>
									<h2 class="entry-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h2>
									<div class="post-meta">
										<?php bright_news_posted_by(); ?>
										<span class="post-date">
											<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
				}
				?>
				<!-- End Banner Posts Section -->
			</div>
		</div>
	</section>

	<?php

}
