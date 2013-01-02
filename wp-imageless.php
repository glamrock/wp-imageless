<?php
/*
    Plugin Name: WP-Imageless
    Plugin URI: http://github.com/glamrock/wp-imageless
    Description: Disables images in posts, comments, and RSS
    Version: 0.1
    Author: Griffin Boyce
    Author URI: http://cryptic.be
    License: MIT
*/

// FYI: This plugin uses a filter and function together
// don't remove either unless you know what you're doing

// adds the filter
add_filter('the_content', 'imageless',1);
add_filter('the_content_feed', 'imageless',1);
add_filter('the_content_rss', 'imageless',1); // legacy - before v2.7
add_filter('comment_text', 'imageless',1);
add_filter('comment_text_rss', 'imageless',1);

// adds the function
function imageless($content)
{
 // strips images from posts
    $content = preg_replace('#(<[/]?img.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?image.*>)#U', '', $content);

// sends now-filtered content to the user 
    return $content;
}

// strip all tags from the excerpt
$excerpt = strip_tags(get_the_excerpt());
    echo $excerpt;

// in cases where get_the_content is used by sneaky hobbitses
apply_filters('the_content', get_the_content( $more_link_text, $stripteaser )) 

?>

