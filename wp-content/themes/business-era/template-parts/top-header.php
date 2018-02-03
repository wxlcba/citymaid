<?php
/**
 * Helper functions.
 *
 * @package Business_Era
 */

// Top header status.
$header_status = business_era_get_option( 'show_top_header' );
if ( 1 != $header_status ) {
	return;
}

// Header Options.
$address    	= business_era_get_option( 'address' );
$telephone      = business_era_get_option( 'telephone' );
$email      	= business_era_get_option( 'email' );
$opening_hours	= business_era_get_option( 'opening_hours' );
$show_social 	= business_era_get_option( 'show_social_link' );

if( !empty( $address ) || !empty( $telephone ) || !empty( $email ) || !empty( $opening_hours ) || !empty( $show_social ) ){ ?>

	<div class="top-header">
		<div class="container">

			<div class="top-header-wrap">	
				
				<?php 

					if( !empty( $address ) ){ ?>

					    <span class="address">
					    	<i class="fa fa-map-marker"></i> <?php echo esc_attr( $address ); ?>
					    </span>
						<?php 
					} 

					if( !empty( $telephone ) ){ ?>

					    <span class="telephone">
					    	<i class="fa fa-phone"></i> <?php echo esc_attr( $telephone ); ?>
					    </span>
						<?php 
					}

					if( !empty( $email ) ){ ?>

					    <span class="email">
					    	<i class="fa fa-envelope-o"></i> <a href="mailto: <?php echo esc_attr( $email ); ?>"><?php echo esc_attr( $email ); ?></a>
					    </span>
						<?php 
					} 

					if( !empty( $opening_hours ) ){ ?>

					    <span class="opening-hours">
					    	<i class="fa fa-clock-o"></i> <?php echo esc_attr( $opening_hours ); ?>
					    </span>
						<?php 
					} 

					if( 1 == $show_social && has_nav_menu( 'social' ) ){ ?>

						<div class="top-social-menu menu-social-menu-container"> 

							<?php the_widget( 'Business_Era_Social_Widget' ); ?>

						</div>

						<?php
					}

				?>
			</div><!-- .top-header-wrap -->

		</div>
	</div><!-- .top-header -->
	<?php 
}