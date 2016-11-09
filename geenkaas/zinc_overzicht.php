<h3 class="editieheader">In deze editie</h3>

<div class="artikelwrapper">
  <?php $args=array(
    'post_type' => 'artikel',
    'orderby' => 'order',
    'order' => 'asc'
  );
  
  $customposts = new WP_Query($args);
  if ($customposts -> post_count > 0) { ?>
  
      <?php while ($customposts -> have_posts()) { $customposts -> the_post(); ?>
        
        <?php
          $bgimage = types_render_field( 'overzichtsafbeelding', array( 'width' => '500', 'height' => 'auto', 'proportional' => 'true', 'url' => 'true' ) );
          $bgoriginal = types_render_field('overzichtsafbeelding', array('output' => 'raw') );
          $kadergrootte = types_render_field('kadergrootte');
          $bgcolor = types_render_field('artikelkleur');
         ?>
         
        <div class="artikel column<?php echo $kadergrootte; ?>" style="background: <?php echo $bgcolor; ?> url(<?php echo $bgoriginal; ?>) 50% 50% no-repeat;">

			    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
  			    <div class="clicker">
  			      <h3 class="artikeltitle kaderkleur<?php echo types_render_field('kaderkleur') ?>">
                <?php $overzichtstitel = types_render_field('overzichtstitel');
                if (!$overzichtstitel) ( $overzichtstitel = the_title() ); 
                ?>
                <span><?php echo $overzichtstitel; ?></span>
              </h3>
              <div class="hoverdiv"></div>
            </div>
          </a>
        </div>
        
     <?php } ?>
  <?php } wp_reset_query(); ?>
</div>