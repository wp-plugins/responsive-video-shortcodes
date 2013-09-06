=== Plugin Name ===

Contributors:      flixos90
Plugin Name:       Responsive Video Shortcodes
Plugin URI:        http://wordpress.org/extend/plugins/responsive-video-shortcodes/
Tags:              wp, wordpress, responsive, video, embed, shortcodes, iframe, url
Author URI:        http://www.leaves-and-love.net
Author:            Felix Arntz
Donate link:       http://www.leaves-and-love.net/responsive-video-shortcodes/
Requires at least: 2.9 
Tested up to:      3.6
Stable tag:        1.16
Version:           1.16
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This tiny Plugin allows you to embed Online Video from YouTube, Vimeo and more media for a responsive Layout - they scale according to the screen size. It features shortcode and widget.

== Description ==

Responsive Video Shortcodes is a tiny Plugin that allows you to embed video files from the popular video hosting platforms in a responsive design. It is based on the Wordpress oEmbed Feature, so it supports every online service that is natively supported by Wordpress. All you need to do is use the shortcode and put a video URL in the content between the tags. Alternatively, you can use the included widget to display a (responsive) list of videos.

You can furthermore use the plugin to display even non-video media in a responsive manner, for example Flickr images, Soundcloud songs or Spotify playlists.

= Supported Aspect ratios =

* 4:3 (mainly for video)
* 16:9 (mainly for video)
* 21:9 (mainly for video)
* 3:2 (for some images)
* 3:1 (recommended to use with single audio tracks)
* 5:6 (recommended to use with audio playlists)

= Autoplay functionality =

As of Version 1.16, Vimeo and Soundcloud are the only platforms supporting autoplays using oEmbed (the WordPress way to embed media). Therefore it is currently not possible to extend the plugin to add the autoplay functionality for another provider. However, if more platforms start supporting this, it will be implemented in future versions of the plugin swell.

== Installation ==

1. Upload the entire `responsive-video` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Use the shortcode or the widget - or both.

The shortcode can use the attributes 'align', 'aspect_ratio', 'width' and 'autoplay'.

You will find a 'Responsive Video' menu in your WordPress settings. There are no settings to configure, so it contains a detailed tutorial on how to use the shortcode.

== Frequently Asked Questions ==

= What is the name of the shortcode? =

You got to use the enclosing [video] shortcode.

= How do I use the shortcode? =

You find a detailed description in the 'Responsive Video' menu in your WordPress settings.

= Why aren't my videos shown in the widget? =

Maybe you entered them the wrong way. Please give only ONE VIDEO URL per line, and DO NOT separate them by an additional character.

== Screenshots ==

1. screenshot-1.png
2. screenshot-2.png
3. screenshot-3.png

== Changelog ==

= 1.16 =
* Readme updated

= 1.15 =
* Three more Aspect-ratios (3:2, 3:1, 5:6) added
* Autoplay Functionality added for all providers supporting this
* POT File for Translations added
* German Translation added

= 1.1 =
* Widget for Responsive Video List added
* Plugin now translation-ready

= 1.0 =
* First stable version

== Upgrade Notice ==

The current version of Responsive Video Shortcodes requires WordPress 2.9 or higher. Some video hosting platforms might not be available for use if you do not have the current version of WordPress installed.

== Additional Credit ==

This plugin would not exist without the amazing articles by [Thierry Koblentz](http://alistapart.com/article/creating-intrinsic-ratios-for-video) and [Anders M. Andersen](http://amobil.se/2011/11/responsive-embeds/).
