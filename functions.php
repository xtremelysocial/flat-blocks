<?php
/**
 * Flat Blocks functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flat-blocks
 * @since	1.0
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @return void
 */
if ( ! function_exists( 'flatblocks_support' ) ) :

	function flatblocks_support() {

		// Add support for additional core block styles. e.g. Separator width, left 
		// border color on quotes, etc.
		add_theme_support( 'wp-block-styles' );

		// This sets the standard post thumbnail image size for the blog
		// It is cropped with 16:9 aspect ratio so that widths and heights are the same
		set_post_thumbnail_size( 1100, 619, array( 'left', 'top' ) );
				
		// Also add this as a selectable size in the Block Editor
		add_image_size( 'cropped-large', 1100, 619, array( 'left', 'top' ) );

		// And add a smaller size for recent posts in columns
		add_image_size( 'cropped-thumbnail', 760, 428, array( 'left', 'top' ) );
		
		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		// Note: Don't included fixed header as that isn't working in the Block Editor
		add_editor_style( 
			array(
				'/assets/css/flat-blocks.css',
				'/assets/css/custom-styles.css', //,
				//'/assets/css/custom-fixedheader.css'
				'style.css'
			)
		);

		// Register four nav menus if Gutenberg is activated 
		// (otherwise the __experimentalMenuLocation attribute isn't available)
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
		add_post_type_support( 'page', 'excerpt' );		
	}

endif;
add_action( 'after_setup_theme', 'flatblocks_support' );

/**
 * Enqueue front-end styles.
 *
 * @return void
 */
if ( ! function_exists( 'flatblocks_styles' ) ) :

	function flatblocks_styles() {

		// Get version for caching
		$theme_version = wp_get_theme()->get( 'Version' );
		$version_string = is_string( $theme_version ) ? $theme_version : false;
		
		// Enqueue base theme style
		wp_enqueue_style( 
			'flatblocks-base', 
			get_template_directory_uri() . '/assets/css/flat-blocks.css', 
			array(), 
			$version_string
		);

		// Register custom block styles. See /inc/block-styles.php.
		wp_register_style(
			'flatblocks-custom-styles',
			get_template_directory_uri() . '/assets/css/custom-styles.css',
			array('flatblocks-base'),
			$version_string
		);
	
		wp_register_style(
			'flatblocks-fixedheader-styles',
			get_template_directory_uri() . '/assets/css/custom-fixedheader.css',
			array('flatblocks-base'),
			$version_string
		);

		// Note: Conditional loading of custom styles not stable as of WordPress 6.2,
		// so load manually
		wp_enqueue_style( 'flatblocks-custom-styles' );
		wp_enqueue_style( 'flatblocks-fixedheader-styles' );

		// Enqueue theme style after theme base style
		wp_enqueue_style( 
			'flatblocks-style', 
			get_template_directory_uri() . '/style.css', 
			array('flatblocks-base'),
			//null,
			$version_string
		);

		// WordPress built-in icons (Dashicons)
		wp_enqueue_style( 'dashicons' );

		// As a courtesy, add the child theme Custom Styles CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/assets/css/custom-styles.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-custom-styles', 
				get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', 
				array( 'flatblocks-style' ), 
				$version_string 
			);
		}

		// As a courtesy, add the child theme CSS if it exists
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/style.css' ) ) {
			wp_enqueue_style( 
				'flatblocks-child-style', 
				get_stylesheet_directory_uri() . '/style.css', 
				array( 'flatblocks-style' ), 
				$version_string 
			);
		}

		// Smooth scrolling javascript
		wp_enqueue_script( 
			'flatblocks-smoothscroll', 
			get_template_directory_uri() . '/assets/js/smoothscroll.js', 
			array('jquery'), 
			$version_string, 
			true 
		);

		// Fixed header javascript
		wp_enqueue_script( 
			'flatblocks-fixedheader', 
			get_template_directory_uri() . '/assets/js/fixedheader.js', 
			array('jquery'), 
			$version_string, 
			true 
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'flatblocks_styles' );

/**
 * Enqueue additional editor scripts.
 * 
 * @return void
 */
if ( ! function_exists( 'flatblocks_editor_styles' ) ) :

	function flatblocks_editor_styles() {

		// As a courtesy, add the child theme CSS to the Block Editor if it exists.
		if ( is_child_theme() && file_exists( get_stylesheet_directory() . '/style.css' ) ) {
			add_editor_style(
				'/style.css'
			);
		}

	}

