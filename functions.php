<?php
if ( ! function_exists( 'flat_blocks_support' ) ) :
	function flat_blocks_support() {
		// Alignwide and alignfull classes in the block editor.
		add_theme_support( 'align-wide' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for responsive embedded content.
		// https://github.com/WordPress/gutenberg/issues/26901
		add_theme_support( 'responsive-embeds' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );

		// Declare that there are no <title> tags and allow WordPress to provide them
		add_theme_support( 'title-tag' );

		// Experimental support for adding blocks inside nav menus
		add_theme_support( 'block-nav-menus' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		
		// Enqueue editor styles.
		add_editor_style(
			array(
				'/assets/ponyfill.css',
				'/assets/theme.css',
				'/assets/css/custom-styles.css',
				//'/assets/css/editor-style.css'
			)
		);

		// This theme uses wp_nav_menu() in up to 4 locations
		register_nav_menus( array(
			'primary' 	=> __( 'Header Menu', 'flat-blocks' ),
			'footer' 	=> __( 'Footer Menu', 'flat-blocks' ),
			'footer-2' 	=> __( 'Footer Menu 2', 'flat-blocks' ),
			'footer-3' 	=> __( 'Footer Menu 3', 'flat-blocks' ),
			'social' 	=> __( 'Social Menu', 'flat-blocks' ),
		) );

		add_filter(
			'block_editor_settings_all',
			function( $settings ) {
				$settings['defaultBlockTemplate'] = '<!-- wp:group {"layout":{"inherit":true}} --><div class="wp-block-group"><!-- wp:post-content /--></div><!-- /wp:group -->';
				//$settings['defaultBlockTemplate'] = '<-- wp:post-excerpt --><!-- wp:group {"layout":{"inherit":true}} --><div class="wp-block-group"><!-- wp:post-content /--></div><!-- /wp:group -->';
				return $settings;
			}
		);

		// Add support for core custom logo.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 192,
				'width'       => 192,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		// This is our standard thumbnail size for things like blog posts.
		//set_post_thumbnail_size( 750, 422, array( 'left', 'top' ) ); // crop left top
		//set_post_thumbnail_size( 750, 422, true ) ); // crop center
		add_image_size( 'medium-large', 750, 422 ); // 16:9 ratio
		
		// Add support for starter content
		/*include get_stylesheet_directory() . '/inc/starter-content.php';
		add_theme_support(
			'starter-content',
			$flat_blocks_starter_content
		);*/
	}
endif;
add_action( 'after_setup_theme', 'flat_blocks_support', 9 );

/**
 *
 * Admin Enqueue scripts and styles.
 */
if ( ! function_exists( 'flat_blocks_editor_styles' ) ) :
	function flat_blocks_editor_styles() {

		// Enqueue editor styles.
		add_editor_style(
			array(
				flat_blocks_fonts_url(),
				//'/assets/theme.css',
				//'/assets/css/custom-styles.css',
				//'/assets/css/editor-style.css'
			)
		);
		
		// Smooth scrolling javascript
		wp_enqueue_script( 'flat-blocks-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

		// Fixed header javascript
		wp_enqueue_script( 'flat-blocks-fixedheader', get_template_directory_uri() . '/assets/js/fixedheader.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

		// For single pages or posts, add javascript to reply inline (from old _S Theme)
		/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}*/

		// Add the child theme CSS if it exists.
		if ( file_exists( get_stylesheet_directory() . '/assets/theme.css' ) ) {
			add_editor_style(
				'/assets/theme.css'
			);
		}
	}
endif;
add_action( 'admin_init', 'flat_blocks_editor_styles' );

/**
 *
 * Front-end Enqueue scripts and styles.
 */
if ( ! function_exists( 'flat_blocks_scripts' ) ) :
	function flat_blocks_scripts() {

		// Enqueue Google fonts
		wp_enqueue_style( 'flat-blocks-fonts', flat_blocks_fonts_url(), array(), null );

		// Enqueue ponyfill
		wp_enqueue_style( 'flat-blocks-ponyfill', get_template_directory_uri() . '/assets/ponyfill.css', array(), wp_get_theme()->get( 'Version' ) );

		// Enqueue theme CSS
		wp_enqueue_style( 'flat-blocks-theme', get_template_directory_uri() . '/assets/theme.css', array( 'flat-blocks-ponyfill' ), wp_get_theme()->get( 'Version' ) );

		// WordPress built-in icons (Dashicons)
		wp_enqueue_style( 'dashicons' );

		// Smooth scrolling javascript
		wp_enqueue_script( 'flat-blocks-smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

		// Fixed header javascript
		wp_enqueue_script( 'flat-blocks-fixedheader', get_template_directory_uri() . '/assets/js/fixedheader.js', array('jquery'), wp_get_theme()->get( 'Version' ), true );

		// Register custom block styles
		if ( function_exists( 'register_block_style' ) ) {
			wp_register_style('flat-blocks-custom-styles', get_template_directory_uri() . '/assets/css/custom-styles.css' );
			wp_enqueue_style( 'flat-blocks-custom-styles' ); //TEST

			/*wp_register_style('flat-blocks-custom-fixed', get_stylesheet_directory_uri() . '/assets/css/custom-fixed.css' );
			wp_enqueue_style( 'flat-blocks-custom-fixed' ); //TEST*/
		}

		// Add the child theme CSS if it exists.
		if ( file_exists( get_stylesheet_directory() . '/assets/theme.css' ) ) {
			wp_enqueue_style( 'flat-blocks-child-style', get_stylesheet_directory_uri() . '/assets/theme.css', array('flat-blocks-ponyfill'), wp_get_theme()->get( 'Version' ) );
		}
	}
	endif;
add_action( 'wp_enqueue_scripts', 'flat_blocks_scripts' );

/**
 * Add Google webfonts
 *
 * @return $fonts_url
 */

if ( ! function_exists( 'flat_blocks_fonts_url' ) ) :
	function flat_blocks_fonts_url() {
		if ( ! class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			return '';
		}

		$theme_data = WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();
		if ( empty( $theme_data ) || empty( $theme_data['typography'] ) || empty( $theme_data['typography']['fontFamilies'] ) ) {
			return '';
		}

		$font_families = [];
		if ( ! empty( $theme_data['typography']['fontFamilies']['custom'] ) ) {
			foreach( $theme_data['typography']['fontFamilies']['custom'] as $font ) {
				if ( ! empty( $font['google'] ) ) {
					$font_families[] = $font['google'];
				}
			}

		// NOTE: This should be removed once Gutenberg 12.1 lands stably in all environments
		} else if ( ! empty( $theme_data['typography']['fontFamilies']['user'] ) ) {
			foreach( $theme_data['typography']['fontFamilies']['user'] as $font ) {
				if ( ! empty( $font['google'] ) ) {
					$font_families[] = $font['google'];
				}
			}
		// End Gutenberg < 12.1 compatibility patch

		} else {
			if ( ! empty( $theme_data['typography']['fontFamilies']['theme'] ) ) {
				foreach( $theme_data['typography']['fontFamilies']['theme'] as $font ) {
					if ( ! empty( $font['google'] ) ) {
						$font_families[] = $font['google'];
					}
				}
			}
		}

		if ( empty( $font_families ) ) {
			return '';
		}

		// Make a single request for the theme or user fonts.
		return esc_url_raw( 'https://fonts.googleapis.com/css2?' . implode( '&', array_unique( $font_families ) ) . '&display=swap' );
	}
endif;

/**
 * Customize Global Styles
 */
if ( class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
	require get_template_directory() . '/inc/customizer/wp-customize-color-palettes.php';
	require get_template_directory() . '/inc/customizer/wp-customize-colors.php';
	require get_template_directory() . '/inc/customizer/wp-customize-fonts.php';
}

// Force menus to reload
add_action(
	'customize_controls_enqueue_scripts',
	static function () {
		wp_enqueue_script(
			'wp-customize-nav-menu-refresh',
			get_template_directory_uri() . '/inc/customizer/wp-customize-nav-menu-refresh.js',
			[ 'customize-nav-menus' ],
			wp_get_theme()->get( 'Version' ),
			true
		);
	}
);

/**
 * Social Navigation Menu.
 */
require get_template_directory() . '/inc/social-navigation.php';

/**
 * Block Styles.
 */
require get_template_directory() . '/inc/block-styles.php';

/**
 * Block Patterns.
 */
require get_template_directory() . '/inc/block-patterns.php';

// Add the child theme patterns if they exist.
if ( file_exists( get_stylesheet_directory() . '/inc/block-patterns.php' ) ) {
	require_once get_stylesheet_directory() . '/inc/block-patterns.php';
}

// Give admin notices regarding gutenberg compatibility
require get_template_directory() . '/inc/gutenberg-dependency-check.php';

/**
 * Additional theme functions
 */
require get_stylesheet_directory() . '/inc/theme-functions.php';
