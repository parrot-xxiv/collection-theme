<?php

/**
 * Collection Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Collection_Theme
 */

if (! defined('COLLECTION_VERSION')) {
	// Replace the version number of the theme on each release.
	define('COLLECTION_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function collection_theme_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Collection Theme, use a find and replace
		* to change 'collection-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('collection-theme', get_template_directory() . '/languages');

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');
	add_post_type_support('page', 'excerpt');
}
add_action('after_setup_theme', 'collection_theme_setup');

/**
 * Enqueue scripts and styles.
 */
function collection_theme_scripts()
{
	wp_enqueue_style( 'collection-theme-style', get_stylesheet_uri(), array(), COLLECTION_VERSION );
	// wp_style_add_data( 'collection-theme-style', 'rtl', 'replace' );

	// wp_enqueue_script( 'collection-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), COLLECTION_VERSION, true );
	// wp_enqueue_script('tailwind-dev', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array(), COLLECTION_VERSION, false);

	if ( ! is_page( 'par-media' ) ) { // dont enqueue in specific page / fix this conflict
		// Tailwind for prod
		wp_enqueue_style('tailwind', get_template_directory_uri() . '/css/style.css', array(), COLLECTION_VERSION, false);
	}

	wp_enqueue_script('jquery');

	wp_enqueue_script('gsap', "https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js", [], false, ['strategy' => 'defer']);
	wp_enqueue_script('gsap-flip', "https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Flip.min.js", [], false, ['strategy' => 'defer']);
	wp_enqueue_script('homepage', get_template_directory_uri() . '/js/homepage.js', ['gsap','gsap-flip','jquery'], false, ['strategy' => 'defer']);
	wp_enqueue_script('lucide', "https://unpkg.com/lucide@latest/dist/umd/lucide.js", [], false, ['strategy' => 'defer']);


}
add_action('wp_enqueue_scripts', 'collection_theme_scripts');

/**
 * All includes 
 */
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/cleanup.php';
require_once get_template_directory() . '/inc/frontend-settings.php';
require_once get_template_directory() . '/inc/page-metabox.php';
// require_once get_template_directory() . '/inc/tailwind-dev.php';
