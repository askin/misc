<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_bar' => '<li id="%1$s" class="bar %2$s">',
        'after_bar' => '</li>',
        'before_title' => '<h2 class="sidebartitle">',
        'after_title' => '</h2>',
    ));
?>