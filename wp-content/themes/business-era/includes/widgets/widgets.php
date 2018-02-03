<?php
/**
 * Custom widgets.
 *
 * @package Business_Era
 */

if ( ! function_exists( 'business_era_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function business_era_load_widgets() {

		// Social.
		register_widget( 'Business_Era_Social_Widget' );

		// Latest news.
		register_widget( 'Business_Era_Latest_News_Widget' );

		// CTA widget.
		register_widget( 'Business_Era_CTA_Widget' );

		// Advance CTA widget.
		register_widget( 'Business_Era_Advance_CTA_Widget' );

		// Services widget.
		register_widget( 'Business_Era_Services_Widget' );

		// Business Era Page widget.
		register_widget( 'Business_Era_Page_Widget' );

	}

endif;

add_action( 'widgets_init', 'business_era_load_widgets' );

if ( ! function_exists( 'business_era_load_widgets_scripts' ) ) :

	/**
	 * Load widgets scripts.
	 *
	 * @since 1.0.0
	 */
	function business_era_load_widgets_scripts( $hook ) {

		wp_enqueue_style( 'business-era-admin-css', get_template_directory_uri() . '/includes/widgets/css/admin.css', array(), '1.0.5' );

		wp_enqueue_media();

		wp_enqueue_style( 'wp-color-picker' );  

		wp_enqueue_script( 'wp-color-picker' ); 

		wp_enqueue_script( 'business-era-admin-js', get_template_directory_uri() . '/includes/widgets/js/admin.js', array( 'jquery' ), '1.0.5' );

	}

endif;
	
add_action( 'admin_enqueue_scripts', 'business_era_load_widgets_scripts' );


if ( ! class_exists( 'Business_Era_Social_Widget' ) ) :

	/**
	 * Social widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_Social_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_era_widget_social',
				'description' => esc_html__( 'Social Icons Widget', 'business-era' ),
			);
			parent::__construct( 'business-era-social', esc_html__( 'Business Era: Social', 'business-era' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args['before_widget'];

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'social',
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			}

			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = sanitize_text_field( $new_instance['title'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title' => '',
			) );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'business-era' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<?php if ( ! has_nav_menu( 'social' ) ) : ?>
	        <p>
				<?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Theme Location.', 'business-era' ); ?>
	        </p>
	        <?php endif; ?>
			<?php
		}
	}

endif;


if ( ! class_exists( 'Business_Era_Latest_News_Widget' ) ) :

	/**
	 * Latest News widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_Latest_News_Widget extends WP_Widget {

	    function __construct() {
	    	$opts = array(
				'classname'   => 'business_era_widget_latest_news',
				'description' => __( 'Latest News Widget', 'business-era' ),
    		);

			parent::__construct( 'business-era-latest-news', esc_html__( 'Business Era: Latest News', 'business-era' ), $opts );
	    }


	    function widget( $args, $instance ) {

			$title             = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$post_category     = ! empty( $instance['post_category'] ) ? $instance['post_category'] : 0;
			$post_column       = ! empty( $instance['post_column'] ) ? $instance['post_column'] : 4;
			$featured_image    = ! empty( $instance['featured_image'] ) ? $instance['featured_image'] : 'medium';
			$post_number       = ! empty( $instance['post_number'] ) ? $instance['post_number'] : 4;

			$excerpt_length	   = !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 10;

			$enable_excerpt    = ! empty( $instance['enable_excerpt'] ) ? $instance['enable_excerpt'] : 0;

	        echo $args['before_widget'];

	        echo '<div class="container">';

	        if ( $title ) {
	        	echo $args['before_title'] . $title . $args['after_title'];
	        }

	        ?>
	        <?php
	        $query_args = array(
	        	'posts_per_page' => esc_attr( $post_number ),
	        	'no_found_rows'  => true,
	        	);
	        if ( absint( $post_category ) > 0 ) {
	        	$query_args['cat'] = absint( $post_category );
	        }

	        $all_posts = get_posts( $query_args );
	        ?>
	        <?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

	          <div class="latest-news-widget latest-news-col-<?php echo esc_attr( $post_column ); ?>">

	            <div class="inner-wrapper">

					<?php foreach ( $all_posts as $key => $post ) : ?>
	                <?php setup_postdata( $post ); ?>

	                <div class="latest-news-item">
		                <div class="latest-news-wrapper">
		                <?php if ( 'disable' !== $featured_image && has_post_thumbnail() ) :  ?>
		                  <div class="latest-news-thumb">
		                    <a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( $featured_image ); ?>
		                    </a>
		                  </div><!-- .latest-news-thumb -->
		                <?php endif; ?>
		                <div class="latest-news-text-wrap">
		                  <h3 class="latest-news-title">
		                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                  </h3><!-- .latest-news-title -->
		                  <?php 
		                  if( 1 == $enable_excerpt ){

		                  	$content = business_era_get_the_excerpt( absint( $excerpt_length ), $post );
		                  
		                  	echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';
		                  } ?>
		                </div><!-- .latest-news-text-wrap -->
		                </div>
	                </div>

					<?php endforeach; ?>

	            </div><!-- .row -->

	          </div><!-- .latest-news-widget -->

				<?php wp_reset_postdata(); ?>

	        <?php endif; ?>
	        <?php

	        echo '</div>';

	        echo $args['after_widget'];

	    }

	    function update( $new_instance, $old_instance ) {
	        $instance = $old_instance;

			$instance['title']          = sanitize_text_field( $new_instance['title'] );
			$instance['post_category']  = absint( $new_instance['post_category'] );
			$instance['post_number']    = absint( $new_instance['post_number'] );
			$instance['post_column']    = absint( $new_instance['post_column'] );
			$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );
			$instance['enable_excerpt']= (bool) $new_instance['enable_excerpt'] ? 1 : 0;
			$instance['featured_image'] = esc_url_raw( $new_instance['featured_image'] );

	        return $instance;
	    }

	    function form( $instance ) {

	        $instance = wp_parse_args( (array) $instance, array(
				'title'          => '',
				'post_category'  => '',
				'post_column'    => 4,
				'featured_image' => 'medium',
				'post_number'    => 4,
				'excerpt_length' => 10,
				'enable_excerpt'=> 0,
	        ) );
	        ?>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php _e( 'Title:', 'business-era' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
	        </p>
	        <p>
	          <label for="<?php echo  esc_attr( $this->get_field_id( 'post_category' ) ); ?>"><strong><?php _e( 'Select Category:', 'business-era' ); ?></strong></label>
				<?php
	            $cat_args = array(
	                'orderby'         => 'name',
	                'hide_empty'      => 0,
	                'taxonomy'        => 'category',
	                'name'            => $this->get_field_name( 'post_category' ),
	                'id'              => $this->get_field_id( 'post_category' ),
	                'class'   		  => 'widefat',
	                'selected'        => absint( $instance['post_category'] ),
	                'show_option_all' => __( 'All Categories','business-era' ),
	              );
	            wp_dropdown_categories( $cat_args );
				?>
	        </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>"><strong><?php _e( 'Number of Posts:', 'business-era' ); ?></strong></label>
	          <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_number' ) ); ?>" name="<?php echo  esc_attr( $this->get_field_name( 'post_number' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['post_number'] ); ?>" min="1" />
	        </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'post_column' ) ); ?>"><strong><?php _e( 'Number of Columns:', 'business-era' ); ?></strong></label>
				<?php
	            $this->dropdown_post_columns( array(
					'id'       => $this->get_field_id( 'post_column' ),
					'name'     => $this->get_field_name( 'post_column' ),
					'selected' => absint( $instance['post_column'] ),
					)
	            );
				?>
	        </p>
	        <p>
	          <label for="<?php echo esc_attr( $this->get_field_id( 'featured_image' ) ); ?>"><strong><?php _e( 'Select Image Size:', 'business-era' ); ?></strong></label>
				<?php
	            $this->dropdown_image_sizes( array(
					'id'       => $this->get_field_id( 'featured_image' ),
					'name'     => $this->get_field_name( 'featured_image' ),
					'selected' => esc_attr( $instance['featured_image'] ),
					)
	            );
				?>
	        </p>
	        <p>
	        	<label for="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>"><strong><?php _e( 'Excerpt Length:', 'business-era' ); ?></strong></label>
	        	<input id="<?php echo esc_attr( $this->get_field_id( 'excerpt_length' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'excerpt_length' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['excerpt_length'] ); ?>" min="0" />&nbsp;<small><?php _e( 'in words', 'business-era' ); ?></small>
	        </p>
	        <p>
	            <input class="checkbox" type="checkbox" <?php checked( $instance['enable_excerpt'] ); ?> id="<?php echo $this->get_field_id( 'enable_excerpt' ); ?>" name="<?php echo $this->get_field_name( 'enable_excerpt' ); ?>" />
	            <label for="<?php echo $this->get_field_id( 'enable_excerpt' ); ?>"><?php esc_html_e( 'Enable Excerpt', 'business-era' ); ?></label>
	        </p>
	        <?php
	    }

	    function dropdown_post_columns( $args ) {
			$defaults = array(
		        'id'       => '',
		        'name'     => '',
		        'selected' => 0,
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = array(
				'2' => 2,
				'3' => 3,
				'4' => 4,
			);

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
	    }

	    function dropdown_image_sizes( $args ) {
			$defaults = array(
		        'id'       => '',
		        'class'    => 'widefat',
		        'name'     => '',
		        'selected' => 0,
			);

			$r = wp_parse_args( $args, $defaults );
			$output = '';

			$choices = array(
				'business-era-blog' => esc_html__( 'Business Era Custom', 'business-era' ),
				'thumbnail' 		=> esc_html__( 'Thumbnail', 'business-era' ),
				'medium'    		=> esc_html__( 'Medium', 'business-era' ),
				'large'     		=> esc_html__( 'Large', 'business-era' ),
				'full'      		=> esc_html__( 'Full', 'business-era' ),
			);

			if ( ! empty( $choices ) ) {

				$output = "<select name='" . esc_attr( $r['name'] ) . "' id='" . esc_attr( $r['id'] ) . "' class='" . esc_attr( $r['class'] ) . "'>\n";
				foreach ( $choices as $key => $choice ) {
					$output .= '<option value="' . esc_attr( $key ) . '" ';
					$output .= selected( $r['selected'], $key, false );
					$output .= '>' . esc_html( $choice ) . '</option>\n';
				}
				$output .= "</select>\n";
			}

			echo $output;
	    }
	}

endif;

if ( ! class_exists( 'Business_Era_CTA_Widget' ) ) :

	/**
	 * CTA widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_CTA_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_era_widget_call_to_action',
				'description' => esc_html__( 'Call To Action Widget', 'business-era' ),
			);
			parent::__construct( 'business-era-cta', esc_html__( 'Business Era: CTA', 'business-era' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			$title       = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$text        = ! empty( $instance['text'] ) ? $instance['text'] : '';
			$button_text = ! empty( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
			$button_url  = ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : '';

			echo $args['before_widget'];

			echo '<div class="container">';

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			?>
			<div class="cta-wrap">
				<div class="call-to-action-content">
					<?php echo wpautop( esc_html($text) ); ?>
				</div><!-- .call-to-action-content -->
				<div class="call-to-action-buttons">
					<?php if ( ! empty( $button_text ) ) : ?>
						<a href="<?php echo esc_url( $button_url ); ?>" class="button cta-button cta-button-primary"><?php echo esc_attr( $button_text ); ?></a>
					<?php endif; ?>
				</div><!-- .call-to-action-buttons -->
			</div>
			<?php

			echo '</div>';

			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			
			$instance['text'] 		 = sanitize_text_field( $new_instance['text'] );
			$instance['button_text'] = sanitize_text_field( $new_instance['button_text'] );
			$instance['button_url']  = esc_url_raw( $new_instance['button_url'] );

			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       => '',
				'text'        => '',
				'button_text' => esc_html__( 'Learn more', 'business-era' ),
				'button_url'  => '',
			) );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><strong><?php esc_html_e( 'Text:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><strong><?php esc_html_e( 'Button Text:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><strong><?php esc_html_e( 'Button URL:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_url'] ); ?>" />
			</p>
		<?php
		}
	}

endif;

if ( ! class_exists( 'Business_Era_Advance_CTA_Widget' ) ) :

	/**
	 * Advance CTA widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_Advance_CTA_Widget extends WP_Widget {

		/**
		 * Constructor.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'   => 'business_era_widget_advance_call_to_action',
				'description' => esc_html__( 'Advance Call To Action Widget with multiple buttons and background image', 'business-era' ),
			);
			parent::__construct( 'business-era-advance-cta', esc_html__( 'Business Era: Advance CTA', 'business-era' ), $opts );
		}

		/**
		 * Echo the widget content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments including before_title, after_title,
		 *                        before_widget, and after_widget.
		 * @param array $instance The settings for the particular instance of the widget.
		 */
		function widget( $args, $instance ) {

			$title       		= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
			$text        		= ! empty( $instance['text'] ) ? $instance['text'] : '';
			$button_text 		= ! empty( $instance['button_text'] ) ? esc_html( $instance['button_text'] ) : '';
			$button_url  		= ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : '';
			$button_two_text 	= ! empty( $instance['button_two_text'] ) ? esc_html( $instance['button_two_text'] ) : '';
			$button_two_url  	= ! empty( $instance['button_two_url'] ) ? esc_url( $instance['button_two_url'] ) : '';
			$bg_pic  	 		= ! empty( $instance['bg_pic'] ) ? esc_url_raw( $instance['bg_pic'] ) : '';

			// Add background image.
			if ( ! empty( $bg_pic ) ) {
				$background_style = '';
				$background_style .= ' style="background-image:url(' . esc_url( $bg_pic ) . ');" ';
				$args['before_widget'] = implode( $background_style . ' ' . 'class="with_bg ', explode( 'class="', $args['before_widget'], 2 ) );
			}

			echo $args['before_widget'];

			echo '<div class="container">';

			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			?>
			<div class="call-to-action-content">
				<?php echo wpautop( esc_html($text) ) ; ?>
			</div><!-- .call-to-action-content -->
			<div class="call-to-action-buttons">
				<?php if ( ! empty( $button_text ) ) : ?>
					<a href="<?php echo esc_url( $button_url ); ?>" class="button cta-button cta-button-primary"><?php echo esc_attr( $button_text ); ?></a>
				<?php endif; ?>
				<?php if ( ! empty( $button_two_text ) ) : ?>
					<a href="<?php echo esc_url( $button_two_url ); ?>" class="button cta-button cta-button-secondary"><?php echo esc_attr( $button_two_text ); ?></a>
				<?php endif; ?>
			</div><!-- .call-to-action-buttons -->

			<?php

			echo '</div>';

			echo $args['after_widget'];

		}

		/**
		 * Update widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $new_instance New settings for this instance as input by the user via
		 *                            {@see WP_Widget::form()}.
		 * @param array $old_instance Old settings for this instance.
		 * @return array Settings to save or bool false to cancel saving.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] 				= sanitize_text_field( $new_instance['title'] );

			$instance['text'] 				= sanitize_text_field( $new_instance['text'] );

			$instance['button_text'] 		= sanitize_text_field( $new_instance['button_text'] );
			$instance['button_url']  		= esc_url_raw( $new_instance['button_url'] );
			$instance['button_two_text'] 	= sanitize_text_field( $new_instance['button_two_text'] );
			$instance['button_two_url']  	= esc_url_raw( $new_instance['button_two_url'] );
			$instance['bg_pic']  	 		= esc_url_raw( $new_instance['bg_pic'] );


			return $instance;
		}

		/**
		 * Output the settings update form.
		 *
		 * @since 1.0.0
		 *
		 * @param array $instance Current settings.
		 */
		function form( $instance ) {

			$instance = wp_parse_args( (array) $instance, array(
				'title'       		=> '',
				'text'        		=> '',
				'button_text' 		=> esc_html__( 'Learn more', 'business-era' ),
				'button_url'  		=> '',
				'button_two_text' 	=> esc_html__( 'View more', 'business-era' ),
				'button_two_url'  	=> '',
				'bg_pic'      		=> '',
			) );

			$bg_pic = '';

			if ( ! empty( $instance['bg_pic'] ) ) {

				$bg_pic = $instance['bg_pic'];

			}

			$wrap_style = '';

			if ( empty( $bg_pic ) ) {

				$wrap_style = ' style="display:none;" ';
			}

			$image_status = false;

			if ( ! empty( $bg_pic ) ) {
				$image_status = true;
			}

			$delete_button = 'display:none;';

			if ( true === $image_status ) {
				$delete_button = 'display:inline-block;';
			}

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php esc_html_e( 'Title:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><strong><?php esc_html_e( 'Text:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['text'] ); ?>" />
			</p>
			<hr>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><strong><?php esc_html_e( 'Button One Text:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>"><strong><?php esc_html_e( 'Button One URL:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_url'] ); ?>" />
			</p>
			<hr>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_two_text' ) ); ?>"><strong><?php esc_html_e( 'Button Two Text:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_two_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_two_text' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['button_two_text'] ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_two_url' ) ); ?>"><strong><?php esc_html_e( 'Button Two URL:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_two_url' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_two_url' ) ); ?>" type="text" value="<?php echo esc_url( $instance['button_two_url'] ); ?>" />
			</p>
			<hr>
			<div class="cover-image">
				<label for="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>">
					<strong><?php esc_html_e( 'Background Image:', 'business-era' ); ?></strong>
				</label>
				<input type="text" class="img widefat" name="<?php echo esc_attr( $this->get_field_name( 'bg_pic' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bg_pic' ) ); ?>" value="<?php echo esc_url( $instance['bg_pic'] ); ?>" />
				<div class="rtam-preview-wrap" <?php echo $wrap_style; ?>>
					<img src="<?php echo esc_url( $bg_pic ); ?>" alt="<?php _e( 'Preview', 'business-era' ); ?>" />
				</div><!-- .rtam-preview-wrap -->
				<input type="button" class="select-img button button-primary" value="<?php _e( 'Upload', 'business-era' ); ?>" data-uploader_title="<?php _e( 'Select Background Image', 'business-era' ); ?>" data-uploader_button_text="<?php _e( 'Choose Image', 'business-era' ); ?>" />
				<input type="button" value="<?php echo _x( 'X', 'Remove Button', 'business-era' ); ?>" class="button button-secondary btn-image-remove" style="<?php echo esc_attr( $delete_button ); ?>" />
			</div>
			<hr>
		<?php
		}
	}

