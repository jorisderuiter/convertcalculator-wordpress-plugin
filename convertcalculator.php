<?php
/**
 * Plugin Name: ConvertCalculator
 * Plugin URI: https://www.convertcalculator.co/platforms/wordpress
 * Description: Easily embed ConvertCalculator calculators' on your WordPress website
 * Version: 1.0.0
 * Author: ConvertCalculator
 * Author URI: http://www.convertcalculator.co
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 function hook_javascript() {
    echo '<script type="text/javascript" async src="https://app.convertcalculator.co/embed.js"></script>';
  }

  add_action('wp_head', 'hook_javascript');



 function wp_add_calculator($calculator_id) {
   echo embed_calculator(array('id' => $calculator_id));
 }

 function embed_calculator( $atts ){
   if (!isset($atts['id'])) {
     return '<div>You need to add an "id" to the "convertcalculator" shortcode. You can find the calculator id in the <a href="https://app.convertcalculator.co">editor</a>.';
   }

   return '<div class="calculator" data-calc-id="' . $atts[id] .'"></div>';
 }

 add_shortcode( 'convertcalculator', 'embed_calculator' );
