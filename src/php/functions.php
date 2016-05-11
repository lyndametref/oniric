<?php

wp_deregister_script( 'jquery' );

function init_scripts() { return true; }

// register two menus
register_nav_menus( array(
	'primary'   => __( 'Top Menu', 'blank' ),
	'secondary' => __( 'Right Sidebar Menu', 'blank' )
) );

// register several widget areas in the theme
register_sidebars(1, array('name' => 'Sidebar Widget Area'));
register_sidebars(1, array('name' => 'Navbar Widgets Area'));
register_sidebars(1, array('name' => 'Frontpage Footer Widgets Area'));
register_sidebars(4, array('name' => 'Footer %d Widgets Area'));

// Add feature support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );

// Enable Bootstrap dropdown menu
// https://github.com/twittem/wp-bootstrap-navwalker
// WARNING: Dependency not automatised!!!!!
require_once('wp_bootstrap_navwalker.php');

// Generate constants to query post on the archive page
// and display a paginated result
function init_archive_display_var() {
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$total_posts = wp_count_posts()->publish;
	$posts_per_page = get_option('posts_per_page');
	$offset = ($paged-1)*$posts_per_page;
	$page_number = ceil($total_posts/$posts_per_page);
	return array("paged" => $paged,
		"total_posts" => $total_posts,
		"posts_per_page" => $posts_per_page,
		"offset" => $offset,
		"page_number" => $page_number);
}
