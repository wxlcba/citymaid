<?php
/**
 * Core functions.
 *
 * @package Business_Era
 */

if ( ! function_exists( 'business_era_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function business_era_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = business_era_get_default_theme_options();
		$default_value = null;
		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}
endif;

if ( ! function_exists( 'business_era_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function business_era_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']   = true;
		$defaults['show_tagline'] = true;

		// homepage.
		$defaults['show_home_content'] = true;

		// Layout.
		$defaults['global_layout']  = 'right-sidebar';
		$defaults['archive_layout'] = 'excerpt';
		$defaults['archive_prefix'] = false;

		// Footer.
		$defaults['copyright_text'] = esc_html__( 'Copyright &copy; All rights reserved.', 'business-era' );

		// Blog.
		$defaults['excerpt_length'] 		= 40;
		$defaults['read_more_text'] 		= esc_html__( 'Read more', 'business-era' );
		$defaults['blog_featured_image']   	= true;

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'simple';

		// Slider.
		$defaults['slider_status']            = 'disable';
		$defaults['slider_transition_effect'] = 'fadeout';
		$defaults['slider_transition_delay']  = 3;
		$defaults['slider_caption_status']    = true;
		$defaults['slider_arrow_status']      = true;
		$defaults['slider_pager_status']      = true;
		$defaults['slider_autoplay_status']   = true;
		$defaults['slider_enable_link']       = true;
		$defaults['page_featured_image']   	  = false;
		

		$defaults['show_top_header']   		  = true;
		$defaults['show_social_link']         = '';
		$defaults['address']   				  = '';
		$defaults['telephone']   		      = '';
		$defaults['email']   				  = '';
		$defaults['opening_hours']   		  = '';

		$defaults['primary_color']   			= '#009a82';
        $defaults['site_title_color']           = '#222222';
        $defaults['site_tagline_color']         = '#666666';

        $defaults['menu_color']                 = '#222222';
        $defaults['menu_hover_color']           = '#222222';
        $defaults['menu_border_color']          = '';

        $defaults['button_text_color']          = '#fff';
        $defaults['breadcrumb_bg_color']        = '#222222';
        $defaults['breadcrumb_link_color']      = '#ddd';
        $defaults['breadcrumb_text_color']      = '#fff';

		$defaults['top_header_bg']   	    	= '#ffffff';
		$defaults['top_header_color']   	    = '#686868';
		$defaults['top_header_border']   	    = '#dddddd';

		$defaults['top_footer_bg']   	    	= '#2c2c2c';
		$defaults['top_footer_color']   	    = '#dddddd';
        $defaults['top_footer_widget']          = '#3c3c3c';
        
		$defaults['bottom_footer_bg']   	    = '#333333';
		$defaults['bottom_footer_color']   	    = '#ffffff';
		$defaults['bottom_footer_border']   	= '#5e5b5b';

        $defaults['reset_colors']               = false;

		return $defaults;
	}
endif;

if ( ! function_exists( 'business_era_get_default_color_options' ) ) :

    /**
     * Get default color options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
    function business_era_get_default_color_options() {

        $defaults = array();

        $defaults['primary_color']              = '#009a82';
        $defaults['site_title_color']           = '#222222';
        $defaults['site_tagline_color']         = '#666666';

        $defaults['button_text_color']          = '#fff';
        $defaults['breadcrumb_bg_color']        = '#222222';
        $defaults['breadcrumb_link_color']      = '#ddd';
        $defaults['breadcrumb_text_color']      = '#fff';

        $defaults['menu_color']                 = '#222222';
        $defaults['menu_hover_color']           = '#222222';
        $defaults['menu_border_color']          = '';

        $defaults['top_header_bg']              = '#ffffff';
        $defaults['top_header_color']           = '#686868';
        $defaults['top_header_border']          = '#dddddd';

        $defaults['top_footer_bg']              = '#2c2c2c';
        $defaults['top_footer_color']           = '#dddddd';
        $defaults['top_footer_widget']          = '#3c3c3c';
        
        $defaults['bottom_footer_bg']           = '#333333';
        $defaults['bottom_footer_color']        = '#ffffff';
        $defaults['bottom_footer_border']       = '#5e5b5b';

        return $defaults;
    }

endif;

//=============================================================
// Color reset
//=============================================================
if ( ! function_exists( 'business_era_reset_colors' ) ) :

	function business_era_reset_colors( $data ) {

			$reset_colors = business_era_get_option( 'reset_colors' );

			if ( true == $reset_colors ) {

				$options = business_era_get_default_theme_options();

				$options['reset_colors'] = false;

				$color_settings = business_era_get_default_color_options();

				if ( ! empty( $color_settings ) ) {

					foreach ( $color_settings as $key => $val ) {

						$options[ $key ] = $val;

					}
				}

				update_option( 'theme_mods_business-era', $options );

			}

	}

endif;

 add_action( 'customize_save_after', 'business_era_reset_colors' );