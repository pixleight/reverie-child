<?php
if( ! function_exists( 'intranet_enqueue_style' ) ) {
	function intranet_enqueue_style()
	{
		// fontawesome stylesheet
		wp_register_style( 'fontawesome-stylesheet', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css', array(), '' );
		
		wp_enqueue_style( 'fontawesome-stylesheet' );
		
	}
}
add_action( 'wp_enqueue_scripts', 'intranet_enqueue_style' );
?>
