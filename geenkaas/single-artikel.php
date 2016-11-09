<?php /* Template Name: Single Artikel */ ?>
<?php get_header(); ?>

  <div class="contentwrapper clearfix" role="main">
  
    <?php if ( have_posts() ) : while( have_posts() ) : the_post (); ?>

      <article id="<?php echo $post->post_parent; ?>" class="postwrapper">
        
        <?php the_content(); ?>
      
        <div class="floaters" style="color: <?php echo types_render_field('artikelkleur') ?>!important;">
        
          <div class="articlefloat topLeft">
            <?php echo types_render_field("topleft") ?>
          </div>
          <div class="articlefloat topRight">
            <?php echo types_render_field("topright") ?>
          </div>
          <div class="articlefloat bottomLeft">
            <?php echo types_render_field("bottomleft") ?>
          </div>
          <div class="articlefloat bottomRight">
            <?php echo types_render_field("bottomright") ?>
          </div>
          
        </div>

        <?php if ( current_user_can('level_10') ) { ?>
          <div class="level10">
            single-artikel.php (U bent ingelogd als admin)
          </div>
          <div class="<?php echo $post->post_parent; ?>">
            Parent (actie) ID = <?php echo $post->post_parent; ?>
          </div>
        <?php } ?>
        
      </article>
        
        <div class='shareaholic-canvas' data-app='share_buttons' data-app-id='25594564'></div>
        
              
        <div class="navigation">
          <div class="prevlink">
            <?php if(get_adjacent_post(false, '', true)) { ?>
              <?php previous_post_link(); ?> &laquo; Vorig artikel
            <?php } else { ?>
              &laquo; <a href="">Je verdient een compliment!</a> &laquo; Laatste artikel 
            <?php } ?>
          </div>

          <div class="nextlink">
            <?php if(get_adjacent_post(false, '', false)) { ?>
              Volgend artikel &raquo; <?php next_post_link(); ?>
            <?php } else { ?>
              Eerste artikel &raquo; <a href="">Schatkamer</a> &raquo;
            <?php } ?>
          </div>
        </div>

    <?php get_template_part( 'zinc_overzicht'); ?>

    <?php endwhile; endif; ?>

  </div>
        

<?php get_footer(); ?>
