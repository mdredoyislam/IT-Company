<?php
//Include Functions

require_once( get_theme_file_path( "/inc/tgm.php" ) );
require_once( get_theme_file_path( "/inc/attachments.php" ) );
require_once( get_theme_file_path( "/widgets/social-icons-widget.php" ) );

if ( ! isset( $content_width ) ) {
    $content_width = 960;
}

if ( site_url() == "http://redoyit.com" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}

function redoyit_theme_setup() {
    load_theme_textdomain( "redoyit" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "custom-logo" );
    add_theme_support( "title-tag" );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support( "post-formats", array( "image", "gallery", "quote", "audio", "video", "link" ) );
    add_editor_style( "/assets/css/editor-style.css" );


    register_nav_menu( "topmenu", __( "Top Menu", "redoyit" ) );
    register_nav_menus( array(
        "footer-left"   => __( "Footer Left Menu", "redoyit" ),
        "footer-middle" => __( "Footer Middle Menu", "redoyit" ),
        "footer-right"  => __( "Footer Right Menu", "redoyit" ),
    ) );
    add_image_size( "redoyit-home-square", 400, 400, true );
}

add_action( "after_setup_theme", "redoyit_theme_setup" );

function redoyit_assets() {
    wp_enqueue_style( "fontawesome-css", get_theme_file_uri( "/assets/css/font-awesome/css/font-awesome.css" ), null, "1.0" );
    wp_enqueue_style( "fonts-css", get_theme_file_uri( "/assets/css/fonts.css" ), null, "1.0" );
    wp_enqueue_style( "base-css", get_theme_file_uri( "/assets/css/base.css" ), null, "1.0" );
    wp_enqueue_style( "vendor-css", get_theme_file_uri( "/assets/css/vendor.css" ), null, "1.0" );
    wp_enqueue_style( "main-css", get_theme_file_uri( "/assets/css/main.css" ), null, "1.0" );
    wp_enqueue_style( "redoyit-css", get_stylesheet_uri(), null, VERSION );

    wp_enqueue_script( "modernizr-js", get_theme_file_uri( "/assets/js/modernizr.js" ), null, "1.0" );
    wp_enqueue_script( "pace-js", get_theme_file_uri( "/assets/js/pace.min.js" ), null, "1.0" );
    wp_enqueue_script( "plugins-js", get_theme_file_uri( "/assets/js/plugins.js" ), array( "jquery" ), "1.0", true );
    if ( is_singular() ) {
        wp_enqueue_script( "comment-reply" );
    }
    wp_enqueue_script( "main-js", get_theme_file_uri( "/assets/js/main.js" ), array( "jquery" ), "1.0", true );
}

add_action( "wp_enqueue_scripts", "redoyit_assets" );

function redoyit_pagination() {
    global $wp_query;
    $links = paginate_links( array(
        'current'  => max( 1, get_query_var( 'paged' ) ),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => apply_filters( "redoyit_pagination_mid_size", 3 )
    ) );
    $links = str_replace( "page-numbers", "pgn__num", $links );
    $links = str_replace( "<ul class='pgn__num'>", "<ul>", $links );
    $links = str_replace( "next pgn__num", "pgn__next", $links );
    $links = str_replace( "prev pgn__num", "pgn__prev", $links );
    echo wp_kses_post( $links );
}

remove_action( "term_description", "wpautop" );

function redoyit_widgets() {
    register_sidebar( array(
        'name'          => __( 'About Us Page', 'redoyit' ),
        'id'            => 'about-us',
        'description'   => __( 'Widgets in this area will be shown on about us page.', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Maps Section', 'redoyit' ),
        'id'            => 'contact-maps',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Contact Page Information Section', 'redoyit' ),
        'id'            => 'contact-info',
        'description'   => __( 'Widgets in this area will be shown on contact page.', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="col-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="quarter-top-margin">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Before Footer Section', 'redoyit' ),
        'id'            => 'before-footer-right',
        'description'   => __( 'before footer section, right side', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Section', 'redoyit' ),
        'id'            => 'footer-right',
        'description'   => __( 'footer section, right side', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Bottom Section', 'redoyit' ),
        'id'            => 'footer-bottom',
        'description'   => __( 'footer section, bottom side', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );

    register_sidebar( array(
        'name'          => __( 'Header Section', 'redoyit' ),
        'id'            => 'header-section',
        'description'   => __( 'Widgets in this area will be shown on header section.', 'redoyit' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ) );

}

add_action( "widgets_init", "redoyit_widgets" );

function category_before_title1() {
    echo "<p>Before Title 1</p>";
}

add_action( "philosphy_before_category_title", "category_before_title1" );

function category_before_title2() {
    echo "<p>Before Title 2</p>";
}

add_action( "philosphy_before_category_title", "category_before_title2", 4 );

function category_before_title3() {
    echo "<p>Before Title 3</p>";
}

add_action( "philosphy_before_category_title", "category_before_title3", 9 );

function category_after_title() {
    echo "<p>After Title</p>";
}

add_action( "philosphy_after_category_title", "category_after_title" );

function category_after_desc() {
    echo "<p>After Description</p>";
}

add_action( "philosphy_after_category_description", "category_after_desc" );


function beginning_category_page( $category_title ) {
    if ( "New" == $category_title ) {
        $visit_count = get_option( "category_new" );
        $visit_count = $visit_count ? $visit_count : 0;
        $visit_count ++;
        update_option( "category_new", $visit_count );
    }
}

add_action( "philosphy_category_page", "beginning_category_page" );


function redoyit_home_banner_class( $class_name ) {
    if ( is_home() ) {
        return $class_name;
    } else {
        return "";
    }
}

add_filter( "redoyit_home_banner_class", "redoyit_home_banner_class" );

function pagination_mid_size( $size ) {
    return 2;
}

add_filter( "redoyit_pagination_mid_size", "pagination_mid_size" );

function uppercase_text( $param1, $param2, $param3 ) {
    return ucwords( $param1 ) . " " . strtoupper( $param2 ) . " " . ucwords( $param3 );
}

add_filter( "redoyit_text", "uppercase_text", 10, 3 );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

function redoyit_search_form( $form ) {
    $homedir      = home_url( "/" );
    $label        = __( "Search for:", "redoyit" );
    $button_label = __( "Search", "redoyit" );
    $newform      = <<<FORM
<form role="search" method="get" class="header__search-form" action="{$homedir}">
    <label>
        <span class="hide-content">{$label}</span>
        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s"
               title="{$label}" autocomplete="off">
    </label>
    <input type="submit" class="search-submit" value="{$button_label}">
</form>
FORM;

    return $newform;

}

add_filter( "get_search_form", "redoyit_search_form" );

//Redux Plugin Include
require ( get_theme_file_path('../../plugins/redoyit-theme-options/redux-core/framework.php') );
require ( get_theme_file_path('../../plugins/redoyit-theme-options/sample/config.php') );
