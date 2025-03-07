<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quick News
 */

?>
<?php if ( ! is_front_page() || is_home() ) { ?>
</div>
</div>
</div><!-- #content -->
<?php } ?>

</div><!-- #page -->

<footer id="colophon" class="site-footer">
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) ) : ?>
	<div class="site-footer-top">
		<div class="ascendoor-wrapper">
			<div class="footer-widgets-wrapper three-column-1">
				<?php for ( $i = 1; $i <= 3; $i++ ) { ?>
					<div class="footer-widget-single">
						<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div><!-- .footer-top -->
<?php endif; ?>
<div class="site-footer-bottom">
	<div class="ascendoor-wrapper">
		<div class="site-footer-bottom-wrapper">
			<div class="site-info">
				<?php
					/**
					 * Hook: quick_news_footer_copyright.
					 *
					 * @hooked - quick_news_output_footer_copyright_content - 10
					 */
					do_action( 'quick_news_footer_copyright' );
					?>
				</div><!-- .site-info -->
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<a href="#" id="scroll-to-top" class="magazine-scroll-to-top">
	<i class="fa-solid fa-chevron-up"></i>
	<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
		</svg>
	</div>
</a>

<?php wp_footer(); ?>

</body>

</html>
