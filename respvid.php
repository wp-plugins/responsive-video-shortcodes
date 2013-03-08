<?php
/**
 * @package Responsive Video Shortcodes
 * @version 1.0
 */
/*
Plugin Name: Responsive Video Shortcodes
Plugin URI: http://wordpress.org/extend/plugins/responsive-video-shortcodes/
Description: This tiny Plugin allows you to embed Online Video from YouTube, Vimeo and more for a responsive Layout - they scale according to the screen size.
Author: Felix Arntz
Version: 1.0
Author URI: http://www.leaves-and-love.net/
*/

function resp_scripts_init()
{
	wp_register_style( 'resp-video-style', plugin_dir_url( __FILE__ ) . 'respvid.css' );
    wp_enqueue_style( 'resp-video-style' );
}  
add_action('wp_enqueue_scripts', 'resp_scripts_init');

function resp_options_page()
{
	echo '<div class="wrap">' . "\n";
	echo '<h2><a href="http://www.leaves-and-love.net/responsive-video-shortcodes/" target="_blank">Responsive Video Shortcodes</a> - Settings</h2>' . "\n";
	echo '<p><strong>You\'re lucky!</strong><br />This plugin does not require any settings. However, you find a short tutorial on this page to see how the shortcode works.</p>' . "\n";
	echo '<p>This plugin supports all the video hosting platforms that Wordpress natively supports. You can find a list of these in the <a href="http://codex.wordpress.org/Embeds" target="_blank">Wordpress Codex</a>.</p>' . "\n";
	echo '<h3>Shortcode usage</h3>' . "\n";
	echo '<p style="margin-left: 20px;">Example: <code>[video align="right" aspect_ratio="16:9" width="90"]http://www.youtube.com/watch?v=xxxxxxxxxxx[/video]</code></p>' . "\n";
	echo '<p>This shortcode allows you to embed video from video hosting platforms in a responsive way. It can be used for any platform that the <a href="http://codex.wordpress.org/Embeds" target="_blank">Wordpress oEmbed Feature</a> supports.<br />';
	echo 'All you need to do is insert the video URL as the content between, the shortcode will then handle the responsive embedding.</p>' . "\n";
	echo '<h3>Parameters</h3>' . "\n";
	echo '<p>The shortcode uses the following three parameters:</p>' . "\n";
	echo '<ul>' . "\n";
	echo '<li style="margin-left:20px;"><strong>align</strong><br />The alignment of the video; if you use &quot;left&quot; or &quot;right&quot;, it will be a float layout.<br /><em>Possible values:</em> left, center, right<br /><em>Default:</em> center</li>' . "\n";
	echo '<li style="margin-left:20px;"><strong>aspect_ratio</strong><br />The aspect ratio of the video; be careful: not all video services support the 21:9 ratio.<br /><em>Possible values:</em> 4:3, 16:9, 21:9<br /><em>Default:</em> 16:9</li>' . "\n";
	echo '<li style="margin-left:20px;"><strong>width</strong><br />The width of the video in percent; please only write the number, NOT the % sign.<br /><em>Possible values:</em> every full number between 1 and 100<br /><em>Default:</em> 100</li>' . "\n";
	echo '</ul>' . "\n";
	echo '<p><em>Note:</em> All parameters are optional. If they are not given, the default values are used.</p>' . "\n";
	echo '</div>' . "\n";
}

function resp_menu()
{
	add_options_page( 'Responsive Video', 'Responsive Video', 'publish_posts', 'resp-video-menu', 'resp_options_page' );
}
add_action( 'admin_menu', 'resp_menu' );

function resp_embed_video( $atts , $content = null )
{
	// Attributes
	extract( shortcode_atts(
		array(
			'align' => 'center',
			'aspect_ratio' => '16:9',
			'width' => '100',
		), $atts )
	);
	
	$embed = resp_validate_attributes( $align, $aspect_ratio, $width );

	$embed['aspect-ratio'] = str_replace( ':', '-', $embed['aspect-ratio'] );
	
	$regex = "/ (width|height)=\"[0-9\%]*\"/";
	
	$code = resp_before_video( $embed['align'], $embed['aspect-ratio'], $embed['width'] );
	$code .= preg_replace( $regex, '', wp_oembed_get( $content, array( 'width' => '100%', 'height' => '100%' ) ) );
	$code .= resp_after_video();
	return $code;
}
add_shortcode( 'video', 'resp_embed_video' );

function resp_before_video( $align, $aspect, $width )
{
	$code = '<div class="resp-video-' . $align . '" style="width: ' . $width . '%;">';
	$code .= '<div class="resp-video-wrapper size-' . $aspect . '">';
	return $code;
}

function resp_after_video()
{
	$code = '</div>';
	$code .= '</div>';
	return $code;
}

/**
 * 
 * Validates the attributes for the shortcodes.
 * @param String $align the alignment of the video. Possible values are "left", "right" and "center" (default)
 * @param String $aspect_ratio the aspect ratio of the video. Possible values are "4:3", "21:9" and "16:9" (default)
 * @param int $width the width of the video in %. Must be greater than 0 and lower than 101. Default value is 100.
 * @return array $atts contains the validated attributes
 */
function resp_validate_attributes( $align, $aspect_ratio, $width )
{
	$atts = null;
	if( $align != 'left' && $align != 'center' && $align != 'right' )
	{
		$atts['align'] = 'center';
	}
	else
	{
		$atts['align'] = $align;
	}
	if( $aspect_ratio != '4:3' && $aspect_ratio != '16:9' && $aspect_ratio != '21:9' )
	{
		$atts['aspect-ratio'] = '16:9';
	}
	else
	{
		$atts['aspect-ratio'] = $aspect_ratio;
	}
	$width = intval($width);
	if( $width < 1 || $width > 100 )
	{
		$atts['width'] = 100;
	}
	else
	{
		$atts['width'] = $width;
	}
	return $atts;
}

?>
