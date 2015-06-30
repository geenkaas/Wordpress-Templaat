        <div class="push"></div>
      </div><!-- End stickywrapper -->

      <footer class="footerwrapper banded">
        <div class="contentwrapper">
          <nav class="navwrapper clearfix" role="navigation">
            <?php wp_nav_menu( array('menu' => 'footermenu' )); ?>
          </nav>
          <p>
            All rights reserved <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
          </p>
        </div>
      </footer>

    </div><!-- End sitewrapper -->

    <div class="background"></div>

    <?php wp_footer(); ?>

    <!-- Load jQuery and custom plugins/scripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php bloginfo("template_url");?>/scripts/jquery-1.11.0.min.js"><\/script>')</script>
    <script src="<?php bloginfo("template_url");?>/scripts/script.js"></script>


    <!-- Twitter -->
     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    <!-- Google Analytics code -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>

  </body>
</html>