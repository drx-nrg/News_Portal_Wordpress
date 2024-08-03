<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array('search-form', 'navigation-widgets'));
    add_theme_support('woocommerce');
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}
add_action('admin_notices', 'blankslate_notice');
function blankslate_notice()
{
    $user_id = get_current_user_id();
    $admin_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $param = (count($_GET)) ? '&' : '?';
    if (!get_user_meta($user_id, 'blankslate_notice_dismissed_8') && current_user_can('manage_options'))
        echo '<div class="notice notice-info"><p><a href="' . esc_url($admin_url), esc_html($param) . 'dismiss" class="alignright" style="text-decoration:none"><big>' . esc_html__('Ⓧ', 'blankslate') . '</big></a>' . wp_kses_post(__('<big><strong>📝 Thank you for using BlankSlate!</strong></big>', 'blankslate')) . '<br /><br /><a href="https://wordpress.org/support/theme/blankslate/reviews/#new-post" class="button-primary" target="_blank">' . esc_html__('Review', 'blankslate') . '</a> <a href="https://github.com/tidythemes/blankslate/issues" class="button-primary" target="_blank">' . esc_html__('Feature Requests & Support', 'blankslate') . '</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">' . esc_html__('Donate', 'blankslate') . '</a></p></div>';
}
add_action('admin_init', 'blankslate_notice_dismissed');
function blankslate_notice_dismissed()
{
    $user_id = get_current_user_id();
    if (isset($_GET['dismiss']))
        add_user_meta($user_id, 'blankslate_notice_dismissed_8', 'true', true);
}
add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
    wp_enqueue_style('blankslate-style', get_template_directory_uri() . './css/bootstrap.min.css');
    wp_enqueue_script('jquery');
}
add_action('wp_footer', 'blankslate_footer');
function blankslate_footer()
{
?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (deviceAgent.match(/(Android)/)) {
                $("html").addClass("android");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
<?php
}
add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
    $sep = esc_html('|');
    return $sep;
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return esc_html('...');
    } else {
        return wp_kses_post($title);
    }
}
function blankslate_schema_type()
{
    $schema = 'https://schema.org/';
    if (is_single()) {
        $type = "Article";
    } elseif (is_author()) {
        $type = 'ProfilePage';
    } elseif (is_search()) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    echo 'itemscope itemtype="' . esc_url($schema) . esc_attr($type) . '"';
}
add_filter('nav_menu_link_attributes', 'blankslate_schema_url', 10);
function blankslate_schema_url($atts)
{
    $atts['itemprop'] = 'url';
    return $atts;
}
if (!function_exists('blankslate_wp_body_open')) {
    function blankslate_wp_body_open()
    {
        do_action('wp_body_open');
    }
}
add_action('wp_body_open', 'blankslate_skip_link', 5);
function blankslate_skip_link()
{
    echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'blankslate') . '</a>';
}
add_filter('the_content_more_link', 'blankslate_read_more_link');
function blankslate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
function blankslate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
    }
}
add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    unset($sizes['1536x1536']);
    unset($sizes['2048x2048']);
    return $sizes;
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title bg-success text-white fs-6 mb-0" style="clip-path: polygon(0 0, 90% 0, 100% 100%, 0% 100%); padding: 10px 25px 10px 15px; max-width: fit-content;">',
        'after_title' => '</h3><hr class="green-line">',
    ));
}
add_action('wp_head', 'blankslate_pingback_header');
function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function blankslate_custom_pings($comment)
{
?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?></li>
<?php
}
add_filter('get_comments_number', 'blankslate_comment_count', 0);
function blankslate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
function my_custom_comments($comment, $args, $depth) {
    ?>
    <li <?php comment_class('d-flex mb-4'); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-author vcard me-3">
            <?php echo get_avatar( $comment, 80, '', '', array('class' => 'rounded-circle') ); ?>
        </div>
        <div class="comment-body">
            <div class="comment-meta">
                <h5 class="comment-author-name mb-1"><?php comment_author(); ?></h5>
                <div class="comment-date text-muted"><?php comment_date('l, d M Y H:i T'); ?></div>
            </div>
            <div class="comment-content">
                <?php comment_text(); ?>
            </div>
        </div>
    </li>
    <?php
}
function custom_footer_widgets() {
    register_sidebar( array(
        'name'          => __( 'Footer Widget 1', 'textdomain' ),
        'id'            => 'footer-widget-1',
        'before_widget' => '<div class="footer-widget bg-light">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 2', 'textdomain' ),
        'id'            => 'footer-widget-2',
        'before_widget' => '<div class="footer-widget bg-light">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => __( 'Footer Widget 3', 'textdomain' ),
        'id'            => 'footer-widget-3',
        'before_widget' => '<div class="footer-widget bg-light">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="footer-widget-title">',
        'after_title'   => '</h2>',
    ) );
}
function set_excerpt_length(){
    return 10;
}

