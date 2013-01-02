<?php
/*
    Plugin Name: WP-Soundless
    Plugin URI: http://github.com/glamrock/wp-imageless
    Description: Disables HTML5 audio tag in posts
    Version: 0.1
    Author: Griffin Boyce
    Author URI: http://cryptic.be
    License: MIT
*/
?>

<?php
// FYI: This plugin uses a filter and function together
// don't remove either unless you know what you're doing

// adds the filter
add_filter('the_content', 'soundless',1);
add_filter('the_content_feed', 'soundless',1);
add_filter('the_content_rss', 'soundless',1); // legacy - before v2.7

// adds the function
function medialess($content)
{
 // strips <audio></audio> from posts
    $content = preg_replace('#(<[/]?audio.*>)#U', '', $content);

// sends now-filtered content to the user 
    return $content;
}
?>

<!-- strip all tags from the excerpt -->
<?php $excerpt = strip_tags(get_the_excerpt());
    echo $excerpt; ?>

<!-- in cases where get_the_content is used by sneaky hobbitses -->
<?php apply_filters('the_content', get_the_content( $more_link_text, $stripteaser )) ?>

