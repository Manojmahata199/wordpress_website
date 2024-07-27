<?php
if ( ! get_theme_mod( 'quick_news_enable_posts_tile_section', false ) ) {
	return;
}

$content_ids   = array();
$content_type  = get_theme_mod( 'quick_news_posts_tile_content_type', 'category' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'quick_news_posts_tile_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'quick_news_posts_tile_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$args = apply_filters( 'quick_news_posts_tile_section_args', $args );

quick_news_render_posts_tile_section( $args );

/**
 * Render Posts Tile Section.
 */
function quick_news_render_posts_tile_section( $args ) {
	$section_title = get_theme_mod( 'quick_news_posts_tile_title', __( 'Posts Tile', 'quick-news' ) );
	$button_label  = get_theme_mod( 'quick_news_posts_tile_button_label', __( 'View All', 'quick-news' ) );
	$button_link   = get_theme_mod( 'quick_news_posts_tile_button_link' );
	$button_link   = ! empty( $button_link ) ? $button_link : '#';

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<section id="quick_news_posts_tile_section" class="magazine-frontpage-section magazine-tile-section style-1">
			<?php
			if ( is_customize_preview() ) :
				quick_news_section_link( 'quick_news_posts_tile_section' );
			endif;
			?>
			<div class="ascendoor-wrapper">
				<?php if ( ! empty( $section_title || $button_label ) ) : ?>
					<div class="section-header">
						<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
						<?php if ( ! empty( $button_label ) ) : ?>
							<a href="<?php echo esc_url( $button_link ); ?>" class="mag-view-all-link"><?php echo esc_html( $button_label ); ?></a>
						<?php endif; ?>
					</div>
				<?php endif ?>
				<div class="magazine-section-body">
					<div class="magazine-tile-section-wrapper">
						<?php
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image tile-design">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category with-background">
										<?php quick_news_categories_list(); ?>
									</div>
									<h3 class="mag-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="mag-post-meta">
										<?php
										quick_news_posted_by();
										quick_news_posted_on();
										?>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif;
}
