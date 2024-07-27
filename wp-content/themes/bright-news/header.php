<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bright_News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'bright-news' ); ?></a>

		<div id="loader" class="loader-1">
			<div class="loader-container">
				<div id="preloader">
				</div>
			</div>
		</div><!-- #loader -->

		<header id="masthead" class="site-header">
			<?php require get_template_directory() . '/sections/flash-news.php'; ?>
			<?php
			$ads_image = get_theme_mod( 'bright_news_header_advertisement', '' );
			$ads_url   = get_theme_mod( 'bright_news_header_advertisement_url', '' );
			?>
			<div class="bright-news-middle-header <?php echo esc_attr( empty( $ads_image ) ? 'no-bigyapaan' : '' ); ?>">
				<?php if ( ! empty( get_header_image() ) ) : ?>
					<div class="header-bg-image">
						<img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php esc_attr_e( 'Header Image', 'bright-news' ); ?>">
					</div>	
				<?php endif; ?>
				<div class="section-wrapper">
					<div class="bright-news-middle-header-wrapper <?php echo esc_attr( empty( $ads_image ) ? 'no-bigyapaan' : '' ); ?>">
						<div class="site-branding">
							<?php if ( has_custom_logo() ) { ?>
								<div class="site-logo">
									<?php the_custom_logo(); ?>
								</div>
							<?php } ?>
							<div class="site-identity">
								<?php
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$bright_news_description = get_bloginfo( 'description', 'display' );
								if ( $bright_news_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $bright_news_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div>	
						</div>
						<?php if ( ! empty( $ads_image ) ) { ?>
							<div class="middle-header-newsadvert">
								<a href="<?php echo esc_url( $ads_url ); ?>"><img src="<?php echo esc_url( $ads_image ); ?>" alt="<?php esc_attr_e( 'Bigyapaan Image', 'bright-news' ); ?>"></a>
							</div>
						<?php } ?>
					</div>	
				</div>	
			</div>		
			<!-- end of site-branding -->

			<div class="bright-news-navigation">
				<div class="section-wrapper"> 
					<div class="bright-news-navigation-container">
						<nav id="site-navigation" class="main-navigation">
							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
								<span class="ham-icon"></span>
								<span class="ham-icon"></span>
								<span class="ham-icon"></span>
							</button>
							<div class="navigation-area">
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu(
										array(
											'theme_location' => 'primary',
											'menu_id' => 'primary-menu',
										)
									);
								}
								?>
							</div>
						</nav><!-- #site-navigation -->
						<div class="bright-news-header-search">
							<div class="header-search-wrap">
								<a href="#" class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></a>
								<div class="header-search-form">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end of navigation -->
		</header><!-- #masthead -->

	<?php
	if ( ! is_front_page() || is_home() ) {
		if ( is_front_page() ) {

			// Banner Section.
			require get_template_directory() . '/sections/banner.php';

		}
		?>
		<div class="bright-news-main-wrapper">
			<div class="section-wrapper">
				<div class="bright-news-container-wrapper">
				<?php } ?>
