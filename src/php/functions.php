<?php

wp_deregister_script( 'jquery' );
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() { return true; }

// register two menus
register_nav_menus( array(
	'primary'   => __( 'Top Menu', 'blank' ),
	'secondary' => __( 'Right Sidebar Menu', 'blank' )
) );

// register several widget areas in the theme
register_sidebars(1, array('name' => 'Sidebar Widget Area'));
register_sidebars(1, array('name' => 'Navbar Widgets Area'));
register_sidebars(4, array('name' => 'Footer %d Widgets Area'));

// Add feature support
add_theme_support( 'post-thumbnails' );

// Enable Bootstrap dropdown menu
// https://github.com/twittem/wp-bootstrap-navwalker
// WARNING: Dependency not automatised!!!!!
require_once('wp_bootstrap_navwalker.php');
