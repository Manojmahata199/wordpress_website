<?php
if ( ! get_theme_mod( 'bright_news_enable_flash_news_section', false ) ) {
	return;
}

$flash_news_content_ids  = array();
$flash_news_content_type = get_theme_mod( 'bright_news_flash_news_content_type', 'post' );

if ( $flash_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$flash_news_content_ids[] = get_theme_mod( 'bright_news_flash_news_content_post_' . $i );
	}
	$flash_news_args = array(
		'post_type'           => 'post',
		'post__in'            => array_filter( $flash_news_content_ids ),
		'orderby'             => 'post__in',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
} elseif ( $flash_news_content_type === 'recent' ) {
	$flash_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
}
$flash_news_args = apply_filters( 'bright_news_flash_news_section_args', $flash_news_args );

bright_news_render_flash_news_section( $flash_news_args );

/**
 * Render Flash News Section.
 */
function bright_news_render_flash_news_section( $flash_news_args ) {

	$query = new WP_Query( $flash_news_args );
	if ( $query->have_posts() ) {
		$full_width = has_nav_menu( 'social' ) ? '' : 'flash-news-full-width';
		?>
		<div id="bright_news_flash_news_section" class="bright-news-top-header">
			<div class="section-wrapper">
				<div class="bright-news-top-header-container <?php echo esc_attr( $full_width ); ?>">
					<div class="top-header-left">
						<div class="flash-news-section ascendoor-customizer-section">
							<div class="conveyor-ticker">
								<div class="conveyor-ticker-label">
									<div class="pulsating-circle"></div>
									<div class="js-conveyor">
										<ul>
											<?php
											while ( $query->have_posts() ) :
												$query->the_post();
												?>
												<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
												<?php
											endwhile;
											wp_reset_postdata();
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="top-header-right">
						<div class="header-social-icon">
							<div class="header-social-icon-container">
								<?php
								if ( has_nav_menu( 'social' ) ) {
									wp_nav_menu(
										array(
											'container'   => 'ul',
											'menu_class'  => 'social-links',
											'theme_location' => 'social',
											'link_before' => '<span class="screen-reader-text">',
											'link_after'  => '</span>',
										)
									);
								}
								?>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<?php
	}
}
