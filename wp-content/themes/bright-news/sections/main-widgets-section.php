<?php

$sidebar_position = get_theme_mod( 'bright_news_frontpage_sidebar_position', 'frontpage-right-sidebar' );
$no_sidebar       = is_active_sidebar( 'secondary-widgets-area' ) ? '' : 'no-frontpage-sidebar';
$classes          = implode( ' ', array( $sidebar_position, $no_sidebar ) );
if ( is_active_sidebar( 'primary-widgets-area' ) || is_active_sidebar( 'secondary-widgets-area' ) ) :
	?>
<div class="main-widget-area section-splitter">
	<div class="section-wrapper">
		<div class="widget-area-wrapper <?php echo esc_attr( $classes ); ?>">
			<?php if ( is_active_sidebar( 'primary-widgets-area' ) ) : ?>
				<div class="primary-widgets-area">
					<?php dynamic_sidebar( 'primary-widgets-area' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'secondary-widgets-area' ) ) : ?>
				<div class="secondary-widgets-area">
					<?php dynamic_sidebar( 'secondary-widgets-area' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
