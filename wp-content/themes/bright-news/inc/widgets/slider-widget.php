<?php
if ( ! class_exists( 'Bright_News_Slider_Widget' ) ) {
	/**
	 * Adds Bright_News_Slider_Widget Widget.
	 */
	class Bright_News_Slider_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$bright_news_grid_widget_ops = array(
				'classname'   => 'blog-trending-section ascendoor-widget',
				'description' => __( 'Retrive Slider Widgets', 'bright-news' ),
			);
			parent::__construct(
				'bright_news_slider_widget',
				__( 'Ascendoor Slider Widget', 'bright-news' ),
				$bright_news_grid_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$slider_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$slider_title        = apply_filters( 'widget_title', $slider_title, $instance, $this->id_base );
			$slider_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$slider_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$slider_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$slider_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $slider_category ) );

			echo $args['before_widget'];

			if ( ! empty( $slider_title || $slider_button_label ) ) { ?>
				<div class="title-heading">
					<?php echo $args['before_title'] . esc_html( $slider_title ) . $args['after_title']; ?>
					<a href="<?php echo esc_url( $slider_button_link ); ?>" class="view-all"><?php echo esc_html( $slider_button_label ); ?></a>
				</div>
			<?php } ?>
			<div class="trending-post-wrapper">
				<div class="trending-carousel slick-button">
					<?php
					$slider_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( 5 ),
						'offset'         => absint( $slider_post_offset ),
						'cat'            => absint( $slider_category ),
					);

					$query = new WP_Query( $slider_widgets_args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="blog-post-container tile-layout">
								<div class="blog-post-inner">
									<div class="blog-post-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="blog-post-detail">
										<div class="post-categories">
											<?php bright_news_categories_list(); ?>
										</div>
										<h2 class="entry-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h2>
										<div class="post-meta">
											<?php bright_news_posted_by(); ?>
											<span class="post-date">
												<a href="<?php the_permalink(); ?>"><?php echo esc_html( get_the_date() ); ?></a>
											</span>
										</div>
									</div>	
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$slider_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$slider_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$slider_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '#';
			$slider_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$slider_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'bright-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'bright-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'bright-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $slider_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'bright-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $slider_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'bright-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = bright_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $slider_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                 = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['button_label'] = sanitize_text_field( $new_instance['button_label'] );
			$instance['button_link']  = esc_url_raw( $new_instance['button_link'] );
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			return $instance;
		}
	}
}
