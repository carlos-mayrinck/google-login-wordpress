<?php
/**
 * Template Name: Project Description
 * Template Post Type: page
 */
get_header();
if ( have_posts() ):
  while ( have_posts() ): the_post();
    the_content();
  endwhile;
else:
  _e( "No data found!", 'mytheme' );
endif;
get_footer();