<?php
/**
 * Helper functions.
 *
 * @package Business_Era
 */

if ( is_front_page() ) {
	return;
}

// Custom image.
$image_url = get_header_image();

if ( empty( $image_url ) ) {
	return;
} 
?>

<div class="inner-banner" style="background-image: url(<?php echo esc_url( $image_url ); ?>);">
</div><!-- .inner-banner -->