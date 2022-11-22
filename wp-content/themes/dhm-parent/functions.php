<?php
// ******************** Add / Remove Styles and Scripts Start ********************** //
function enqueue_parent_styles() {
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/assets/css/theme.min.css' ); 
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/src/font-awesome/css/all.min.css' );   
    wp_enqueue_script( 'theme', get_template_directory_uri() . '/assets/js/theme.min.js', array ( 'jquery' ), null, true);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/src/js/bootstrap/bootstrap.js', array ( 'jquery' ), null, true);
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function remove_default_styles() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
}
add_action( 'wp_enqueue_scripts', 'remove_default_styles' );

function remove_jquery_migrate( $scripts ) {
    if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
    $script = $scripts->registered['jquery'];
        if ( $script->deps ) {
            $script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
        }
    }
}
add_action( 'wp_default_scripts', 'remove_jquery_migrate' );
// ******************** Add / Remove Styles and Scripts End ********************** //

// ******************** Theme Setup Start ********************** //
function dhm_parent_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', [ 'script', 'style' ] );
    remove_theme_support( 'widgets-block-editor' );
    add_image_size( 'post-grid', 800, 500, true );
}
add_action( 'after_setup_theme', 'dhm_parent_setup' );

function dhm_parent_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 200,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
add_action( 'after_setup_theme', 'dhm_parent_custom_logo_setup' );
// ******************** Theme Setup End ********************** //

// ******************** Register Theme Parts Start ********************** //
function register_breadcrumbs(){
	require_once get_template_directory() . '/inc/breadcrumbs.php';
}
add_action( 'after_setup_theme', 'register_breadcrumbs' );

function register_pagination(){
	require_once get_template_directory() . '/inc/pagination.php';
}
add_action( 'after_setup_theme', 'register_pagination' );

function register_navwalker(){
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function register_navigation_menu() {
    register_nav_menu('primary', __( 'Primary Navigation', 'dhm-parent' ));
}
add_action( 'init', 'register_navigation_menu' );
// ******************** Register Theme Parts End ********************** //

// ******************** Declare Widget Area Start ********************** //
function dhm_widgets_init() {
    register_sidebar( array(
        'name'          => 'Sidebar - Default',
        'id'            => 'sidebar_default',
        'before_widget' => '<div class="sidebar-module">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'dhm_widgets_init' );
// ******************** Declare Widget Area End ********************** //

// ******************** Add Bootstrap Mark-Up to Pagination Start ********************** //
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="page-link"';
}
// ******************** Add Bootstrap Mark-Up to Pagination End ********************** //

// ******************** Remove Archive Title Prefix Start ********************** //
add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
        $title = single_cat_title( '', false );    
    } elseif ( is_tag() ) {    
        $title = single_tag_title( '', false );    
    } elseif ( is_author() ) {    
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
    } elseif ( is_tax() ) {
        $title = sprintf( __( '%1$s', 'dhm-parent' ), single_term_title( '', false ) );
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format', 'dhm-parent' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format', 'dhm-parent' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format', 'dhm-parent' ) );
    }
    return $title;    
});
// ******************** Remove Archive Title Prefix End ********************** //

// ******************** Initialize Advanced Custom Fields Start ********************** //
acf_add_options_page(array(
    'page_title' 	=> 'Theme Opties',
    'menu_title'	=> 'Thema Opties',
    'menu_slug' 	=> 'theme-general-settings'
));

acf_add_options_sub_page(array(
    'page_title' 	=> 'Bedrijfsprofiel',
    'menu_title'	=> 'Bedrijfsprofiel',
    'parent_slug'	=> 'theme-general-settings',
));

acf_add_options_sub_page(array(
    'page_title' 	=> 'Thema',
    'menu_title'	=> 'Thema',
    'parent_slug'	=> 'theme-general-settings',
));
// ******************** Initialize Advanced Custom Fields End ********************** //

// ******************** Add Customizer Settings Start ********************** //
function fn_customize_register( $wp_customize ) {
    // Add Panels
    $wp_customize->add_panel( 'theme', array(
        'priority'       => 10,
        'title'          => 'Thema'
    ) );
    // Add Sections
    $wp_customize->add_section( 'site_identity', array(
        'title' => 'Site-identiteit',
        'panel' => 'theme'
    ) );
    // Add settings
    $wp_customize->add_setting( 'logo_width', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_setting( 'logo_height', array(
        'default' => '',
        'type' => 'option',
        'sanitize_callback' => 'absint',
    ) );
    // Add Controls
    $wp_customize->add_control( 'logo_width', array(
        'label'    => 'Logo breedte (pixels)',
        'section'  => 'site_identity',
        'settings' => 'logo_width',
        'type'     => 'number'
    ) );
    $wp_customize->add_control( 'logo_height', array(
        'label'    => 'Logo hoogte (pixels)',
        'section'  => 'site_identity',
        'settings' => 'logo_height',
        'type'     => 'number'
    ) );
}
add_action( 'customize_register', 'fn_customize_register' );
// ******************** Add Customizer Settings End ********************** //

// ******************** White Label ********************** //
function fn_remove_footer_admin () {
    echo 'Website gemaakt door <a title="De Haan Media" href="https://www.dehaanmedia.nl/" rel="noopener">De Haan Media</a>.';
}
add_filter('admin_footer_text', 'fn_remove_footer_admin');
  
function fn_custom_dashboard_widget() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Support', 'fn_custom_dashboard_help');
}
add_action('wp_dashboard_setup', 'fn_custom_dashboard_widget');
   
function fn_custom_dashboard_help() {
    echo '<p>Hulp nodig? Neem contact op met <a title="De Haan Media" href="https://www.dehaanmedia.nl/contact" rel="noopener" target="_blank">De Haan Media</a>.</p>';
}

function fn_admin_bar_remove_logo() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
}
add_action( 'wp_before_admin_bar_render', 'fn_admin_bar_remove_logo', 0 );

// ******************** Disabel Author Page ********************** //
function fn_disable_author_page() {
    global $wp_query;
    if ( is_author() ) {
        wp_redirect(get_option('home'), 301); 
        exit; 
    }
}
add_action('template_redirect', 'fn_disable_author_page');