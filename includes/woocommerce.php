<?php
function rename_brand_to_manufacturer($translated_text, $text, $domain)
{
    if ($domain === 'woocommerce') { // Replace 'woocommerce' with your specific brand plugin's text domain if different
        switch ($translated_text) {
            case 'Brand':
                $translated_text = 'Manufacturer';
                break;
            case 'Brands':
                $translated_text = 'Manufacturers';
                break;
        }
    }
    return $translated_text;
}
add_filter('gettext', 'rename_brand_to_manufacturer', 20, 3);
add_filter('ngettext', 'rename_brand_to_manufacturer', 20, 3);

function listing_slider($term_id)
{
    ob_start();
    $listings = get_posts(array(
        'post_type' => 'product',
        'numberposts' => 4,
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_brand',
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
        ),
    ));
?>
    <div class="swiper-holder swiper-<?= $term_id ?>">
        <div class="swiper swiper-listing" style="--fit: contain">
            <div class="swiper-wrapper">
                <?php foreach ($listings as $listing) { ?>
                    <div class="swiper-slide">
                        <?= listing_grid($listing) ?>
                    </div>
                <?php } ?>
            </div>
            <div class="swiper-pagination swiper-pagination-dark mt-4 mt-lg-5 mb-4 mb-lg-0 text-center position-static">
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}

