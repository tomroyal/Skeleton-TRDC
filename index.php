<?php
/**
 * The main template file
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package skeletontrdc
 */

get_header(); ?>

<div class="row">
  <div class="nine columns indexpage">
<?php
if ( have_posts() ) :
  
  /* Start the Loop */
  while ( have_posts() ) : the_post();
  
    get_template_part( 'template-parts/content', get_post_format() );
  
  endwhile;
  
  the_posts_pagination( array(
    'mid_size' => 2,
    'prev_text' => __( 'Back', 'skeletontrdc' ),
    'next_text' => __( 'Next', 'skeletontrdc' ),
  ) );
  
else :

  get_template_part( 'template-parts/none', get_post_format() );

endif; ?> 
  </div>
  <div class="three columns sidebar">
    <?php 
      get_sidebar();
    ?>
  </div> 
</div><!--row-->
<?php
// get_sidebar();
// get_search_form();
get_footer();
?>