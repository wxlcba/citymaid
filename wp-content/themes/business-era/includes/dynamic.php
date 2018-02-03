<?php
/**
 * Dynamic Options hook.
 *
 * This file contains option values from customizer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Era_Pro
 */

if ( ! function_exists( 'business_era_dynamic_options' ) ) :

    function business_era_dynamic_options(){

    $primary_color          =  business_era_get_option( 'primary_color' );
    $title_color            =  business_era_get_option( 'site_title_color' );
    $tagline_color          =  business_era_get_option( 'site_tagline_color' );

    $button_text_color      =  business_era_get_option( 'button_text_color' );

    $menu_color             =  business_era_get_option( 'menu_color' );
    $menu_hover_color       =  business_era_get_option( 'menu_hover_color' );
    $menu_border_color      =  business_era_get_option( 'menu_border_color' );

    $breadcrumb_bg_color    =  business_era_get_option( 'breadcrumb_bg_color' );
    $breadcrumb_link_color  =  business_era_get_option( 'breadcrumb_link_color' );
    $breadcrumb_text_color  =  business_era_get_option( 'breadcrumb_text_color' );

    $top_header_bg          =  business_era_get_option( 'top_header_bg' );
    $top_header_color       =  business_era_get_option( 'top_header_color' );
    $top_header_border      =  business_era_get_option( 'top_header_border' );

    $top_footer_bg          =  business_era_get_option( 'top_footer_bg' );
    $top_footer_color       =  business_era_get_option( 'top_footer_color' );
    $top_footer_widget      =  business_era_get_option( 'top_footer_widget' );

    $bottom_footer_bg          =  business_era_get_option( 'bottom_footer_bg' );
    $bottom_footer_color       =  business_era_get_option( 'bottom_footer_color' );
    $bottom_footer_border      =  business_era_get_option( 'bottom_footer_border' );
   

?>               
    <style>
        
        /*for primary color change*/
        button,
        .comment-reply-link,
         a.button, input[type="button"],
         input[type="reset"],
         input[type="submit"],
         .search-box > a,
         .widget_calendar caption,
         .business_era_widget_services .services-item i {
            background: <?php echo esc_attr( $primary_color ); ?>;
        }


        button:hover,
        .comment-reply-link,
        a.button:hover,
        input[type="button"]:hover,
        input[type="reset"]:hover,
        input[type="submit"]:hover,
        .search-box > a:hover,
        .business_era_widget_social ul li a:hover,
        .top-header .menu-social-menu-container  ul li a:hover,
        #main-slider .pager-box.cycle-pager-active,
        #main-slider .cycle-prev,
        #main-slider .cycle-next,
        #footer-widgets h3.widget-title::after,
        .scrollup:hover,
        .business_era_widget_testimonials #testimonial-slider .cycle-pager .pager-box.cycle-pager-active,
        #mobile-trigger i,
        .scrollup,
        .business-era-twitter-rotator #twitter-slider .cycle-pager .pager-box.cycle-pager-active,
        #sidebar-primary .business-era-twitter-rotator #twitter-slider .cycle-pager .pager-box.cycle-pager-active {
            background-color: <?php echo esc_attr( $primary_color ); ?>;
        }

        a, a:visited, a:hover, a:focus, a:active,
        .widget-area ul li::before,
        .services-item-title > a,
        a.button:hover,
        input[type="submit"]:hover,
        .business_era_widget_latest_news .latest-news-title > a,
        a.read-more:hover,
        .business_era_widget_latest_news .latest-news-title,
        .business_era_widget_our_team  .our-team-item,
        .business_era_widget_our_team  .our-team-title > a,
        .business_era_widget_portfolio .portfolio-title,
        .business_era_widget_portfolio #filter-list li.active,
        .entry-meta > span::before, 
        .entry-footer > span::before, 
        .single-post-meta > span::before,
        #sidebar-primary .business-era-twitter-rotator.with_bg #twitter-slider article .tweet-caption p a,
        #sidebar-primary .business-era-twitter-rotator.with_bg #twitter-slider article .tweet-meta .time a,
        #sidebar-primary .business-era-twitter-rotator #twitter-slider article .tweet-item-wrap figure i,
        .business-era-twitter-feeds .tweet-item a,
        #footer-widgets .business-era-twitter-rotator.with_bg #twitter-slider article .tweet-caption p a,
        #footer-widgets .business-era-twitter-rotator.with_bg #twitter-slider article .tweet-meta .time a,
        #footer-widgets .business-era-twitter-rotator #twitter-slider article .tweet-item-wrap figure i,
        #footer-widgets .business-era-twitter-feeds .tweet-item a,
        #sidebar-primary .business-era-twitter-feeds .tweet-item .tweet_text a,
        .mean-container a.meanmenu-reveal {
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        .comment-navigation .nav-previous,
        .posts-navigation .nav-previous,
        .post-navigation .nav-previous,
        .comment-navigation .nav-next,
        .posts-navigation .nav-next,
        .post-navigation .nav-next,
        #infinite-handle span,
        .comment-navigation .nav-previous:hover,
        .posts-navigation .nav-previous:hover,
        .post-navigation .nav-previous:hover,
        .comment-navigation .nav-next:hover,
        .posts-navigation .nav-next:hover,
        .post-navigation .nav-next:hover,
        #infinite-handle span:hover,
        #nav-icon span,
        a.read-more,
        .business_era_widget_latest_news .latest-news-title:before,
        .business_era_widget_our_team  .our-team-title:before,
        .business_era_widget_portfolio .portfolio-title:before,
        .mean-container .mean-nav,
        .business-era-twitter-rotator #twitter-slider .cycle-next, 
        .business-era-twitter-rotator #twitter-slider .cycle-prev,
        .business_era_widget_testimonials #testimonial-slider .cycle-next, 
        .business_era_widget_testimonials #testimonial-slider .cycle-prev,
        #footer-insta-widgets .feed-container .feed-title,
        #home-page-widget-area .business-era-instagram-feeds .feed-title,
        #sidebar-primary .business-era-instagram-feeds .feed-title,
        #footer-widgets .business-era-instagram-feeds .feed-title,
        .mean-container a.meanmenu-reveal span {
            background: <?php echo esc_attr( $primary_color ); ?>;
        }

        .nav-links .page-numbers.current,.nav-links a.page-numbers:hover {
            background: <?php echo esc_attr( $primary_color ); ?>;
            border-color: <?php echo esc_attr( $primary_color ); ?> ;
        }

        #home-page-widget-area .widget-title {
            border-left: 4px double <?php echo esc_attr( $primary_color ); ?> ;
        }

        #main-slider .cycle-prev:hover,
        #main-slider .cycle-next:hover{
           background-color: <?php echo esc_attr( $primary_color ); ?> ;
           border-color: <?php echo esc_attr( $primary_color ); ?> ;
        }

        #footer-widgets {
            border-top: 4px solid <?php echo esc_attr( $primary_color ); ?> ;
        }

        a.button,
        input[type="submit"],
        a.read-more {
            border:2px solid <?php echo esc_attr( $primary_color ); ?> ;
        }

        .main-navigation li a:hover, 
        .main-navigation li.current-menu-item a, 
        .main-navigation li.current_page_item a, 
        .main-navigation li:hover > a{
            border-bottom: 2px solid <?php echo esc_attr( $primary_color ); ?> ;   
        }

        .main-navigation ul ul li:hover a {
            border-bottom: 1px solid <?php echo esc_attr( $primary_color ); ?> ; 
        }

        .site-title a{
            color: <?php echo esc_attr( $title_color ); ?>;
        }
        .site-description{
            color: <?php echo esc_attr( $tagline_color ); ?>;
        }

        .main-navigation ul li a{
            color: <?php echo esc_attr( $menu_color ); ?>;
        }

        .main-navigation li.current-menu-item:hover li a, 
        .main-navigation li.current_page_item:hover li a{
            color: <?php echo esc_attr( $menu_color ); ?>;
        }

        .main-navigation ul li a:hover,
        .main-navigation li:hover > a,
        .main-navigation li.current-menu-item a, 
        .main-navigation li.current_page_item a,
        .main-navigation li.current-menu-item:hover li:hover a, 
        .main-navigation li.current_page_item:hover li:hover a{
            color: <?php echo esc_attr( $menu_hover_color ); ?>;
        }

        <?php if( !empty( $menu_border_color ) ){ ?>

        .main-navigation li:hover > a,
        .main-navigation li.current-menu-item a, 
        .main-navigation li.current_page_item a{
            border-bottom: 2px solid <?php echo esc_attr( $menu_border_color ); ?> ;   
        }

        .main-navigation ul ul li:hover a,
        .main-navigation li.current-menu-item:hover ul li a, 
        .main-navigation li.current_page_item:hover ul li a{
            border-bottom: 1px solid <?php echo esc_attr( $menu_border_color ); ?> ;   
        }

        <?php } ?>

        .top-header{
            background: <?php echo esc_attr( $top_header_bg ); ?>;
            border-bottom: 1px solid <?php echo esc_attr( $top_header_border ); ?>;
        }

        .top-header span,
        .top-header .email a,
        .top-header ul li a,
        .top-header .business_era_widget_social ul li a::before{
            color: <?php echo esc_attr( $top_header_color ); ?>;
        }

        .top-header .business_era_widget_social ul li a{
            border: 1px solid <?php echo esc_attr( $top_header_color ); ?>;
        }

        #footer-widgets{
            background: <?php echo esc_attr( $top_footer_bg ); ?>;
        }

        #footer-widgets a,
        #footer-widgets span,
        #footer-widgets span a,
        #footer-widgets ul li a,
        #footer-widgets .widget-title,
        .business_era_widget_social ul li a::before{
            color: <?php echo esc_attr( $top_footer_color ); ?>;
        }

        #footer-widgets .widget-title{
            border-bottom: 1px solid <?php echo esc_attr( $top_footer_widget ); ?>;
        }

        .business_era_widget_social li a{
            border: 1px solid <?php echo esc_attr( $top_footer_color ); ?>;
        }

        #colophon.site-footer{
            background: <?php echo esc_attr( $bottom_footer_bg ); ?>;
            border-top: 1px solid <?php echo esc_attr( $bottom_footer_border ); ?>;
        }

        #colophon.site-footer,
        #colophon.site-footer a,
        #colophon.site-footer span{
            color: <?php echo esc_attr( $bottom_footer_color ); ?>;
        }

        a.button, a.read-more, input[type="submit"] {
            color: <?php echo esc_attr( $button_text_color ); ?>;
            border: 2px solid <?php echo esc_attr( $primary_color ); ?>;
        }

        a.button:hover, a.read-more:hover,  input[type="submit"]:hover{
            background: <?php echo esc_attr( $button_text_color ); ?>;
            color: <?php echo esc_attr( $primary_color ); ?>;
        }

        #breadcrumb {
            background: <?php echo esc_attr( $breadcrumb_bg_color ); ?>;
            color: <?php echo esc_attr( $breadcrumb_text_color ); ?>;
        }

        #breadcrumb a{
            color: <?php echo esc_attr( $breadcrumb_link_color ); ?>;
        }
        

    </style>

<?php }

endif;

add_action( 'wp_head', 'business_era_dynamic_options' );