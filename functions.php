<?php

$content_width = 658;

/*********************
Enqueue styles
*********************/
if( ! function_exists( 'ksc_enqueue_style' ) ) {
	function ksc_enqueue_style()
	{
		// google fonts stylesheet
		wp_register_style( 'google-fonts-alegreya', '//fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900', array(), '' );
		wp_register_style( 'fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), '' );

		wp_enqueue_style( 'google-fonts-alegreya' );
		wp_enqueue_style( 'fontawesome' );
	}
}
add_action( 'wp_enqueue_scripts', 'ksc_enqueue_style' );

// add ie conditional html5 shim and other foundation fixes to header
function add_ie_8_fixes_head () {
	echo '
	<!--[if lt IE 9]>';
		echo '
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>';
		echo '
		<script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>';
		echo '
		<script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>';
		echo '
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>';
	echo '
	<![endif]-->';
}
add_action('wp_head', 'add_ie_8_fixes_head');

// add rem polyfil
function add_ie_8_fixes_footer () {
	echo '
	<!--[if lt IE 9]>';
		echo '
		<script src="'.get_stylesheet_directory_uri().'/js/rem.min.js"></script>';
	echo '
	<![endif]-->';
}
add_action('wp_footer', 'add_ie_8_fixes_footer');

function alter_cabins_query($qry) {
   if ( $qry->is_main_query() && ( is_post_type_archive( 'cabin' ) || is_tax( 'cabin_types' ) ) ) {
     $qry->set( 'order', 'ASC' );
     $qry->set( 'orderby', 'title' );
     $qry->set( 'nopaging', true );
   }
}
add_action('pre_get_posts','alter_cabins_query');

function ksc_styles_and_scripts(){
	wp_register_script( 'ksc-script', get_stylesheet_directory_uri() . '/js/ksc.js', array(), '1.0', true );

	wp_enqueue_script( 'ksc-script' );
}

add_action('wp_enqueue_scripts', 'ksc_styles_and_scripts', 999);

require_once( 'lib/custom-posts.php' );

?>
