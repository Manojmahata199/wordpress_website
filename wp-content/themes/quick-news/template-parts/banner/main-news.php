<?php
$section_title = get_theme_mod( 'quick_news_main_news_title', __( 'Main News', 'quick-news' ) );
?>
<div class="slider-part">
	<?php if ( ! empty( $section_title ) ) { ?>
		<div class="section-header">
			<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
		</div>
	<?php } ?>
	<div class="banner-slider magazine-carousel-slider-navigation">
		<?php
		$main_news_query = new WP_Query( $main_news_args );
		if ( $main_news_query->have_posts() ) {
			while ( $main_news_query->have_posts() ) :
				$main_news_query->the_post();
				?>
				<div class="mag-post-single banner-grid-single has-image tile-design">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'post-thumbnail' ); ?>
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
		}
		?>
	</div>
</div>
