<?php
/**
 * Options.
 *
 * @package Business_Era
 */

$default = business_era_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => __( 'Theme Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
		'title'      => __( 'Header Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'show_title',
	array(
		'default'           => $default['show_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_title',
	array(
		'label'    => __( 'Show Site Title', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting show_tagline.
$wp_customize->add_setting( 'show_tagline',
	array(
		'default'           => $default['show_tagline'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_tagline',
	array(
		'label'    => __( 'Show Tagline', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Show top bar in header
$wp_customize->add_setting( 'show_top_header', 
	array(
		'default'           => $default['show_top_header'],			
		'sanitize_callback' => 'business_era_sanitize_checkbox'
	)
);

$wp_customize->add_control( 'show_top_header',
	array(
		'label'    => __( 'Show Top Header', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting Address.
$wp_customize->add_setting( 'address',
	array(
		'default'           => $default['address'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'address',
	array(
		'label'    => __( 'Address', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting telephone.
$wp_customize->add_setting( 'telephone',
	array(
		'default'           => $default['telephone'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'telephone',
	array(
		'label'    => __( 'Telephone', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting email.
$wp_customize->add_setting( 'email',
	array(
		'default'           => $default['email'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'email',
	array(
		'label'    => __( 'Email', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting opening hours.
$wp_customize->add_setting( 'opening_hours',
	array(
		'default'           => $default['opening_hours'],
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'opening_hours',
	array(
		'label'    => __( 'Opening Hours', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Show social links in top header
$wp_customize->add_setting( 'show_social_link', 
	array(
		'default'           => $default['show_social_link'],			
		'sanitize_callback' => 'business_era_sanitize_checkbox'
	)
);

$wp_customize->add_control( 'show_social_link',
	array(
		'label'    => __( 'Show Social Links', 'business-era' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Home Page Section.
$wp_customize->add_section( 'section_home',
	array(
		'title'      => __( 'Home Page Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting show_home_content.
$wp_customize->add_setting( 'show_home_content',
	array(
		'default'           => $default['show_home_content'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_home_content',
	array(
		'label'    => __( 'Show Home Content', 'business-era' ),
		'section'  => 'section_home',
		'type'     => 'checkbox',
		'description'     => __( 'Uncheck it if you wish to hide page content in home page.', 'business-era' ),
		'priority' => 100,
	)
);

// Slider Section.
$wp_customize->add_section( 'section_slider',
	array(
		'title'      => __( 'Slider Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting slider_status.
$wp_customize->add_setting( 'slider_status',
	array(
		'default'           => $default['slider_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'slider_status',
	array(
		'label'       => __( 'Slider Status', 'business-era' ),
		'section'     => 'section_slider',
		'type'        => 'radio',
		'priority'    => 100,
		'choices'     => array(
			'disable' => esc_html__( 'Disable', 'business-era' ),
			'home'    => esc_html__( 'Static Front Page', 'business-era' ),
		),
	)
);

$slider_number = 5;
for ( $i = 1; $i <= $slider_number; $i++ ) {
	$wp_customize->add_setting( "slider_page_$i",
		array(
			'sanitize_callback' => 'business_era_sanitize_dropdown_pages',
		)
	);
	$wp_customize->add_control( "slider_page_$i",
		array(
			'label'           => __( 'Page', 'business-era' ) . ' - ' . $i,
			'section'         => 'section_slider',
			'type'            => 'dropdown-pages',
			'priority'        => 100,
			'active_callback' => 'business_era_is_featured_slider_active',
		)
	);
}

// Setting slider_transition_effect.
$wp_customize->add_setting( 'slider_transition_effect',
	array(
		'default'           => $default['slider_transition_effect'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'slider_transition_effect',
	array(
		'label'           => __( 'Transition Effect', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'select',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
		'choices'         => array(
			'fade'       => esc_html__( 'fade', 'business-era' ),
			'fadeout'    => esc_html__( 'fadeout', 'business-era' ),
			'none'       => esc_html__( 'none', 'business-era' ),
			'scrollHorz' => esc_html__( 'scrollHorz', 'business-era' ),
		),
	)
);

// Setting slider_transition_delay.
$wp_customize->add_setting( 'slider_transition_delay',
	array(
		'default'           => $default['slider_transition_delay'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'slider_transition_delay',
	array(
		'label'           => __( 'Transition Delay', 'business-era' ),
		'description'     => __( 'in seconds', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'number',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
		'input_attrs'     => array( 'min' => 1, 'max' => 5, 'step' => 1, 'style' => 'width: 60px;' ),
	)
);

// Setting slider_caption_status.
$wp_customize->add_setting( 'slider_caption_status',
	array(
		'default'           => $default['slider_caption_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'slider_caption_status',
	array(
		'label'           => __( 'Show Caption', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
	)
);

// Setting slider_arrow_status.
$wp_customize->add_setting( 'slider_arrow_status',
	array(
		'default'           => $default['slider_arrow_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'slider_arrow_status',
	array(
		'label'           => __( 'Show Arrow', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
	)
);

// Setting slider_pager_status.
$wp_customize->add_setting( 'slider_pager_status',
	array(
		'default'           => $default['slider_pager_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'slider_pager_status',
	array(
		'label'           => __( 'Show Pager', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
	)
);

// Setting slider_autoplay_status.
$wp_customize->add_setting( 'slider_autoplay_status',
	array(
		'default'           => $default['slider_autoplay_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'slider_autoplay_status',
	array(
		'label'           => __( 'Enable Autoplay', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
	)
);

// Setting slider detail page.
$wp_customize->add_setting( 'slider_enable_link',
	array(
		'default'           => $default['slider_enable_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'slider_enable_link',
	array(
		'label'           => __( 'Enable Link to Detail Page', 'business-era' ),
		'section'         => 'section_slider',
		'type'            => 'checkbox',
		'priority'        => 100,
		'active_callback' => 'business_era_is_featured_slider_active',
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
		'title'      => __( 'Footer Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
		'default'           => $default['copyright_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
		'label'    => __( 'Copyright Text', 'business-era' ),
		'section'  => 'section_footer',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
		'title'      => __( 'Blog Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'global_layout',
	array(
		'default'           => $default['global_layout'],
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'global_layout',
	array(
		'label'    => __( 'Global Layout', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'business-era' ),
				'right-sidebar' => esc_html__( 'Right Sidebar', 'business-era' ),
				'no-sidebar'    => esc_html__( 'No Sidebar', 'business-era' ),
			),
	)
);

// Setting archive_layout.
$wp_customize->add_setting( 'archive_layout',
	array(
		'default'           => $default['archive_layout'],
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'archive_layout',
	array(
		'label'    => __( 'Archive Layout', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'radio',
		'priority' => 100,
		'choices'  => array(
				'full'    => esc_html__( 'Full Post', 'business-era' ),
				'excerpt' => esc_html__( 'Post Excerpt', 'business-era' ),
			),
	)
);

// Setting archive_prefix.
$wp_customize->add_setting( 'archive_prefix',
	array(
		'default'           => $default['archive_prefix'],
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'archive_prefix',
	array(
		'label'    => __( 'Hide Prefix in archive page', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'excerpt_length',
	array(
		'default'           => $default['excerpt_length'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'excerpt_length',
	array(
		'label'       => __( 'Excerpt Length', 'business-era' ),
		'description' => __( 'in words', 'business-era' ),
		'section'     => 'section_blog',
		'type'        => 'number',
		'priority'    => 100,
		'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting read_more_text.
$wp_customize->add_setting( 'read_more_text',
	array(
		'default'           => $default['read_more_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'read_more_text',
	array(
		'label'    => __( 'Read More Text', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'text',
		'priority' => 100,
	)
);

// Setting blog_featured_image.
$wp_customize->add_setting( 'blog_featured_image',
	array(
		'default'           => $default['blog_featured_image'],
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'blog_featured_image',
	array(
		'label'    => __( 'Show featured image in blog detail page', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting page_featured_image.
$wp_customize->add_setting( 'page_featured_image',
	array(
		'default'           => $default['page_featured_image'],
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'page_featured_image',
	array(
		'label'    => __( 'Show featured image in page detail', 'business-era' ),
		'section'  => 'section_blog',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
		'title'      => __( 'Breadcrumb Options', 'business-era' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'breadcrumb_type',
	array(
		'default'           => $default['breadcrumb_type'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'business_era_sanitize_select',
	)
);
$wp_customize->add_control( 'breadcrumb_type',
	array(
		'label'       => __( 'Breadcrumb Type', 'business-era' ),
		'section'     => 'section_breadcrumb',
		'type'        => 'radio',
		'priority'    => 100,
		'choices'     => array(
			'disable' => esc_html__( 'Disable', 'business-era' ),
			'simple'  => esc_html__( 'Simple', 'business-era' ),
		),
	)
);

//Color Setting Starts
// Add Color Options Panel.
$wp_customize->add_panel( 'color_option_panel',
	array(
		'title'      => __( 'Advance Color Options', 'business-era' ),
		'priority'   => 90,
	)
);

// Primary Color Section.
$wp_customize->add_section( 'section_primary_color',
	array(
		'title'      => __( 'General Colors', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//For site primary color options
$wp_customize->add_setting('primary_color', array(
	'default' 			=> $default['primary_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'       => __( 'Primary Color', 'business-era' ),
			'description' => __( 'Applied to default color of site. It will be used as base color of the site', 'business-era' ),
			'settings'    => 'primary_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

//For site title color options
$wp_customize->add_setting('site_title_color', array(
	'default' 			=> $default['site_title_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'site_title_color',
		array(
			'label'       => __( 'Site Title Color', 'business-era' ),
			'description' => __( 'Applied to site main title', 'business-era' ),
			'settings'    => 'site_title_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

//For site tagline color options
$wp_customize->add_setting('site_tagline_color', array(
	'default' 			=> $default['site_tagline_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'site_tagline_color',
		array(
			'label'       => __( 'Site Tagline Color', 'business-era' ),
			'description' => __( 'Applied to site tagline', 'business-era' ),
			'settings'    => 'site_tagline_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

//For menu color options
$wp_customize->add_setting('menu_color', array(
	'default' 			=> $default['menu_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_color',
		array(
			'label'       => __( 'Menu Color', 'business-era' ),
			'description' => __( 'Applied to menu and submenu', 'business-era' ),
			'settings'    => 'menu_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

//For menu hover color options
$wp_customize->add_setting('menu_hover_color', array(
	'default' 			=> $default['menu_hover_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_hover_color',
		array(
			'label'       => __( 'Menu Hover Color', 'business-era' ),
			'description' => __( 'Applied to menu and submenu when mouse hover and active menu item', 'business-era' ),
			'settings'    => 'menu_hover_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

//For menu border color options
$wp_customize->add_setting('menu_border_color', array(
	'default' 			=> $default['menu_border_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'menu_border_color',
		array(
			'label'       => __( 'Menu Border Color', 'business-era' ),
			'description' => __( 'Applied to border of menu and submenu.', 'business-era' ),
			'settings'    => 'menu_border_color',
			'section'     => 'section_primary_color',	
			'priority' => 101,			   
		)
	)
);

// Top Header Color Section.
$wp_customize->add_section( 'section_top_header_color',
	array(
		'title'      => __( 'Top Header Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//For top header background color options
$wp_customize->add_setting('top_header_bg', array(
	'default' 			=> $default['top_header_bg'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_header_bg',
		array(
			'label'       => __( 'Top Header Background', 'business-era' ),
			'description' => __( 'Applied to background color of top header.', 'business-era' ),
			'settings'    => 'top_header_bg',
			'section'     => 'section_top_header_color',	
			'priority' => 100,			   
		)
	)
);

//For top header text color options
$wp_customize->add_setting('top_header_color', array(
	'default' 			=> $default['top_header_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_header_color',
		array(
			'label'       => __( 'Top Header Color', 'business-era' ),
			'description' => __( 'Applied to text and icon color of top header.', 'business-era' ),
			'settings'    => 'top_header_color',
			'section'     => 'section_top_header_color',	
			'priority' => 100,			   
		)
	)
);

//For top header border color options
$wp_customize->add_setting('top_header_border', array(
	'default' 			=> $default['top_header_border'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_header_border',
		array(
			'label'       => __( 'Top Header Border', 'business-era' ),
			'description' => __( 'Applied to border color of top header.', 'business-era' ),
			'settings'    => 'top_header_border',
			'section'     => 'section_top_header_color',	
			'priority' => 100,			   
		)
	)
);

// Breadcrumb Color Section.
$wp_customize->add_section( 'section_breadcrumb_color',
	array(
		'title'      => __( 'Breadcrumb Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//Breadcrumb background color options
$wp_customize->add_setting('breadcrumb_bg_color', array(
	'default' 			=> $default['breadcrumb_bg_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'breadcrumb_bg_color',
		array(
			'label'       => __( 'Breadcrumb Background Color', 'business-era' ),
			'description' => __( 'Applied to background of breadcrumb.', 'business-era' ),
			'settings'    => 'breadcrumb_bg_color',
			'section'     => 'section_breadcrumb_color',	
			'priority' => 100,			   
		)
	)
);

//Breadcrumb link color options
$wp_customize->add_setting('breadcrumb_link_color', array(
	'default' 			=> $default['breadcrumb_link_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'breadcrumb_link_color',
		array(
			'label'       => __( 'Breadcrumb Link Color', 'business-era' ),
			'description' => __( 'Applied to color of text with link in breadcrumb.', 'business-era' ),
			'settings'    => 'breadcrumb_link_color',
			'section'     => 'section_breadcrumb_color',	
			'priority' => 100,			   
		)
	)
);

//Breadcrumb text color options
$wp_customize->add_setting('breadcrumb_text_color', array(
	'default' 			=> $default['breadcrumb_text_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'breadcrumb_text_color',
		array(
			'label'       => __( 'Breadcrumb Text Color', 'business-era' ),
			'description' => __( 'Applied to text color of breadcrumb.', 'business-era' ),
			'settings'    => 'breadcrumb_text_color',
			'section'     => 'section_breadcrumb_color',	
			'priority' => 100,			   
		)
	)
);

// Buttons Color Section.
$wp_customize->add_section( 'section_button_color',
	array(
		'title'      => __( 'Buttons Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//Button text color options
$wp_customize->add_setting('button_text_color', array(
	'default' 			=> $default['button_text_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'button_text_color',
		array(
			'label'       => __( 'Button Text Color', 'business-era' ),
			'description' => __( 'Applied to color all  buttons.', 'business-era' ),
			'settings'    => 'button_text_color',
			'section'     => 'section_button_color',	
			'priority' => 100,			   
		)
	)
);

// Top Footer Color Section.
$wp_customize->add_section( 'section_top_footer_color',
	array(
		'title'      => __( 'Top Footer Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//For top header background color options
$wp_customize->add_setting('top_footer_bg', array(
	'default' 			=> $default['top_footer_bg'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_footer_bg',
		array(
			'label'       => __( 'Top Footer Background', 'business-era' ),
			'description' => __( 'Applied to background color of top footer.', 'business-era' ),
			'settings'    => 'top_footer_bg',
			'section'     => 'section_top_footer_color',	
			'priority' => 100,			   
		)
	)
);

//For top footer text color options
$wp_customize->add_setting('top_footer_color', array(
	'default' 			=> $default['top_footer_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_footer_color',
		array(
			'label'       => __( 'Top Footer Color', 'business-era' ),
			'description' => __( 'Applied to text color of top footer.', 'business-era' ),
			'settings'    => 'top_footer_color',
			'section'     => 'section_top_footer_color',	
			'priority' => 100,			   
		)
	)
);

//For top footer text color options
$wp_customize->add_setting('top_footer_widget', array(
	'default' 			=> $default['top_footer_widget'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'top_footer_widget',
		array(
			'label'       => __( 'Widget Title Border', 'business-era' ),
			'description' => __( 'Applied to border color of widgets title used in top footer.', 'business-era' ),
			'settings'    => 'top_footer_widget',
			'section'     => 'section_top_footer_color',	
			'priority' => 100,			   
		)
	)
);

// Bottom Footer Color Section.
$wp_customize->add_section( 'section_bottom_footer_color',
	array(
		'title'      => __( 'Bottom Footer Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

//For bottom footer background color options
$wp_customize->add_setting('bottom_footer_bg', array(
	'default' 			=> $default['bottom_footer_bg'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'bottom_footer_bg',
		array(
			'label'       => __( 'Bottom Footer Background', 'business-era' ),
			'description' => __( 'Applied to background color of bottom footer.', 'business-era' ),
			'settings'    => 'bottom_footer_bg',
			'section'     => 'section_bottom_footer_color',	
			'priority' => 100,			   
		)
	)
);

//For bottom footer text color options
$wp_customize->add_setting('bottom_footer_color', array(
	'default' 			=> $default['bottom_footer_color'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'bottom_footer_color',
		array(
			'label'       => __( 'Bottom Footer Color', 'business-era' ),
			'description' => __( 'Applied to text and icon color of bottom footer.', 'business-era' ),
			'settings'    => 'bottom_footer_color',
			'section'     => 'section_bottom_footer_color',	
			'priority' => 100,			   
		)
	)
);

//For bottom footer border color options
$wp_customize->add_setting('bottom_footer_border', array(
	'default' 			=> $default['bottom_footer_border'],
	'sanitize_callback' => 'sanitize_hex_color'
));	

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'bottom_footer_border',
		array(
			'label'       => __( 'Bottom Footer Border', 'business-era' ),
			'description' => __( 'Applied to top border color of bottom footer.', 'business-era' ),
			'settings'    => 'bottom_footer_border',
			'section'     => 'section_bottom_footer_color',	
			'priority' => 100,			   
		)
	)
);

// Reset Color Section.
$wp_customize->add_section( 'section_reset_color',
	array(
		'title'      => __( 'Reset Color', 'business-era' ),
		'priority'   => 100,
		'panel'      => 'color_option_panel',
	)
);

// reset_colors
$wp_customize->add_setting( 'reset_colors', 
	array(
		'default'           => $default['reset_colors'],	
		'transport'         => 'postMessage',		
		'sanitize_callback' => 'business_era_sanitize_checkbox',
	)
);

$wp_customize->add_control( 'reset_colors',
	array(
		'label'    => __( 'Reset Colors', 'business-era' ),
		'description' =>  __( 'This will replace all colors with default color of the theme. Please reload page to see changes.', 'business-era' ),
		'section'  => 'section_reset_color',
		'type'     => 'checkbox',
		'priority' => 101,
	)
);

//Color Setting Ends