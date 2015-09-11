<?php
/**
 * acucr functions and definitions
 *
 * @package acucr
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'acucr_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function acucr_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on acucr, use a find and replace
	 * to change 'acucr' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'acucr', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'acucr' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'acucr_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // acucr_setup
add_action( 'after_setup_theme', 'acucr_setup' );

function romanNumerals($num){
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
        'm'  => 1000,
        'cm' => 900,
        'd'  => 500,
        'cd' => 400,
        'c'  => 100,
        'xc' => 90,
        'l'  => 50,
        'xl' => 40,
        'x'  => 10,
        'ix' => 9,
        'v'  => 5,
        'iv' => 4,
        'i'  => 1);

    foreach ($roman_numerals as $roman => $number){
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}

function is_child() {
	global $post;

	if ( ( is_page() || is_search() ) && $post->post_parent ) {
	    return true;
	} else {
	    return false;
	}
}

function is_parent() {
    global $post;

    $children = get_pages( array( 'child_of' => $post->ID ) );
    if( count( $children ) == 0 ) {
        return false;
    } else {
        return true;
    }
}

function print_page_parents($reverse = false){
	global $post;

	//create array of pages (i.e. current, parent, grandparent)
	$pages = get_ancestors($post->ID, 'page');

	if($reverse) {
		//reverse array (i.e. grandparent, parent, current)
		$pages = array_reverse($pages);
	}

	for($i=0; $i<count($pages); $i++) {
		$output.= get_the_title($pages[$i]);
		if($i != count($pages) - 1){
			$output.= " &gt; ";
			if ( is_search() ) {
				$num = get_post_field('menu_order', $post->post_parent);
			} else {
				$num = get_post_field('menu_order', $post->ID);
			}
			$num.= ". ";
			$output.=$num;
		}
	}
	echo $output;
}

//print lowest to highest
print_page_parents();

//print highest to lowest
print_page_parents($reverse = true);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function acucr_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'acucr' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'acucr_widgets_init' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
}

/**
 * Enqueue scripts and styles.
 */
function acucr_scripts() {
	wp_enqueue_style( 'acucr-style', get_stylesheet_uri() );

	wp_enqueue_script( 'acucr-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'acucr-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'acucr-scrollmagic', get_template_directory_uri() . '/js/uncompressed/ScrollMagic.js', array( 'jquery' ) );

	wp_enqueue_script( 'acucr-polyfill', get_template_directory_uri() . '/js/bind-polyfill.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'acucr-smooth-scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array( 'jquery' ) );

	wp_enqueue_script( 'acucr-scroll-glue', get_template_directory_uri() . '/js/relevant-scroll.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acucr_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

class Custom_Walker extends Walker_Page {

	function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 )
	{

		if ( $depth ) {
			$indent = str_repeat( "\t", $depth );
		} else {
			$indent = '';
		}

		$css_class = array( 'page_item', 'page-item-' . $page->ID );

		if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
			$css_class[] = 'page_item_has_children';
		}

		if ( ! empty( $current_page ) ) {
			$_current_page = get_post( $current_page );
			if ( $_current_page && in_array( $page->ID, $_current_page->ancestors ) ) {
				$css_class[] = 'current_page_ancestor';
			}
			if ( $page->ID == $current_page ) {
				$css_class[] = 'current_page_item';
			} elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
				$css_class[] = 'current_page_parent';
			}
		} elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_classes = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );

		if ( '' === $page->post_title ) {
			/* translators: %d: ID of a post */
			$page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
		}

		$children = get_pages( array( 'child_of' => $page->ID ) );

		if(count($children) !== 0) {
			if($page->post_parent) {
				$menu_order = $page->menu_order . '. ';
			} else {
				$menu_order = null;
			}
		} else {
			if($page->post_parent) {
				if(get_post($page->post_parent)->post_parent) {
					$menu_order = romanNumerals($page->menu_order) . '. ';
				} else {
					$menu_order = $page->menu_order . '. ';
				}
			} else {
				$menu_order = null;
			}
		}

		$output .= $indent . sprintf(
			'<li class="%s"><a href="%s">%s%s%s%s</a>',
			$css_classes,
			get_permalink( $page->ID ),
			$args['link_before'],
			$menu_order,
			apply_filters( 'the_title', $page->post_title, $page->ID ),
			$args['link_after']
		);

	}

}
