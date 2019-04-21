<?php
/**
 * Custom Nutrient template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Nutrient
 * @since Nutrient 1.2
 */

if ( ! function_exists( 'hm_logo' ) ) :

function hm_logo( $id, $exclude_bg_rings = false, $bg_color='#f15b37', $use_parallax = true, $use_circles = false, $echo = true ) {
	if ( ! $id ) $id = 'hm' . random_int(0,50);
	if ( $use_parallax ) {
		$output = '<ul id="' . $id . '" class="no-bullet absolute">';
		if ( $exclude_bg_rings !== true ) {
			$output .= '<li class="layer" data-depth="0.3">';
			$output .= '<svg version="1.1" id="' . $id . '_bg_ring" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 197 202" enable-background="new 0 0 197 202" xml:space="preserve">';
			$output .= '<g><circle fill="none" stroke="#F0503A" stroke-width="3" stroke-miterlimit="10" cx="87.8" cy="99.8" r="84.8"></circle></g>';
			$output .= '</svg></li>';
			$output .= '<li class="layer" data-depth="0.7">';
			$output .= '<svg version="1.1" id="' . $id . '_mg_ring" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"  viewBox="0 0 197 202" enable-background="new 0 0 197 202" xml:space="preserve">';
			$output .= '<g><circle fill="none" stroke="#f57345" stroke-width="3" stroke-miterlimit="10" cx="142.8" cy="95.7" r="52.2"></circle></g>';
			$output .= '</svg></li>';
		}
		$output .= '<li class="layer" data-depth="1.2">';
		$output .= '<svg version="1.1" id="' . $id . '_outer_ring" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 205.1" enable-background="new 0 0 200 205.1" xml:space="preserve">';
		$output .= '<g><path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M100,8.1 c52.2,0,94.5,42.3,94.5,94.5S152.2,197,100,197S5.5,154.7,5.5,102.5S47.8,8.1,100,8.1z"></path></g>';
		$output .= '</svg></li>';
		$output .= '<li class="layer" data-depth="0.9">';
		$output .= '<svg version="1.1" id="' . $id . '_letters" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 205.1" enable-background="new 0 0 200 205.1" xml:space="preserve">';
		$output .= '<path id="' . $id . '_letter_m" stroke="#FFFFFF" fill="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M85.8,131.2V73.8c0-1.9-1.7-3.6-3.6-3.6 c-1.9,0-3.6,1.7-3.6,3.6V99H54.4V73.8c0-1.9-1.6-3.6-3.6-3.6s-3.6,1.7-3.6,3.6v57.3c0,2,1.6,3.6,3.6,3.6s3.6-1.7,3.6-3.6V106h24.3 v25.2c0,2,1.7,3.6,3.6,3.6C84.2,134.8,85.8,133.1,85.8,131.2z"></path>';
		$output .= '<path id="' . $id . '_letter_h" stroke="#FFFFFF" fill="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M152.7,74c0-2-1.6-3.7-3.7-3.7c-1.5,0-2.8,0.6-3.7,2.2 l-17.4,37.3l-17.4-37.2c-0.8-1.5-2-2.3-3.8-2.3c-2.1,0-3.7,1.6-3.7,3.7v57.3c0,1.9,1.5,3.5,3.4,3.5c2,0,3.7-1.6,3.7-3.5V88 l14.3,30.6c0.7,1.4,2,2.1,3.4,2.1c1.5,0,2.8-0.7,3.5-2.1L145.6,88v43.4c0,1.9,1.7,3.5,3.6,3.5c1.9,0,3.5-1.6,3.5-3.5V74z"></path>';
		$output .= '</svg></li>';
		$output .= '<li class="layer" data-depth="1.2">';
		$output .= '<svg version="1.1" id="' . $id . '_dots12" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 205.1" enable-background="new 0 0 200 205.1" xml:space="preserve">';
		$output .= '<g><path id="' . $id . '_dot1" fill="#FFFFFF" d="M187.5,130.3c3.8,0,6.9,3.1,6.9,6.9s-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9S183.7,130.3,187.5,130.3z"></path>';
		$output .= '<path id="' . $id . '_dot2" fill="#FFFFFF" d="M64.6,8.2c3.8,0,6.9,3.1,6.9,6.9s-3.1,6.9-6.9,6.9s-6.9-3.1-6.9-6.9S60.8,8.2,64.6,8.2z"></path></g>';
		$output .= '</svg></li>';
		$output .= '<li class="layer" data-depth="1.2">';
		$output .= '<svg version="1.1" id="' . $id . '_dots3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 205.1" enable-background="new 0 0 200 205.1" xml:space="preserve">';
		$output .= '<g><path id="' . $id . '_dot3" fill="' . $bg_color . '" stroke="#FFFFFF" stroke-width="4" stroke-miterlimit="10" d="M100.5,191.5c3,0,5.5,2.5,5.5,5.5 s-2.5,5.5-5.5,5.5c-3,0-5.5-2.5-5.5-5.5S97.4,191.5,100.5,191.5z"></path></g>';
		$output .= '</svg></li></ul>';
	} else {
		$output = '<svg version="1.1" id="' . $id . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1200 1200" enable-background="new 0 0 1200 1200" xml:space="preserve">';
		$output .= '<path fill-rule="evenodd" clip-rule="evenodd" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M595,674.5 c52.2,0,94.5,42.3,94.5,94.5s-42.3,94.5-94.5,94.5s-94.5-42.3-94.5-94.5S542.8,674.5,595,674.5z"></path>';
		$output .= '<g id="' . $id . '_letters">';
		$output .= '<path id="' . $id . '_letter_m" stroke="#FFFFFF" fill="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M580.8,797.6v-57.3 c0-1.9-1.7-3.6-3.6-3.6c-1.9,0-3.6,1.7-3.6,3.6v25.2h-24.3v-25.2c0-1.9-1.6-3.6-3.6-3.6c-2,0-3.6,1.7-3.6,3.6v57.3 c0,2,1.6,3.6,3.6,3.6c2,0,3.6-1.7,3.6-3.6v-25.2h24.3v25.2c0,2,1.7,3.6,3.6,3.6C579.2,801.3,580.8,799.6,580.8,797.6z"></path>';
		$output .= '<path id="' . $id . '_letter_h" stroke="#FFFFFF" fill="#FFFFFF" stroke-width="3" stroke-miterlimit="10" d="M647.7,740.5c0-2-1.6-3.7-3.7-3.7 c-1.5,0-2.8,0.6-3.7,2.2l-17.4,37.3L605.6,739c-0.8-1.5-2-2.3-3.8-2.3c-2.1,0-3.7,1.6-3.7,3.7v57.3c0,1.9,1.5,3.5,3.4,3.5 c2,0,3.7-1.6,3.7-3.5v-43.4l14.3,30.6c0.7,1.4,2,2.1,3.4,2.1c1.5,0,2.8-0.7,3.5-2.1l14.3-30.6v43.4c0,1.9,1.7,3.5,3.6,3.5 c1.9,0,3.5-1.6,3.5-3.5V740.5z"></path>';
		$output .= '</g>';
		$output .= '<g id="' . $id . '_dots12"><path id="' . $id . '_dot1" fill="#FFFFFF" d="M680.5,800.8c3.8,0,6.9,3.1,6.9,6.9c0,3.8-3.1,6.9-6.9,6.9c-3.8,0-6.9-3.1-6.9-6.9 C673.6,803.9,676.7,800.8,680.5,800.8z"></path>';
		$output .= '<path id="' . $id . '_dot12" fill="#FFFFFF" d="M557.6,675.6c3.8,0,6.9,3.1,6.9,6.9c0,3.8-3.1,6.9-6.9,6.9c-3.8,0-6.9-3.1-6.9-6.9 C550.8,678.7,553.8,675.6,557.6,675.6z"></path>';
		$output .= '</g>';
		$output .= '<g id="' . $id . '_dots3"><path id="' . $id . '_dot3" fill="' . $bg_color . '" stroke="#FFFFFF" stroke-width="4" stroke-miterlimit="10" d="M595.5,858c3,0,5.5,2.5,5.5,5.5 s-2.5,5.5-5.5,5.5s-5.5-2.5-5.5-5.5S592.4,858,595.5,858z"></path>';
		$output .= '</g>';
		if($use_circles){
			$num_circles = 76;
			$opacity = 0.8;
			$cx = 594.6;
			$cy = 767.7;
			$r = 115.8;

			$output .= '<g id="' . $id . '_circles"><g><g>';

			for($c = 0; $c < $num_circles; $c++){
				$output .= '<circle fill="none" stroke="#ab00a6" stroke-width="0.25" stroke-miterlimit="10" opacity="' . $opacity . '" cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '"></circle>';
				if($c > 0 && $c % 4 == 0) {
					$cx += 0.1;
					$opacity -= 0.1;
				}
				$r += 7.5;
			}

			$output .= '</g></g></g>';
		}
		$output .= '</svg>';
	}

	if( $echo == true ){
		echo $output;
	}else{
		return $output;
	}
}

endif;

if ( ! function_exists( 'decision_tree' ) ) :
/**
 * Displays a decision tree, either svg or png.
 *
 * @since Nutrient 1.1
 * @todo Add png version
 */
function decision_tree( $id, $simple = true, $echo = true, $class = 'absolute' ) {

  if ( ! $id ) $id = 'decision_tree' . random_int(0,50);
	
	if ( $simple == true ) {
		$output  = '<svg version="1.1" id="' . $id . '" class="' . $class . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"';
		$output .= ' x="0px" y="0px" viewBox="0 0 407 623.1" enable-background="new 0 0 407 623.1" xml:space="preserve">';
		$output .= '<circle opacity="0.5" fill="#888cf1" stroke="#888cf1" stroke-width="3" stroke-miterlimit="10" cx="232.3" cy="316.7" r="38.9"></circle>';
		$output .= '<line opacity="0.5" fill="#888cf1" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" x1="200.9" y1="330.4" x2="76.9" y2="396.2"></line>';
		$output .= '<line opacity="0.5" fill="#888cf1" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" x1="197.3" y1="308.8" x2="70.4" y2="281.4"></line>';
		$output .= '<circle opacity="0.5" fill="#888cf1" cx="76.9" cy="396.2" r="10.3"></circle>';
		$output .= '<circle opacity="0.5" fill="#888cf1" cx="70" cy="281.4" r="10.3"></circle>';
		$output .= '<line opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" x1="264.4" y1="9.5" x2="235.9" y2="312.1"></line>';
		$output .= '<circle opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" cx="238" cy="315.7" r="168"></circle>';
		$output .= '<circle opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" cx="234.4" cy="489.1" r="44.9"></circle>';
		$output .= '<circle opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" cx="64" cy="559" r="63"></circle>';
		$output .= '<line opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" x1="233.9" y1="308.8" x2="232.5" y2="483.7"></line>';
		$output .= '<circle opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" cx="197.8" cy="310.8" r="27.4"></circle>';
		$output .= '<line opacity="0.5" fill="none" stroke="#888cf1" stroke-width="2" stroke-miterlimit="10" x1="70.4" y1="550.9" x2="235.9" y2="312.1"></line>';
		$output .= '<circle opacity="0.5" fill="#888cf1" cx="264.4" cy="9.5" r="9.5"></circle>';
		$output .= '<circle opacity="0.5" fill="#888cf1" cx="235.9" cy="313.4" r="10.3"></circle>';
		$output .= '</svg>';
	}

	if( $echo == true ){
		echo $output;
	}else{
		return $output;
	}
}
endif;

