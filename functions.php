<?php
 function Winter2015_resources()
 {
	 wp_enqueue_style('style', get_stylesheet_uri());
 }
 
add_action('wp_enqueue_scripts', 'Winter2015_resources');

// Navigation Menus

register_nav_menus(array(
		'primary' =>__('Primary Menu'),
		'footer' =>__('Footer Menu'),
));

// Get top parent Page ID
global $post;

function get_top_parent_id()
{
	if($post->post_parent)
	{
		$ancestor=array_reverse(get_post_ancestors($post->ID));
		return $ancestor[0];
	}
	
	return $post->ID;
}

// To detect if page has children

function has_children()
{
	global $post;
	$pages = get_pages('child_of='. $post->ID);
	return count($pages);
}
