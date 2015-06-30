<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

  <?php $image = new WP_query ('showposts=1');
  if(have_posts()) : while($image->have_posts()) : $image->the_post; ?>
  
    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php  the_title_attribute(); ?>">
      <?php postimage(); ?>
    </a>

 <?php endwhile; endif; rewind_posts; ?>