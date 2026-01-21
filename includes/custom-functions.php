<?php
function blog_grid($post_id)
{
    ob_start();
?>
    <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
        <div class="image-box image-style">
            <a href="<?= get_the_permalink($post_id) ?>">
                <?= get_the_post_thumbnail($post_id, 'large') ?>
            </a>
        </div>
        <div class="content-box p-20">
            <div class="blog-grid--category fs-14 fw-semibold mb-3">
                <?= post_categories($post_id) ?>
            </div>
            <div class="blog-grid--title mb-4">
                <h3 class="fs-25 fw-semibold">
                    <a class="text-decoration-none text-color" href="<?= get_the_permalink($post_id) ?>">
                        <?= get_the_title($post_id) ?>
                    </a>
                </h3>
            </div>
            <div class="blog-grid--date fs-14 fw-semibold">
                <?= get_the_date(NULL, $post_id) ?>
            </div>
        </div>
    </div>
<?php
    return ob_get_clean();
}
function blog_grid_featured($post_id)
{
    ob_start();
?>
    <div class="blog-grid--holder--featured h-100">
        <div class="blog-grid--holder--featured-inner background-text text-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
            <div class="image-box image-style">
                <a href="<?= get_the_permalink($post_id) ?>">
                    <?= get_the_post_thumbnail($post_id, 'large') ?>
                </a>
            </div>
            <div class="content-box p-5">
                <div class="blog-grid--category fs-14 fw-semibold mb-3">
                    <?= post_categories($post_id) ?>
                </div>
                <div class="blog-grid--title mb-4">
                    <h3 class="h2 fw-semibold">
                        <a class="text-decoration-none text-white" href="<?= get_the_permalink($post_id) ?>">
                            <?= get_the_title($post_id) ?>
                        </a>
                    </h3>
                </div>
                <div class="blog-grid--date fs-14 fw-semibold">
                    <?= get_the_date(NULL, $post_id) ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

function action_wp_head()
{
    if (is_tax('product_brand')) {
        $term = get_queried_object();
        $background_color = get_field('background_color', $term);
        $level = get_term_hierarchy_level($term, $term->taxonomy);
        $background_color = get_field('background_color', $term);
        if (!$background_color && $level != 0) {
            $term_parent = get_term_by('id', $term->parent, $term->taxonomy);
            $background_color = get_field('background_color', $term_parent);
        }
    ?>
        <style>
            .main-header.main-header#main-header,
            .background--color.background--color.background--color.background--color {
                background-color: <?= $background_color ?>;
            }
        </style>
        <?php
    } else if (is_product() || get_post_type() == 'post') {
        $terms = get_the_terms(get_the_ID(), 'product_brand');
        if ($terms && !is_wp_error($terms)) {
            $term = $terms[0];
            $background_color = get_field('background_color', $term);
        ?>
            <style>
                .main-header.main-header#main-header,
                .background--color.background--color.background--color.background--color {
                    background-color: <?= $background_color ?>;
                }

                .list--checkbox li:before {
                    border-color: <?= $background_color ?>;
                }
            </style>
    <?php
        }
    }
}
add_action('wp_head', 'action_wp_head');


function breadcrumbs()
{
    ob_start();
    ?>
    <div class="breadcrumbs fs-16 mt-3">
        <ul class="list-inline">
            <li><a href="https://letsgoleisure.com/home">Home</a></li>
            <?php if (is_tax('product_brand') || is_product()) { ?>
                <li><span><a href="https://letsgoleisure.com/manufacturers">Manufacturer</a></span></li>
            <?php } ?>
            <?php if (is_tax('product_brand')) { ?>
                <?php
                $term = get_queried_object();
                $name = $term->name;
                $level = get_term_hierarchy_level($term, $term->taxonomy);
                ?>
                <?php if ($level != 0) { ?>
                    <?php
                    $term_parent = get_term_by('id', $term->parent, $term->taxonomy);
                    ?>
                    <li><a href="<?= get_term_link($term_parent->term_id, 'product_brand') ?>"><?= $term_parent->name ?></a></li>
                    <?php if (isset($_GET['range']) && isset($_GET['id'])) { ?>
                        <li><a href="<?= get_term_link($term->term_id, 'product_brand') ?>"><?= str_replace($term_parent->name, '', $name) ?></a></li>
                        <li><span><?= get_the_title($_GET['id']) ?></span></li>
                    <?php } else { ?>
                        <li><span><?= str_replace($term_parent->name, '', $name) ?></span></li>
                    <?php } ?>
                <?php } else { ?>
                    <li><span><?= $name ?></span></li>
                <?php } ?>
            <?php } ?>

            <?php if (is_product()) { ?>
                <?php
                $terms = get_the_terms(get_the_ID(), 'product_brand');
                foreach ($terms as $term) {
                    $level = get_term_hierarchy_level($term, $term->taxonomy);
                    if ($level == 0) {
                        $manufacturer_email = get_field('email', $term);

                        $term_parent = array(
                            'id' => $term->term_id,
                            'name' => $term->name,
                        );
                    } else {
                        $term_child = array(
                            'id' => $term->term_id,
                            'name' => $term->name,
                        );
                    }
                }
                ?>
                <li class="manufacturer-email" value="<?= $manufacturer_email ?>"><a href="<?= get_term_link($term_parent['id'], 'product_brand') ?>"><?= $term_parent['name'] ?></a></li>
                <?php if (isset($term_child)) { ?>
                    <li>
                        <a href="<?= get_term_link($term_child['id'], 'product_brand') ?>"><?= str_replace($term_parent['name'], '', $term_child['name']) ?></a>
                    </li>
                    <?php if (isset($_GET['range']) && isset($_GET['id'])) { ?>
                        <?php
                        $parameters = '?range=' . $_GET['range'] . '&id=' . $_GET['id'];
                        ?>
                        <li><a href="<?= get_term_link($term_child['id'], 'product_brand') . $parameters ?>"><?= get_the_title($_GET['id']) ?></a></li>
                    <?php } ?>
                <?php } ?>

                <li><span><?= get_the_title() ?></span></li>
            <?php } ?>
            <?php if (is_archive() && !is_tax('product_brand')) { ?>
                <li><span><?= get_the_archive_title() ?></span></li>
            <?php } ?>
            <?php if (is_home()) { ?>
                <li><span>Blogs</span></li>
            <?php } ?>
        </ul>
    </div>
<?php
    return ob_get_clean();
}

/**
 * Gets a clean video embed URL from various YouTube or Vimeo link formats.
 *
 * This function parses a URL to find the video ID
 * and returns the standardized embed-only URL for either platform.
 *
 * @param string $url The YouTube or Vimeo URL to parse.
 * @return string The clean embed URL (e.g., 'https://www.youtube.com/embed/VIDEO_ID'
 * or 'https://player.vimeo.com/video/VIDEO_ID') or an empty
 * string if no valid ID is found.
 */
function get_video_embed_url($url)
{
    $video_id = '';
    $embed_url = '';

    // Check for Vimeo first
    // Regex matches: vimeo.com/ or vimeo.com/video/ or player.vimeo.com/video/ followed by digits
    // Added support for 'player.vimeo.com' in the regex for robustness, though the previous one often caught it.
    $vimeo_pattern = '~'
        . '(?:vimeo\.com\/(?:video\/)?|player\.vimeo\.com\/video\/)' // Matches domain and path variants
        . '(\d+)'                                                    // Captures the numeric video ID
        . '~';

    if (preg_match($vimeo_pattern, $url, $vimeo_matches)) {
        if (isset($vimeo_matches[1])) {
            $video_id = $vimeo_matches[1];
            $embed_url = 'https://player.vimeo.com/video/' . $video_id;

            // Check if the original URL has query parameters (e.g. ?h=0dd10d246d)
            $query_string = parse_url($url, PHP_URL_QUERY);

            // If parameters exist, append them to the generated embed URL
            if ($query_string) {
                $embed_url .= '?' . $query_string;
            }
        }
    }

    // If not Vimeo, check for YouTube
    if (empty($embed_url)) {
        // A comprehensive regex to find the video ID from all common URL types
        // It looks for 'v=', 'v/', 'embed/', or 'youtu.be/' followed by the 11-character ID.
        $youtube_pattern = '~'
            . '(?:'                        // Start a non-capturing group for URL patterns
            . 'v='                     // Standard 'watch' URL query parameter
            . '|'                      // OR
            . 'v\/'                   // Less common '/v/' format
            . '|'                      // OR
            . 'embed\/'               // Standard 'embed' URL path
            . '|'                      // OR
            . 'youtu\.be\/'           // Shortened 'youtu.be' domain
            . ')'                          // End non-capturing group
            . '([a-zA-Z0-9_-]{11})'       // Capture the 11-character video ID
            . '~';

        // Check if the pattern matches the given URL
        if (preg_match($youtube_pattern, $url, $youtube_matches)) {
            // The video ID will be in the first capture group ($matches[1])
            if (isset($youtube_matches[1])) {
                $video_id = $youtube_matches[1];
                $embed_url = 'https://www.youtube.com/embed/' . $video_id;

                // Optional: If you want to support YouTube params (like ?start=), you can do the same here:
                // $query_string = parse_url($url, PHP_URL_QUERY);
                // if ($query_string) { $embed_url .= '?' . $query_string; }
            }
        }
    }

    // If we found an embed URL, return it
    if (! empty($embed_url)) {
        return $embed_url;
    }

    // If no ID was found, return an empty string
    return '';
}



/**
 * Function to output values from a string that exist in a target array.
 *
 * @param string $text The input string to search.
 * @param array $targetValues The array of values to look for.
 */
function outputFoundValues($text, $targetValues = ["Campervans", "Caravans", "Motorhomes"])
{
    // Loop through each item in the array
    foreach ($targetValues as $value) {
        // use stripos for case-insensitive search, or strpos for case-sensitive
        if (stripos($text, $value) !== false) {
            return $value . "\n";
        }
    }
}


function post_categories($id = false)
{
    ob_start();
    if (!$id) {
        $post_id = get_the_ID();
    } else {
        $post_id = $id;
    }
    $post_categories = get_the_terms($post_id, 'category');
    $manufacturers = get_the_terms($post_id, 'product_brand');

?> <div class="post-categories">
        <?php foreach ($post_categories as $post_category) { ?>
            <span><?= $post_category->name ?></span>
        <?php } ?>
        <?php foreach ($manufacturers as $manufacturer) { ?>
            <?php if ($manufacturer->parent == 0) { ?>
                <span><?= $manufacturer->name ?></span>
            <?php } ?>
        <?php } ?>
    </div>
<?php
    return ob_get_clean();
}

/**
 * 1. Add Custom Fields to Menu Item (Admin)
 */
function my_menu_add_custom_fields($item_id, $item, $depth, $args)
{
    $icon_svg = get_post_meta($item_id, '_menu_item_icon_svg', true);
    $mobile_only = get_post_meta($item_id, '_menu_item_mobile_only', true);
?>

    <p class="field-custom description description-wide">
        <label for="edit-menu-item-icon-svg-<?php echo $item_id; ?>">
            <?php _e('Paste SVG Code', 'textdomain'); ?><br />
            <textarea
                id="edit-menu-item-icon-svg-<?php echo $item_id; ?>"
                class="widefat code edit-menu-item-custom"
                rows="3"
                placeholder="<svg...>"
                name="menu_item_icon_svg[<?php echo $item_id; ?>]"><?php echo esc_textarea($icon_svg); ?></textarea>
            <span class="description"><?php _e('Paste raw SVG code here. It will be sanitized for security.', 'textdomain'); ?></span>
        </label>
    </p>

    <p class="field-custom description description-wide">
        <label for="edit-menu-item-mobile-only-<?php echo $item_id; ?>">
            <input type="checkbox"
                id="edit-menu-item-mobile-only-<?php echo $item_id; ?>"
                value="1"
                name="menu_item_mobile_only[<?php echo $item_id; ?>]"
                <?php checked($mobile_only, 1); ?> />
            <?php _e('Display only on Mobile?', 'textdomain'); ?>
        </label>
    </p>
<?php
}
add_action('wp_nav_menu_item_custom_fields', 'my_menu_add_custom_fields', 10, 4);

/**
 * 2. Save Custom Fields (Admin)
 */
function my_menu_save_custom_fields($menu_id, $menu_item_db_id)
{

    // Save SVG: We need to define allowed tags because standard sanitization strips SVG
    if (isset($_POST['menu_item_icon_svg'][$menu_item_db_id])) {
        $raw_svg = $_POST['menu_item_icon_svg'][$menu_item_db_id];

        // Sanitize using wp_kses
        update_post_meta($menu_item_db_id, '_menu_item_icon_svg', $raw_svg);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_icon_svg');
    }

    // Save Mobile Only Checkbox
    if (isset($_POST['menu_item_mobile_only'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_mobile_only', 1);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_mobile_only');
    }
}
add_action('wp_update_nav_menu_item', 'my_menu_save_custom_fields', 10, 2);

/**
 * 3. Display SVG in Menu (Frontend)
 */
function my_menu_display_svg($title, $item, $args, $depth)
{
    $svg_code = get_post_meta($item->ID, '_menu_item_icon_svg', true);
    $is_mobile_only = get_post_meta($item->ID, '_menu_item_mobile_only', true);

    if (! empty($svg_code)) {
        // Wrap SVG in a span for easier CSS styling
        $icon_html = '<span class="menu-item-svg-icon ' . ($is_mobile_only ? 'd-block d-lg-none' : '') . '">' . $svg_code . '</span> ';
        return $icon_html . $title;
    }

    return $title;
}
add_filter('nav_menu_item_title', 'my_menu_display_svg', 10, 4);


/**
 * 4. Add Helper Class for Mobile Only (Frontend)
 */
function my_menu_add_mobile_class($classes, $item, $args, $depth)
{
    $svg_code = get_post_meta($item->ID, '_menu_item_icon_svg', true);


    if ($svg_code) {
        $classes[] = 'menu-item-has-icon';
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'my_menu_add_mobile_class', 10, 4);