if ( ! function_exists( 'background_circles' ) ) :
/**
 * Displays svg background circles for use in the Services section.
 *
 * @since Nutrient 1.2
 */
function background_circles( $id, $color = '000000', $echo = true, $is_mobile = false ) {
	$num_circles = 76;
	$cx = 1445.1;
	$cy = 1449.9;
	$r = 230.3;
	$suff = '';


	if($is_mobile) $suff = '_mobile';

	$color = '#' . $color;
  if ( ! $id ) $id = uniqueid('circle');
		$output = '<figure class="' . $id . ' absolute" rel="circles">';
		switch($id) {
			case 'expression':
				$output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2897.7 2897.7" enable-background="new 0 0 2897.7 2897.7" xml:space="preserve">';
				$output .= '<g id="' . $id . $suff . '_circles"><g><g>';

				for($c = 0; $c < $num_circles; $c++){
					$output .= '<circle fill="none" stroke="' . $color . '" stroke-width="0.25" stroke-miterlimit="10" cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '"></circle>';
					if($c > 0 && $c % 2 == 0) $cx += 0.1;
					$r += 16;
				}

				$output .= '</g></g></g>';
				$output .= '<g id="' . $id . $suff . '_decision_tree">';
				$output .= '<path stroke="' . $color . '" opacity="0.39" d="M1269.8,1003.1c12.2,2.5,23.8,6.3,34.7,11.4c-1,2-1.6,4.3-1.4,6.8c0.5,7,6.6,12.2,13.6,11.7 c4.1-0.3,7.7-2.6,9.7-5.9c18.6,12.8,34.8,30.1,48.5,51.6c39.3,61.9,43.7,137,42.9,140.5c0-0.2,0.3-0.5,0.7-0.6l0.5,1.9 c0.9-0.2,1-1,0.9-3.8c-0.3-13.9-5.5-60.2-25.9-106.5c-11.9-27-27.1-49.7-45.1-67.3c-6.7-6.6-13.9-12.4-21.4-17.6 c0.8-1.8,1.2-3.9,1-6c-0.5-7-6.6-12.2-13.6-11.7c-3.8,0.3-7.1,2.3-9.3,5.1c-11.1-5.2-22.9-9.1-35.3-11.7L1269.8,1003.1z M1324.7,1026c-1.7,2.8-4.7,4.7-8.2,5c-5.9,0.4-11-4-11.4-9.8c-0.2-2.1,0.3-4,1.2-5.7l1.1-1.7c1.8-2.2,4.5-3.8,7.5-4 c5.9-0.4,11,4,11.4,9.8c0.1,1.6-0.1,3.2-0.7,4.7L1324.7,1026z"></path>';
				$output .= '<line opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" x1="1664.8" y1="1542.6" x2="1664.8" y2="1542.6"></line>';
				$output .= '</g></svg>';

			break;
			case 'engagement':
				$output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2897.7 2897.7" enable-background="new 0 0 2897.7 2897.7" xml:space="preserve">';
				$output .= '<g id="' . $id .  $suff .'_circles"><g><g>';

				for($c = 0; $c < $num_circles; $c++){
					$output .= '<circle fill="none" stroke="' . $color . '" stroke-width="0.25" stroke-miterlimit="10" cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '"></circle>';
					if($c > 0 && $c % 2 == 0) $cx += 0.1;
					$r += 16;
				}

				$output .= '</g></g></g>';
				$output .= '<g id="' . $id . $suff . '_decision_tree">';
				$output .= '<circle opacity="0.39" cx="945.7" cy="1322.4" r="13.7" fill="' . $color . '"></circle>';
				$output .= '<path stroke="' . $color . '" opacity="0.39" d="M1656.4,1895.2c4.2-12,6.9-24.1,8.1-36.3c3.6-0.3,7-2.1,9.2-5.3c4-5.7,2.7-13.6-3-17.7 c-1.7-1.2-3.7-1.9-5.6-2.2c-0.6-9.1-1.9-18.2-4.1-27.4c-5.8-24.5-17.4-49.2-34.4-73.4c-29.1-41.3-66.1-69.6-77.9-77.1 c-2.4-1.5-3.1-1.8-3.7-1.2l1.4,1.4c-0.3,0.3-0.7,0.3-0.8,0.3c3.4,1.1,65.5,43.5,98.4,109.1c11.4,22.8,17.8,45.6,19.3,68.1 c-3.9,0.1-7.6,1.9-10,5.3c-4,5.7-2.7,13.6,3,17.7c2,1.4,4.2,2.1,6.5,2.3c-1.2,12-3.9,23.8-8.1,35.6L1656.4,1895.2z M1665.2,1835.9 c1.5,0.3,3,0.8,4.4,1.8c4.8,3.4,5.9,10.1,2.5,14.9c-1.8,2.5-4.5,4-7.3,4.4l-2,0.1c-1.9-0.1-3.8-0.7-5.5-1.9 c-4.8-3.4-5.9-10.1-2.5-14.9c2-2.9,5.2-4.4,8.5-4.5L1665.2,1835.9z"></path>';
				$output .= '<path opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" d="M1236.9,1350.1 c0,0-129-73.7-280-31.5"></path>';
				$output .= '<line opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" x1="1664.8" y1="1542.6" x2="1664.8" y2="1542.6"></line>';
				$output .= '<line opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" x1="1260.7" y1="1586.9" x2="1101.9" y2="1746.3"></line>';
				$output .= '<circle opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" cx="1092" cy="1758.1" r="55.5"></circle>';
				$output .= '<circle opacity="0.39" cx="1090.7" cy="1757.7" r="17.2" fill="' . $color . '"></circle>';
				$output .= '</g></svg>';

			break;
		case 'strategy':
		default:
			$output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2897.7 2897.7" enable-background="new 0 0 2897.7 2897.7" xml:space="preserve">';
			$output .= '<g id="' . $id . $suff . '_circles"><g><g>';

				for($c = 0; $c < $num_circles; $c++){
					$output .= '<circle fill="none" stroke="' . $color . '" stroke-width="0.25" stroke-miterlimit="10" cx="' . $cx . '" cy="' . $cy . '" r="' . $r . '"></circle>';
					if($c > 0 && $c % 2 == 0) $cx += 0.1;
					$r += 16;
				}

				$output .= '</g></g></g>';
				if($id == 'strategy'){
					$output .= '<g id="' . $id . $suff . '_decision_tree">';
					$output .= '<circle fill="' . $color . '" opacity="0.39" cx="1126.8" cy="1908.6" r="13.7"></circle>';
					$output .= '<path fill="' . $color . '" opacity="0.39" d="M1537.5,1903.7c-12-3.4-23.2-8.1-33.7-14c1.2-1.9,1.9-4.2,1.9-6.6c0-7-5.7-12.7-12.7-12.7 c-4.2,0-7.8,2-10.1,5.1c-17.6-14.2-32.4-32.6-44.5-55.1c-34.6-64.7-33.3-139.9-32.2-143.3c-0.1,0.2-0.3,0.5-0.7,0.5l-0.3-2 c-0.9,0.2-1,0.9-1.2,3.7c-0.8,13.9,1,60.4,17.9,108.1c9.9,27.9,23.3,51.6,40,70.5c6.2,7.1,12.9,13.4,20,19.2 c-0.9,1.8-1.5,3.8-1.5,5.9c0,7,5.7,12.7,12.7,12.7c3.8,0,7.3-1.7,9.6-4.4c10.7,6,22.1,10.8,34.3,14.3L1537.5,1903.7z M1484.5,1876.7c1.9-2.6,5.1-4.4,8.6-4.4c5.9,0,10.7,4.8,10.7,10.7c0,2.1-0.6,4-1.6,5.6l-1.2,1.6c-2,2.1-4.7,3.4-7.8,3.4 c-5.9,0-10.7-4.8-10.7-10.7c0-1.7,0.4-3.2,1.1-4.6L1484.5,1876.7z"></path>';
					$output .= '<path opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" d="M1249.4,1570.4 c0,0-165.1,129.3-124.1,326.4"></path>';
					$output .= '<line opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" x1="1664.8" y1="1542.6" x2="1664.8" y2="1542.6"></line>';
					$output .= '<line opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" x1="1621.5" y1="1596.7" x2="1922.9" y2="1877.6"></line>';
					$output .= '<circle opacity="0.39" fill="none" stroke="' . $color . '" stroke-width="2" stroke-miterlimit="10" cx="1934.5" cy="1887.7" r="55.5"></circle>';
					$output .= '<circle opacity="0.39" fill="' . $color . '" cx="1934" cy="1888.9" r="17.2"></circle>';
					$output .= '</g>';
				}
				$output .= '</svg>';

			break;
	}

	$output .= '</figure>';

	if( $echo == true ){
		echo $output;
	}else{
		return $output;
	}
}
endif;

if ( ! function_exists( 'nutrient_logo' ) ) :
/**
 * Displays an svg version of the Nutrient logo.
 *
 * Create your own nutrient_logo() function to override in a child theme.
 *
 * @since Nutrient 1.1
 * @todo Add color option for 'orange' so the 'Coming Soon'/'Kenya' page can use this function
 */
