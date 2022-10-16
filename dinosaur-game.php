<?php
/**
 * Plugin Name: Dinosaur Game
 * Plugin URI: https://chrisdavidmiles.com/dinosaur-game
 * Description: Add the dinosaur game from Google Chrome to your site using the [dinosaur-game] shortcode.
 * Version: 1.0.7
 * Author: Chris David Miles
 * Author URI: https://chrisdavidmiles.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) )  die; 


/**
 * First, a few definitions for the shortcode markup, logic, and spritemaps and such.
 * If needed, these can be overridden by specifying them in wp-config.php or in another plugin.
 * This allows for custom game files.
 * Therefore, names of these constants should not often change, as they may be in use elsewhere.
 */

// Version (to be changed any time sprites, js, css, or plugin version changes.
defined( 'DINOGAME_VER' ) or define( 'DINOGAME_VER', '1.0.7' );

// URL of directory where plugin assets are found.
defined( 'DINOGAME_URL' ) or define( 'DINOGAME_URL', plugin_dir_url( __FILE__ ) );

// URL of JS file used for game logic.
defined( 'DINOGAME_JS' ) or define( 'DINOGAME_JS', plugins_url( 'game-logic.min.js', __FILE__) );

// URL of CSS file used for game style.
defined( 'DINOGAME_CSS' ) or define( 'DINOGAME_CSS', plugins_url( 'game-style.min.css', __FILE__) );

// Spritemap (img) classes added for compatibility.
defined( 'DINOGAME_SMC' ) or define( 'DINOGAME_SMC', 'a3-notlazy disable-lazyload no-lazy no-lazyload skip-lazy' );

// Spritemap (img) attributes added for compatibility.
defined( 'DINOGAME_SMA' ) or define( 'DINOGAME_SMA', 'data-lazy-src data-crazy-lazy="exclude" data-no-lazy data-no-lazy="1"' );

// 1x Spritemap filename.
defined( 'DINOGAME_S1X' ) or define( 'DINOGAME_S1X', 'game-sprites-1x.png' );

// 2x Spritemap filename.
defined( 'DINOGAME_S2X' ) or define( 'DINOGAME_S2X', 'game-sprites-2x.png' );

// Allows duplicate check to be turned off as some caching plugins don't work well with duplicate check).
defined( 'DINOGAME_DUPLICATE_CHECK' ) or define( 'DINOGAME_DUPLICATE_CHECK', true );


/**
 * Register CSS and JS used by the game.
 */

add_action( 'wp_enqueue_scripts', 'dinogame_js_css' );
function dinogame_js_css() {
    wp_register_script( 'dinosaur-game-logic', DINOGAME_JS, array('jquery'), DINOGAME_VER, true );
    wp_register_style( 'dinosaur-game-style', DINOGAME_CSS, '', DINOGAME_VER );
}


/**
 * Define and register [dinosaur-game] shortcode.
 */

add_shortcode( 'dinosaur-game', 'dinogame_register_shortcode' );
function dinogame_register_shortcode (){
    if ( DINOGAME_DUPLICATE_CHECK ) {
        static $dinogame_run = false;
        if ( $dinogame_run ) {
            return '<p>The dinosaur game can only be used once per page.</p>';
        }
    } 
    $dinogame_run = true;
    wp_enqueue_script( 'dinosaur-game-logic' );
    wp_enqueue_style( 'dinosaur-game-style' );
    include_once( plugin_dir_path( __FILE__ ) . 'game-audio.php');
    $dinogame_html          = '
    <div id="dino-outer" class="dino-outer">
        <div class="dino-inner">
            <div class="dino-icon dino-initial-icon" alt=""></div>
            <div id="dino-game">
                <img id="dinogame-sprites-1x" style="display:none;" class="' . DINOGAME_SMC . '" src="' . DINOGAME_URL . DINOGAME_S1X . '" ' . DINOGAME_SMA . '>
                <img id="dinogame-sprites-2x" style="display:none;" class="' . DINOGAME_SMC . '" src="' . DINOGAME_URL . DINOGAME_S2X . '" ' . DINOGAME_SMA . '>';
                $dinogame_html .= $dinogame_audio . '
            </div>
        </div>
    </div>';
    return $dinogame_html;
}


/**
 * Skip Jetpack Photon CDN for game sprite png files.
 */

add_filter( 'jetpack_photon_skip_image', 'dinogame_skip_photon', 10, 3 );
function dinogame_skip_photon( $val, $src, $tag ) {
    if ( strpos($src, DINOGAME_URL) !== false ) {
        return true;
    }
    return $val;
}