function listing_grid($post_id)
{
    ob_start();
    $product = wc_get_product($post_id);
    $count = '';
    $add_s = '';
    $pill_specs = get_field('pill_specs', $post_id);

    if ($product && $product->is_type('grouped')) {
        // 4. Get the array of child product IDs
        $child_product_ids = $product->get_children();
        // 5. (Optional) Display the IDs
        if (! empty($child_product_ids)) {
            $count = count($child_product_ids);
            if ($count > 1) {
                $add_s = 's';
            }
        }
    }
?>
    <div class="listing-grid h-100 position-relative rounded style-1 background-white">
        <div class="listing-grid-item__top position-relative">
            <h3><?= $product->get_name() ?></h3>
            <div class="desc mb-3 mt-3">
                <?= wpautop($product->get_short_description()) ?>
            </div>
            <div class="listing-grid__image image-style">
                <?= $product->get_image('large'); ?>
            </div>
        </div>
        <div class="listing-grid-item__bottom ">
            <div class="p-20">
                
                <div class="pill-specs pill-specs-grid fs-14 fw-semibold mb-3">
                    <?php
                    if ($pill_specs) {
                        echo $pill_specs;
                    }
                    ?>
                </div>

                <div class="listing-grid-item__price">
                    <span class="h3 fw-medium"><?= $product->get_price_html() ?></span>
                </div>
            </div>

            <div class="listing-grid-item__button border-top p-20">
                <a href="<?= get_the_permalink($post_id) ?>" class="btn btn-primary w-100 btn-lg">
                    View <?= $count ?> Model<?= $add_s ?>
                </a>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * @snippet       Adds suffix to WooCommerce prices
 * @how-to        businessbloomer.com/woocommerce-customization
 * @author        Rodolfo Melogli, Business Bloomer
 * @compatible    WooCommerce 7
 * @community     https://businessbloomer.com/club/
 */

add_filter('woocommerce_get_price_suffix', 'bbloomer_add_price_suffix', 99, 4);

function bbloomer_add_price_suffix($html, $product, $price, $qty)
{
    $html .= '<span class="suffix">';
    $html .= ' OTR';
    $html .= '</span>';
    return $html;
}
/**
 * Renders an accordion filter with dropdowns for specified product attributes.
 * The dropdowns only show terms that are available on products within the current
 * category or taxonomy (e.g., brand) archive page.
 *
 * This function should be called from a WooCommerce template file,
 * such as archive-product.php, typically before the shop loop.
 *
 * @param array $attribute_slugs An array of attribute slugs to display (e.g., ['pa_make', 'pa_model']).
 */
function display_category_attribute_filters($attributes_to_show = array())
{

    // Ensure we are on a product taxonomy archive page (category, brand, tag, etc.) and WooCommerce is active.
    if (! is_tax(get_object_taxonomies('product')) || ! function_exists('wc_attribute_label')) {
        return;
    }

    // Get the current term object (category, brand, etc.)
    $current_term = get_queried_object();
    if (! $current_term instanceof WP_Term) {
        return;
    }

    // --- Step 1: Get all product IDs in the current taxonomy term ---
    // We only want products that are visible (e.g., not 'hidden')

    $product_query_args = array(
        'status'     => 'publish',
        'limit'      => -1,
        'return'     => 'ids',
        'visibility' => 'visible',
    );

    // Dynamically set the taxonomy query argument based on the current taxonomy
    if ($current_term->taxonomy === 'product_cat') {
        $product_query_args['category'] = array($current_term->slug);
    } elseif ($current_term->taxonomy === 'product_tag') {
        $product_query_args['tag'] = array($current_term->slug);
    } else {
        // Assume it's any other product taxonomy (like brands)
        $product_query_args['tax_query'] = array(
            array(
                'taxonomy' => $current_term->taxonomy,
                'field'    => 'slug',
                'terms'    => $current_term->slug,
            ),
        );
    }

    $product_ids = wc_get_products($product_query_args);


    // If no products, no need to show filters.
    if (empty($product_ids)) {
        return;
    }

    // --- Step 2: Start rendering the form and accordion ---

    // Get the base URL for the form action
    $form_action = get_term_link($current_term, $current_term->taxonomy);
    echo '<form method="get" id="wc-filter-form" action="' . esc_url($form_action) . '">';
    if (isset($_GET['range'])) {
        echo '<input type="hidden" name="range" value="' . $_GET['range'] . '">';
        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
    }

    // Add hidden fields for existing GET params to preserve state (like search)
    if (! empty($_GET)) {
        foreach ($_GET as $key => $value) {
            // We'll render the selects for attributes, so skip them
            if (in_array($key, $attributes_to_show, true)) {
                continue;
            }
            // Skip pagination, will be reset
            if ($key === 'paged') {
                continue;
            }
            // Add other params (like search 's') as hidden fields
            echo '<input type="hidden" name="' . esc_attr($key) . '" value="' . esc_attr(wc_clean($value)) . '" />';
        }
    }

    echo '<div class="accordion rounded" id="accordionFilter">';

    // --- Step 3: Loop through each specified attribute and find its available terms ---
    foreach ($attributes_to_show as $attribute_slug) {

        // Get all terms for this attribute that are associated with OUR list of product IDs
        $available_terms = wp_get_object_terms($product_ids, $attribute_slug);

        // If no terms are found for this attribute in this category, skip to the next attribute.
        if (is_wp_error($available_terms) || empty($available_terms)) {
            continue;
        }

        // Get the "nice name" of the attribute (e.g., "Make" from "pa_make")
        $attribute_label = wc_attribute_label($attribute_slug);

        // Create a unique ID for the accordion controls
        $collapse_id = 'collapse-' . esc_attr($attribute_slug);

        // Get the current value from the URL for this attribute
        $current_value = (isset($_GET[$attribute_slug])) ? wc_clean(wp_unslash($_GET[$attribute_slug])) : '';

    ?>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="false" aria-controls="<?php echo $collapse_id; ?>">
                    <span class="accordion-button-inner">
                        <span class="icon-text">
                            <?php echo esc_html($attribute_label); ?>
                        </span>
                    </span>
                </button>
            </h2>
            <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFilter">
                <div class="accordion-body">

                    <div class="form-control-holder">
                        <label class="mb-2 fw-semibold" for="<?php echo esc_attr($attribute_slug); ?>">
                            <?php echo esc_html($attribute_label); ?>
                        </label>
                        <select name="<?php echo esc_attr($attribute_slug); ?>" id="<?php echo esc_attr($attribute_slug); ?>" class="form-control form-control-lg wc-filter-select">
                            <option value=""><?php printf(esc_html__('Select %s', 'your-text-domain'), $attribute_label); ?></option>

                            <?php foreach ($available_terms as $term) : ?>
                                <option value="<?php echo esc_attr($term->slug); ?>" <?php selected($current_value, $term->slug); ?>>
                                    <?php echo esc_html($term->name); ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                </div>
            </div>
        </div>
<?php
    } // End foreach $attributes_to_show

    // --- Step 4: Close the accordion and form, add JS ---
    echo '</div>'; // Close accordion
    echo '</form>'; // Close form

    // Add inline script to submit form on change
    // This is the simplest way to add JS for this specific form
    $js_script = "
        document.addEventListener('DOMContentLoaded', function() {
            const filterForm = document.getElementById('wc-filter-form');
            if (filterForm) {
                filterForm.addEventListener('change', function(event) {
                    if (event.target.classList.contains('wc-filter-select')) {
                        filterForm.submit();
                    }
                });
            }
        });
    ";

    echo '<script>' . $js_script . '</script>';
}
/**
 * Get product brand slugs as a string for a single product by its ID.
 *
 * This function retrieves all terms from the 'product_brands' taxonomy
 * associated with a specific product ID and returns a comma-separated
 * string of their slugs.
 *
 * @param int $product_id The ID of the product.
 * @return string A comma-separated string of brand slugs. Returns an empty
 * string if no brands are found or if an error occurs.
 */
function get_product_brand_slugs_by_id($product_id, $array_val = false)
{
    // Get the terms for the product ID from the 'product_brand' taxonomy
    // If your taxonomy is named differently (e.g., 'product_brands'), change 'product_brand' below.
    $terms = get_the_terms($product_id, 'product_brand');

    $brand_slugs = array();

    // Check if terms were found and it's not a WP_Error object
    if (! empty($terms) && ! is_wp_error($terms)) {

        // Loop through each term object
        foreach ($terms as $term) {

            // --- KEY CHANGE ---
            // Only add the slug if it's a parent term (parent ID is 0)
            if ($term->parent == 0) {
                $brand_slugs[] = $term->slug;
            }
        }
    }

    if ($array_val == true) {
        return $brand_slugs;
    } else {
        return implode(', ', $brand_slugs);
    }
}

function get_product_manufacturer_level_one($product_id, $array_val = false)
{
    // Get the terms for the product ID from the 'product_brand' taxonomy
    // If your taxonomy is named differently (e.g., 'product_brands'), change 'product_brand' below.
    $terms = get_the_terms($product_id, 'product_brand');

    $brand_slugs = array();

    // Check if terms were found and it's not a WP_Error object
    if (! empty($terms) && ! is_wp_error($terms)) {

        // Loop through each term object
        foreach ($terms as $term) {

            // --- KEY CHANGE ---
            // Only add the slug if it's a parent term (parent ID is 0)
            if ($term->parent != 0) {
                $brand_slugs[] = $term->term_id;
            }
        }
    }

    if ($array_val == true) {
        return $brand_slugs;
    } else {
        return implode(', ', $brand_slugs);
    }
}

/**
 * Filters the product permalink to change the URL for grouped products.
 * This changes the link that is generated by functions like get_permalink().
 */
function custom_grouped_product_permalink_filter($post_link, $product, $leavename)
{

    if ($product->is_type('grouped')) {

        $post_link = '/test';
    }

    return $post_link;
}
add_filter('woocommerce_product_post_type_link', 'custom_grouped_product_permalink_filter', 10, 3);

function my_cpt_project_permalink_structure($post_link, $post)
{

    // Check if it's our 'project' post type and the placeholder is present
    if ('product' === $post->post_type) {
        $product = wc_get_product($post->ID);
        if ($product->get_type() == 'grouped') {
            $terms = get_product_manufacturer_level_one($post->ID, true);
            $post_link = get_term_link($terms[0], 'product_brand') . '?range=' . $post->post_name . '&id=' . $post->ID;
        }
    }

    return $post_link;
}
add_filter('post_type_link', 'my_cpt_project_permalink_structure', 10, 2);
