<?php
if ( ! class_exists( 'Newspulse_Magazine_Posts_List_Widget' ) ) {
	/**
	 * Adds Newspulse_Magazine_Posts_List_Widget Widget.
	 */
	class Newspulse_Magazine_Posts_List_Widget extends WP_Widget {


		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$newspulse_magazine_list_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-list-section style-1',
				'description' => __( 'Retrive Posts List Widgets', 'newspulse-magazine' ),
			);
			parent::__construct(
				'newspulse_magazine_magazine_list_widget',
				__( 'Ascendoor Posts List Widget', 'newspulse-magazine' ),
				$newspulse_magazine_list_widget_ops
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
			$list_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$list_title        = apply_filters( 'widget_title', $list_title, $instance, $this->id_base );
			$list_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$list_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$list_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $list_category ) );

			echo $args['before_widget'];
			if ( ! empty( $list_title || $list_button_label ) ) {
				?>
				<div class="section-header">
					<?php
					if ( ! empty( $list_title ) ) {
						echo $args['before_title'] . esc_html( $list_title ) . $args['after_title'];
					}
					if ( ! empty( $list_button_label ) ) {
						?>
						<a href="<?php echo esc_url( $list_button_link ); ?>" class="mag-view-all-link">
							<?php echo esc_html( $list_button_label ); ?>
						</a>
						<?php
					}
					?>
				</div>
			<?php } ?>
			<div class="magazine-section-body">
				<div class="magazine-list-section-wrapper">
					<?php
					$list_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( 4 ),
						'offset'         => absint( $list_post_offset ),
						'cat'            => absint( $list_category ),
					);

					$query = new WP_Query( $list_widgets_args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image list-design">
								<div class="mag-post-img">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								</div>
								<div class="mag-post-detail">
									<div class="mag-post-category">
										<?php newspulse_magazine_categories_list(); ?>
									</div>
									<h3 class="mag-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="mag-post-meta">
										<span class="post-author">
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><i class="fas fa-user"></i><?php echo esc_html( get_the_author() ); ?></a>
										</span>
										<span class="post-date">
											<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php echo esc_html( get_the_date() ); ?></a>
										</span>
									</div>
									<div class="mag-post-excerpt">
										<?php the_excerpt(); ?>
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
			$list_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$list_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$list_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '';
			$list_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'newspulse-magazine' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $list_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'newspulse-magazine' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $list_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'newspulse-magazine' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $list_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'newspulse-magazine' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $list_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'newspulse-magazine' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = newspulse_magazine_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $list_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
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
