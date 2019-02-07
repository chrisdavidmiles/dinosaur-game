<?php
/*
Plugin Name: Dinosaur Game
Description: Add the dinosaur game from Chromium to your site using the [dinosaur-game] shortcode.
Author: Chris David Miles
Version: 1.0
Author URI: https://chrisdavidmiles.com
Text Domain: dinosaur-game
*/

// Do not access this file directly.
if ( ! defined( 'ABSPATH' ) )  die; 

// A few plugin definitions.
defined( 'DINOGAME_VERSION' ) or define( 'DINOGAME_VERSION', '1.0' );
defined( 'DINOGAME_URL' ) or define( 'DINOGAME_URL', plugin_dir_url( __FILE__ ) );

// Register CSS and JS used by the game.
add_action( 'wp_enqueue_scripts', 'dinogame_js_css' );
function dinogame_js_css() {
    wp_register_script( 'dinosaur-game-logic', plugins_url( 'game-logic.min.js', __FILE__), '', DINOGAME_VERSION, true );
    wp_register_style( 'dinosaur-game-style', plugins_url( 'game-style.min.css', __FILE__), '', DINOGAME_VERSION );
}

// Define and register [dinosaur-game] shortcode.
function dinogame_register (){
    wp_enqueue_script( 'dinosaur-game-logic' );
    wp_enqueue_style( 'dinosaur-game-style' );
    include( plugin_dir_path( __FILE__ ) . 'game-audio.php');
    $dinogame_html = '
    <div id="dino-outer" class="dino-outer">
        <div class="dino-inner">
            <div class="dino-icon dino-initial-icon" alt=""></div>
            <div id="dino-game">
                <img id="dinogame-sprites-1x" style="display:none;" src="' . DINOGAME_URL . 'game-sprites-1x.png">
                <img id="dinogame-sprites-2x" style="display:none;" src="' . DINOGAME_URL . 'game-sprites-2x.png">';
                $dinogame_html .= $dinogame_audio . '
            </div>
        </div>
    </div>';
    return $dinogame_html;
}
add_shortcode( 'dinosaur-game', 'dinogame_register' );
