<?php /* Template Name: Page Home */ ?>
<?php get_header(); ?>

  <div class="banded">
    <div class="contentwrapper" role="main">

      <?php if ( have_posts() ) : while( have_posts() ) : the_post (); ?>

        <article id="<?= $post->post_parent; ?>" class="postwrapper">

          <header>
            <h1 class="pageheader" role="heading">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Ga naar <?php the_title_attribute(); ?>">
                <?php bloginfo('name'); ?> <?php bloginfo('description'); ?>
              </a>
            </h1>
          </header>

          <?php if ( has_post_thumbnail() ) {
            the_post_thumbnail('full', array('class' => 'articleimage'));
          } ?>

          <?php the_content(); ?>
        </article>

      </div>
    </div>

    <div class="banded">
      <div class="contentwrapper">

      <h3>Social Media</h3>
      <div class="fb-like" data-href="http://www.geenkaas.nl/" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
      <a href="https://twitter.com/geenkaas" class="twitter-follow-button" data-show-count="true" data-lang="nl">Follow @geenkaas</a>

      </div>
    </div>

    <div class="banded">
      <div class="contentwrapper">

        <?php endwhile; endif; ?>

        <h3>Schouderklopjes, niets leukers dan dat</h3>
        <div class="shouderklopjes columnwrapper c3 clearfix">
          <?php $args=array(
            'post_type' => 'custom_posts',
            'posts_per_page' => 3,
            'orderby' => 'rand'
          );
          $geenposts = new WP_Query($args);
          if ($geenposts -> post_count > 0) { ?>
            <?php while ($geenposts -> have_posts()) { $geenposts -> the_post(); ?>
              <div class="column">
                <p class="serif"><em><?php the_content(); ?></em></p>
              </div>
            <?php } ?>
          <?php } wp_reset_query(); ?>
        </div>

      </div>
    </div>

<?php get_footer(); ?>
