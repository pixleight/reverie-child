<?php
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
?>
