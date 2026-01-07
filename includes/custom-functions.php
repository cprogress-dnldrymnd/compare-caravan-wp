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

            <?php /* --- TAXONOMY ARCHIVE (Existing Code) --- */ ?>
            <?php if (is_tax('product_brand')) { ?>
                <?php
                $term = get_queried_object();
                $name = $term->name;
                // Assuming this function exists in your theme
                $level = get_term_hierarchy_level($term, $term->taxonomy);
                ?>
                <li><span><a href="https://letsgoleisure.com/manufacturers">Manufacturer</a></span></li>
                <?php if ($level != 0) { ?>
                    <?php
                    $term_parent = get_term_by('id', $term->parent, $term->taxonomy);
                    ?>
                    <li><a href="<?= get_term_link($term_parent->term_id, 'product_brand') ?>"><?= $term_parent->name ?></a></li>
                    <li><span><?= str_replace($term_parent->name, '', $name) ?></span></li>
                    <?php if (isset($_GET['range']) && isset($_GET['id'])) { ?>
                        <li><span><?= get_the_title($_GET['id']) ?></span></li>
                    <?php } ?>
                <?php } else { ?>
                    <li><span><?= $name ?></span></li>
                <?php } ?>
            <?php } ?>

            <?php /* --- SINGLE PRODUCT (Updated Code) --- */ ?>
            <?php if (is_product()) { ?>
                <?php
                // 1. Get terms for the current product
                $terms = get_the_terms(get_the_ID(), 'product_brand');

                // 2. Check if any terms exist
                if ($terms && !is_wp_error($terms)) {
                    // Get the first brand assigned to the product
                    $term = reset($terms);
                ?>

                    <li><span><a href="https://letsgoleisure.com/manufacturers">Manufacturer</a></span></li>

                    <?php
                    // 3. Check if this brand has a parent
                    if ($term->parent != 0) {
                        $term_parent = get_term($term->parent, 'product_brand');

                        // Clean the name (replicating your logic from above)
                        $child_name = str_replace($term_parent->name, '', $term->name);
                    ?>
                        <li><a href="<?= get_term_link($term_parent) ?>"><?= $term_parent->name ?>z</a></li>
                        <li><a href="<?= get_term_link($term) ?>"><?= $child_name ?>x</a></li>
                    <?php
                    } else {
                       
                    ?>
                        <li><a href="<?= get_term_link($term) ?>"><?= $term->name ?></a></li>
                <?php
                    }
                }
                ?>

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

