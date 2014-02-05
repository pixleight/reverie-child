<?php

require_once('lib/enqueue-style.php');
 
function intranet_pre_get_posts( $query )
{
	// validate
	if( is_admin() )
	{
		return $query;
	}
 
    // project example
    if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'staff' )
    {
    	$order = $_GET['order'] ? $_GET['order'] : 'ASC';
    	$sortby = $_GET['sortby'] ? $_GET['sortby'] : 'last_name';
    	$query->set('orderby', 'meta_value');  
    	$query->set('meta_key', $sortby);  
    	$query->set('order', $order);
    }   
 
	// always return
	return $query;
 
}
add_action('pre_get_posts', 'intranet_pre_get_posts');

if( ! function_exists( 'intranet_scripts_and_styles ' ) ) {
    function intranet_scripts_and_styles() {
        if (!is_admin()) {
            // adding Google Maps script in footer
            wp_register_script( 'google-maps-js', 'https://maps.googleapis.com/maps/api/js?v=3.14&sensor=false', array( 'jquery' ), '', true );

            // adding Intranet scripts in footer
            wp_register_script( 'intranet-js', get_stylesheet_directory_uri() . '/js/intranet.js', array( 'jquery' ), '', true );

            wp_enqueue_script( 'google-maps-js' );
            wp_enqueue_script( 'intranet-js' );
        }
    }
}
add_action('wp_enqueue_scripts', 'intranet_scripts_and_styles', 999);
?>