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

 function wp_add_calculator($calculator_id) {
	 echo embed_calculator(array('id' => $calculator_id));
 }

 function embed_calculator( $atts ){
	 if (!isset($atts['id'])) {
		 return '<div>You need to add an "id" to the "convertcalculator" shortcode. You can find the calculator id in the <a href="https://app.convertcalculator.co">editor</a>.';
	 }

	 return '<div class="calculator" data-calc-id="' . $atts[id] .'"></div>
<script type="text/javascript" id="convertcalculator-embedder-' . $atts[id] .'" class="convertcalculator-async-script-loader">
  (function() {
    function async_load(){
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.async = true;
      var url = "https://app.convertcalculator.co/embed.js";
      s.src = url + ( url.indexOf("?") >= 0 ? "&" : "?") + "ref=" + encodeURIComponent(window.location.href);
      var embedder = document.getElementById("convertcalculator-embedder-' . $atts[id] .'");
      embedder.parentNode.insertBefore(s, embedder);
    }
    if (window.attachEvent)
      window.attachEvent("onload", async_load);
    else
      window.addEventListener("load", async_load, false);
  })();
</script>';
 }

 add_shortcode( 'convertcalculator', 'embed_calculator' );
