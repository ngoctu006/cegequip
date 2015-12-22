<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if (!isset($content_width)) {
    $content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentyfifteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function twentyfifteen_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on twentyfifteen, use a find and replace
         * to change 'twentyfifteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentyfifteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentyfifteen'),
            'social' => __('Social Links Menu', 'twentyfifteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        $color_scheme = twentyfifteen_get_color_scheme();
        $default_color = trim($color_scheme[0], '#');

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('twentyfifteen_custom_background_args', array(
            'default-color' => $default_color,
            'default-attachment' => 'fixed',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url()));
    }

endif; // twentyfifteen_setup
add_action('after_setup_theme', 'twentyfifteen_setup');

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Widget Area search', 'twentyfifteen'),
        'id' => 'sidebar-search',
        'description' => __('Add widgets Search on top header.', 'twentyfifteen'),
    ));
    register_sidebar(array(
        'name' => __('Main Widget Area', 'twentythirteen'),
        'id' => 'sidebar-1',
        'description' => __('Appears in the footer section of the site.', 'twentythirteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="title-2"><span>',
        'after_title' => '</span></h3>',
    ));
    register_sidebar(array(
        'name' => __('Social Widget Area', 'twentythirteen'),
        'id' => 'sidebar-social',
        'description' => __('Social of the site.', 'twentythirteen'),
        'before_widget' => '<div class="social-share">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="title-1">',
        'after_title' => '</h3>',
    ));
}

add_action('widgets_init', 'twentyfifteen_widgets_init');

if (!function_exists('twentyfifteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentyfifteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Sans, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Sans font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Noto Serif, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Noto Serif font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /*
         * Translators: If there are characters in your language that are not supported
         * by Inconsolata, translate this to 'off'. Do not translate into your own language.
         */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /*
         * Translators: To add an additional character subset specific to your language,
         * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
         */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentyfifteen_javascript_detection', 0);

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');

    // Load our main stylesheet.
    wp_enqueue_style('twentyfifteen-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie7', 'conditional', 'lt IE 8');

    wp_enqueue_script('twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20141010');
    }

    wp_enqueue_script('twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
    wp_localize_script('twentyfifteen-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'twentyfifteen') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'twentyfifteen') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'twentyfifteen_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
    if (!is_single()) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    $css = '';

    if (is_attachment() && 'attachment' == $previous->post_type) {
        return;
    }

    if ($previous && has_post_thumbnail($previous->ID)) {
        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ($next && has_post_thumbnail($next->ID)) {
        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style('twentyfifteen-style', $css);
}

add_action('wp_enqueue_scripts', 'twentyfifteen_post_nav_background');

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description($item_output, $item, $depth, $args) {
    if ('primary' == $args->theme_location && $item->description) {
        $item_output = str_replace($args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output);
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4);

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify($html) {
    return str_replace('class="search-submit"', 'class="search-submit screen-reader-text"', $html);
}

add_filter('get_search_form', 'twentyfifteen_search_form_modify');

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * create widget socical 
 */
// Creating the widget
Class Social_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
// Base ID of your widget
                'social_widget',
// Widget name will appear in UI
                __('Social Widget', 'wpb_widget_domain'),
// Widget description
                array('description' => __('Block socical widget', 'social_widget'),)
        );
    }

// Creating widget front-end
// This is where the action happens
    public function widget($args, $instance) {
        $title = apply_filters('widget_title', $instance['title']);
        $fb =  (($instance['fb']) ? $instance['fb'] : '#');
        $twiter =  (($instance['twiter']) ? $instance['twiter'] : '#');
        $google =  (($instance['google']) ? $instance['google'] : '#');
// before and after widget arguments are defined by themes
        echo $args['before_widget'];
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        echo '<div class="social-icon">
            <a href="'.$fb.'" target="_blank" title="facebook" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="'.$twiter.'" target="_blank" title="twitter" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="'.$google.'" target="_blank" title="Google" class="gplus"><img src="'.esc_url( get_template_directory_uri() ).'/images/g-plus.png" alt="plus"></a>
       </div>';
        echo $args['after_widget'];
    }

// Widget Backend
    public function form($instance) {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } 
        if (isset($instance['fb'])) {
            $fb = $instance['fb'];
        } 
        if (isset($instance['twiter'])) {
            $twiter = $instance['twiter'];
        } 
        if (isset($instance['google'])) {
            $google = $instance['google'];
        } 
// Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('fb'); ?>"><?php _e('Facebook:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('fb'); ?>" name="<?php echo $this->get_field_name('fb'); ?>" type="text" value="<?php echo esc_attr($fb); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('twiter'); ?>"><?php _e('Twiter:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twiter'); ?>" name="<?php echo $this->get_field_name('twiter'); ?>" type="text" value="<?php echo esc_attr($twiter); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" />
        </p>
        <?php
    }

// Updating widget replacing old instances with new
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
        $instance['fb'] = (!empty($new_instance['fb']) ) ? strip_tags($new_instance['fb']) : '';
        $instance['twiter'] = (!empty($new_instance['twiter']) ) ? strip_tags($new_instance['twiter']) : '';
        $instance['google'] = (!empty($new_instance['google']) ) ? strip_tags($new_instance['google']) : '';
        return $instance;
    }
}

