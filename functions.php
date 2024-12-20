<?php
/**
 * File:	functions.php
 * Theme:	Flat Blocks
 * 
 * Flat Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flat-blocks
 * @since	1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
add_action( 'after_setup_theme', 'flatblocks_support' );

if ( ! function_exists( 'flatblocks_support' ) ) :

	function flatblocks_support() {

		// Add support for additional core block styles. e.g. Separator width, left 
		// border color on quotes, etc. See here for full list:
		// https://github.com/WordPress/gutenberg/blob/trunk/packages/block-library/src/theme.scss
		//
		// NOTE: As of WordPress v6.3, these are loaded AFTER the ones from theme.json so 
		// they are overriding this theme and the user's settings! Don't load these by
		// default, but allow child themes to override that.		
		if ( apply_filters( 'flatblocks_additional_core_styles', $addl_core_styles ?? false ) ) {		
			add_theme_support( 'wp-block-styles' );
		}

		// This sets the standard post thumbnail image size for the blog
		// It is cropped with 16:9 aspect ratio so that widths and heights are the same
		set_post_thumbnail_size( 1100, 619, array( 'left', 'top' ) );
				
		// Also add this as a selectable size in the Block Editor
		add_image_size( 'cropped-large', 1100, 619, array( 'left', 'top' ) );

		// And add a smaller size for recent posts in columns
		add_image_size( 'cropped-thumbnail', 760, 428, array( 'left', 'top' ) );
		
		// Enqueue only the editor styles for now. Additional ones will be loaded
		// later. WordPress will automatically load the -rtl.css version if needed.
		add_editor_style( 
			array(
				'/assets/css/editor-styles.css'
			)
		);

		// Register four nav menus if Gutenberg is activated (otherwise the 
		// __experimentalMenuLocation attribute isn't available)
		if ( defined( 'IS_GUTENBERG_PLUGIN' ) && IS_GUTENBERG_PLUGIN ) {
			register_nav_menus( array(
				'header' 	=> __( 'Header Menu', 'flat-blocks' ),
				'footer' 	=> __( 'Footer Menu', 'flat-blocks' ),
				'footer-1' 	=> __( 'Footer Menu Alt 1', 'flat-blocks' ),
				'footer-2' 	=> __( 'Footer Menu Alt 2', 'flat-blocks' ),
				'footer-3' 	=> __( 'Footer Menu Alt 3', 'flat-blocks' )
			) );
		}

		// Allow excerpts on pages so users can control what shows in searches, etc.
		if ( apply_filters( 'flatblocks_allow_page_excerpts', $allow_page_excerpts ?? true ) ) {
			add_post_type_support( 'page', 'excerpt' );		
		}
		
	}
endif;

/* 
 * Tell WordPress to load only the block styles for blocks in use on a particular page
 * Note: This is not implemented yet.
 */
add_filter( 'should_load_separate_core_block_assets', '__return_false' );
//add_filter( 'should_load_separate_core_block_assets', '__return_true' );

/* 
 * Tell the theme to load only the block styles for blocks in use 
 * Note: This is not implemented yet.
 */
add_filter( 'flatblocks_should_load_separate_block_assets', '__return_false' );
//add_filter( 'flatblocks_should_load_separate_block_assets', '__return_true' );

/**
 * Enqueue FRONT-END ONLY and/or BACK-END styles and scripts depending on 
 * flatblocks_should_load_separate_block_assets.
 */
if ( apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	add_action( 'enqueue_block_assets', 'flatblocks_front_end_styles' );
} else {
	add_action( 'wp_enqueue_scripts', 'flatblocks_front_end_styles' );
}

