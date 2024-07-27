<?php

// Posts Grid Widget.
require get_template_directory() . '/inc/widgets/posts-grid-widget.php';

// Posts List Widget.
require get_template_directory() . '/inc/widgets/posts-list-widget.php';

// Categories Widget.
require get_template_directory() . '/inc/widgets/categories-widget.php';

// Posts Small List Widget.
require get_template_directory() . '/inc/widgets/posts-small-list-widget.php';

// Posts Grid and List Widget.
require get_template_directory() . '/inc/widgets/posts-grid-and-list-widget.php';

// Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/posts-carousel-widget.php';

// Trending Posts Carousel Widget.
require get_template_directory() . '/inc/widgets/trending-posts-carousel-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function newspulse_magazine_pro_register_widgets() {

	register_widget( 'Newspulse_Magazine_Posts_Grid_Widget' );

	register_widget( 'Newspulse_Magazine_Posts_List_Widget' );

	register_widget( 'Newspulse_Magazine_Categories_Widget' );

	register_widget( 'Newspulse_Magazine_Posts_Small_List_Widget' );

	register_widget( 'Newspulse_Magazine_Posts_Grid_And_List_Widget' );

	register_widget( 'Newspulse_Magazine_Posts_Carousel_Widget' );

	register_widget( 'Newspulse_Magazine_Trending_Posts_Carousel_Widget' );

	register_widget( 'Newspulse_Magazine_Social_Icons_Widget' );
}
add_action( 'widgets_init', 'newspulse_magazine_pro_register_widgets' );
