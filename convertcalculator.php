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



  function convertcalculator_hook_javascript() {
    wp_enqueue_script( "convertcalculator-script", "https://app.convertcalculator.co/embed.js", array(), "1.0.0", true);
  }

  add_action( 'wp_enqueue_scripts', 'convertcalculator_hook_javascript' );

  function convertcalculator_add_calculator($calculator_id) {
    echo embed_calculator(array('id' => $calculator_id));
  }

  function convertcalculator_embed_calculator( $atts ){
    if (!isset($atts['id'])) {
      return '<div>You need to add an "id" to the "convertcalculator" shortcode. You can find the calculator id in the <a href="https://app.convertcalculator.co">editor</a>.';
    }

    return '<div class="calculator" data-calc-id="' . $atts[id] .'"></div>';
  }

  add_shortcode( 'convertcalculator', 'convertcalculator_embed_calculator' );
?>