function nutrient_logo( $id, $color = '231E20', $echo = true ) {
	//Default color
	($color == 'white' ? $hex = '#ffffff' : $hex = '#');
  if ( ! $id ) $id = uniqueid('logo');	
	
	$output = '<svg version="1.1" class="' . $color . '" id="' . $id . '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 453 105" enable-background="new 0 0 453 105" xml:space="preserve">';
	$output .= '<g><g><g>';
	$output .= '<path fill="' . $hex . '" d="M298,26.7c-17.4,0-31.6,14.2-31.6,31.6v14.3c0,17.8,14.5,32.4,32.4,32.4c12.5,0,23.8-7.3,29.1-18.4 l-15.5-9c-1.9,5.4-7.6,9.3-13.6,9.3c-7.5,0-14.3-6.1-14.3-13.5v0v-15v0c0-7.5,6.1-13.5,13.5-13.5c6.4,0,11.8,4.5,13.2,10.5H307 v0h0c-8.3,0-15,6.7-15,15l37.5,0v-15C327.9,39.3,314.4,26.7,298,26.7z"></path>';
	$output .= '<path fill="' . $hex . '" d="M215.2,26.7L215.2,26.7h-1.5c-12.5,0-22.6,10.1-22.6,22.6v0l0,40.6c0,7.5,6.1,13.5,13.5,13.5h4.5 l0-54.2c0-1.6,0.8-2.7,1.3-3.2c0.5-0.5,1.6-1.3,3.2-1.3l19.6,0C233.3,34.8,225.2,26.7,215.2,26.7z"></path>';
	$output .= '<path fill="' . $hex . '" d="M248.3,26.7c-5,0-9,4-9,9l0,55.7c0,7.5,6.1,13.5,13.5,13.5h4.5l0-69.2 C257.3,30.8,253.3,26.7,248.3,26.7z"></path>';
	$output .= '<circle fill="' . $hex . '" cx="248.3" cy="8.7" r="9"></circle>';
	$output .= '<path fill="' . $hex . '" d="M31.6,26.7C14.2,26.7,0,40.9,0,58.3v31.6c0,7.5,6.1,13.5,13.5,13.5h4.5l0-45.1
						c0-7.5,6.1-13.5,13.5-13.5s13.5,6.1,13.5,13.5l0,45.1h18.1l0-45.1C63.2,40.9,49,26.7,31.6,26.7z"></path>';
	$output .= '<path fill="' . $hex . '" d="M370.2,26.7c-17.4,0-31.6,14.2-31.6,31.6l0,31.6c0,7.5,6.1,13.5,13.5,13.5h4.5l0-45.1
						c0-7.5,6.1-13.5,13.5-13.5c7.5,0,13.5,6.1,13.5,13.5l0,45.1h18.1l0-45.1C401.8,40.9,387.7,26.7,370.2,26.7z"></path>';
	$output .= '<path fill="' . $hex . '" d="M434.9,86.9L434.9,86.9c-4.2,0-6-1.9-6-6V13.2h-4.5c-7.5,0-13.5,6.1-13.5,13.5l0,55.7
						c0,12.5,10.1,22.6,22.6,22.6h1.5h0c10,0,18.1-8.1,18.1-18.1H434.9z"></path>';
	$output .= '<path fill="' . $hex . '" d="M121.9,28.2h-4.5v45.1c0,7.5-6.1,13.5-13.5,13.5c-7.5,0-13.6-6.1-13.6-13.5l0-31.6
						c0-7.5-6.1-13.5-13.5-13.5h-4.5l0,45.1c0,17.4,14.2,31.6,31.6,31.6s31.6-14.2,31.6-31.6l0-31.6
						C135.4,35.1,129.4,28.2,121.9,28.2z"></path>';
	$output .= '<path fill="' . $hex . '" d="M168.6,86.9c-4.2,0-6-1.9-6-6V13.2H158c-7.5,0-13.5,6.1-13.5,13.5l0,55.7c0,12.5,10.1,22.6,22.6,22.6
						h1.5h0c10,0,18.1-8.1,18.1-18.1L168.6,86.9L168.6,86.9z"></path>';
	$output .= '</g></g></g>';

	//Color Variations
	$output .= '<g>';

	//White
  if ($color == 'white'){
  	$output .= '<image overflow="visible" width="1742" height="325" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABtIAAAFJCAYAAAAG+rk1AAAACXBIWXMAAC4jAAAuIwF4pT92AAAA ';
  	$output .= 'GXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAJWhJREFUeNrs3eF54zaCBmAit/f7';
		$output .= 'vBWsU8F5Koings1UsDMVbFLBzlSQTAVxKsikgjgVxKkg2grO9//ucORaTpyJbFMUAALg+z4PH0mW';
		$output .= 'TIGgTYH8BGAYAAAAAAAAAAAAAAAAAGCOoAoAAKBuMcbL/d3z/fIf43Lx0c8WrXpc/m+/PLz/1BIL';
		$output .= 'vaa28vS+/f8+Lv9zv4QQov88AACAYfiTKgAAgDrEGKdw7HJc/jLcBWXTcpb5bVv/cl2sbD2tbj8A';
		$output .= 'AAAHCNIAAGAl+55m0/LZ/ra0KUSLM18Xjnh9jdtQ3e4/8flc6wIAAOABQRoAABTyoMfZX4d1grM/';
		$output .= 'FCnx61rWYiB3H26W/FsAAADYFEEaAABktO919rdx+XzIP0zjoiImfl2t5e/ZcyFgUE8AAADLCNIA';
		$output .= 'ACCxfc+z+/DsvPLiHjNkY0z4noIdAAAAqidIA2hAjPGT8WZa/m1/+9T9FK+bu47U77vG7y95r2N+';
		$output .= 'H2rxLoTwVjVkP16/Hm/+Pi4XLRV75utCpeUvHcrVFCYamhMAoN5zg7C/RvDwWsKhxymeO/V3jn28';
		$output .= '5nPPlTP46yOR6xDCy+mOIA2AQ0Kj657dnk38+y5QwrZPkKfhGl8PdwHaeaPH/JjhtVXtppXqCwAA';
		$output .= '7tuQtb/X0t+LmX8vFmrnw6MEaQDtihoOVTRgw+DbTrDNg3CM58NvAdpZy5uS+QS558/fGj7P4ozX';
		$output .= 'CP8AAOppQ+YOhmLh33tqHbnboK7HUIQgDaBdodGGQ1zhfVw8BNIdXO4CtH8MdyFaD58la4QsccZ7';
		$output .= 'xorrrKXPFZ+BAAD1tSeXPJdi/aW3J8XvBW1d1iZIA+AUUXmAzRzwYrwc7nqffd7ZcTwe+foWbb1H';
		$output .= 'ls9HAABtvzlt5hTt7rnr1EalGYI0gG03ktZQav61tXrsaQhCbwfYGC/Gm6/G5XLjVZG691rJcMux';
		$output .= 'GQCAmtvZKdeRY64z7Wk27RNVANBFw2puIykWLNMa4oz7LTSAgRoOKDGejcsUoP00CNFY/nmkTAAA';
		$output .= '5G6n5b4GElbcNlidHmkA22pYtbodc39nSY80wRfwx4NOjK+Hu15oZ2qji8+h0kM7pnq/mKgsa82F';
		$output .= 'BwBAmXZ17lF54orbBqsTpAG0o8UJZ0s3LJf0SIsVlBuo5cCz3WEcazx2lQ5+YoV1/lwdzJnjLg4+';
		$output .= 'mwAAamvn1t6WjQvLHDJvq3YtqzC0I0A7ehmrOlS2bj3SgLsDaYxvh+0O4zg3tOp5yMLQ8L4DAKCh';
		$output .= 'U48G2oSh4m2F4vRIA2hHjcMTxpW2N2V5NOpg62exMZ6PN98M5kGbE6al6iWWsrdZq0MWpii34RoB';
		$output .= 'ANpsByY/rcm8vthI3cXBF83IQI80AGpr/JUuj/nTYMNijF8M2+2FtuYxf+6QhCnKlDq0a/bPPdFr';
		$output .= 'AADI1y7L3R4LiV+Xuj16aj24jkMWeqQB0GLDstTvuKAIvR5gYjwb7nqhfa42sp/MPnWSGwuUKQ7t';
		$output .= '9txKGQDO7XEIAEBeOb7Qm3qdOb6IVqKtqUcaWeiRBrAtW55LLRZ6H6D2A2GMF+PND4MQbcnnQ4pe';
		$output .= 'YmGY35Os5Gdb6R5bKeoyJiy3z0MAgPXb3rmfi5nLf4zSgSIsJkgD6KOhpUHxx+0LTzyXuhGp0Qat';
		$output .= 'HEhjnMKzKUS7UBvZjltzhmyMFZe/VJ2HDrcLAIB12u0h83vl6FlmFCCaIUgDoNZG4NzXxRn3UzQw';
		$output .= 'XdCExsUYvxpvvhuXM7XRxi7r+AQ81RxxAAC0J0cgtuTaSA9tetdqKMIcaQB9qOFi25IhuFIMPRA2';
		$output .= 'VMfAkn/eu/nQpgDtUm00Ze68ZqnmPys9j9pz73dMeXxGAQA0dIqSuV1Xel6yuWUpXZeQjCANoB0l';
		$output .= 'u/DnbLyExK9rtR6AEv+QdyGaoRznHT9rO371HiLV1iPN5xcAQLm295LnSq8zRVtx7hej9SyjaoZ2';
		$output .= 'BKBEQ3BL69b4g0rEGKfwTIg27+Q29bxlKY6VOb940cLn5jHb77MHAKCt9veS5+auMyZaZ+42b+6e';
		$output .= 'eZCMHmkAfTS0lO/pxlo4ooF57Lo17qDGA9JvIZr50OYd0+6XUse0mOg1LR+HzZEGALCtNveh+0+9';
		$output .= 'LsV7nfJ7uXuMpagHXygjp9v7O3qkAfSh1YttQX0Dyf9BhWgtHNu23iNNLzIAAG3t2suY4ottep3R';
		$output .= 'sp/v7wjSAOi1YXpqr7O5apxXCLZ7EBCinXLsDIXfM1WPrBbnEouDzw4AgK23v09ta6buMRYK/96S';
		$output .= '+tKGZhWCNIA+pG60tNQwiRXUl14FtOC2+7NRIVqJY1go+L4pe6TFlerrqXX47AAA0P7O2d4++pSq';
		$output .= 'gW0NBcoMfyBIA+CUxkysrKxz7sNW3fS8cUK06k6YlavNbQMAoM12fOkQLEW7NxYsB5xEkAbQX+Mp';
		$output .= 'xevWkLNXnQuW0PMBMMYpPBOitSXlHGlDw+s69XPbRQUAgAZPYQquP1awnlPbsq7psJbd/R1BGkAf';
		$output .= 'QuLXDSutDyjQAOzqDFSIluI4fsyxPNVJbMo50px8AwBA/vOG1L+nRxq1293fEaQBcIqoPNDIWU8I';
		$output .= 'u043bQrRLuzhk46bSyc0P/VEPBR6r55Pvn3uAQA0eHqmCqAJv841L0gD6MNaQzvW1vgLDe0LKGnX';
		$output .= '5YEvxm8GIVrLn1t6pJ3+ueYiDABAf+3kku3JNbcndNBep2MhhF/nmhekATR0/J75XFi4jjUaUXPH';
		$output .= '2+5hDjhY0667s8sYX483r+3aJJ8tYUPvW8MFgzXWAwBAG23FFG3k0GA9mC+N2tw8fCBIA9hWgyw2';
		$output .= 'VPZeew/AGn7s6iAX49QL7Ru7NdlxN670vvhMAQDQxqv3PCF3+z10Wnf0YffwgSANoB0pArIaGhw5';
		$output .= 'e8wZ2hEOu+nmQBjj2XA3LxptC4leU+vnQ6r3M7wlAAA1tNdDovVon9KKnx8+EKQBtNuIWdKg6b2R';
		$output .= 'ohEGh910tC1TiHZmlzpeZ1hXbZ8hqYe/9O1dAID628JL26Qhcxljhm2Fml0/fCBIA9iW3A2r3hu0';
		$output .= '0KJdCGHXxT9njG/Hmwu7dNVjX6pjZI0BUaiszuPMdcRGtx8AYKtKz20fFqw/FC5X6fMaePqPM4Tr';
		$output .= 'h48FaQDU1ug5Zd0pfseFRHpz3cNG7OdF+4fd2dyx/JQT3NLhXqys3n0eAQCw2ilYgbZyCz3z2Kbr';
		$output .= 'j38gSAOg54YeMAw/Nv+PfTcv2nd2ZVdKz5HW4meWzzQAgO21A3OES7W2+4Ve1OoP11EEaQD9CYlf';
		$output .= 'B7TtQwfbMPVEO7cru/rsSNkjrdWhHVP2SIuF9gkAAPW32eeuZ+2QKzayTrbnD9dRBGkA/Sk9FFZN';
		$output .= 'jUXhIHzU+Ash3DZ9QIvxcrz5wq7s6rMjDGl7pMVO69xFAACAPuUIsOIT7ciPn4sz2puxw7qFOaZ5';
		$output .= '5m8+/qEgDWBbou2DTfm+6X9oQzqWPHaGgsfQ6Hg96yT/mC+RmG8NAKCt9veS59Zsq4YC76H9Sg0O';
		$output .= 'juojSAPoo6GVopFSQ8Ms5frCE+8TE9brxxeENfaovgHYkGlIxzO7sdixuLbjV+mhHWvbvrhCXQIA';
		$output .= 'kLfN/Vz7NSR+r1N+r5YRIp66huMaDKl9e+iHgjQAWK+RCjk1PaxjjPFiMKRjseoudAKc69ja67Az';
		$output .= 'PlsAAPprc6/ddj6mjLnn4V3yxTltZHK6OTSs40SQBqBB1ms9pP7G0tzeblCL942X/yu7sLjSx7NW';
		$output .= 'e2TFBrcfAIB6pBraMecoPzWfR0Auj15HEaQB9EGjpWxD18VNajdNjnvd7D9bjK/Hm0u7scrPkFDw';
		$output .= 'fUPCMoWV6qvE9gMA0E/7e802YCy8rbWWmW2aRvR5dHoMQRoAtTREQkNlhdq9a/bgE+M0J5reaP0f';
		$output .= '80uXq8X5xqLPOACATTj1esjH7UZfBIbjXT01PYYgDaAPqRtGLc1L4xv78Hu3Y+PvquHyT/OindmN';
		$output .= 'VHx8D8oCAEBCp15byTViQsi8bSFDmWGpJ6fHEKQBtKPGrv+hoToCjb82/M0u7Pok/5h1+fZs2f0B';
		$output .= 'AMD6bbhYUbniivWgPUxJU2+03VMvEKQB9NHQQh3BZJob7W2z/8B3c6Od241Vq3GOtF7rMQzmUQMA';
		$output .= '2FpbsLfRD1rZVrZrGs7x2ekxBGkAfYiJXzestL6UDbSwUuNMmMea3jVe/n/YhWzkeBpnvsZnCgAA';
		$output .= 'pzhl/rUUc63V2vsO7r1/rjfaRJAG0EfjJyRYR6kG2ZIJcGPC94Fe3bQ8N1qM8XLQG22tzxZzkWX4';
		$output .= 'k/anBQDAgrZiinZkjp5kYcU6gVym3mhfz3mhIA1AY63W8sWVtk/jjVZ92Xj59UZb77gbKy4bAABs';
		$output .= 'SS1fJisxX1qocLvZljchhNs5LxSkAVBTozBUXj6o1ddj4++61cLHGC/Gm0u7kYzH49Bw2ZP9q/mT';
		$output .= 'AgDorp2ba50leqRpn7Km6xDCh7kvFqQBALRtN7Q/N9rf7cbVrTXXZk0n4DXO+xlmlDkmWhcAAG21';
		$output .= 'X49pVwK/mXqhvTnmFwRpANsSGl038LjZQxFUeQYZ4/l489puXP2zYa25Np/88yhcplDwNan3XUxQ';
		$output .= 'lz7HAQAqOEUq0H5cUo6o/ujIlyGE3TG/IEgDIFUDJXVjpdQFPRcOadm7lod03NMbrR21Hi9joteU';
		$output .= 'fq+Y8L1Com1z4QEAYN12dai0jEuHelyyPae0S13j4TkfQghXx/6SIA2AXI0/IK9pPO+3LW9AjPFs';
		$output .= '0Butil2R+HWlP2NK9hILhcsdC22Xz3UAAJ5qh+booRa0SSnsZjhySMd7gjQAWqARBb+3G5dXHWzH';
		$output .= '63E5szudnC98PuV7pVxPyp5dobJ9AgBA3jbX0ueWtDFL9IwrsT3as8zxr3nRlk6NIUgDAGiv8feq';
		$output .= '5XnRHvib3dnEyXyuE9Nw4vMp36v0tqV6v7mh3dyedL64AgCQX8jw3FNTb8RH2o8lAr1QUd2ybVOI';
		$output .= 'drP0lwVpANvS+zdzwgp1EjXaaKnxV83BKMbz8ebC7mzq2JkyaEl5rGy191fJz3ffzAUAaKftVkO7';
		$output .= '9qk50Uq0m11bIaXpOsqHU1YgSAPYVkMrFPqd2tbd6jZA8sZfRV7bnU74SfIZNCfgDPYvAEBVbbic';
		$output .= 'bbJYuI0XC24PHOtdCOHq1JUI0gD6kHNIrpixrKXKrdFFD96kaPxVxLCO7X6W2H4AAMgjdW+ytXuP';
		$output .= 'zX3/mHn9bNNVCOFtihUJ0gD6aEyFBOtoqVG4pOFVigux5NBViBZjnIZ0PLdb69klw/xhG3s+xoVG';
		$output .= '9x0AANpwqcOmmKjMMUH5S5ST/kwh2ptUKxOkAfRnrVCthyEgay8r29RbT7TJ53ZrlZ8bccbrWj3G';
		$output .= 'xYrrfavbDwBAujZd7uEVS7d5Y+H3oy9fpgzRJn9SpwDdNZhyDpeYYn05G3Bhxv3U5XFxklxux+XV';
		$output .= '2Pi77nDbPrN7q/x8CQWPaSnfZ065S24bAAA81zbN+XspQqhwxHvnCL1CpnMH+pfly8iCNABKNwRr';
		$output .= '+HZQrHx9sBvuQrSb3jYsxng23lzaxdUdv+OMY1npY2fKL2jEguVeY9+leh0AANtVuhdYivapHmjc';
		$output .= 'y/plZEM7ArRj7jd11gq0Yid1uWRdGm6kNDX6XvQYou1d2sXVnjCXPpaFytbjZB0AgDXUMuVEyFwu';
		$output .= '7W9yma6fvMg5oo8gDaAdJYd2jCttx6nriyfWCazt3djwezkutx1vo2Ed6ztpP+bE1PG0vzYEAADa';
		$output .= 'aofKseT6Uiy8bdq5fB1CmEK0Xc43MbQjAIeERsu6ZI40qMHU4HvVcS+0hy7t7upO2ueefN6Hbk5W';
		$output .= '+/57AABgm226WnukwSHTF5Cn+dA+lHgzPdIA+pB7wtk1yrqkgVhDjzQXITnWu6HvoRx/++e4mx/t';
		$output .= 'wi7f3Ak5p9V5LLj/XCwBAGhfqjnL4oL3E8ZRwtW4fFoqRJvokQbAVhuIWykP9boely830gvtnhCN';
		$output .= 'rUgZOp7aCzAMehMCAPTaVnzY5stZRu1IarAb7nqhXZd+Yz3SANoREq9jrcAnxRjbW2sQ01/D79V+';
		$output .= 'LrSbjW37pd0PPpcAADYuR6+tWGkZtUVJ4X4Yx0/XCNEmeqQBtCMmaJi0Gk5BD3bj8m5s9F1tuA4+';
		$output .= '82eQzRTKTicU/9zf/9fPxr+3W1UDAABVa+FaTS3XnVzL2pbpfPb9uHy99rmtIA2gHWHhc0tel7MB';
		$output .= 's0ZZDbfImqZQ4/3GA7R7hnbMc1JxNf597VQHAAA0oYWhHZeu/+ORkEJj20kdpvPbqr6ILEgD6E/o';
		$output .= '9L1qa6TCU6aAY5r09v0Gh288/E8Y49l4c6Ymkv19fSmcBQCA7jy8znLMtYzWe7KlfD9hW7umc9xv';
		$output .= '1xq+8SmCNID+pBgCstXGVg1zwLFdU7gxNfa+F3AcpDdaGtPf2CtDNgIAQPdCotcuuVYSn3ncQ51R';
		$output .= 'h+lLyN9PtzWf5wrSADTCeiqrOeAo7X5eqh/HBt8H1fGkc1Vwsmloi7eqAQAAmpbj2kzqL1WHDGUu';
		$output .= '0cNOj7T6/XodZbpt5UuigjQAtt4YNV43c9zuG3u7cfl5ul/jUAOVO1cFJ3mjpyMAAHQhZnguLHxu';
		$output .= '7nstDbZKjxzkmkw9Hl5H+edwF57dtDq6iiANoJ1G1v88aBA8vD30s6XPpVxX7WUoua20azc28naq';
		$output .= 'IYm/qILFhGgAANCYsQ0fR/873v2/+x8Nj19D+Ph+WPA7Oe63+h6s57bHueIFaQCNNL72dw1XCLTq';
		$output .= 'XBUsciVEAwCANu2v57iWA437RBUAAFDAmSo42m5cvlQNAAAAsB7dHAEAyG4a00QtHO2lufgAAABg';
		$output .= 'XXqkAQBAfa6FaAAAALA+QRoAAFnFGC/VwtHeqQIAAABYnyANAADqstMbDQAAAOogSAMAgLp8qwoA';
		$output .= 'AACgDoI0AACoy7UqAAAAgDoI0gAAyO1CFRzlRhUAAABAHQRpAADkdqYK5gsh3KoFAAAAqIMgDQAA';
		$output .= '6nGtCgAAAKAegjQAAAAAAAA4QJAGAAAAAAAABwjSAAAAAAAA4ABBGgAAAAAAABwgSAMAAAAAAIAD';
		$output .= 'BGkAAAAAAABwgCANAAAAAAAADhCkAQAAAAAAwAGCNAAAAAAAADhAkAYAAAAAAAAHCNIAAAAAAADg';
		$output .= 'AEEaAAAAAAAAHCBIAwAAAAAAgAMEaQAAAAAAAHCAIA0AAAAAAAAOEKQBAAAAAADAAYI0AAAAAAAA';
		$output .= 'OECQBgAAAAAAAAcI0gAAAAAAAOAAQRoAAAAAAAAcIEgDAAAAAACAAwRpAAAAAAAAcIAgDQAAAAAA';
		$output .= 'AA4QpAEAAAAAAMABgjQAAAAAAAA4QJAGAAAAAAAABwjSAAAAAAAA4ABBGgAAAAAAABwgSAMAAAAA';
		$output .= 'AIADBGkAAAAAAABwgCANAAAAAAAADhCkAQAAAAAAwAGCNAAAAAAAADhAkAYAAAAAAAAHCNIAAAAA';
		$output .= 'AADgAEEaAAAAAAAAHCBIAwAAAAAAgAMEaQAAAAAAAHCAIA0AAAAAAAAOEKQBAAAAAADAAYI0AAAA';
		$output .= 'AAAAOECQBgBAbreqYLYfVQEAAADUQ5AGAEBuN6oAAAAAaJEgDQCA3PRIm2+nCgAAAKAegjQAALIK';
		$output .= 'IeiRNt9OFQAAAEA9gioAACC3GONP482FmnimcT5SCwAAAFAPPdIAAChBrzR1BAAAAM0RpAEAUMKP';
		$output .= 'quBZgjQAAACojCANAIASrlXBs75XBQAAAFAXczAAAFBEjPGX8eZcTTzqzyGEW9UAAAAA9dAjDQCA';
		$output .= 'Uj6ogsfrRogGAAAA9RGkAQBQyntV8CjDOgIAAECFDO0IAEAxMcYfxptLNfE7tyGEP6sGAAAAqI8e';
		$output .= 'aQAAlPStKvgDPfUAAACgUnqkAQBQVIzxl/HmXE386tMQwk41AAAAQH30SAMAoLR3quBXV0I0AAAA';
		$output .= 'qJceaQAAFKdX2r/cDne90W79RQAAAECd9EgDAGANb1TB8F6IBgAAAHXTIw0AgFXEGL8bbz7f6Obf';
		$output .= 'hBBe+CsAAACAugnSAABYRYzxbLyZhng82+Dmvwgh3PgrAAAAgLoZ2hEAgFXshzXc4hCP74RoAAAA';
		$output .= '0AY90gAAWFWM8avx5ouNbO51COGlvQ4AAABtEKQBALC6jcyXNvVCe7nviQcAAAA0QJAGAMDq9vOl';
		$output .= '/TAuF51u4hSevTSkIwAAALRFkAYAQBU6DtOEaAAAANAoQRoAANXoMEwTogEAAEDDPlEFAADUYj9/';
		$output .= '2Mvhbj6x1t3PiSZEAwAAgEYJ0gAAqMoUpo3Li/HuVcObcT0I0QAAAAAAAMglxvh6XP4rtuWtPQcA';
		$output .= 'AAAAAEB2McbzcfmhgQDtl3G5tMcAAAAAAAAoKsb4RcW9096Oy5m9BAAAAAAAwCqmsGofWtUSqH0z';
		$output .= '9ZizZwAAAAAAAKhCBYGaAA0AAAAAAIC6xRhfj8t3BcKzn/bDSxrCEQAAADYiqAIAAHqwD7g+H5fP';
		$output .= 'xuVyXM5PXOXtuFyPy4/j8iGEsFPLAAAAsC2CNAAAurQfenFaLsflP8bl4plf2Y3LP8flZrofQrhR';
		$output .= 'iwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAADQn6AKANoWYzwbby4++vEuhLBTOwAAAAAAywnSABoRY7wcb6blL+Nyvr8/';
		$output .= 'x/W43I7Lz9P9EMK12gQAAAAAAKBZU0+zcfliXL6L6f2wX/e5mgYAAAAAAKAJMcbPM4VnT4Vqr9U8';
		$output .= 'AAAAAAAAVZrCrHH5Ja5neu+3+znXAAAAAAAAYF0VBGgf+69p2Ed7BgAAAAAAgFXEGC/2wyrW6qdx';
		$output .= 'ubSnAAAAAAAAKGY/hGIrvrLHAAAAAIAtCqoAoJz9/GPfjctlY0W/GZdXIYSdvQgAAAAAbIUgDaCQ';
		$output .= 'aSjH4S5EO290E26HuzDt2t4EAAAAALbgE1UAkN9+rrEfhnZDtMnUm26a0+21PQoAAAAAbIEgDSCz';
		$output .= 'ffA0hWhnnWzSN8I0AAAAAGALDO0IkNE+cPqm0817E0K4spcBAAAAgF4J0gAy6TxEuzfNmfbB3gYA';
		$output .= 'AAAAeiRIA8ggxvjFePPVBjb1dlxehhBu7HUAAAAAoDeCNIDEYoxTL7TXG9rk3bi8CCHc2vsAAAAA';
		$output .= 'QE8EaQCJxBjPxpsfxuVig5v/IYTwyl8BAAAAANCTT1QBwOlijJfjzS/DNkO0yef74SwBAAAAALqh';
		$output .= 'RxrAiWKMb8ebf6iJf82X9qkhHgEAAACAXuiRBrBQjPFiXH4ahGj3pqEtv1INAAAAAEAv9EgDONJ+';
		$output .= 'LrRpGEMB2mEvQgg3qgEAAAAAaJ0gDeAIMcbPh7teV+dq41HXIYSXqgEAAAAAaJ0gDWCGGOPlcNcD';
		$output .= '7VJtzKJXGgAAAADQPHOkATxhCtDG5Yfx7rRcqpHZ/q4KAAAAAIDW6ZEG8JH9HGjTEI5TD7RzNbLY';
		$output .= 'n0MIt6oBAAAAAGiVHmkAe9P8Z+PyzXj3l3GZbs/VykleqwIAAAAAoGV6pAGbte95djkufx3ueqCd';
		$output .= 'qZWkbkIIL1QDAAAAANAqQRqwGTHGi+Gul9lnw12AdqFWsvs0hLBTDQAAAABAi/6kCsgpxjiFtQ+X';
		$output .= 'uH8qzLhd+lyq12yhjMe8piVTz7L7kOw/948v/UeuYqr3K9UAAAAAALRIkEZuYf93Ni3/Pi7/u//5';
		$output .= 'J/vl3x7cf+7xx88tWUeJx3N/1kK57x/rvcpSU++/K9UAAAAAALToE1VAZtF2V1um6M+TAi5VAQAA';
		$output .= 'AADQKkEaLYmF1psicApHPoZenccYz1QDAAAAANAiQRq5hczraiWQ0huMLbtQBQAAAABAiwRp1CYu';
		$output .= 'fK4mQbngd85VAQAAAADQIkEatQkLnztGzPz7epvB752rAgAAAACgRYI0apOjR1rpYKvWISgFfAAA';
		$output .= 'AAAAcARBGrUp0SMtZxkfkyPEigXKDSl8pgoAAAAAgBYJ0qhNfOJxrLSMc4RKywUAAAAAADxCkEZt';
		$output .= 'wjOPKUs4BwAAAADAZgnSqE185vFz1pifbK2wScgIAAAAAAAZCdLgdKHQ70CrblUBAAAAANAiQRq1';
		$output .= 'aTFgih2Vy1CO5PCzKgAAAAAAWiRIozbxxOfnCA1sZwmh0roBAAAAAIAqCNKoTXjicTjw/Klzqj33';
		$output .= 'nkseHypDXLnultaVYI0UdqoAAAAAAGiRII3axCOfCxneM0U4t3ZdQU12qgAAAAAAaJEgjdq00AMq';
		$output .= 'LtiGUGndCuPI/4cXwrVaAAAAAABaJEijpBJDHoZKtmtopByGbiS3G1UAAAAAALRKkEZJOXpq1TAM';
		$output .= '41pzpC2Zqw1KE6QBAAAAAM0SpJFbyjBnThAXEqw3JHiPGkIswRo1+FEVAAAAAACtEqTRm1rCohRh';
		$output .= 'HPTggyoAAAAAAFolSCO33IFRzLCOU4eLDBXWE6zhQwjhVjUAAAAAAK0SpNGSmGk9qXuPzZkjrYa5';
		$output .= '3SC371UBAAAAANAyQRqtWxJ66f0F+U090QzrCAAAAAA0TZAGZYZ2zDFnml5s1MywjgAAAABA8wRp';
		$output .= '9CZWWoYcQzvqWUfN3qkCAAAAAKB1gjRqEzOs47nHqXuLhZk/K03wRilXIYSdagAAAAAAWidIo2WP';
		$output .= 'BVbhiceHfi+e+DhF2YVc9ERvNAAAAACgC4I0ahcXPnfMa2rYrrjSOiC1r/VGAwAAAAB6IUhjbbGC';
		$output .= '9YUTH68lVFj/bNtu0BsNAAAAAOiIII21lQilYuLHtW53qLT+2Y43IYRb1QAAAAAA9EKQRsvCjJ/N';
		$output .= 'mSPtWDFBOYfEZVpSrrXWSZ+mIR2vVQMAAAAA0BNBGr2LlZYhxxxpsJabEMKXqgEAAAAA6I0gjZal';
		$output .= 'CpLWmCPNkIr0YhrK8ZVqAAAAAAB6JEhji1LMmRafeP5juYZ2zBHwwTGmEO1lCGGnKgAAAACAHgnS';
		$output .= 'KOWxkCc+87qwYJ3Pra90j7JcQzsued8cv8M23YdoN6oCAAAAAOiVII1SHgtoQiXleKpMOYZ6DCtt';
		$output .= 'G6QgRAMAAAAANkGQRkkx8TricPywjIeEDNuZolwl6rN03dA+IRoAAAAAsBmCNHJ7GPacGsocGpZx';
		$output .= 'y/OEHVsXa4SK9EWIBgAAAABsiiCN3tQy11iO4SEN3ciahGgAAAAAwOYI0mhdjiESP35cSy8tvcVY';
		$output .= 'y24QogEAAAAAG/QnVUBDcvXIKjE8ZIk50yCHKTybQrRbVQEAAAAAbI0eaeQWCq9/yfvFAtu85bnc';
		$output .= 'aNf1IEQDAAAAADZMkEZvSgz1mEOotFxs11UIQYgGAAAAAGyaoR2pzRrhUDjy8ZJtSDG0o15tlPIm';
		$output .= 'hHClGgAAAACArROksQWle3KFmT8rTfDGc3bj8iqEcKMqAAAAAAAM7Ujb5s5F9lxPrnji4xRlF3Kx';
		$output .= 'tutxeSFEAwAAAAD4jSCN2sWFzx3zmhq2K660Dph8bT40AAAAAIA/MrQja4sVrC+c+HgterFxqik4';
		$output .= '+9J8aAAAAAAAhwnSWFuJMChmfpxiu0MjdUk/piEc3xjKEQAAAADgcYZ2pGWp5khbQ45wLhYoJ324';
		$output .= 'GpeXQjQAAAAAgKfpkUbLWp4jrdT2w0PTUI5TL7QPqgIAAAAA4Hl6pME6cgzlGCotJ3WYwrNPhWgA';
		$output .= 'AAAAAPPpkcYWxcLrmxNGhUrrRq+39umFBgAAAACwkB5plPJYUBSfeV1YsM7n1lc6tIozfpZjjjQh';
		$output .= 'GFN49kKIBgAAAACwjB5plPJYqFNDqBUSP57DkInktBvueqFdqwoAAAAAgOX0SKMlH4dPcXi+F9ac';
		$output .= 'Xlmpe3KlKtep9RMWvGeJedfIZxrG8V0I4VMhGgAAAADA6fRIoyVzepOVet/n1Fou+jUN3/hlCGGn';
		$output .= 'KgAAAAAA0hCkUZse5vkKM39WQ7lo381wF6BdqwoAAAAAgLQM7Uhv1ugJVkvYFxtZJ2nshrt50F4I';
		$output .= '0QAAAAAA8tAjjVJC4te1uG2lt1MI1qfdcDcP2pWqAAAAAADIS5BGbvGj22OFR+4Pj6w3R3gUnnk8';
		$output .= 'FCjDofWGIx/XOtcb8+wGARoAAAAAQFGCNFqSK6A6NihbUtYe5n5jHbtBgAYAAAAAsApBGrmFStf1';
		$output .= 'UI7QS08uTnU9Lu9DCB9UBQAAAADAOgRptORQoJUjsAoF3iNXfdC223GZgrOpB9pOdQAAAAAArEuQ';
		$output .= 'Rm1ihWUwLCO57cbl/bhchRBuVQcAAAAAQB0EadQmdFDGkGm7wgbqdkvue599b/hGAAAAAIA6CdLg';
		$output .= 'eHqkcYr78OxKVQAAAAAA1E2QRm16HUYxdvIeLHM9Lt+OywdDNwIAAAAAtEOQRm3CM4972a5aCN/y';
		$output .= 'mMKy63H5froNIexUCQAAAABAewRp1KbXHmkfC5WUwbxp6VwPvwVnN6oDAAAAAKB9gjRqc2qPtDmv';
		$output .= 'TxHOxRPXV0NAGBspZ62ux+XHcbkJIXxQHQAAAAAA/RGkUZtWeqSFlX+fsq7HZepl9vNwF5zpcQYA';
		$output .= 'AAAAsAGCNGpTYo60GkKs2Mh7bCnw2+2XKST77+EuPLsVmgEAAAAAbJcgjdrEIx+3KlSyjmP3R2uu';
		$output .= 'H9zfjcs/Dz0XQrj2rwcAAAAAAAAAAAAAAAAAAAAAAAAs8/8CDADGXG2VBvLEswAAAABJRU5ErkJg';
		$output .= 'gg==" transform="matrix(0.24 0 0 0.24 30.4964 26.5027)">';
		$output .= '</image>';
	}else{
		$output .= '<image overflow="visible" width="524" height="152" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgwAAACYCAYAAACI7rFzAAAACXBIWXMAAAsSAAALEgHS3X78AAAA';
		$output .= 'GXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAH/JJREFUeNrsnXuMJMddx6t6du/h';
		$output .= 'xM5GgSggSDaWjMQfkTcgFKGAsvcPCM6PPb84X2LuLhEokgHfESOCknC+KMaK5HBrQRAJiNtzkrPP';
		$output .= 'Pvv2nDMokcAb4b8QkjcSgYCTeJ2gKAIRrx/33JkuftVd1V3d0z2Pfd3M7OeT/Fw9PT1zO93Vv/7W';
		$output .= 'r35VpRQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAQozkFKTOHnr1eimvEjNi7';
		$output .= 'xJbctuX8/Ozu73OWYNj48wcXpoxWE+ndridbUWKmFTdbzZXLV1ZWLl2RciXZbqalfW33ryTbvpT3';
		$output .= 'mv69ZH9Sus9faTav2PdXWlK+uPQ9w5nfmtxz5rFJeapMJtWtYZSO1LRsLootn9i9b4EzhGAYNmHw';
		$output .= 'Fil+WeyXxK534mBM7KKzljPr9Jpu+4rYJbFvif2P2HfEvi0i4jJVCAaJv3jgH6dMpGdirT8gQmHa';
		$output .= 'aK2Mv8tluyUWN7Rqxk154l8+Lw9+scvnk+3mZb/9hux/w73vysL7YpfkmMvynny+eeWCe/8NEQwX';
		$output .= 'RTDEXInRZ9/cE1MiCqbEe37Alsm2rWuRq26pYAhZFpsTOyriYZkziGAYVJFgW1i3iH1I7H3u4X/B';
		$output .= 'CYTzgViwAmClJBiagWC4FHzWlv/tRMTLIh7OU50689DDz1v3scNFcna6MtwOy6r3645tO0bHZluj';
		$output .= 'FStvYy2jwtcN93os2C6/P1Z7fPGYVbBww/P37lqv8/rXn/z6hAgDKxKOiFiYjK0okDOdioVawXDZ';
		$output .= 'CYPz6YM/eeBfqBIMyb5EFOTHrvj9rhTRkAgKBMNos/evTk+KIJjRY2Z/IhLGxE02nDgQS8SCTk1H';
		$output .= 'dl/l11ixcFBEw/wm+Bzrb6z/f4uza0vldTXlRHaMMdeONWM9vtJS402xlTgpx5LXsh3sHyuU+fvb';
		$output .= 'r7SUNv0H3sRPDNQzemy0hcI5Gxo7Iq5zRqqvvfixe/g3nA4OrdOFiSus5SrVL4j9vIiSF6X8LxEO';
		$output .= 'l3Ara2IDwtm69mtN1Ts6Pd5szh+3Jv7mT752KDbqiPy1E8lfbZyzlv+ZLk0E7f+f/7jkdLj92rv+';
		$output .= '5HuMse/24vLojhhB7nr46Wk9JvUsNtPa1gh34xgT1jTd6+W3fvPM/mdPWtEwtwmNYl3jDMyqGs26';
		$output .= '+y2gzWjeDiMpGGb+8NyEXKdjYgdKD30VCIRGUAaBtLZnSVi5QrEQmo1CvMPeCCIcfiDlj0Q4XMTN';
		$output .= 'rEog6HX4jtK3mI63re7zph4EF3D8/r+fiiN9XJ7jU9Y5aZ3+imTbpMLBPvJNnU80nc5W9l9T93O9';
		$output .= '0tDZR91DhLSokeKOz8zbroZjUp+mlShTHTtP6cWCCcVD31f/mIiGRRENiwPYCDGrd0ihDh+t+yEa';
		$output .= 'ObFw/7lDco1eEjtQcoM6EAaNiiiD7nB1Q/EQigRrK87867eKXS/C4a24m01xAFXXTfeqQYbxdv7S';
		$output .= '4XMHImNeiLxYCKzwu0zFyckbg87VG6PyoIQOWmCmox8MpVgajHCfNyiGEeC2Tz0zcfuRs8elefSC';
		$output .= 'CIPppJmUNJmk4jgreEWzqkezjTQc2yR/ERdqvyrU9T7cg+74gCiK55ELMIyOYNjz8a9O7Pnjrx7X';
		$output .= '2hxzFbHqSkelCENDFbsjdIfKFkYXwu1mybyAuE5Ew0+IjeF+VoXu8p7utXVg29664z+g1/nP2zhO';
		$output .= '/sEzx6RVd9y27FKRYFt9Ji2VK02mAzo5LPcDdNaTUXEa85iBbtMdpnTYCLrHrYn40ulEKMT6gI0i';
		$output .= 'FMRCWSS4TqzkDlvd1Z/e/+zJqU3wJdGab1rdVvN78AejdUuMhGC47RPPTOnIPOejCkkfm658rPg9';
		$output .= '5QhDXYUyqntXhN9eKVnTfd+bRTRsww31HT0wfRxn6t6tbSpXNI569Rn6KjmCU/eeFaGgDvloQiRC';
		$output .= 'IYpzkZBVe5MLpe5/aqYJsn4bnaet6ewIk/dRdPGViIYhZub+c8fE0z0nNpl7Ph9VKDadfKTBrOZG';
		$output .= 'Kv2zV8HHmC5Peq1Uqc6b4O5oO9goXbidVKDHR4ehb/3e/qdnZ6TC2tDZhPYB0agiAJVeeu8EyxGG';
		$output .= 'RocoQ1k0VEUTwtfhth9tsV1Eg5qf3X0Fl7QuTffueQ+F5L5y5NG03ez9qpk1stTvB05/9Myh2JgD';
		$output .= 'UTD+wI6ESISDq532ma5dDddGV6d0VSc9FsSXUUFcIfR4psZtmizMoMlhGFKhcPjchFy6NO8rTkfY';
		$output .= '2IaXSStTmrugU5HgPWGWvxBXyPf+qsGNV8nH9CRz6vWwro9CjChDHWG4/dNnD8gvOCMVe6LUtCpG';
		$output .= 'GarDU5ETTFVdE+UaUo4wrNRYWTiEmnwH3ROrFghr+ozpkvTY73tm1X92xsv9HHzmd56aEed8zEcT';
		$output .= 'fGQhtKx7wucyBFGHDj/MdI6/KFPordDtikAXR1kQYBhGsWCHnRv1XCIWXDKjjyBk0YSWLrwuCIWy';
		$output .= 'aOifiU2KKFTlPnXqS9CdvY6pDFkUJcma7oelQasrQ/sAu+PBeVHC5riJgpZUlLYWk4rtREN735qx';
		$output .= 'R8WBUKhKfqyqaD66EIqGKxWi4Yo7LryNGm5/C/fU8/O62xNZ93KcVj6bz9S81z1ZYgNiDQu9HvjM';
		$output .= 'h5+cMFLPfc1NW3/tXi1KWoPWyZsswqBNKcCmVDnpMdyVnU9j5FuMDUCbmnEPxisN45IetUt6NKqP';
		$output .= 'sXUwIGJBqX8SmwqvmvWhmf9UrgGWNX9K3ROlnAY9XJffVPgTU6sKam99vY7uoX8/gWDowJ2fPXNA';
		$output .= 'KmziRG3Cl2noXCh40aB0e3jMFCIrDff7x1R9/oJS9bkL4aROlwPxEIoKPwgpOWZ+djeOtP8b2azq';
		$output .= '/UIOQ7c5GPp7xq0x6L58w/P39uwIIiOi2LbA4rwvwHZF2KhCUtPtVHqJNHWCQaeTJWjXQ2DLdFPX';
		$output .= '/gxdPo9aR9qLgKKgqO7gMMas29mBzeaLYu9xg3F1lWhI1KH1rS3nzfzwyirR0FY9erqvFjfhd5ZH';
		$output .= 'AJkO/iQ8VpseHEBbvlAwWdoaOItgWCN3Pfz0lLinY5ko8KIh0qXogosl+H3FalHOYwijDOVKFIqE';
		$output .= 'qkhC+Nrv87eRdu8hFnp//ppVfM50P3S1nRLrziO9HvgPv31qWtr6M4kO1ulzWdt6buxMjjrQs+nA';
		$output .= '+Eww2NkcdS4a+lU7Ovd0uiC3beQhG6xZfRKNMdTz4YkuPCTFbzifZS91oyAaEpEaRBjsZktneWJ2';
		$output .= 'JkdVOWqi7z/lmxvsX6IOd0C3O8KsypFl8mPVt8OSNCzmB63ODJVguGv2advSOiMCYcILhPTa6Cyq';
		$output .= 'kEcX3PjwytG2SfJjGGXwoqHuIRSXRMPlkki4HAiHViAW7PYlxMKaIgndPlebqZI/8UyXL9q0KLqd';
		$output .= 'Ene2ZwcUmyPKiwUngE2savpS4yTakAqGWEXyodhPrFOR9uke+5U5O7UTN+lMRGSnV/smlEuA05oI';
		$output .= 'w5CIhV+T4kAuFrKLXBQNPqG25a54EF3Iog4N18lrVjX/gL0n5jfYv5QzLHpJeswiDX3VaN1DOKI3';
		$output .= 'jg5ivRkqwSCK9rhU18lk2wQRhpJYSErT/rpUkbUqdkuEiY+6FGGIA7EQigRrlyrEgnLbFxELfd9q';
		$output .= 'ej09hXGCwHTMYTB9NS9W043hOCythp4W3fn6vsempdJOJ3+7res6rcNZ687dA1peaKdPk2PluCQi';
		$output .= 'Eceq4daRiCNX/7WqmLhJqUxaBxM3dR5tnuUwxNls0f4b0r+QOj/YYsFOk/8Z57/stdpRvGX0WCYa';
		$output .= 'XHeEdrXET3+XrBER53kNSfss1sUWdW+t60c2cSGqbhO+Vd3YxSdGTxM3rRm71swcgmEN7P38U9NS';
		$output .= '/2a0axr5Smx0McGxVjxEeXeFc5ORizKEeQxVSY9hdCEcIXG5FGloqmJvHmJhbQKh1/dNt3+kbuIm';
		$output .= '08cfuQ7M9eMEImP2h09zP97RCgJbq230QCVRttgNoYzS6pk8siNpEVrhIO9FjbqREmEOQyoQTHk6';
		$output .= '3MIAy24zaiIUhodPOF/3hkoXbfN+brwkGiIfK03uIB9daNmIg0pDX77aSX0z1ovGOlhkqWuVWBCx';
		$output .= '8MAm+Rqteh+yrSvreDZwqOofqOv66/uWsOJpz6BWnKEQDHu/cHrCjohI8290lolrVF45K8WCqUh+';
		$output .= 'LD5mopoIQygWwuTGMMExtHDOBWsXEAt9qf2q/b0mPVYfY3pT/j4C0X/SY1+X14qFg315uNjM6KC9';
		$output .= '7qdVML63za4EaBuBmVjwuQyt7IcluQxRLOLDygpTI5vaT0meBZRKhWDiJtNhSOmIToY7ctGF96h0';
		$output .= 'wbyLqn2o+I4g2qAy0eAjDa2gn6+VN7GSHDLbKItNXoO6V4PFTXowalU/8q1Tw6R94qaOrQhTmDk2';
		$output .= 'V959NTmsWNjVaxQSwVB3xbU5ZJftTSYLifLuhXSojx/LFYgFXRoSZIIuChMOs0yiDFYobHPqOqqo';
		$output .= 'WHEgDMIlri+68jJiYV2Fw7pP3NStpbPBve6z4gAO9/OBhTu/PGWMmQiFgg4FQ5Cik86yFyddE0np';
		$output .= 'hlMmXRGtdCnrVhwkp0WF362rB02Gp1ib3kIyxt9qMOCawUUWVlx0wUdPd6jK9EU9nkUaLK2gW0Kn';
		$output .= 'S1tbIZFEGGLtxIOqn/8jfSg+skmRhao2g655z6yfNwvmP+n9hrAC6qD4isVBrjwDLxju/rsnreO8';
		$output .= 'L1GvWuVK1m0ns5Dp4sxkHaMPpiAafB7DuLNGSTSUJ2q6VDIvFmLEwppaAGv5jO7xLl6vaEGvLDkH';
		$output .= 'sND3jzNmxj/0falcd0TStezquc9r0Mm4eJMmOkZu/gWfsiOvm43I3QvhG9Xnpn3FQaNLCqNTI8uQ';
		$output .= '8zjQ0YUbpHinEwxh5HSHKg4Vb7l9293VHveRBtPKu/KTOXCatsllUtEQO9HQ/pBccELhGzbatok5';
		$output .= 'C2Elj1X36aDLn9F9Oyjdt3dLBJRrWCwPeh0aeMGgIzMjl24i8URuOlLjmltJBQ2G/RTEQlCmjrAk';
		$output .= 'FnJt+ZrYabGnxP5NHvg/DG4wq8B/SuxnVboKpRcKF1wZTsZkxUKMW1pzhKHTrWb6UgMqn7ip83QN';
		$output .= '3d6varLUfsZmfJ9dS9KSVOUbvVgIWytZ3q7OV4lMpod2wiESZ92K0l9rkx59t4QIhrnmWOPooU9N';
		$output .= 'L1HdtjS/KXZeFYeH+1ysK6qYp1XKyRLRYEwjqX+xzlfKsYEtOw/OWCIalsTHnpBKt6Bis/jobXcP';
		$output .= 'ygOwPLQydw3dfZJp80imexijSm9XNChOqLS7cmjuy8HvkojUfcpPRKPTGcb8HOaJINBB5CEbK+wi';
		$output .= 'Di2TlVmkwc9PZ/Sy3A6PyMbs/OxNlRVbBIDtdvieMysg3iHFWyrEwnnEQs/iYMUJLl+Ol2ysZnu8';
		$output .= 'w/6q4xq6i6boZSEp3dt+e8MvrSaaUP3daXdE+34ngzMBYRKRELsIWzIEUwRDQ8RCqxH5aMXhe47d';
		$output .= 'NEvV2/LRhbdL8SaxV130wOdjjbvXoYDwr32E1SVG6m2JaPDzM+SCYdE0o8OnPrpnYQB/+orKu2Bs';
		$output .= '+X8uclJlO0plZnlwrW7xqZqkR90WTVh0vmIoxftABxA/+JVTdsW0l5IwbKlnLVx2NVubPZj/PEnQ';
		$output .= '8XOgN912U3tbENsz//BNy6u48awnvkb52XLSyAJTPsO68c+3PfqKqplfv32uZl1oxNguiTTZUVvR';
		$output .= 'sPDrX967izMK4rfeL8UvqjRfKzSf6LjTlePOv73Z2TVOaFyTP0hFNLjOXD1uDp956GYE6RZhsCMM';
		$output .= 'kZpR2UI6Kp9PJIs4qGzIZHmFtWzuc+9gm74jWM09/ZlbDq72T3KRhDfkBrQ3VoxYgA1goqPCL83A';
		$output .= 'FCaY+YmarIgYa8ZnOZXg+EnXwvYJ3j5na3uFYAjnmLnWbTfzmqe3i+N9XbXUrjMP37zIqUUwDEb4';
		$output .= 'IzL7CzkH3jl68aCD7gmtiytURsFc6C2fwaLnTn/y1oPr8beJUFih+sCG1PvKhMSqnAnddkz62ax3';
		$output .= 'DGcONrrwNrf5mhME21Q+ad0OlY/62uYiCeGU9xddpCFcjdc62un5Y7u/ydlFMAwEHzr9uO2OmNKF';
		$output .= '6UZdhMFNQ5q1tpJJbEzWJZF8xo8wzocALZ76o9sPcslh0LEJi4V5X8phBT+CIpxsoj30wIwI4LEP';
		$output .= '/FdVMefHDye/pPLuiYYTENc42+nMz2brJ6r7pDSYEAsIhoGKLkxnuQqqFGHwvQvZe8YNP9PZgijZ';
		$output .= '8qy+jPQeLjcMA41WVZK2rnldfQyjGyGsUiodHTEWRBa0yrsntqt8ePlOF1W4EEQc/Gtr/yJi4W85';
		$output .= 'pQiGAVMM6sak0MVlQ8OZG7Pxvl4gBKun2SlM7SAg3UrKucc/cscSlxuGJsLQNtVMcUraZIroLscA';
		$output .= '+Col9rpqX53XRxvGAsEQjhBoOAFhkx6vdd/xBU4ngmEQBcNUabGctAhnlvF6wRTFQjahUz75zVEu';
		$output .= 'NQxnhKHq1uiuC4gwgGXm0LP2oe+7EvwKvSrYHquIOIT2JhdZsAmTL87P7v42ZxXBMIiCYbJtGZCy';
		$output .= 'twxFRCAgwkmd5b3FL+/dS3QBhkcwxMGUHuV7oK5Hom5hdtjy1Umlcy6UF2DSQaQhCo71QsGvs+NH';
		$output .= 'UVj7T04ngmFQmew4a07d6ubKJYMZV/2NYmgZDBVRy3Rccjut6rrrMQAqnyytPJWQrhARUQcBYaMP';
		$output .= '3+d0IhiGE91lX+5LGVoGwxthqKnipjRjrelya8CW9vGtLtXJV6EoEBDh66T7Yn5292VOJ5VpMPVA';
		$output .= 'VOpm6DCPd6Wr1NlCYctcZhgqwdBilnFYN/xKusEMNdla6GHzKtSZscrXkdBuG7EAbQtyDAT7nz05';
		$output .= 'pe2iOm7x6cTKryvNFCwaSw1gqG5Ks34GW5v52d02f8GObrCTNtm5GF6RfbYR9Upgy87C16+WjnmN';
		$output .= 'swmDGmFYWsfvoksCALayaDC97AuiDZ1eAxGGwWI910u/CmuvA6yVBcQyACAY+hDGA/IdAJvNeozs';
		$output .= 'Wbzh+XsRywCwJQTD2QH5DoDNZk6tPVn3EU4jAGwJwXBi9z7rNNcSUl103wEwVLjIwFoe+AvyHdR9';
		$output .= 'lSRQT4hNcyYA1s6gz8NgV5d8Tmyiz88tu88CDKtoeODFX/n8u2TzwCrq/pZeaE0Egj1nt4rNBPv8';
		$output .= 'ubHdlCekMbFALQPoDz0EN/9Un6LBOoVd4hBI+IKhR0TD8T5Eg63ze0RsLG1RoTAphT1fvUQUZsWO';
		$output .= 'khQNMEKCoU9HYFsNB8UJLHFpYYREg633RzrUf1vfT9ioxBaOKvTbsPACaxeiAWCEBEPJKewXm6q4';
		$output .= '8U8QVYARFw6TTjRMul32QWfzFbZ0vbd5ClK8pPrvukwaGeI3dlG7AEZMMAAAVAiGfrptqjhIgjRA';
		$output .= 'dyJOAQAMsViYXKNYsBzhTAIgGABgtJlZh++YdN2dAIBgAIAR5QPr9D3TnEoABAMAjC4TA/Y9ACPL';
		$output .= 'GKcAAIaecE1FXbEPABAMALCFdULcSRi0DwIz9SLiRs4mAIIBAEZWMKxxZLjJSrokALpADgMADDPf';
		$output .= '6CoIyhaXrJWU05xKAAQDAIwypkcrCAWtTCu3eCVSHzx5aoaTCYBgAIDRFAsLbaIhFAYmEAihSGim';
		$output .= 'kYV0Wyslr82Kvo8TCoBgAIDRFAxLmTAwuUgwJhAISal810MmEhJbcZa+nr77C6enOakA1bCWBGwK';
		$output .= '+589acO9t6p04TA/q96iyhcOW+AswWq456nHXhGBMBGIiDCZMREP5QhEts9v27KZCIwl1VTvPXXf';
		$output .= '7axgCVCCURKw0ULBioPjqn2FURWIhwNynBUMh1lxFPoOMsR6TopDmUiwD3+lK/IYdDqs0kchYi8a';
		$output .= '0giEjTyolpoU4XBM9h7kzAIUoUsCNlIsHJDihRqxUGZa7DkXiQDonVidKCQyxjrrfsjyFFp5t0TW';
		$output .= 'VeG7JJoq76JI7cAdD84f58QCFKFLAjaEe84+dkBH5rjuX5LaUPAuIg3QDx88eeolKSZ9NKGtGyKM';
		$output .= 'KBgXTXD5DNnrUFykiZBzUh5++s9uWVP3xMyhZ8elsHZxfnY380/C0EKXBKyv43781IQeM8dVbGaS';
		$output .= 'sLANDvcnGmxftG3dvZezCX1EGeblv4fahYLOZoPMuyBcNCIuCYc8j8GLhwNi0zMfO3dw/nM3LaxC';
		$output .= 'KDSkuNY1zGx8Y6fYBS4WEGGALc3dX3xShII6pLfF9+lxY0WDUo20humob9FgOXhi9745ziz0wr5H';
		$output .= 'n5gSMfBCZYQhSGxMhILfFwdioVUTZWhlYsIKhqPzs92FgwiFbVK8U+w6sdedXXKiwQ7ovESkARAM';
		$output .= 'sOm4VkzkrBGUoVW9F3V5P30dGa0b6cPflsl2lG7bfdG4mRaRcKPeZmZEKKiCuWNXKRrmRTDs4QpD';
		$output .= 'z6Lh+BPPiTCYzoWCEwehaGgF0QYvGgKRUBAQzXxfmlCp7ae/LfY1sX8V+5bKsyW2i71d7G0ukvBK';
		$output .= 'YK+JvSF2xR3fEsFwkSsGwwZdEsPPTuesrnH2ppJ12l9Xvjl4Xf+YN24xH3G6Opssx7hkM22jwUrr';
		$output .= 'tCGVzvnfl2gg+RH6QurYUali023dD6Y9qlCOMGQiIc7LMOfBYT/5065uvl/sx2LnnRCwEYRlJxB+';
		$output .= '7O5JazvELoutqEyuqEiEvhHRcImrBsMEoyS2RhQptF6OV6rX6FOWUOatmJEeTqpjXL8xwEbw2Efu';
		$output .= 'XBDxupBFBbL6qMKuhXaBUBYQcR6JyMWC9vKj6R7+5XUyI9cAGw/EghcM4euG+9y4iIbtXDVAMMCm';
		$output .= 'IA5Hqw6L+1Y/2rPtOqFQHr3e+ds6zdVfbqUhGmDDowzqcFj/MtEQ5zkMhX1NXeiOCN+viC6sOGsG';
		$output .= 'cji8d8IuvW3Oxp1o8MJh3L1v2ebyHQAQDLB5fnIVUYdevqOvKEMuCJwo8F0TreLXGB8iBlhnHv/o';
		$output .= 'HYu2a8L4ORji9mhDtq8V1NOsy8KJhqJY8HK4pfKuhTDCoFUxj6gRRBt2VEQZxtyx9vM7EA2AYIAN';
		$output .= 'x2Vah10NnYRAuUui7jO9dl0EYkG7fuJSZnrokOOysFDdRMMSVxhWw6nfu/0BqW+LBbHQ0hU5DKrY';
		$output .= 'FeGniG6LryXdEX6EQxxEGMpROC8a/LwL212UYXsQXRgPogwN933bEQ2AYIDNji70EyUwpfjAqv/1';
		$output .= '5AvKc/XHxbn6/QQ5xfHxHSMN81xaWHW1jPVBqXvLKugWqxUQpiQa2uukjy540VB1z+ggsjAWRBi8';
		$output .= 'bQsEhO+qiEqRBpLQAcEAG4PLYehnaGxdDoOuiUiY7t9WXthHF8VCrNvn7m9bCKjy2x/hCsNqeeLw';
		$output .= 'bYvy8N9TjiIURILRhRUuy1GwILpQjjBUdUl4i0rCYby0HQqGcEi0/b6dblZIAAQDbGiEoZt4MF32';
		$output .= '6VX/42FXQ2G7XTikwyuD6EQYBs45emL3viUuLayFJ+/fsyB162DtSAi/z3SNLsSBYGiWpEVZeFfl';
		$output .= 'MZQjDOM1ooFIAyAYYEPRFQ//bqMcug217NxNoWtiFuV5+ytad21/WbtomBOx8ACXFdZFNHx8z5zU';
		$output .= 'sYNtYsGU656uqPmF6EI4UNhb+W4I76lGRWQhLMeD6EMUfM64SEODqwcIBlg3KqaXrQqR1kUgTE3Z';
		$output .= 'LYmyXUq415UL/gT7ClPxVosGKxZYVhjWldOfmJlzOQ0uQVeVpouulchlwVAWC1X3TRhdCKMMVd0U';
		$output .= 'VVEGf8+SBAkIBrhqEYhOj/yq4/oaKZG10FTnlQLLZfCXHH30FsQCbAxPHbnVRhp2GZsIGc4bUrWy';
		$output .= 'ZfE+iUsRhpbq3CWhVXGa9bEKq4o0hIKhydTRgGCAdaXDxE11+0yX10p1H3VR/S/VdTVUJZVl7jYR';
		$output .= 'GdaB7/nSrXc/wBWFDRUNn751Qerau+3Klr5uhkK39OwvRxeaqnM8otzNV16fZbwkFKpGUthjLzFl';
		$output .= 'NCAYYCMxpahAt+iAVsV+0/4iCnXBCVNtBedczFmwDvy9X9pzN0MoYVN4+sFblp9+6JY9Uu8OV9bX';
		$output .= 'dkEdRhRaJdFQd1+FVu6eCEWC3+/nY3hVxMIVrhIMKmTjDj+9DK2sSnDslMPgX/ckImyyog7EgZYd';
		$output .= 'RrnSvU5mz5ODbFeEVmbZaH30K3f81iyXD64GZz578+zMx84tyOYxsekO0YVwlESsOk+vblT18Eof';
		$output .= 'YVhR7d0U9thXRCi8wlUBIgywYbikx166EEyX172+13u8oxxlSPfb7ge7ouC7v7IXsQBX+f753E2L';
		$output .= 'YruSURSmMLNoeXWUcsJjXHOvRB2iDGWzn/1fse8gFmCYWqcwpLgcBrsEdaflrauWuK7arvrsThWZ';
		$output .= 'hm6YxMXZMtkWF6gjU4hbZO+547JjGkm5LOUjWpvZkx++a5krB4N5P52zy1bfJzX2V51IsMtS2y6C';
		$output .= 'C2I2CfG8K71dKYmJpsqXur7sjrngXvvPvCr272LfFaHQ5KzDMEGXxPBTNflSt+medYdowqqnivbd';
		$output .= 'EO7TtsU2L9vfeOx37yRHAQY/4jB7k62n8yLE3yXlzWJ7xX6uJspQN+lZpIp5Qfb162L/IfYDEQkv';
		$output .= 'c6YBwQBXi15md6zKYSjvK79n+vgXbdRgUT6xKOXLIhwWnvj92xa5NDCcwiF5qP+lNREP10n5PrEb';
		$output .= 'xK5X6SiHn+ngO21E4btiL4l9X+yH8n0/4qwCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
		$output .= 'AABsLP8vwABgxKLPMEmU9gAAAABJRU5ErkJggg==" transform="matrix(1 0 0 1 -38 -11)">';
		$output .= '</image>';
	}

	$output .= '</g></svg>';

	if( $echo == true ){
		echo $output;
	}else{
		return $output;
	}
}
endif;

