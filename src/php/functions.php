<?php

wp_deregister_script( 'jquery' );
add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts() { return true; }

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary'   => __( 'Top Menu', 'blank' ),
	'secondary' => __( 'Left Sidebar Menu', 'blank' ),
	'tertiary'  => __( 'Practice Areas Menu', 'blank')
) );

// register a sidebar in the theme
register_sidebars(1, array('name' => 'Sidebar'));
register_sidebars(3, array('name' => 'Footer %d'));

// Enable use of custom logo in the theme
function mytheme_setup() {
	add_image_size('mytheme-logo', 160, 90);
	add_theme_support('custom-logo', array('size' => 'mytheme-logo'));
}
add_action('after_setup_theme', 'mytheme_setup');

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
