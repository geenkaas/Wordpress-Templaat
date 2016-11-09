<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Meta information -->
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="author" content="klant">
      <meta name="description" content="<?php echo dynamic_meta_description(); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title and link info -->
      <title dir="ltr"><?php wp_title('');?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?><?php if(is_home()) { echo ' | ' ; } ?><?php if(is_home()) { bloginfo('description') ; } ?></title>
      <link rel="index" title="<?php bloginfo('name'); ?>" href="<?php echo home_url( '/' ); ?>" />
      <link rel="publisher" title="Geenkaas, Slimme oplossingen, degelijke websites" href="http://www.geenkaas.nl/" />

    <!-- Pingback -->
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Facebook Open Graph -->
      <meta property="og:title" content="<?php the_title(); ?>"/>
      <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
      <meta property="og:url" content="<?php the_permalink(); ?>"/>
      <meta property="og:type" content="<?php if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>" />
      <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
      <?php
        $ogimage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        $url = $ogimage['0'];
      ?>
      <meta property="og:image" content="<?php echo $url ?>"/>

    <?php wp_head(); ?>

  </head>
  <body <?php body_class( $class ); ?>>

    <div class="sitewrapper banded">
      <div class="stickywrapper">

        <header class="headerwrapper" role="banner">
          <div class="contentwrapper">

            <div class="logowrapper clearfix">
              <a href="<?php echo home_url( '/' ); ?>" title="Terug naar de <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Homepage" rel="home">
                <p class="logo" class="blogtitle">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                </p>
                <p class="payoff" class="blogdescription">
                  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('description'); ?></a>
              </p>
              </a>
            </div>
            
            <?php if( !is_home() && !is_front_page() ) {
            
            } else {
            
            } ?>

            <nav class="navwrapper clearfix" role="navigation">
              <?php wp_nav_menu( array('menu' => 'hoofdmenu' )); ?>
            </nav>

          </div>
        </header>