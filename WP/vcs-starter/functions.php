<?php

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );

add_image_size('logo', 150, 80, false);

add_image_size('img-s', 219, 159, true);

add_image_size('img-l', 462, 345, true);

add_image_size('company-logo', 60, 60, false);

add_image_size('social-logo', 36, 36, true);

// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

    if ( !is_admin() ) {
        
        wp_deregister_script('jquery');
        wp_register_script('jquery', ASSETS_URL . '/assets/js/jquery.min.js', false, false, true);

        wp_register_script('carousel', ASSETS_URL . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);
        wp_register_script('custom', ASSETS_URL . '/assets/js/custom.js', array('carousel'), false, true);
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('carousel');
        wp_enqueue_script('custom');
    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');


function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/main.css';

	if( $styles_path ) {
	
		wp_register_style('fonts', 'https://fonts.googleapis.com/css?family=Lato|Montserrat:400,700|Open+Sans:400,400i&amp;subset=latin-ext', array(), false, 'all');
        wp_register_style('fontawesome', 'https://use.fontawesome.com/releases/v5.4.2/css/all.css', array('fonts'), false, 'all');
        wp_register_style('carousel.min', ASSETS_URL . '/assets/css/owl.carousel.min.css', array('fontawesome'), false, 'all');
        wp_register_style('owl.theme', ASSETS_URL . '/assets/css/owl.theme.default.min.css', array('carousel.min'), false, 'all');
        wp_register_style('style', ASSETS_URL . '/assets/css/style.css', array('owl.theme'), false, 'all');
        
		wp_enqueue_style('fonts');
        wp_enqueue_style('fontawesome');
        wp_enqueue_style('carousel.min');
        wp_enqueue_style('owl.theme');
        wp_enqueue_style('style');
	}
}
add_action('wp_enqueue_scripts', 'theme_stylesheets');

// Apibrėžiame navigacijas

function register_theme_menus() {
   
	register_nav_menus(array( 
        'primary-navigation' => __( 'Primary Navigation' ),
        'footer-navigation' => __( 'Footer Navigation' )
    ));
}

add_action( 'init', 'register_theme_menus' );

// Apibrėžiame widgets juostas

#$sidebars = array( 'Footer Widgets', 'Blog Widgets' );

if( isset($sidebars) && !empty($sidebars) ) {

	foreach( $sidebars as $sidebar ) {

		if( empty($sidebar) ) continue;

		$id = sanitize_title($sidebar);

		register_sidebar(array(
			'name' => $sidebar,
			'id' => $id,
			'description' => $sidebar,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		));
	}
}

// Custom posts

$themePostTypes = array(
//'Testimonials' => 'Testimonial'

);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = 'vcs-starter' . '-' . sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function dump($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

?>