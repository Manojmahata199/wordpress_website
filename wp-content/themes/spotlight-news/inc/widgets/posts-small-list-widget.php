<?php
if ( ! class_exists( 'Newspulse_Magazine_Posts_Small_List_Widget' ) ) {
	/**
	 * Adds Newspulse_Magazine_Posts_Small_List_Widget Widget.
	 */
	class Newspulse_Magazine_Posts_Small_List_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$newspulse_magazine_list_widget_ops = array(
				'classname'   => 'ascendoor-widget magazine-small-list-section style-2',
				'description' => __( 'Retrive Posts List Widgets', 'spotlight-news' ),
			);
			parent::__construct(
				'newspulse_magazine_magazine_small_list_widget',
				__( 'Ascendoor Posts Small List Widget', 'spotlight-news' ),
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
			$posts_list_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$posts_list_title        = apply_filters( 'widget_title', $posts_list_title, $instance, $this->id_base );
			$posts_list_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$posts_list_post_count   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$posts_list_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$posts_list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$posts_list_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $posts_list_category ) );

			echo $args['before_widget'];

			if ( ! empty( $posts_list_title || $posts_list_button_label ) ) {
				?>
				<div class="section-header">
					<?php
					if ( ! empty( $posts_list_title ) ) {
						echo $args['before_title'] . esc_html( $posts_list_title ) . $args['after_title'];
					}
					if ( ! empty( $posts_list_button_label ) ) {
						?>
						<a href="<?php echo esc_url( $posts_list_button_link ); ?>" class="mag-view-all-link">
							<?php echo esc_html( $posts_list_button_label ); ?>
						</a>
						<?php
					}
					?>
				</div>
			<?php } ?>
			<div class="magazine-section-body">
				<div class="magazine-list-section-wrapper">
					<?php
					$posts_list_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( $posts_list_post_count ),
						'offset'         => absint( $posts_list_post_offset ),
						'cat'            => absint( $posts_list_category ),
					);

					$query = new WP_Query( $posts_list_widgets_args );
					if ( $query->have_posts() ) :
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="mag-post-single has-image list-design">
								<div class="mag-post-detail">
									<div class="mag-post-detail-inner">
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
			$posts_list_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$posts_list_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$posts_list_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '';
			$posts_list_post_count   = isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;
			$posts_list_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$posts_list_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'spotlight-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_list_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'spotlight-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_list_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'spotlight-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $posts_list_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of posts to show(Min:1 | Max:8):', 'spotlight-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" max="8" value="<?php echo absint( $posts_list_post_count ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'spotlight-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $posts_list_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'spotlight-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = newspulse_magazine_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $posts_list_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
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
			$instance['number']       = (int) $new_instance['number'];
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			return $instance;
		}

	}
}
