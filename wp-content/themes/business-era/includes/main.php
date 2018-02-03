<?php
/**
 * Load files.
 *
 * @package Business_Era
 */

// Load hook functions.
require_once trailingslashit( get_template_directory() ) . '/includes/hooks.php';

// Load core functions.
require_once trailingslashit( get_template_directory() ) . '/includes/core.php';

// Load helper functions.
require_once trailingslashit( get_template_directory() ) . '/includes/helpers.php';

// Implement the Custom Header feature.
require_once trailingslashit( get_template_directory() ) . '/includes/custom-header.php';

// Custom template tags for this theme.
require_once trailingslashit( get_template_directory() ) . '/includes/template-tags.php';

// Custom functions that act independently of the theme templates.
require_once trailingslashit( get_template_directory() ) . '/includes/extras.php';

// Customizer additions.
require_once trailingslashit( get_template_directory() ) . '/includes/customizer.php';

// Dynamic CSS additions.
require_once trailingslashit( get_template_directory() ) . '/includes/dynamic.php';

// Load widgets.
require_once trailingslashit( get_template_directory() ) . '/includes/widgets/widgets.php';


//TGM Plugin activation.
require_once trailingslashit( get_template_directory() ) . '/includes/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'business_era_register_required_plugins' );

function business_era_register_required_plugins() {
	
	$plugins = array(
				
		array(
			'name'      => esc_html__( 'Business Era Extension', 'business-era' ),
			'slug'      => 'business-era-extension',
			'required'  => false,
		),

	);

	tgmpa( $plugins );
}
