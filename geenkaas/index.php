<?php get_header(); ?>

  <div class="contentwrapper clearfix" role="main">

    <?php if ( have_posts() ) : while( have_posts() ) : the_post (); ?>

      <article id="<?= $post->post_parent; ?>" class="postwrapper">

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

      </article>

    <?php endwhile; endif; ?>

    <?php if ( current_user_can('level_10') ) { ?>
      <div class="level10">
        index.php (U bent ingelogd als admin)
      </div>
      <div class="<?php echo $post->post_parent; ?>">
        Parent (actie) ID = <?= $post->post_parent; ?>
      </div>
    <?php } ?>

  </div>

<?php get_footer(); ?>
