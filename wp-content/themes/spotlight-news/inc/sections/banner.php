<?php
if ( ! get_theme_mod( 'newspulse_magazine_enable_banner_section', false ) ) {
	return;
}

$banner_content_ids        = $editor_picks_ids = array();
$banner_content_type       = get_theme_mod( 'newspulse_magazine_banner_posts_content_type', 'post' );
$editor_picks_content_type = get_theme_mod( 'newspulse_magazine_editor_picks_content_type', 'post' );

if ( $banner_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$banner_content_ids[] = get_theme_mod( 'spotlight_news_banner_posts_content_post_' . $i );
	}
	$banner_posts_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $banner_content_ids ) ) ) {
		$banner_posts_args['post__in'] = array_filter( $banner_content_ids );
		$banner_posts_args['orderby']  = 'post__in';
	} else {
		$banner_posts_args['orderby'] = 'date';
	}
} else {
	$cat_content_id    = get_theme_mod( 'newspulse_magazine_banner_posts_content_category' );
	$banner_posts_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$banner_posts_args = apply_filters( 'newspulse_magazine_banner_section_args', $banner_posts_args );

if ( $editor_picks_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$editor_picks_ids[] = get_theme_mod( 'spotlight_news_editor_picks_content_post_' . $i );
	}
	$editor_picks_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_picks_ids ) ) ) {
		$editor_picks_args['post__in'] = array_filter( $editor_picks_ids );
		$editor_picks_args['orderby']  = 'post__in';
	} else {
		$editor_picks_args['orderby'] = 'date';
	}
} else {
	$cat_content_id    = get_theme_mod( 'newspulse_magazine_editor_picks_content_category' );
	$editor_picks_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$editor_picks_args = apply_filters( 'newspulse_magazine_banner_section_args', $editor_picks_args );

newspulse_magazine_render_banner_section( $banner_posts_args, $editor_picks_args );

/**
 * Render Banner Section.
 */
function newspulse_magazine_render_banner_section( $banner_posts_args, $editor_picks_args ) {
	?>
	<section id="newspulse_magazine_banner_section" class="banner-section style-3 no-adver-image">
		<?php
		if ( is_customize_preview() ) :
			newspulse_magazine_section_link( 'newspulse_magazine_banner_section' );
		endif;
		?>
		<div class="ascendoor-wrapper">
			<?php
			$editor_picks_title = get_theme_mod( 'newspulse_magazine_editor_picks_title', __( 'Editor\'s Picks', 'spotlight-news' ) );
			?>
			<div class="banner-editor-picks-section">
				<?php if ( ! empty( $editor_picks_title ) ) { ?>
					<div class="section-header banner-section-header">
						<h3 class="section-title"><?php echo esc_html( $editor_picks_title ); ?></h3>
						<div class="editor-pick-arrows horizontal magazine-carousel-slider-navigation header"></div>
					</div>
				<?php } ?>
				<div class="editor-picks-wrapper magazine-carousel-slider-navigation horizontal">
					<?php
					$editor_picks_query = new WP_Query( $editor_picks_args );
					if ( $editor_picks_query->have_posts() ) :
						$i = 1;
						while ( $editor_picks_query->have_posts() ) :
							$editor_picks_query->the_post();
							?>
							<div class="carousel-item">
								<div class="mag-post-single has-image list-design">
									<div class="mag-post-img">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'post-thumbnail' ); ?>
										</a>
										<span class="number"><?php echo absint( $i ); ?></span>
									</div>
									<div class="mag-post-detail">
										<div class="mag-post-detail-inner">
											<h3 class="mag-post-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<div class="mag-post-meta">
												<span class="post-author">
													<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
												</span>
												<span class="post-date">
													<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<div class="banner-section-wrapper">
				<div class="banner-posts">
					<?php
					$banner_query = new WP_Query( $banner_posts_args );
					if ( $banner_query->have_posts() ) :
						while ( $banner_query->have_posts() ) :
							$banner_query->the_post();
							?>
							<div class="mag-post-single has-image tile-design">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'post-thumbnail' ); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category with-background">
										<?php newspulse_magazine_categories_list( true ); ?>
									</div>
									<h3 class="mag-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="mag-post-meta">
										<span class="post-author">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
										</span>
										<span class="post-date">
											<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
										</span>
									</div>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
		</div>
	</section>

	<?php

}