if ( ! function_exists( 'nutrient_smoothstate' ) ) :
/**
 * Adds smoothstate class to body_class
 *
 * @since Nutrient 0.9
 */
function nutrient_smoothstate($classes) {
	if( wp_script_is( 'smoothState', 'enqueued' ) ){
    $classes[] = 'smoothstate';
    return $classes;
	}
}
add_filter( 'body_class', 'nutrient_smoothstate' );

endif;

if ( ! function_exists( 'nutrient_excerpt' ) ) :
/**
 * Returns or outputs HTML with excerpt.
 *
 * Create your own nutrient_excerpt() function to override in a child theme.
 *
 * @since Nutrient 0.7
 * @todo finalize the logic for making just a single word graded
 */
function nutrient_excerpt( $echo = true ) {
	$output  = '<p class="site-excerpt animate">';
	$output .= do_shortcode(get_the_excerpt());
	$output .= '</p>';

	if ( $echo == true ){
		echo $output;
	} else {
		return $output;
	}
}
endif;

if ( ! function_exists( 'nutrient_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own nutrient_post_thumbnail() function to override in a child theme.
 *
 * @since Nutrient 1.1
 */
function nutrient_post_thumbnail($size="full") {
	global $post;
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}
	$class = 'post-thumbnail';
	
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $size );
	$thumb_url = $thumb['0'];

	switch($size){
		case 'full':
			$class .= ' show-for-large';
		break;
		case 'medium':
			$class .= ' show-for-medium-only';
		break;
		case 'thumbnail':
			$class .= ' show-for-small-only';
		break;
		default:
			$class .= ' show-for-large';
		break;
	}
	?>

	<div class="<?php echo $class; ?>" data-background-img>
		<img alt="" src="<?php echo $thumb_url ?>">
	</div><!-- .post-thumbnail -->
	<?php
}
endif;

