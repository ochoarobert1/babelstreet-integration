<?php
/**
 * Plugin Name:       BabelStreet Integration
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 */


 if (!class_exists('BabelStreet')) {
     /**
      * BabelStreet
      */
     class BabelStreet
     {
         /**
          * Method __construct
          *
          * @return void
          */
         public function __construct()
         {
             add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
             add_shortcode('babelstreet-shortcode', array($this, 'babelstreet_shortcode'));
         }

         public function enqueue_scripts()
         {
             wp_enqueue_script('babelstreet-js', plugins_url('js/babelstreet-integration.js', __FILE__), ['jquery'], null, true);
             wp_enqueue_style('babelstreet-css', plugins_url('css/babelstreet-integration.css', __FILE__), [], null, 'all');
         }

         public function babelstreet_connection()
         {
         }
         
         /**
          * Method babelstreet_shortcode
          *
          * @param $atts $atts [explicite description]
          * @param $content $content [explicite description]
          *
          * @return void
          */
         public function babelstreet_shortcode($atts, $content = null)
         {
             $atts = array();
             ob_start(); ?>
<section class="babelstreet-main-content">
    <aside class="babelstreet-channel-selector">
            
    </aside>
    <div class="babelstreet-channel-content">

    </div>
</section>
<?php
             $content = ob_get_clean();
             return $content;
         }
     }

     new BabelStreet;
 }
