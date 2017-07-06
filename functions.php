<?php

//ADD THUMBNAIL SUPPORT
add_theme_support('post-thumbnails');

//REGISTER MAIN MENU
add_action('init','register_site_menus');
function register_site_menus(){
    register_nav_menus(array(
        'main' => 'Main Menu'
    ));
}