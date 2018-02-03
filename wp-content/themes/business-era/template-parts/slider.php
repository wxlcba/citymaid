<?php
/**
 * Helper functions.
 *
 * @package Business_Era
 */

// Bail if no slider.
$slider_details = business_era_get_slider_details();
if ( empty( $slider_details ) ) {
	return;
}

// Slider status.
$slider_status = business_era_get_option( 'slider_status' );
if ( 'disable' === $slider_status ) {
	return;
}
if ( ! ( is_front_page() && ! is_home() ) ) {
    return;
}

// Slider settings.
$slider_transition_effect = business_era_get_option( 'slider_transition_effect' );
$slider_transition_delay  = business_era_get_option( 'slider_transition_delay' );
$slider_caption_status    = business_era_get_option( 'slider_caption_status' );
$slider_arrow_status      = business_era_get_option( 'slider_arrow_status' );
$slider_pager_status      = business_era_get_option( 'slider_pager_status' );
$slider_autoplay_status   = business_era_get_option( 'slider_autoplay_status' );
$slider_enable_link       = business_era_get_option( 'slider_enable_link' );

if ( true === $slider_autoplay_status ) {
	$timeout = 1000 * absint( $slider_transition_delay ); // Change seconds to miliseconds.
}
else {
	$timeout = 0;
}

if( true === $slider_enable_link ){

	$cycle_caption = '<h3><a href="{{url}}">{{title}}</a></h3><p>{{excerpt}}</p>';

} else{

	$cycle_caption = '<h3>{{title}}</h3><p>{{excerpt}}</p>';
}
?>
<div id="featured-slider">

	<div class="cycle-slideshow" id="main-slider" data-cycle-fx="<?php echo esc_attr( $slider_transition_effect ); ?>" data-cycle-speed="1000" data-cycle-pause-on-hover="true" data-cycle-loader="true" data-cycle-log="false" data-cycle-swipe="true" data-cycle-auto-height="container" data-cycle-timeout="<?php echo esc_attr( $timeout ); ?>" data-cycle-slides="article" data-cycle-caption-template='<?php echo $cycle_caption; ?>' data-cycle-pager-template='<span class="pager-box"></span>'>

		<?php if ( true === $slider_arrow_status ) : ?>
			<div class="cycle-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			<div class="cycle-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<?php endif; ?>
		<?php if ( true === $slider_caption_status ) : ?>
			<div class="cycle-caption"></div>
		<?php endif; ?>

		<?php $count = 1; ?>
		<?php foreach ( $slider_details as $slide ) : ?>
			<?php $extra_class = ( 1 === $count ) ? 'first' : ''; ?>
			<article class="<?php echo esc_attr( $extra_class ); ?>" data-cycle-title="<?php echo esc_attr( $slide['title'] ); ?>" data-cycle-url="<?php echo esc_url( $slide['url'] ); ?>" data-cycle-excerpt="<?php echo esc_attr( $slide['excerpt'] ); ?>">

				<?php 
				if( true === $slider_enable_link ){ ?>

					<a href="<?php echo esc_url( $slide['url'] ); ?>">
						<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" />
					</a>
					<?php 
				} else{ ?>

					<img src="<?php echo esc_url( $slide['image_url'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ); ?>" />
					
					<?php
				} ?>	

			</article>

		<?php $count++; ?>

		<?php endforeach; ?>

		<?php if ( true === $slider_pager_status ) : ?>
			<div class="cycle-pager"></div>
		<?php endif; ?>

	</div> <!-- #main-slider -->

</div><!-- #featured-slider -->
