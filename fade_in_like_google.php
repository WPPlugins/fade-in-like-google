<?php
/*
Plugin Name: Fade in like Google
Plugin URI: http://wordpress.org/extend/plugins/fade-in-like-google/
Description: Do you like the way google.com fades in?  I do!  Do you want all of the pages on your blog to do this?  I do!  This plugin does it for you.
Author: Scott Fennell
Version: 1.4
Author URI: www.scottfennell.com/wordpress
*/

/*  Copyright 2012  Scott Fennell  (email : scofennell@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


add_action('wp_enqueue_scripts', 'filg_get_js');
function filg_get_js() {
	wp_register_script('jquery', includes_url().'/js/jquery/jquery.js');
	wp_enqueue_script('jquery');
}

add_action('wp_head', 'filg_hide_like_google', 1);
function filg_hide_like_google() {
	if(!is_home() && !is_front_page()){ return;}
	?>
		<script>
			document.write('<style>body > div {display: none;}</style>');
		</script>
	<?php
}		

add_action('wp_head', 'filg_fade_in_like_google', 999);
function filg_fade_in_like_google() {
	if(!is_home() && !is_front_page()){ return;}
	?>
		<script>
			jQuery( window ).load(function() {
				jQuery('body').children().fadeIn();
			});
		</script>
	<?php
}

?>