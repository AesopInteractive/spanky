<?php
/**
  	* This provides color automation with a check for 50% brightness
  	*
  	* Pass a hex code and it will then check to see if that color is closer to white or black
  	* Mainly so if the user sets black color it returns something else other than black
  	*
  	* @author  Nick Haskins <email@nickhaskins.com>
  	* @since 1.0
  	* @param $key pass a hex color
  	*
*/
if (!function_exists('spanky_color_sync')){
	function spanky_color_sync($key = '', $lum = 2){

		//break up the color in its RGB components
		$r = hexdec(substr($key,0,2));
		$g = hexdec(substr($key,2,2));
		$b = hexdec(substr($key,4,2));

		$yiq = (($r*299)+($g*587)+($b*114))/1000;

		if ($yiq >= 128){
		    $out = spanky_darken($key, $lum);
		}else{
		    //dark color, use bright font
		    $out = spanky_lighten($key, $lum);
		}

		return $out;
	}
}
/**
  	* This provides color automation with a check for 50% brightness
  	*
  	* Pass a hex code and it will then check to see if that color is closer to white or black
  	* Mainly so if the user sets black color it returns something else other than black
  	*
  	* @author  Nick Haskins <email@nickhaskins.com>
  	* @since 1.0
  	* @param $key pass a hex color
  	*
*/
if (!function_exists('spanky_lighten')){

	function spanky_lighten($key = '',$lum = 2) {

		$col = array(hexdec(substr($key,1,2)),hexdec(substr($key,3,2)),hexdec(substr($key,5,2)));

		$lighten = array(255-(255-$col[0])/$lum,255-(255-$col[1])/$lum,255-(255-$col[2])/$lum);
		$lighten = "#".sprintf("%02X%02X%02X", $lighten[0], $lighten[1], $lighten[2]);

		return $lighten;
	}
}
if (!function_exists('spanky_darken')){

	function spanky_darken($key = '',$lum = 2) {

		$col = array(hexdec(substr($key,1,2)),hexdec(substr($key,3,2)),hexdec(substr($key,5,2)));

		$darken = array($col[0]/$lum,$col[1]/$lum,$col[2]/$lum);
		$darken = "#".sprintf("%02X%02X%02X", $darken[0], $darken[1], $darken[2]);

		return $darken;
	}
}
if (!function_exists('spanky_color_invert')){
	function spanky_color_invert( $mode = 'dark', $delta = 5 ){

		if($mode == 'light'){

			if(spanky_color_detect() == -2)
				return 2*$delta;
			elseif(spanky_color_detect() == -1)
				return 1.5*$delta;
			elseif(spanky_color_detect() == 1)
				return -1.7*$delta;
			else
				return $delta;

		}else{
			if(spanky_color_detect() == -2)
				return -(2*$delta);
			elseif(spanky_color_detect() == -1)
				return -$delta;
			else
				return $delta;
		}
	}
}
if (!function_exists('spanky_color_detect')){
	function spanky_color_detect(){

		$bgcolor = get_theme_mod('spanky_background_color');

		$hex = str_replace('#', '', $bgcolor);

		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));

		if($r + $g + $b > 750){

			// Light
		    return 1;

		}elseif($r + $g + $b < 120){

			// Really Dark
			return -2;

		}
		elseif($r + $g + $b < 300){

			// Dark
			return -1;

		}else{

			// Meh
		    return false;

		}
	}
}