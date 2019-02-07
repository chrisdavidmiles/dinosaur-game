# Dinosaur Game WordPress Plugin  &middot; [![GitHub license](https://img.shields.io/badge/license-GPL%202.0-blue.svg)](https://github.com/chrisdavidmiles/dino-game/blob/master/LICENSE)

Dinosaur Game plugin for WordPress based on the T-Rex Runner game in Chromium.

[Demo](https://chrisdavidmiles.com/dinosaur-game) &middot; [Download](https://github.com/chrisdavidmiles/assets/raw/dinosaur-game/dinosaur-game.zip)
<br><br>
[![Dinosaur Game WordPress Plugin](https://github.com/chrisdavidmiles/assets/blob/dinosaur-game/dino-banner-250x55px.svg)](https://chrisdavidmiles.com/dinosaur-game)
 
This plugin lets you add the dinosaur game from Chromium into your WordPress site. To use it, install the plugin, and use the `[dinosaur-game]` shortcode wherever you'd like the game to appear. 
<hr>

## FAQ
<details><summary>Can I change how the game looks?</summary><p>

Yes! The html markup of the game has classes that make it easy to apply CSS to them. If you like playing with game files, you can also swap out the spritemap with your own by editing the `game-sprites-1x.png` and `game-sprites-2x.png` files.
<br></p>
</details>
<br>
<details><summary>Can I use this on a 404 page or another template file?</summary><p>

Yes! Anywhere that you can use a shortcode, you can insert this game. Inside post/page content you can use `[dinosaur-plugin]`. In a php template file you can use: 
```php 
<?php echo do_shortcode('[dinosaur-plugin]');?>
```
</p>
</details>
<br>
<details><summary>I don't see the game showing up. What should I do?</summary><p>
<ul>
  <li>If you see an error message "The dinosaur game can only be used once per post." then that means the page is trying to show the shortcode more than once. Since the game binds to keys (up, down, and spacebar) it wouldn't work well with multiple instances of the page on a single page. So this game only works once per page/post.</li>
  <li>If you don't see an error message, and the shortcode still isn't working, check your php error log or turn on debug mode to see if another plugin or theme is interfering with this plugin.<br><br>
   Also feel free to ask a question on the <a href="https://wordpress.org/support/plugin/dinosaur-game/">WordPress.org support forum</a>.</li>
</ul>
<br></p>
</details>

## License
This plugin is free to use under the [GNU General Public License v2.0](https://github.com/chrisdavidmiles/dinosaur-game/blob/master/LICENSE).

This plugin contains code forked from the 'T-Rex runner' game in Chromium.<br>
Chromium is under Copyright 2015 by The Chromium Authors. All rights reserved.<br>
See also the [Chromium Source License](https://cs.chromium.org/chromium/src/LICENSE).
