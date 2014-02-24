<?php
/*********************
Enqueue styles
*********************/
if( ! function_exists( 'ksc_enqueue_style' ) ) {
	function ksc_enqueue_style()
	{
		// google fonts stylesheet
		wp_register_style( 'google-fonts-alegreya', '//fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900', array(), '' );

		wp_enqueue_style( 'google-fonts-alegreya' );
		
	}
}
add_action( 'wp_enqueue_scripts', 'ksc_enqueue_style' );
?>
