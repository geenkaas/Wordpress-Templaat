        <div class="push"></div>
      </div><!-- End stickywrapper -->

      <footer class="footerwrapper banded">
        <div class="contentwrapper">
          <nav class="navwrapper clearfix" role="navigation">
            <?php wp_nav_menu( array('menu' => 'footermenu' )); ?>
          </nav>
          <?php
            $page = get_page_by_title( 'Footer' );
            $post_id = $page;
            $queried_post = get_post($post_id);
            $title = $queried_post -> post_title;
            echo '<h4>' . $title . '</h4>';
            echo $queried_post -> post_content;
          ?>
          <p>
            All rights reserved <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
          </p>
        </div>
      </footer>

    </div><!-- End sitewrapper -->

    <?php if (has_post_thumbnail( $post->ID ) ) { ?>
      <?php $featimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false, 'single-post-thumbnail' ); ?>
      <div class="background imgreplace" data-bgurl="<?php echo $featimage[0]; ?>"><div class="bggradient"></div></div>
    <?php } ?>

    <div class="popup">
      <div class="poppedimg"></div>
      <div class="controls clearfix">
        <div class="control previous">Vorige</div>
        <div class="control next">Volgende</div>
      </div>
    </div>

    <?php wp_footer(); ?>

    <!-- Load jQuery and custom plugins/scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/scripts/script.js"></script>
    
    <!-- Twitter widgets: https://dev.twitter.com/web/intents -->
    <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>

    <!-- Google fontloader -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js"></script>
    <script>
     WebFont.load({
        google: {
          families: ['Gudea%7COpen+Sans:400,400italic,600']
        }
      });
    </script>

    <!-- Google Analytics code -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-53221116-5','auto');ga('send','pageview');
    </script>

  </body>
</html>