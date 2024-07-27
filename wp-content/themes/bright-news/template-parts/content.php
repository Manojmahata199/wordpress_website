<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bright_News
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blog-post-container ">
		<div class="blog-post-inner">
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="blog-post-image">
					<?php bright_news_post_thumbnail(); ?>
				</div>
			<?php endif; ?>
			<div class="blog-post-detail">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="post-categories">
						<?php bright_news_categories_list(); ?>
					</div>
				<?php endif; ?>
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="post-main-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<div class="post-meta">
					<?php
					bright_news_posted_by();
					bright_news_posted_on();
					?>
				</div>
				<div class="post-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<?php
				$button_label = get_theme_mod( 'bright_news_excerpt_readmore_button_label', __( 'Read More', 'bright-news' ) );
				if ( ! empty( $button_label ) ) {
					?>
					<a href="<?php the_permalink(); ?>" class="read-more-btn">
						<span><?php echo esc_html( $button_label ); ?></span>
					</a>
				<?php } ?>
			</div>
		</div>
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
