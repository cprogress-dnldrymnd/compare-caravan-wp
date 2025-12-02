<?php
/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/
define('theme_version', 1);
define('theme_dir', get_template_directory_uri() . '/');
define('assets_dir', theme_dir . 'assets/');
define('vendor_dir', assets_dir . 'vendors/');
function enqueue_scripts()
{
    wp_enqueue_style('fancybox', vendor_dir . 'fancybox/css/fancybox.css', NULL, theme_version);
    wp_enqueue_style('style', theme_dir . 'style.css', NULL, theme_version);


    wp_enqueue_script('swiper', vendor_dir . 'swiper/js/swiper-bundle.min.js', NULL, theme_version);
    wp_enqueue_script('fancybox', vendor_dir . 'fancybox/js/fancybox.umd.js', NULL, theme_version);
    wp_enqueue_script('bootstrap', vendor_dir . 'bootstrap/dist/js/bootstrap.bundle.min.js', NULL, theme_version);

    wp_enqueue_script('main', assets_dir . 'js/main.js', NULL, theme_version);
}

add_action('wp_enqueue_scripts', 'enqueue_scripts', 99999);

require_once('includes/woocommerce.php');
require_once('includes/custom-functions.php');
require_once('includes/wpsl.php');

add_filter('body_class', 'custom_class');
function custom_class($classes)
{
    $classes[] = 'header-light breadcrumbs-light header-background-darkgreen hero-background-darkgreen';
    return $classes;
}


/**
 * Get the hierarchy depth of a specific term.
 *
 * This function walks up the term's parent tree and counts the
 * number of levels until it reaches a top-level term (parent = 0).
 *
 * A top-level term will return 0.
 * A child term will return 1.
 * A grandchild term will return 2, and so on.
 *
 * @param int|WP_Term $term     The term ID or WP_Term object.
 * @param string      $taxonomy The name of the taxonomy the term belongs to (e.g., 'category').
 * @return int The depth of the term (0 for top-level).
 */
function get_term_hierarchy_level($term, $taxonomy)
{

    // Initialize depth
    $depth = 0;

    // Get the term object if an ID is passed
    if (is_numeric($term)) {
        $term_object = get_term($term, $taxonomy);
    } elseif ($term instanceof WP_Term) {
        // It's already a term object
        $term_object = $term;
    } else {
        // Invalid input
        return 0;
    }

    // Check for a valid term object and that it belongs to the correct taxonomy
    if (is_wp_error($term_object) || ! $term_object || $term_object->taxonomy !== $taxonomy) {
        return 0;
    }

    // Get the term's parent ID
    $current_parent_id = $term_object->parent;

    // Loop while the term has a parent (parent ID is not 0)
    while ($current_parent_id != 0) {

        // We found a parent, so increment the depth
        $depth++;

        // Get the parent term object to check *its* parent
        $parent_term = get_term($current_parent_id, $taxonomy);

        // Check for errors or if the parent term somehow doesn't exist
        if (is_wp_error($parent_term) || ! $parent_term) {
            // This is a safety break in case of orphaned terms.
            break;
        }

        // Set the new parent ID for the next loop iteration
        $current_parent_id = $parent_term->parent;
    }

    return $depth;
}

/**
 * Gets all level 1 (direct) child terms for a given parent term ID.
 *
 * @param int    $parent_term_id The ID of the parent term.
 * @param string $taxonomy       The slug of the taxonomy (e.g., 'category', 'post_tag').
 * @return array|WP_Error An array of WP_Term objects on success, or a WP_Error object on failure.
 */
function get_level_one_child_terms($parent_term_id, $taxonomy)
{
    // Ensure the parent term ID is a valid integer.
    $parent_term_id = intval($parent_term_id);

    // Arguments for the get_terms() function.
    $args = array(
        'taxonomy'   => $taxonomy,       // Specify the taxonomy.
        'parent'     => $parent_term_id, // This is the key: get only direct children of this parent.
        'hide_empty' => false,           // Set to false if you also want to get terms with 0 posts.
    );

    // Retrieve the terms.
    $child_terms = get_terms($args);

    // Return the terms (or WP_Error if something went wrong).
    return $child_terms;
}

/**
 * Add 'product_brand' taxonomy support to 'post' post type.
 */
function add_brands_to_posts()
{
    register_taxonomy_for_object_type('product_brand', 'post');
}
add_action('init', 'add_brands_to_posts');


/**
 * Register Four Footer Widget Areas
 *
 * This function is hooked into the 'widgets_init' action to register
 * four distinct sidebars (widget areas) for the website footer.
 *
 * Usage: Place this code in your theme's functions.php file.
 * To display these in your theme, you would use:
 *
 * if ( is_active_sidebar( 'footer-1' ) ) :
 * dynamic_sidebar( 'footer-1' );
 * endif;
 * // ... and repeat for footer-2, footer-3, footer-4
 */
function my_theme_register_footer_sidebars()
{

    // --- Footer Column 1 ---
    register_sidebar(array(
        'name'          => esc_html__('Header Menu', 'compare-caravan'),
        'id'            => 'header-menu',
        'description'   => esc_html__('Add widgets here for the Header Menu.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // --- Footer Column 1 ---
    register_sidebar(array(
        'name'          => esc_html__('Sideout Menu', 'compare-caravan'),
        'id'            => 'sideout-menu',
        'description'   => esc_html__('Add widgets here for the Sideout Menu.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // --- Footer Column 1 ---
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 1', 'compare-caravan'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here for the first column of the footer.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // --- Footer Column 2 ---
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 2', 'compare-caravan'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Add widgets here for the second column of the footer.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // --- Footer Column 3 ---
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 3', 'compare-caravan'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Add widgets here for the third column of the footer.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    // --- Footer Column 4 ---
    register_sidebar(array(
        'name'          => esc_html__('Footer Column 4', 'compare-caravan'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Add widgets here for the fourth column of the footer.', 'compare-caravan'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}

add_action('widgets_init', 'my_theme_register_footer_sidebars');

