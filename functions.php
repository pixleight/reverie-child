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
?>