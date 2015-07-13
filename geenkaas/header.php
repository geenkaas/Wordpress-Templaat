<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <!-- Meta information -->
      <meta charset="<?php bloginfo('charset'); ?>">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="author" content="Geenkaas.nl">
      <meta name="description" content="<?php echo dynamic_meta_description(); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title and link info -->
      <title dir="ltr"><?php wp_title('');?><?php if(wp_title('', false)) { echo ' | '; } ?><?php bloginfo('name'); ?><?php if(is_home()) { echo ' | ' ; } ?><?php if(is_home()) { bloginfo('description') ; } ?></title>
      <link rel="index" title="<?php bloginfo('name'); ?>" href="<?php echo home_url( '/' ); ?>" />
      <link rel="publisher" title="Geenkaas, Slimme oplossingen, degelijke websites" href="http://www.geenkaas.nl/" />

    <!-- Stylesheets -->
      <link rel="stylesheet" href="<?php bloginfo("stylesheet_url");?>" />
      <link href='http://fonts.googleapis.com/css?family=Droid+Sans:700%7cPT+Serif:400,700' rel='stylesheet' type='text/css'>

    <!-- Pingback -->
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Facebook Open Graph -->
      <meta property="og:title" content="<?php the_title(); ?>"/>
      <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
      <meta property="og:url" content="<?php the_permalink(); ?>"/>
      <meta property="og:type" content="<?php if (is_single() || is_page()) { echo "article"; } else { echo "website";} ?>" />
      <meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>

    <?php wp_head(); ?>

  </head>
  <body <?php if(function_exists('body_class')) body_class(ICL_LANGUAGE_CODE); ?>>

    <div class="sitewrapper">
      <div class="stickywrapper">

        <header class="headerwrapper banded" role="banner">
          <div class="contentwrapper">

            <div class="logowrapper clearfix">
              <a href="<?php echo home_url( '/' ); ?>" title="Terug naar de <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> Homepage" rel="home">
                <p class="logo" class="blogtitle">
                  <?php bloginfo('name'); ?>
                  <span class="shield">NL</span></p>
                <p class="payoff" class="blogdescription"><?php bloginfo('description'); ?></p>
              </a>
            </div>

          </div>
        </header>