endif;
add_action( 'admin_init', 'flatblocks_editor_styles' );

/**
 * Load custom block styles and block patterns
 *
 */
// Add custom block styles
if ( file_exists( get_template_directory() . '/inc/block-styles.php' ) ) {
	require_once get_template_directory() . '/inc/block-styles.php';
}

// As a courtesy, add the child theme block styles if they exist.
if ( file_exists( get_stylesheet_directory() . '/inc/block-styles.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/block-styles.php';
}

// Add block patterns
if ( file_exists( get_template_directory() . '/inc/block-patterns.php' ) ) {
	require_once get_template_directory() . '/inc/block-patterns.php';
}

// As a courtesy, add the child theme patterns if they exist. Note that child
// themes can alternately add .php files in the /patterns directory and they will
// automatically be loaded by WordPress.
if ( file_exists( get_stylesheet_directory() . '/inc/block-patterns.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/block-patterns.php';
}

// Include Pro version features
if ( file_exists( get_template_directory() . '/pro/flat-blocks-pro.php' ) ) {
	require_once get_template_directory() . '/pro/flat-blocks-pro.php';
}

/**
 * Additional Filters
 *
 */

// Define our custom template part AREAS
if ( ! function_exists( 'flatblocks_template_part_areas' ) ) :
	function flatblocks_template_part_areas( array $areas ) {

		$new_areas = array( 
			array(
				'area'        => 'title',
				'area_tag'    => 'section',
				'label'       => __( 'Title', 'flat-blocks' ),
				'description' => __( 'Title templates for pages and posts', 'flat-blocks' ),
				'icon'        => 'header'
			),
			array(
				'area'        => 'sidebar',
				'area_tag'    => 'section',
				'label'       => __( 'Sidebar', 'flat-blocks' ),
				'description' => __( 'Sidebar templates for pages and posts with sidebars', 'flat-blocks' ),
				'icon'        => 'sidebar'
			),
			array(
				'area'        => 'query',
				'area_tag'    => 'section',
				'label'       => __( 'Query', 'flat-blocks' ),
				'description' => __( 'Query template for blog and archives', 'flat-blocks' ),
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
			),
			array(
				'area'        => 'comments',
				'area_tag'    => 'section',
				'label'       => __( 'Comments', 'flat-blocks' ),
				'description' => __( 'Comment template for pages and posts with comments', 'flat-blocks' ),
				'icon'        => 'footer'
			)
		);
		return array_merge( $areas, $new_areas );
		
	}
endif; // end ! function_exists
add_filter( 'default_wp_template_part_areas', 'flatblocks_template_part_areas' );

// Add our custom image size(s) to the list that user can pick in the editor 
// Consider: Add Medium Large since it is standard WordPress and seems to be missing
if ( ! function_exists( 'flatblocks_image_sizes' ) ) :

	function flatblocks_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
			//'medium-large' => __( 'Medium Large', 'flat-blocks' ),
			'cropped-thumbnail' => __( 'Post Thumbnail Medium (cropped)', 'flat-blocks' ),
			'cropped-large' => __( 'Post Thumbnail Large (cropped)', 'flat-blocks' )
		) );
	}
endif; // end ! function_exists
add_filter( 'image_size_names_choose', 'flatblocks_image_sizes' );

// Always replace [...] with ... from the excerpt
if ( ! function_exists( 'flatblocks_excerpt_more' ) ) :

	function flatblocks_excerpt_more( $more ) {
		return '&hellip;';
		//return str_ireplace( '[…]', '&hellip;', $more);
	}
endif; // end ! function_exists
add_filter( 'excerpt_more', 'flatblocks_excerpt_more' );

/**
 * Excerpt in Page or Post Title
 *
 * On pages or single posts only, set excerpt length to 25 words. This is for when it is 
 * used in the Page Title and/or Post Title Template Parts. 
 * 
*/
if ( ! function_exists( 'flatblocks_excerpt_length' ) ) :
	function flatblocks_excerpt_length ( $length ) {
		return is_singular() ? 25 : $length;
	}
endif; // end ! function_exists
add_filter('excerpt_length', 'flatblocks_excerpt_length');
