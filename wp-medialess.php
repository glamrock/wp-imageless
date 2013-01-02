<?php
/*
    Plugin Name: WP-Medialess
    Plugin URI: http://github.com/glamrock/wp-medialess
    Description: Disables all media in posts, comments, and RSS
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
add_filter('the_content', 'medialess',1);
add_filter('the_content_feed', 'medialess',1);
add_filter('the_content_rss', 'medialess',1); // legacy - before v2.7
add_filter('comment_text', 'medialess',1);
add_filter('comment_text_rss', 'medialess',1);

// adds the function
function medialess($content)
{
 // strips media from posts
    $content = preg_replace('#(<[/]?img.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?image.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?object.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?embed.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?video.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?iframe.*>)#U', '', $content); // blocks youtube and various code injection

// sends now-filtered content to the user 
    return $content;
}
?>

<!-- strip all tags from the excerpt -->
<?php $excerpt = strip_tags(get_the_excerpt());
    echo $excerpt; ?>

<!-- in cases where get_the_content is used by sneaky hobbitses -->
<?php apply_filters('the_content', get_the_content( $more_link_text, $stripteaser )) ?>

