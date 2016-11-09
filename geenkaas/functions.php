<?php

  define('parameters', 'parameters');
  define('auto', 'auto');
  define('test', 'test');

  function geenkaas_setup() {
    load_theme_textdomain( 'geenkaas', get_template_directory() . '/languages' );
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1024, auto, true );
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
      'primary' => __( 'hoofdmenu', 'geenkaas' ),
      'footer' => __( 'footermenu', 'geenkaas' ),
    ) );
    if ( ! isset( $content_width ) ) $content_width = 1024;
  }
  add_action( 'after_setup_theme', 'geenkaas_setup' );

  //  Remove the generator tag
  remove_action('wp_head', 'wp_generator');

  //  Remove admin bar
  add_action( 'show_admin_bar', '__return_false' );

    // unregister all default WP Widgets
  function unregister_default_wp_widgets() {
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Text');
    unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
  }
  add_action('widgets_init', 'unregister_default_wp_widgets', 1);


  function geenkaas_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style( 'geenkaas-style', get_stylesheet_uri() );
  }
  add_action( 'wp_enqueue_scripts', 'geenkaas_scripts' );

  /** Disable the emoji's */
  function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  }
  add_action( 'init', 'disable_emojis' );

  /** Filter function used to remove the tinymce emoji plugin.
   * @param    array  $plugins
   * @return   array  Difference betwen the two arrays
   */
  function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }

  // Add featured image to Facebook OG Meta data
  function insert_image_src_rel_in_head() {
    global $post;
    if ( !is_singular()) //if it is not a post or a page
      return;
    if(!has_post_thumbnail( $post->ID )) { //the post does not have featured image, use a default image
      $default_image="http://example.com/image.jpg"; //replace this with a default image on your server or an image in your media library
      echo '<meta property="og:image" content="' . $default_image . '"/>';
    }
    else{
      $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
      echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "
  ";
  }
  add_action( 'wp_head', 'insert_image_src_rel_in_head', 5 );

  // Add other metadata OG
  add_filter('language_attributes', 'add_og_xml_ns');
  function add_og_xml_ns($content) {
    return ' xmlns:og="http://ogp.me/ns#" ' . $content;
  }

  add_filter('language_attributes', 'add_fb_xml_ns');
  function add_fb_xml_ns($content) {
    return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
  }

  // Remove inline css styles from Gallery output
  add_filter( 'use_default_gallery_style', '__return_false' );

  // De-register jQuery and css styles from Contact Form 7
  add_filter( 'wpcf7_load_js', '__return_false' );
  add_filter( 'wpcf7_load_css', '__return_false' );

  //  Custom per page meta description from content:
  function dynamic_meta_description() {
    $rawcontent = get_the_content();
    if(empty($rawcontent)) {
      $rawcontent = htmlentities(bloginfo('description'));
    } else {
      $rawcontent = apply_filters('the_content_rss', strip_tags($rawcontent));
      $rawcontent = preg_replace('/\[.+\]/','', $rawcontent);
      $chars = array("", "\n", "\r", "chr(13)",  "\t", "\0", "\x0B");
      $rawcontent = htmlentities(str_replace($chars, " ", $rawcontent));
    }
    if (strlen($rawcontent) < 155) {
      echo $rawcontent;
    } else {
      $desc = substr($rawcontent,0,155);
      return $desc;
    }
  }


  // Create basic sidebar
  function theme_slug_widgets_init() {
    register_sidebar( array(
 'name' => __( 'Main Sidebar', 'geenkaas' ),
 'id' => 'sidebar-1',
 'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'geenkaas' ),
 'before_widget' => '<li id="%1$s" class="widget %2$s">',
 'after_widget' => '</li>',
 'before_title' => '<h2 class="widgettitle">',
 'after_title' => '</h2>',
    ));
  }
  add_action( 'widgets_init', 'theme_slug_widgets_init' );

  // Custom WordPress Login Logo
  function my_login_logo() { ?>
    <style type="text/css">
      body.login div#login h1 a {
        background: url(<?php echo site_url() ?>/apple-touch-icon.png) no-repeat 50% 50%;
        background-size: cover;
        border-radius: 15px;
        box-shadow: 0 3px 7px rgba(0,0,0,.05);
        padding-bottom: 10px;
        width: 120px;
        height: 120px;
        margin: 0 auto 40px;
      }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

?>
