<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Newspulse Magazine
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="magazine-inside-wrap">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'newspulse-magazine' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<div class="magazine-archive-layout grid-layout grid-column-2">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );

				endwhile;
				?>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div>
	<?php echo do_action( 'newspulse_magazine_posts_pagination' ); ?>

</main><!-- #main -->

<?php
if ( newspulse_magazine_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();
