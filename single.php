<?php
// Skeleton TRDC
// single post

get_header(); ?>

<div class="row">
  <div class="nine columns singlepost">

    <?php 

    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

      //the_post_navigation();
      
      if ( comments_open() || get_comments_number() ) :
        comments_template();
      endif;

    endwhile; // End of the loop.

    ?>

  </div>
  <div class="three columns sidebar">
    <?php 
      get_sidebar();
    ?>
  </div>  
</div>
<?php

get_footer();