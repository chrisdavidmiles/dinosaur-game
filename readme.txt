=== Dinosaur Game ===
Contributors: chrisdavidmiles
Tags: dinosaur, game, chrome, chromium, shortcode
Donate link: https://chrisdavidmiles.com/donate
Requires at least: 3.3
Tested up to: 5.0.3
Requires PHP: 5.2.4
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Add the dinosaur game from Chromium to your site using the [dinosaur-game] shortcode.

== Description ==
This plugin lets you add the dinosaur game from Chromium into your WordPress site. To use it, install the plugin, and use the [dinosaur-game] shortcode wherever you'd like the game to appear.

== How to play ==
The object of the game is to run as far as possible. Enemies and obstacles will block your path. Use the space bar or up key on your keyboard to jump over them. The down key lets you crouch. On mobile, tab on the game area to jump. Jump to start playing.

== Frequently Asked Questions ==
= Can I change how the game looks? =

Yes! The HTML markup of the game has classes that make it easy to apply CSS to them. If you like playing with game files, you can also swap out the spritemap with your own by editing the game-sprites-1x.png and game-sprites-2x.png files. 

= Can I use this on a 404 page or another template file? =

Yes! In fact, you can put this game anywhere on your site that you can put a shortcode. Inside post/page content you can use [dinosaur-plugin]. In a PHP template file you can use:
`&amp;lt;?php echo do_shortcode('[dinosaur-plugin]');?&amp;gt;`

= I don't see the game showing up. What should I do? =

* If you see the message "The dinosaur game can only be used once per post." then that means the page is trying to show the shortcode more than once. Since the game binds to keys (up, down, and spacebar) it wouldn't work well with multiple instances of the game on a single page. So this game only runs once per page or post.
* If you don't see an error message, and the shortcode still isn't working, check your PHP error log or turn on debug mode to see if another plugin or theme is interfering with this plugin.

Also feel free to ask a question on the [WordPress.org support forum](https://wordpress.org/support/plugin/dinosaur-game/).

== Screenshots ==
1. A demo of the dinosaur game in a post.
2. The dinosaur game works on all screen sizes.

== License ==
This plugin is free to use and modify under the [GNU General Public License v2.0](https://www.gnu.org/licenses/gpl-2.0.html).

This plugin contains code forked from the 'T-Rex runner' game in Chromium.
Chromium is under Copyright 2015 by The Chromium Authors. All rights reserved.
See also the [Chromium Source License](https://cs.chromium.org/chromium/src/LICENSE).