if ( ! function_exists( 'flatblocks_front_end_styles' ) ) :

	function flatblocks_front_end_styles() {

		// Get Theme version
		$theme_version = wp_get_theme()->get( 'Version' ) ?? false;

		// Get CSS build version
		if ( file_exists ( get_template_directory() . '/assets/css/flat-blocks.asset.php' ) ) {
			$asset_file = include( get_template_directory() . '/assets/css/flat-blocks.asset.php' );
			$css_version = $asset_file['version'] ?? false;
		} else {
			$css_version = $theme_version;
		}

		// Always load base theme style
		if ( file_exists( get_template_directory() . '/assets/css/flat-blocks.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-base', 
				get_template_directory_uri() . '/assets/css/flat-blocks.css', 
				array(), 
				$css_version
			);

			if ( file_exists( get_template_directory() . '/assets/css/flat-blocks-rtl.css' ) ) {
				wp_style_add_data( 'flatblocks-base', 'rtl', 'replace' );
			}
		}
				
		// If not loading separate block styles, then load combined block styles
		if ( ! apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) 
			and file_exists( get_template_directory() . '/assets/css/block-styles.css' ) ) {
			
			// Get Block CSS build version
			if ( file_exists ( get_template_directory() . '/assets/css/block-styles.asset.php' ) ) {
				$asset_file = include( get_template_directory() . '/assets/css/block-styles.asset.php' );
				$block_css_version = $asset_file['version'] ?? $css_version;
			} else {
				$block_css_version = $css_version;
			}

			// Load the block styles
			wp_enqueue_style(
				'flatblocks-block-styles',
				get_template_directory_uri() . '/assets/css/block-styles.css',
				array('flatblocks-base'),
				$block_css_version
			);

			if ( file_exists( get_template_directory() . '/assets/css/block-styles-rtl.css' ) ) {
				wp_style_add_data( 'flatblocks-block-styles', 'rtl', 'replace' );
			}
		}
		
		// Load theme style
		// Note: Not needed because there is no CSS in it
		/*wp_enqueue_style( 
			'flatblocks-style', 
			get_template_directory_uri() . '/style.css', 
			array('flatblocks-base'),
			$theme_version
		);*/
		
		// As a courtesy, add the child theme Custom Styles CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/assets/css/block-styles.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-block-styles', 
				get_stylesheet_directory_uri() . '/assets/css/block-styles.css', 
				//array('flatblocks-base', 'flatblocks-block-styles'),
				array('flatblocks-base'),
				$theme_version 
			);
		}

		// As a courtesy, add the child theme CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/style.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-style', 
				get_stylesheet_directory_uri() . '/style.css', 
				//array('flatblocks-base', 'flatblocks-block-styles'),
				array('flatblocks-base'),
				$theme_version 
			);
		}

		// On front-end only, load smooth scrolling javascript
		if ( !is_admin()
			and file_exists( get_template_directory() . '/assets/js/smoothscroll.js' ) ) {

			wp_enqueue_script( 
				'flatblocks-smoothscroll', 
				get_template_directory_uri() . '/assets/js/smoothscroll.js', 
				array('jquery'), 
				$theme_version, 
				$in_footer = true 
			);
		}
		
	} 
endif;

/**
 * Enqueue FRONT-END AND BACK-END styles and scripts
 * 
 * NOTE: These styles and scripts will be loaded into the font-end, but also into the 
 * Block Editor iFrame, which is necessary for certain styles, such as the built-in 
 * Dashicons.
 */
add_action( 'enqueue_block_assets', 'flatblocks_block_assets' );	

if ( ! function_exists( 'flatblocks_block_assets' ) ) :
	function flatblocks_block_assets() {	
		wp_enqueue_style( 'dashicons' );
	}
endif;

/**
 * Enqueue BACK-END ONLY styles and scripts IF NOT 
 * flatblocks_should_load_separate_block_assets.
 */
if (! apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	add_action( 'admin_init', 'flatblocks_back_end_styles' );
}

if ( ! function_exists( 'flatblocks_back_end_styles' ) ) :

	function flatblocks_back_end_styles() {

		// Add the theme's base styles and custom block styles
		add_editor_style( 
			array(
				'/assets/css/flat-blocks.css',
				'/assets/css/block-styles.css'
			)
		);

		// As a courtesy, add the child theme CSS files to the Block Editor too.
		if ( is_child_theme() ) {

			if ( file_exists( get_stylesheet_directory() . '/assets/css/block-styles.css' ) ) {
				add_editor_style(
					get_stylesheet_directory_uri() . 'assets/css/block-styles.css'
				);
			}

			if ( file_exists( get_stylesheet_directory() . '/style.css' ) ) {
				add_editor_style(
					get_stylesheet_directory_uri() . '/style.css'
				);
			}
		}
	}
endif;

/**
 * Load BLOCK-specific CSS styles on the FRONT-END AND BACK-END if
 * flatblocks_should_load_separate_block_assets.
 * 
 * TO-DO: Filter out *-rtl.css
 */
if ( apply_filters( 'flatblocks_should_load_separate_block_assets', $separate_theme_block_assets ?? false ) ) {
	/////add_action( 'wp_enqueue_scripts', 'flatblocks_load_block_styles' );
	add_action( 'init', 'flatblocks_load_block_styles' ); 
}

