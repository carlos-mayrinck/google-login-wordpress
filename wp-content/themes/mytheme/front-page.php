<?php
get_header(null, array( "pageStyle" => "home.css" ));

/**
 * Posts query
 */
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

$args = array(
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 3,
  'paged'          => $paged,
);
$query = new WP_Query($args);
?>
<section class="container">
  <?php
  if ( $query->have_posts() ):
    while ( $query->have_posts() ): $query->the_post();
  ?>
    <a href="<?php the_permalink(); ?>" class="post-info">
      <?php the_title('<h2 class="post-title">', '</h2>'); ?>
      <span class="post-resume"><?php the_excerpt(); ?></span>
      <div class="post-details">
        <time><i class="fa-solid fa-calendar"></i><?php the_date(); ?></time>
        <span><i class="fa-solid fa-user"></i><?php the_author(); ?></span>
      </div>
    </a>
    <div class="pagination-container">
      <?php previous_posts_link("Posts mais recentes"); ?>
      <?php next_posts_link("Posts mais antigos", $query->max_num_pages); ?>
    </div>
  <?php
    endwhile;
    wp_reset_postdata();
  else:
    _e( "No data found!", 'mytheme' );
  endif;
  ?>
</section>
<?php
get_footer();