function get_current_url(){
    global $wp;

    $current_url = home_url(add_query_arg(array(), $wp->request));

    return $current_url;
}

function diffForHumans($timestamp) {
    $now = new DateTime();
    $date = (new DateTime())->setTimestamp($timestamp);
    $diff = $now->diff($date);


    $string = '';
    if ($diff->y) {
        $string = $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
    } elseif ($diff->m) {
        $string = $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
    } elseif ($diff->d) {
        $string = $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
    } elseif ($diff->h) {
        $string = $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
    } elseif ($diff->i) {
        $string = $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
    } elseif ($diff->s) {
        $string = $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
    } else {
        $string = 'just now';
    }

    return $string;
}

function capitalizeSecondWord($string){
    if(is_string($string)){
        $string = str_split($string);
        $string[5] = strtoupper($string[5]);
    }

    return $string;
}

function read_too_shortcode($atts){
    $args = array(
        'name' => $atts["post_slug"],
        'post_type' => 'post',
        'posts_per_page' => 1,
        'post_status' => 'publish',
    );

    $post_query = new WP_Query($args);

    $post_title = null;
    $post_link = null;

    while($post_query->have_posts()){
        $post_query->the_post();

        $post_title = get_the_title();
        $post_link = get_the_permalink();

        wp_reset_postdata();
    }

    return '<a href="'.$post_link.'" class="d-block text-decoration-none text-dark border-start border-4 border-success ps-3 py-2 cursor-pointer" style="background-color: rgb(250, 250, 250);"><p class="fw-semibold mb-1 fs-6">Baca Juga:</p><p class="fs-5">'.$post_title.'</p></a>';
}


add_shortcode('read_too', 'read_too_shortcode');
add_filter('excerpt_length', 'set_excerpt_length');
add_action( 'widgets_init', 'custom_footer_widgets' );



add_filter('show_admin_bar', '__return_false');

function mytheme_customize_register($wp_customize) {
    // Menambahkan Seksi
    $wp_customize->add_section('mytheme_custom_section', array(
        'title'    => __('Base Theme Settings', 'mytheme'),
        'priority' => 30,
    ));

    // Menambahkan Pengaturan
    $wp_customize->add_setting('mytheme_custom_setting', array(
        'default'   => 'Jokowi Ganteng',
        'transport' => 'refresh', // Atau 'postMessage' jika Anda ingin menggunakan teknik AJAX untuk pratinjau langsung
    ));

    // Menambahkan Kontrol
    $wp_customize->add_control('mytheme_custom_control', array(
        'label'    => __('Jokowi Headline', 'mytheme'),
        'section'  => 'mytheme_custom_section',
        'settings' => 'mytheme_custom_setting',
        'type'     => 'text', // Jenis kontrol (text, checkbox, radio, etc.)
    ));

    $wp_customize->add_setting('mytheme_custom_color', array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'mytheme_custom_color_control', array(
        'label'    => __('Background Color', 'mytheme'),
        'section'  => 'mytheme_custom_section',
        'settings' => 'mytheme_custom_color',
    )));

    $wp_customize->add_setting('mytheme_custom_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'mytheme_custom_image_control', array(
        'label'    => __('Header Image', 'mytheme'),
        'section'  => 'mytheme_custom_section',
        'settings' => 'mytheme_custom_image',
    )));
    
    
}
add_action('customize_register', 'mytheme_customize_register');


?>
