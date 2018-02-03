<?php
/**
 * Home widgets
 *
 * @package Business_Era
 */

// Bail if not home page.
if ( ! is_front_page() || 'posts' === get_option( 'show_on_front' ) ) {
	return;
}
?>

<div id="home-page-widget-area" class="widget-area">
	<div class="container-wrapper">
		<?php 
		if ( is_active_sidebar( 'home-page-widget-area' ) ) : 

			dynamic_sidebar( 'home-page-widget-area' ); 

		endif; 
		?>
	</div><!-- .container -->
</div><!-- #home-page-widget-area -->