if ( ! function_exists( 'nutrient_user_avatar' ) ) :
/**
 * Displays a users avatar, or if none, a placeholder.
 *
 * @since Nutrient 0.8
 */
function nutrient_user_avatar($ID) {
	$photo = get_user_meta( $ID, 'photo_hover', true );

	if(!$photo){
		echo '<img src="//placehold.it/400x400" class="avatar avatar-400 photo" height="400" width="400"alt="">';
	}else{
		echo '<img src="' . get_template_directory_uri() . '/img/' . $photo . '" alt="">';
	}
}
endif;


if ( ! function_exists( 'twentysixteen_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own twentysixteen_excerpt() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 * @todo make this into a nutrient function and call it post-excerpt or some such
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function twentysixteen_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<p class="<?php echo $class; ?>">
				<?php the_excerpt(); ?><em class="absolute fa fa-angle-double-right"></em>
			</p><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;

if ( ! function_exists( 'twentysixteen_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own twentysixteen_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentysixteen_excerpt_more() {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentysixteen_excerpt_more' );
endif;

/**
 * Adds support for excerpts to pages
 *
 * @since Nutrient 0.9
 */
function nutrient_excerpt_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'nutrient_excerpt_for_pages');

/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own twentysixteen_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function twentysixteen_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'twentysixteen_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'twentysixteen_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentysixteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentysixteen_categorized_blog should return false.
		return false;
	}
}

/**
 * Flushes out the transients used in twentysixteen_categorized_blog().
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'twentysixteen_categories' );
}
add_action( 'edit_category', 'twentysixteen_category_transient_flusher' );
add_action( 'save_post',     'twentysixteen_category_transient_flusher' );
