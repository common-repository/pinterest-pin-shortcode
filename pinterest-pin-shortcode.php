<?
/*
Plugin Name: Pinterest Pin Shortcode
Plugin URI: http://boltnev.ru/pinterest-pin-shortcode-plugin-for-wordpress/
Description: You can insert a specific pin from Pinterest into your posts using shortcode. General use: [pin url=PIN_URL].
Version: 1.1
Author: Ilya Boltnev
Author URI: http://boltnev.ru/me/
*/

/*
Pinterest Pin Shortcode (Wordpress Plugin)
Copyright (C) 2013 Ilya Boltnev
Contact me at http://boltnev.ru/me/

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

add_shortcode("pin", "pin_handler");

function pin_handler($atts) {

	extract(
		shortcode_atts(array(
			'url' => '' //pin url
		), $atts)
	);
		
	$pin_output = "
	<script type=\"text/javascript\">
		(function(d){
		  var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT');
		  p.type = 'text/javascript';
		  p.async = true;
		  p.src = '//assets.pinterest.com/js/pinit.js';
		  f.parentNode.insertBefore(p, f);
		}(document));
	</script>
	<script type=\"text/javascript\">
		document.write('<p><a' + ' data-pin-do=\"embedPin\" h' + 'ref=\"" . $url ."\" rel=\"nofollow\" target=\"_blank\"></a></p>');
	</script>
	";
	return $pin_output;
}
?>