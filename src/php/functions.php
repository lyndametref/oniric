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
register_sidebars(3, array('name' => 'Footer %d Widgets Area'));

// Add feature support
add_theme_support( 'post-thumbnails' ); 

// Advanced Custom Fields Fuctions
function convert_field_to_array ($f) { return explode("</p>", get_field($f)); }
function put_in_paragraph ($p) { return "<p>" . $p . "</p>"; }
function print_first_half ($a) { for($i = 0; $i < ceil(count($a)/2); $i++) { echo put_in_paragraph($a[$i]); } }
function print_second_half ($a) { for($i = ceil(count($a)/2); $i < count($a); $i++) { echo put_in_paragraph($a[$i]); } }
function convert_field_and_print_column ($field, $column="first") {
	$field = convert_field_to_array($field);
	if ($column == "first") print_first_half($field);
	else print_second_half($field);
}

?>
