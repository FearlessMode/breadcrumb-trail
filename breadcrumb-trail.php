<?php
/**
 * Plugin Name: Breadcrumb Trail
 * Plugin URI:  http://themehybrid.com/plugins/breadcrumb-trail
 * Description: A smart breadcrumb menu plugin embedded with <a href="http://schema.org">Schema.org</a> microdata that can handle variations in site structure more accurately than any other breadcrumb plugin for WordPress. Insert into your theme with the <code>breadcrumb_trail()</code> template tag.
 * Version:     1.0.0-alpha-1
 * Author:      Justin Tadlock
 * Author URI:  http://justintadlock.com
 * Text Domain: breadcrumb-trail
 * Domain Path: /languages
 */

/* Extra check in case the script is being loaded by a theme. */
if ( !function_exists( 'breadcrumb_trail' ) )
	require_once( 'inc/breadcrumbs.php' );

/* Load translation files. Note: Remove this line if packaging with a theme. */
load_plugin_textdomain( 'breadcrumb-trail', false, 'breadcrumb-trail/languages' );

add_action( 'after_setup_theme', 'breadcrumb_trail_theme_setup', 12 );

function breadcrumb_trail_theme_setup() {

	if ( !current_theme_supports( 'breadcrumb-trail' ) )
		add_action( 'wp_head', 'breadcrumb_trail_print_styles' );
}

function breadcrumb_trail_print_styles() { ?>

<style type="text/css" id="breadcrumb-trail-css">
.breadcrumbs .trail-browse,
.breadcrumbs .trail-items,
.breadcrumbs .trail-items li {
	display:     inline-block;
	margin:      0;
	padding:     0;
	border:      none;
	background:  transparent;
	text-indent: 0;
}

.breadcrumbs .trail-browse {
	font-size: inherit;
	font-style: inherit;
	font-weight: inherit;
	color:       inherit;
}

.breadcrumbs .trail-items {
	list-style: none;
}

	.trail-items li::after {
		content: "\002F";
		padding: 0 0.5em;
	}

	.trail-items li:last-of-type::after {
		display: none;
	}
</style>
<?php }
