<?php
   /*
   Plugin Name: Load Prism Syntax Highlight On-Demand
   Plugin URI: https://odd-one-out.serek.eu/prism-wordpress-without-plugin/
   Description: A simple plugin to load Prism Syntax Highlight on-demand. The plugin looks for "<code class="language-" tags in the post and loads the needed JS / CSS only when needed. The JS and CSS is generated from http://prismjs.com. Replace the prism.css and prism.js with you own.
   Version: 1.0
   Author: Poul Serek
   Author URI: https://odd-one-out.serek.eu
   License: GPL2
   */

function add_prism() {
        wp_register_style('prismCSS', plugin_dir_url( __FILE__ ) . 'assets/prism.css');
        wp_register_script('prismJS', plugin_dir_url( __FILE__ ) . 'assets/prism.js');

        global $post;
        $post_contents = '';
        if ( is_singular() ) {
                $post_contents = $post->post_content;
        }

        if ( strpos( $post_contents, '<code class="language-' ) !== false ) {
                wp_enqueue_style('prismCSS');
                wp_enqueue_script('prismJS');
        }
}
add_action('wp_enqueue_scripts', 'add_prism');

?>
