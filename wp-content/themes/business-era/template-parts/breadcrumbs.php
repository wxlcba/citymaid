<?php
/**
 * Breadcrumbs.
 *
 * @package Business_Era
 */

// Bail if front page.
if ( is_front_page() || is_home() ) {
	return;
}

$breadcrumb_type = business_era_get_option( 'breadcrumb_type' );
if ( 'disable' === $breadcrumb_type ) {
	return;
}

if ( ! function_exists( 'breadcrumb_trail' ) ) {
	require_once trailingslashit( get_template_directory() ) . 'vendor/breadcrumbs/breadcrumbs.php';
}
?>

<div id="breadcrumb">
	<div class="container">
		<?php
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );
		?>
	</div><!-- .container -->
</div><!-- #breadcrumb -->
