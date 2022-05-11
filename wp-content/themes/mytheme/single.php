<?php

require_once 'vendor/autoload.php';

use App\Session\User as UserSession;

$isUserLoggedIn = UserSession::isUserLoggedIn();

get_header(null, array( "pageStyle" => "post.css" ));

?>
<section>
  <?php
    if(have_posts()):
      while(have_posts()): the_post();
  ?>
  <div class="thumbnail-container">
    <?php the_post_thumbnail('full'); ?>
  </div>
  <div class="post-container">
    <!-- Post Title -->
    <?php the_title('<h2 class="post-title">', '</h2>'); ?>

    <!-- Post Details -->
    <div class="post-details">
      <time><i class="fa-solid fa-calendar"></i><?php the_date(); ?></time>
      <span><i class="fa-solid fa-user"></i><?php the_author(); ?></span>
      <span><i class="fa-solid fa-clock"></i><?php echo mytheme_reading_time(get_the_ID()); ?></span>
    </div>

    <?php
        $isUserLoggedIn ?
        get_template_part('components/post', 'content') :
        get_template_part('components/post', 'preview');

        endwhile;
      wp_reset_postdata();
      endif;
    ?>
  </div>
</section>
<?php
get_footer();