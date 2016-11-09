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
        
        <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
         <?php wp_list_comments( $args ); ?>

 <?php wp_link_pages( $args ); ?>

 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <?php comments_template( $file, $separate_comments ); ?>
 <?php comment_form(); ?>


      </article>

    <?php endwhile; endif; ?>

    <?php if ( current_user_can('level_10') ) { ?>
      <div class="level10">
        single.php (U bent ingelogd als admin)
      </div>
      <div class="<?php echo $post->post_parent; ?>">
        Parent (actie) ID = <?php echo $post->post_parent; ?>
      </div>
    <?php } ?>

  </div>

<?php get_footer(); ?>
