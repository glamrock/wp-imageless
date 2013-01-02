<?php
/*
    Plugin Name: WP-Imageless
    Plugin URI: http://github.com/glamrock/wp-imageless
    Description: Kills images in the content area and comments
    Version: 0.1
    Author: Griffin Boyce
    Author URI: http://cryptic.be
    License: MIT
*/
?>

<?php
add_filter('the_content', 'imageless');
function imageless($content)
{
    $content = preg_replace('#(<[/]?img.*>)#U', '', $content);
    $content = preg_replace('#(<[/]?image.*>)#U', '', $content);
    return $content;
}

?>
