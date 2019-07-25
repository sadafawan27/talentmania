<?php 
/**
 * Herbal Lite functions and definitions
 *
 * @package Herbal Lite
 */
 
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'herbal_lite_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
 
function herbal_lite_setup() {
	load_theme_textdomain( 'herbal-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 250,
		'flex-height' => true,
	) );	
 
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'herbal-lite' ),		
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style();
} 
endif; // herbal_lite_setup

add_action( 'after_setup_theme', 'herbal_lite_setup' );


/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Herbal Lite 1.0
 */
function herbal_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'herbal_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'herbal_lite_content_width', 0 );


function herbal_lite_widgets_init() { 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'herbal-lite' ),
		'description'   => esc_html__( 'Appears on blog page sidebar', 'herbal-lite' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<div class="widgetbox">',		
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'herbal-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'herbal-lite' ),
		'id'            => 'fc-1',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'herbal-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'herbal-lite' ),
		'id'            => 'fc-2',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'herbal-lite' ),
		'description'   => esc_html__( 'Appears on page footer', 'herbal-lite' ),
		'id'            => 'fc-3',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );		
		
}
add_action( 'widgets_init', 'herbal_lite_widgets_init' );


function herbal_lite_font_url(){
		$font_url = '';		
		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','robotocondensed:on or off','herbal-lite');		
		
		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/
		$scada = _x('on','Scada:on or off','herbal-lite');	
		$robotoslab = _x('on','Roboto Slab:on or off','herbal-lite');	
		$merriweather =_x('on','Merriweather:on or off','herbal-lite');
		$roboto = _x('on','Scada:on or off','herbal-lite');	
		$lato = _x('on','Lato:on or off','herbal-lite');	
		
		if('off' !== $robotocondensed ){
			$font_family = array();
			
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			
			if('off' !== $robotoslab){
				$font_family[] = 'Roboto Slab:300,400,700';
			}		
			
			if('off' !== $merriweather){
				$font_family[] = 'Merriweather:300,400,400i,700,700i,900,900i';
			}	
			
			if('off' !== $roboto){
				$font_family[] = 'Roboto:300,300i,400,400i,500,500i,700,700i,900,900i';
			}
			
			if('off' !== $lato){
				$font_family[] = 'Lato:300,300i,400,400i,700,700i,900,900i';
			}											

			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
		
	return $font_url;
	}


function herbal_lite_scripts() {
	wp_enqueue_style('herbal-lite-font', herbal_lite_font_url(), array());
	wp_enqueue_style( 'herbal-lite-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'herbal-lite-print-style', get_template_directory_uri()."/print.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/css/font-awesome.css" );
	wp_enqueue_style( 'herbal-lite-main-style', get_template_directory_uri()."/css/responsive.css" );		
	wp_enqueue_style( 'herbal-lite-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'herbal-lite-custom-js', get_template_directory_uri() . '/js/custom.js' );	
		

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'herbal_lite_scripts' );

define('HERBAL_LITE_URL','https://www.pinnaclethemes.net/','herbal-lite');
define('HERBAL_LITE_PRO_THEME_URL','https://www.pinnaclethemes.net/product/herbal-wordpress-theme/','herbal-lite');
define('HERBAL_LITE_FREE_THEME_URL','https://www.pinnaclethemes.net/product/free-herbal-wordpress-theme/','herbal-lite');
define('HERBAL_LITE_THEME_DOC','https://pinnaclethemes.net/themedocumentation/herbal-documentation/','herbal-lite');
define('HERBAL_LITE_LIVE_DEMO','https://www.pinnaclethemes.net/themedemos/herbal/','herbal-lite');
define('HERBAL_LITE_THEMES','https://www.pinnaclethemes.net/cool-wordpress-themes/','herbal-lite');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function herbal_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'herbal_lite_pingback_header' );

add_filter( 'body_class','herbal_lite_body_class' );
function herbal_lite_body_class( $classes ) {
	
 	$hideslide = get_theme_mod('hide_slides', 1);
	if (!is_home() && is_front_page()) {
		if( $hideslide == '') {
			$classes[] = 'haveslide';
		}
	}
    return $classes;
     
}

// get slug by id
function herbal_lite_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}

require_once get_template_directory() . '/upgrade-pro/example-1/class-customize.php';

function herbal_lite_custom_excerpt_more( $more ) {
	if( is_admin() ) return $more; 	
    return sprintf( '<div class="clear"></div><a class="ReadMore" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'herbal-lite' )
    );
}
add_filter( 'excerpt_more', 'herbal_lite_custom_excerpt_more');