// Class wpb_widget ends here
// Register and load the widget
function social_load_widget() {
    register_widget('Social_widget');
}

add_action('widgets_init', 'social_load_widget');

function remove_nofollow($link, $args, $comment, $post){
  return str_replace("class='comment-reply-link'", "class='hide'", $link);
}

add_filter('comment_reply_link', 'remove_nofollow', 420, 4);

function jadis_get_search_form($form){
    $form = '<form role="search" method="get" id="searchform" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
            <label><span class="hidden">Rechercher...</span>
                    <input type="search" id="s" name="s" placeholder="Rechercher..." title="Rechercher..." class="search-field">
            </label>
            <div class="search-submit">
              <button type="submit" name="btn-submit"><i class="fa fa-search"></i></button>
            </div>
          </form>';
    return $form;
}
add_filter( 'get_search_form', 'jadis_get_search_form' );
function jadis_theme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ('div' == $args['style']) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
        ?>
    <<?php echo $tag ?> class="comment" id="comment-<?php comment_ID() ?>">
                  <article class="comment-body">
                    <div class="comment-meta">
                        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size']); ?>
                    </div>
                    <div class="group-2">
                      <div class="comment-content">
                        <p><?php comment_text(); ?></p>
                      </div>
                      <div class="comment-footer">
                        <div class="comment-author">
                            <a href="#" title="Test123" class="link-1"><?php echo get_comment_author(); ?></a>
                        </div><span class="comment-date"><?php echo get_comment_time('d/m/Y'); ?></span>
                      </div>
                    </div>
                  </article>
                </li>
    <?php
}
function jadis_field_comment($fields){
    	$fields   =  array(
		'author' => '<div class="form-group">' .
		            '<input class="form-control" placeholder="Nom*" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . $html_req . ' /></div>',
		'email'  => '<div class="form-group">'.
		            '<input class="form-control" placeholder="Email*" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '"  aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></div>',
	);
    unset($fields['url']);
    return $fields;
}
add_filter('comment_form_default_fields', 'jadis_field_comment');

function jadis_fied_author($field){
    $field = str_replace('<p class="comment-form-author">', '<div class="form-group">', $field);
    $field = str_replace('</p>', '</div>', $field);
    return $field;
}
add_filter('comment_form_field_author', 'jadis_fied_author');

function jadis_comment_form_defaults($defaults){
    $defaults['comment_field']	= '<div class="form-group"> <textarea class="form-control" placeholder="Message*" id="comment" name="comment"  aria-required="true" required="required"></textarea></div>';
    $defaults['title_reply'] = '';
    $defaults['comment_notes_before'] = '<img src="'.esc_url( get_template_directory_uri() ).'/images/user.png" alt="photo" class="photo"> '.((!is_user_logged_in() ? '<div class="group-3">' : ''));
    $defaults['comment_notes_after'] = ((!is_user_logged_in() ? '</div>' : ''));
    $defaults['submit_field'] = '<div class="group-2"><span class="text-1">* Champs obligatoires</span><p class="form-submit">%1$s %2$s</p></div>';
    $defaults['class_submit'] = 'button-1';
    $defaults['label_submit'] = 'Envoyer';
    $defaults['label_submit'] = 'Envoyer';
    return $defaults;
}
add_filter('comment_form_defaults', 'jadis_comment_form_defaults');
?>
