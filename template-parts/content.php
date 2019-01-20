<?php

// Skeleton TRDC
// List content template

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
  
  <div class="entry-content">
		<?php
		if ( is_home () || is_category() || is_archive() ) {
			the_excerpt('');
			$the_perma = esc_url(get_permalink());
			echo('<p><a href="'.$the_perma.'">Read More</p>');
		}
		else {
			the_content( 'Read more ...' );
		};				

		?>
	</div><!-- .entry-content -->
</article>	
  
<?php  

?>