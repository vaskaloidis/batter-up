<?php
/**
 *
 * HTML Shortcodes
 *
 */

// Frames
function frame_shortcode($atts, $content = null) {
	$output = '<figure class="frame clearfix">';
	$output .= do_shortcode($content);
	$output .= '</figure><!-- .frame (end) -->';
	return $output;
}
add_shortcode('frame', 'frame_shortcode');

function frame_left_shortcode($atts, $content = null) {
	$output = '<figure class="frame fleft">';
	$output .= do_shortcode($content);
	$output .= '</figure><!-- .frame (end) -->';
	return $output;
}
add_shortcode('frame_left', 'frame_left_shortcode');

function frame_right_shortcode($atts, $content = null) {
	$output = '<figure class="frame fright">';
	$output .= do_shortcode($content);
	$output .= '</figure><!-- .frame (end) -->';
	return $output;
}
add_shortcode('frame_right', 'frame_right_shortcode');


// Link
function link_shortcode($atts, $content = null) {
	extract(shortcode_atts(
		array(
			'link' => 'http://www.google.com',
			'text' => 'Link Text',
			'target' => '_self'
		), $atts));
	$output =  '<a href="'.$link.'" title="'.$text.'" class="link" target="'.$target.'">';
	$output .= $text;
	$output .= '</a>';
	return $output;
}
add_shortcode('link', 'link_shortcode');


// Map
function map_shortcode($atts, $content = null) {
	extract(shortcode_atts(
		array(
			'src' => '',
			'width' => '',
			'height' => ''
		), $atts));
	$output =  '<div class="google-map">';
	$output .= '<iframe src="'.$src.'" frameborder="0" width="'.$width.'" height="'.$height.'" marginwidth="0" marginheight="0" scrolling="no">';
	$output .= '</iframe>';
	$output .= '</div>';
	return $output;
}
add_shortcode('map', 'map_shortcode');


// Dropcaps
function dropcap_shortcode($atts, $content = null) {
	extract(shortcode_atts(
		array(
			'character' => ''
		), $atts));

	$output = '<div class="dropcap-container clearfix"><span class="dropcap">' . $character . '</span>';
	$output .= '<div class="extra-wrap">';
	$output .= do_shortcode($content);
	$output .= '</div></div><!-- .dropcap (end) -->';
	return $output;
}
add_shortcode('dropcap', 'dropcap_shortcode');


// Horizontal Rule
function hr_shortcode($atts, $content = null) {
	$output = '<div class="hr"><!-- --></div>';
	return $output;
}
add_shortcode('hr', 'hr_shortcode');


// Small Horizontal Rule
function sm_hr_shortcode($atts, $content = null) {
	$output = '<div class="sm_hr"></div>';
	return $output;
}
add_shortcode('sm_hr', 'sm_hr_shortcode');


// Spacer
function spacer_shortcode($atts, $content = null) {
	$output = '<div class="spacer"><!-- --></div>';
	return $output;
}
add_shortcode('spacer', 'spacer_shortcode');


// Blockquote
function blockquote_shortcode($atts, $content = null) {
	$output = '<blockquote>';
	$output .= do_shortcode($content);
	$output .= '</blockquote><!-- blockquote (end) -->';
	return $output;
}
add_shortcode('blockquote', 'blockquote_shortcode');


// Clear
function shortcode_clear() {
	return '<div class="clear"></div>';
}
add_shortcode('clear', 'shortcode_clear');
?>