endif;

if ( ! class_exists( 'Business_Era_Services_Widget' ) ) :

	/**
	 * Service widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_Services_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'business_era_widget_services',
					'description' => __( 'Display services.', 'business-era' ),
			);
			parent::__construct( 'business-era-services', __( 'Business Era: Services', 'business-era' ), $opts );
		}

		function widget( $args, $instance ) {

			$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$excerpt_length	= !empty( $instance['excerpt_length'] ) ? $instance['excerpt_length'] : 20;

			$detail_link 	= ! empty( $instance['detail_link'] ) ? $instance['detail_link'] : 0;

			$services_ids 	= array();
			$item_number = 6;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				if ( ! empty( $instance["item_id_$i"] ) && absint( $instance["item_id_$i"] ) > 0 ) {
					$id = absint( $instance["item_id_$i"] );
					$services_ids[ $id ]['id']   = $id;
					$services_ids[ $id ]['icon'] = $instance["item_icon_$i"];
				}
			}

			echo $args['before_widget'];

			echo '<div class="container">';

			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if ( ! empty( $services_ids ) ) {
				$query_args = array(
					'posts_per_page' => count( $services_ids ),
					'post__in'       => wp_list_pluck( $services_ids, 'id' ),
					'orderby'        => 'post__in',
					'post_type'      => 'page',
					'no_found_rows'  => true,
				);
				$all_services = get_posts( $query_args ); ?>

				<?php if ( ! empty( $all_services ) ) : ?>
					<?php global $post; ?>
					<div class="services-list services-column-3">
						<div class="inner-wrapper">

							<?php foreach ( $all_services as $post ) : ?>
								<?php setup_postdata( $post ); ?>
								<div class="services-item">
									<?php 
									if( 1 == $detail_link ){ ?>
										<i class="fa <?php echo esc_attr( $services_ids[ $post->ID ]['icon'] ); ?>"></i>
										<?php 
									} else{ ?>
										<a href="<?php the_permalink(); ?>"><i class="fa <?php echo esc_attr( $services_ids[ $post->ID ]['icon'] ); ?>"></i></a>
										<?php
									} ?>
									<h3 class="services-item-title">
										<?php
										if( 1 == $detail_link ){
											the_title();
										}else { ?>
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										<?php } ?>
									</h3>
									<?php $content = business_era_get_the_excerpt( absint( $excerpt_length ), $post );
									
									echo wp_kses_post($content) ? wpautop( wp_kses_post($content) ) : '';
									?>
								</div><!-- .services-item -->
							<?php endforeach; ?>

						</div><!-- .inner-wrapper -->
					</div><!-- .services-list -->

					<?php wp_reset_postdata(); ?>

				<?php endif;
			}

			echo '</div>';

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['excerpt_length'] = absint( $new_instance['excerpt_length'] );

			$instance['detail_link']    = (bool) $new_instance['detail_link'] ? 1 : 0;

			$item_number = 8;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$instance["item_id_$i"]   = absint( $new_instance["item_id_$i"] );
				$instance["item_icon_$i"] = sanitize_text_field( $new_instance["item_icon_$i"] );
			}

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'title' 			=> '',
				'excerpt_length'	=> 20,
				'detail_link'   	=> 0,
			);

			$item_number = 8;

			for ( $i = 1; $i <= $item_number; $i++ ) {
				$defaults["item_id_$i"]   = '';
				$defaults["item_icon_$i"] = 'fa-cog';
			}

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php _e( 'Title:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>">
					<?php esc_html_e('Excerpt Length:', 'business-era'); ?>
				</label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('excerpt_length') ); ?>" name="<?php echo esc_attr( $this->get_field_name('excerpt_length') ); ?>" type="number" value="<?php echo absint( $instance['excerpt_length'] ); ?>" />
			</p>

			<p>
			    <input class="checkbox" type="checkbox" <?php checked( $instance['detail_link'] ); ?> id="<?php echo $this->get_field_id( 'detail_link' ); ?>" name="<?php echo $this->get_field_name( 'detail_link' ); ?>" />
			    <label for="<?php echo $this->get_field_id( 'detail_link' ); ?>"><?php esc_html_e( 'Disable link to detail page', 'business-era' ); ?></label>
			</p>

			<?php
				for ( $i = 1; $i <= $item_number; $i++ ) {
					?>
					<p>
						<label for="<?php echo $this->get_field_id( "item_id_$i" ); ?>"><strong><?php _e( 'Page:', 'business-era' ); ?>&nbsp;<?php echo $i; ?></strong></label>
						<?php
						wp_dropdown_pages( array(
							'id'               => $this->get_field_id( "item_id_$i" ),
							'class'            => 'widefat',
							'name'             => $this->get_field_name( "item_id_$i" ),
							'selected'         => $instance["item_id_$i"],
							'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-era' ),
							)
						);
						?>
					</p>
					<p>
						<label for="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>"><strong><?php _e( 'Icon:', 'business-era' ); ?>&nbsp;<?php echo $i; ?></strong></label>
						<input  id="<?php echo esc_attr( $this->get_field_id( "item_icon_$i" ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( "item_icon_$i" ) ); ?>" type="text" value="<?php echo esc_attr( $instance["item_icon_$i"] ); ?>" />
					</p>
					<?php
				}
		}
	}

endif;

if ( ! class_exists( 'Business_Era_Page_Widget' ) ) :

	/**
	 * Page widget class.
	 *
	 * @since 1.0.0
	 */
	class Business_Era_Page_Widget extends WP_Widget {

		function __construct() {
			$opts = array(
					'classname'   => 'business_era_widget_page',
					'description' => __( 'Display page and its featured image.', 'business-era' ),
			);
			parent::__construct( 'business-era-page', __( 'Business Era: Page', 'business-era' ), $opts );
		}

		function widget( $args, $instance ) {

			$title 			= apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$page_id  		= ! empty( $instance['page_id'] ) ? absint( $instance['page_id'] ) : '';

			$img_position 	= ! empty( $instance['img_position'] ) ? sanitize_text_field( $instance['img_position'] ) : '';

			echo $args['before_widget'];

			echo '<div class="container">';

			if ( $title ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}

			if ( ! empty( $page_id ) ) {

				$page_args = array(
								'posts_per_page' => 1,
								'post_type'      => 'page',
								'page_id'	     => absint( $page_id ),
								'post_status'  	 => 'publish',
							);

				$page_query = new WP_Query( $page_args );	

				if( $page_query->have_posts()){

					while( $page_query->have_posts()){

						$page_query->the_post(); 

						$img_pos = '';
						$page_pos_one = '';
						$page_pos_two = '';

						if( 'Left' === $img_position ){

							$img_pos 		= 'img-in-left';
							$page_pos_one 	= 'right';
							$page_pos_two 	= 'left';

						} elseif( 'Right' === $img_position ){

							$img_pos 		= 'img-in-right';
							$page_pos_one 	= 'left';
							$page_pos_two 	= 'right';

						}

						?>

						<div class="info-part page-<?php echo esc_attr( $page_pos_one ); ?>-section">
							<?php the_content(); ?>
						</div>
						<?php if ( has_post_thumbnail() ) {  ?>
						<div class="image-part page-<?php echo esc_attr( $page_pos_two ); ?>-section <?php echo esc_attr( $img_pos ); ?>">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php } ?>

						<?php

					}

					wp_reset_postdata();

				}

			}

			echo '</div>';

			echo $args['after_widget'];

		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

			$instance['title'] 			= sanitize_text_field( $new_instance['title'] );

			$instance['page_id']  		= absint( $new_instance['page_id'] );

			$instance['img_position']	= sanitize_text_field( $new_instance['img_position'] );

			return $instance;
		}

		function form( $instance ) {

			// Defaults.
			$defaults = array(
				'title' 		=> '',
				'page_id' 		=> '',
				'img_position' 	=> 'Left',
			);

			$instance = wp_parse_args( (array) $instance, $defaults );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php _e( 'Title:', 'business-era' ); ?></strong></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( "page_id" ); ?>"><strong><?php _e( 'Page:', 'business-era' ); ?></strong></label>
				<?php
				wp_dropdown_pages( array(
					'id'               => $this->get_field_id( "page_id" ),
					'class'            => 'widefat',
					'name'             => $this->get_field_name( "page_id" ),
					'selected'         => $instance["page_id"],
					'show_option_none' => esc_html__( '&mdash; Select &mdash;', 'business-era' ),
					)
				);
				?>
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'img_position' ) ); ?>"><strong><?php _e( 'Featured Image Position:', 'business-era' ); ?></strong></label>
				<select class="widefat" id="<?php echo $this->get_field_id('img_position'); ?>" name="<?php echo $this->get_field_name('img_position'); ?>">
					<option value="0">&mdash;<?php _e( 'Select', 'business-era' ); ?>&mdash;</option>
					<?php
						$pos = array( 
								'Left' 		=> __('Left', 'business-era'),
								'Right' 	=> __('Right', 'business-era')
							);
						foreach ( $pos as $key => $value ) {
							echo '<option value="' . $key . '"'
								. selected( $instance['img_position'], $key, false )
								. '>'. esc_html( $value ) . '</option>';
						}
					?>
				</select>
			</p>
			<?php
		}
	}

endif;
