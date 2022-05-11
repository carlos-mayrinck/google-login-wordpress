<?php
/**
 * Main Functions of the website
 * Styles and scripts should be loaded here, its better for caching and loading
 */

/**
 * Adding funcionalities to the theme
 */
function mytheme_adding_theme_supports() {
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_adding_theme_supports');

/**
 * Enqueuing scripts and styles
 */
function mytheme_enqueue_scripts() {
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), '1,0,0', 'all');
  wp_enqueue_script( 'google-login', 'https://accounts.google.com/gsi/client', array(), '1.0.0', true );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');

/**
 * Disable the emoji's
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

  // Remove from TinyMCE
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter out the tinemce emoji plugin
 */
function disable_emojis_tinymce( $plugins ) {
  if( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

/**
 * Reading time snippet
 */
function mytheme_reading_time($post_id) {
  $content = get_post_field( 'post_content', $post_id );
  $word_count = str_word_count( strip_tags($content) );
  $reading_time = ceil( $word_count / 150 );
  $total_reading_time = $reading_time . " min";
  return $total_reading_time;
}

/**
 * Custom excerpt length
 */
function mytheme_excerpt_lenght($length) {
  return 17;
}
add_action('excerpt_length', 'mytheme_excerpt_lenght', 999);
?>