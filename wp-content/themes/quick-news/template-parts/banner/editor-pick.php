<?php
$editor_pick_title = get_theme_mod( 'quick_news_editor_pick_title', __( 'Editor Pick', 'quick-news' ) );
?>
<div class="editors-pick-part">
	<?php if ( ! empty( $editor_pick_title ) ) : ?>
		<div class="section-header">
			<h3 class="section-title"><?php echo esc_html( $editor_pick_title ); ?></h3>
		</div>
	<?php endif; ?>
	<div class="editors-pick-wrapper column-4">
		<?php
		$editor_query = new WP_Query( $editor_args );
		if ( $editor_query->have_posts() ) {
			while ( $editor_query->have_posts() ) :
				$editor_query->the_post();
				?>
				<div class="mag-post-single banner-gird-single has-image">
					<div class="mag-post-img">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
					</div>
					<div class="mag-post-detail">
						<div class="mag-post-category">
							<?php quick_news_categories_list(); ?>
						</div>
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
			endwhile;
			wp_reset_postdata();
		}
		?>
	</div>
</div>
