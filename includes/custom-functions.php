<?php
function blog_grid($post_id)
{
    ob_start();
    $post_categories = get_the_terms($post_id, 'category');
?>
    <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
        <div class="image-box image-style">
            <a href="<?= get_the_permalink($post_id) ?>">
                <?= get_the_post_thumbnail($post_id, 'large') ?>
            </a>
        </div>
        <div class="content-box p-20">
            <div class="blog-grid--category fs-14 fw-semibold mb-3">
                <span><?= $post_categories[0]->name ?></span>
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
    $post_categories = get_the_terms($post_id, 'category');
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
                    <span><?= $post_categories[0]->name ?></span>
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
    } else if (is_product()) {
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
            <li><a href="/">Home</a></li>
            <?php if (is_tax('product_brand')) { ?>
                <?php
                $term = get_queried_object();
                $name = $term->name;
                $level = get_term_hierarchy_level($term, $term->taxonomy);
                ?>
                <li><span>Manufacturer</span></li>
                <?php if ($level != 0) { ?>
                    <?php
                    $term_parent = get_term_by('id', $term->parent, $term->taxonomy);
                    ?>
                    <li><span><?= $term_parent->name ?></span></li>
                <?php } ?>
                <li><span><?= $name ?></span></li>
            <?php } ?>

            <?php if (is_product()) { ?>
                <li><span><?= get_the_title() ?></span></li>
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
    // Regex for Vimeo: vimeo.com/ or vimeo.com/video/ followed by digits
    $vimeo_pattern = '~'
        . 'vimeo\.com\/(?:video\/)?' // Matches vimeo.com/ or vimeo.com/video/
        . '(\d+)'                    // Captures the numeric video ID
        . '~';

    if (preg_match($vimeo_pattern, $url, $vimeo_matches)) {
        if (isset($vimeo_matches[1])) {
            $video_id = $vimeo_matches[1];
            $embed_url = 'https://player.vimeo.com/video/' . $video_id;
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
