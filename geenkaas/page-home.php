<?php /* Template Name: Page Home */ ?>
<?php get_header(); ?>

  <div class="contentwrapper clearfix" role="main">

    <?php if ( have_posts() ) : while( have_posts() ) : the_post (); ?>

      <article id="<?php echo $post->post_parent; ?>" class="postwrapper">

        <header>
          <h1 class="pageheader">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Ga naar <?php the_title_attribute(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
        </header>

        <?php if ( has_post_thumbnail() ) {
          the_post_thumbnail('full', array('class' => 'articleimage'));
        } ?>

        <?php the_content(); ?>
        
        <div class="customSocialShare">
        <!-- see http://stackoverflow.com/questions/12448134/social-share-links-with-custom-icons -->
        
          <a class="" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> - <?php echo get_permalink(); ?>">
            Twitter
          </a>
          
          <a class="" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>">
            Facebook
          </a>
          
          <a class="" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>">
            Google+
          </a>
        
        </div>

      </article>

    <?php endwhile; endif; ?>

    <?php if ( current_user_can('level_10') ) { ?>
      <div class="level10">
        page-home.php (U bent ingelogd als admin)
      </div>
    <?php } ?>

  </div>

<?php get_footer(); ?>
