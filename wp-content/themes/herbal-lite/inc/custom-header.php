<?php
/**
 * @package Herbal Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses herbal_lite_header_style()
 * @uses herbal_lite_admin_header_style()
 * @uses herbal_lite_admin_header_image()
 */
function herbal_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'herbal_lite_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'herbal_lite_header_style',
		'admin-head-callback'    => 'herbal_lite_admin_header_style',
		'admin-preview-callback' => 'herbal_lite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'herbal_lite_custom_header_setup' );

if ( ! function_exists( 'herbal_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see herbal_lite_custom_header_setup().
 */
function herbal_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // herbal_lite_header_style

if ( ! function_exists( 'herbal_lite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see herbal_lite_custom_header_setup().
 */
function herbal_lite_admin_header_style() {?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // herbal_lite_admin_header_style


add_action( 'admin_head', 'herbal_lite_admin_header_css' );
function herbal_lite_admin_header_css(){ ?>
	<style>pre{white-space: pre-wrap;}</style><?php
}


if ( ! function_exists( 'herbal_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see herbal_lite_custom_header_setup().
 */
function herbal_lite_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php           
}
endif; // herbal_lite_admin_header_image 