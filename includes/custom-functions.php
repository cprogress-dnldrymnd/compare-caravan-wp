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
 * Gets a clean YouTube embed URL from various YouTube link formats.
 *
 * This function parses a URL to find the 11-character YouTube video ID
 * and returns the standardized embed-only URL. It works with standard
 * 'watch', shortened 'youtu.be', and 'embed' links.
 *
 * @param string $url The YouTube URL to parse.
 * @return string The clean embed URL (e.g., 'https://www.youtube.com/embed/VIDEO_ID')
 * or an empty string if no valid ID is found.
 */
function get_youtube_embed_url( $url ) {
    $video_id = '';

    // A comprehensive regex to find the video ID from all common URL types
    // It looks for 'v=', 'v/', 'embed/', or 'youtu.be/' followed by the 11-character ID.
    $pattern = '~'
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
    if ( preg_match( $pattern, $url, $matches ) ) {
        // The video ID will be in the first capture group ($matches[1])
        if ( isset( $matches[1] ) ) {
            $video_id = $matches[1];
        }
    }

    // If we found a video ID, construct and return the standard embed URL
    if ( ! empty( $video_id ) ) {
        return 'https://www.youtube.com/embed/' . $video_id;
    }

    // If no ID was found, return an empty string
    return '';
}