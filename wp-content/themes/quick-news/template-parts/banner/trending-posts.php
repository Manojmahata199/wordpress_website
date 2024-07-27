<?php
$trending_title = get_theme_mod( 'quick_news_trending_posts_title', __( 'Trending Posts', 'quick-news' ) );
?>
<div class="trending-part">
	<div class="section-header">
		<?php if ( ! empty( $trending_title ) ) : ?>
			<h3 class="section-title"><?php echo esc_html( $trending_title ); ?></h3>
		<?php endif; ?>
	</div>
	<div class="trending-wrapper">
		<?php
		$trending_query = new WP_Query( $trending_args );
		if ( $trending_query->have_posts() ) {
			$i = 1;
			while ( $trending_query->have_posts() ) :
				$trending_query->the_post();
				?>
				<div class="mag-post-single banner-gird-single has-image list-design">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
						<span class="trending-no"><?php echo absint( $i ); ?></span>
					</div>
					<div class="mag-post-detail">
						<h4 class="mag-post-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h4>
						<div class="mag-post-meta">
							<?php
							quick_news_posted_by();
							quick_news_posted_on();
							?>
						</div>
					</div>
				</div>
				<?php
				$i++;
			endwhile;
			wp_reset_postdata();
		}
		?>
	</div>
</div>