if ( ! function_exists( 'flatblocks_load_block_styles' ) ) :

	function flatblocks_load_block_styles() {

		// Get Block CSS build version
		if ( file_exists ( get_template_directory() . '/assets/css/block-styles.asset.php' ) ) {
			$asset_file = include( get_template_directory() . '/assets/css/block-styles.asset.php' );
			$block_css_version = $asset_file['version'] ?? false;
		} else {
			$block_css_version = wp_get_theme()->get( 'Version' ) ?? false;
		}

		// Load the styles for the individual blocks
		$block_path = '/assets/css/blocks/';
		$block_styles = glob( get_theme_file_path($block_path) . '*.css' );
 
		foreach ( $block_styles as $block_name ) {

			// Remove the path and .css extension from the name
			$block_name = str_replace( array(get_theme_file_path($block_path), '.css'), '', $block_name );

			// Skip the RTL versions and instead add them as a replacement
			if ( strpos( $block_name, '-rtl' ) === false) {

				// Load the block style
				// Note: WordPress will decide whether to enqueue or inline the style
				wp_enqueue_block_style( "core/$block_name", array(
					'handle' => "flatblocks-block-$block_name",
					'src'    => get_theme_file_uri( $block_path . "$block_name.css" ),
					'path'   => get_theme_file_path( $block_path . "$block_name.css" ),
					'deps'	 => array( 'flatblocks-base' ), 
					'ver'	 => $block_css_version
				) );
				wp_style_add_data( "flatblocks-block-$block_name", 'rtl', 'replace' );
			}			
		}
	}
endif;

/**
 * Load custom block styles and block patterns (and PRO features if purchased)
 */
if ( ! function_exists('flatblocks_load_includes') ) :

	function flatblocks_load_includes() {

		// Build array of include files
		$includes = array (
			get_template_directory() . '/inc/block-bindings.php',
			get_template_directory() . '/inc/block-styles.php',
			get_template_directory() . '/inc/block-patterns.php',
			get_template_directory() . '/inc/wp-compatibility.php',
			get_template_directory() . '/pro/flat-blocks-pro.php',
// 			get_stylesheet_directory() . '/inc/block-bindings.php',
			get_stylesheet_directory() . '/inc/block-styles.php',
			get_stylesheet_directory() . '/inc/block-patterns.php',
		);

		// Allow child themes to override the list
		$includes = apply_filters( 'flatblocks_load_includes', $includes );

		// Load each of the include files
		foreach ( $includes as $include ) {
			if ( file_exists( $include ) ) {
				include_once $include;
			}
		}
	}
endif;
flatblocks_load_includes();

/**
 * Additional Filters
 */

/**
 * Define our custom template part AREAS
 */
add_filter( 'default_wp_template_part_areas', 'flatblocks_template_part_areas' );

if ( ! function_exists( 'flatblocks_template_part_areas' ) ) :
	function flatblocks_template_part_areas( array $areas ) {

		$new_areas = array( 
			array(
				'area'        => 'title',
				'area_tag'    => 'section',
				'label'       => __( 'Title', 'flat-blocks' ),
				'description' => __( 'Page and post titles plus home page content top', 'flat-blocks' ),
				'icon'        => ''
			),
			array(
				'area'        => 'content',
				'area_tag'    => 'section',
				'label'       => __( 'Content', 'flat-blocks' ),
				'description' => __( 'Content section such as cover and post meta', 'flat-blocks' ),
				'icon'        => ''
			),
			array(
				'area'        => 'menu',
				'area_tag'    => 'section',
				'label'       => __( 'Menu', 'flat-blocks' ),
				'description' => __( 'Navigation Menus', 'flat-blocks' ),
				'icon'        => ''
			)
		);
		return array_merge( $areas, $new_areas );
		
	}
endif;

/**
 * Add our custom image size(s) to the list that user can pick in the editor.
 * Consider: Add Medium Large since it is standard WordPress and seems to be missing.
 */
add_filter( 'image_size_names_choose', 'flatblocks_image_sizes' );

if ( ! function_exists( 'flatblocks_image_sizes' ) ) :
	function flatblocks_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			//'medium-large' => __( 'Medium Large', 'flat-blocks' ),
			'cropped-thumbnail' => __( 'Post Thumbnail Medium (cropped)', 'flat-blocks' ),
			'cropped-large' => __( 'Post Thumbnail Large (cropped)', 'flat-blocks' )
		) );
	}
endif;

/**
 * #page and #wrapper anchors for scroll-to-top
 * 
 * Add an anchor of #page for our scroll-to-top navigation item. This is needed
 * because there is currently no way to add an id to the wp-site-blocks wrapper and 
 * we need this to be the very first thing on the page.
 */
add_action( 'wp_body_open', 'flatblocks_body_open' );

if ( ! function_exists( 'flatblocks_body_open' ) ) :
	function flatblocks_body_open() { 
		echo '<a id="page"></a><a id="wrapper"></a>'; 
	}
endif;

/**
 * Remove the old Menus and Widgets admin page links
 */
add_action( 'admin_menu', 'flatblocks_adjust_admin_menu', 999 );

if ( ! function_exists( 'flatblocks_adjust_admin_menu' ) ) :
	function flatblocks_adjust_admin_menu() {
		remove_submenu_page( 'themes.php', 'nav-menus.php' );
		remove_submenu_page( 'themes.php', 'widgets.php' );
	}
endif;
