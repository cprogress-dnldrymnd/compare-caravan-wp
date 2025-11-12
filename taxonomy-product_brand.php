 <?php get_header(); ?>
 <?php
    $term = get_queried_object();
    $term_id = $term->term_id;
    $level = get_term_hierarchy_level($term, $term->taxonomy);
    $child_terms = get_level_one_child_terms($term_id, $term->taxonomy);
    if (isset($_GET['range'])) {
        $name = get_the_title($_GET['id']);
        $description = false;
        $thumbnail_id = get_post_thumbnail_id($_GET['id']);
        $is_range = true;
    } else {
        $name = $term->name;
        $description = $term->description;
        $thumbnail_id = get_term_meta($term_id, 'thumbnail_id', true);
        $is_range = false;
    }
    ?>
 <section class="hero background--color position-relative">
     <?php
        if ($is_range == true) {
            echo '<div class="background-image">';
            echo wp_get_attachment_image($thumbnail_id, 'large');
            echo '</div>';
        }
        ?>
     <div class="container">
         <?= breadcrumbs() ?>
         <div class="hero-title-image md-margin-top ">

             <div class="row">
                 <div class="col-lg-6 md-padding-bottom">
                     <h1 class="mb-4"><?= $name ?></h1>
                     <?php if ($description) { ?>
                         <div class="desc mb-4">
                             <?= wpautop($description) ?>
                         </div>
                     <?php } ?>
                 </div>
                 <?php if ($thumbnail_id && $level == 0) { ?>
                     <div class="col-lg-6">
                         <div class="image-box">
                             <?= wp_get_attachment_image($thumbnail_id, 'large') ?>
                         </div>
                     </div>
                 <?php } ?>

             </div>
         </div>
     </div>
 </section>



 <?php if ($level == 0) { ?>
     <section class="grid-section  sm-padding-top sm-padding-bottom">
         <div class="container">
             <div class="heading-icon mb-5">
                 <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="42.568"
                         height="42.576" viewBox="0 0 42.568 42.576">
                         <path id="Icon_awesome-search" data-name="Icon awesome-search"
                             d="M41.989,36.809,33.7,28.52a1.994,1.994,0,0,0-1.414-.582H30.931a17.287,17.287,0,1,0-2.993,2.993v1.355A1.994,1.994,0,0,0,28.52,33.7l8.29,8.29a1.987,1.987,0,0,0,2.819,0l2.353-2.353A2,2,0,0,0,41.989,36.809ZM17.295,27.938A10.643,10.643,0,1,1,27.938,17.295,10.637,10.637,0,0,1,17.295,27.938Z"
                             fill="#f2007d" />
                     </svg>Discover the perfect <?= $name ?> leisure vehicle to suit your needs</h2>
             </div>
             <div class="swiper swiper-grid-slider swiper-grid-slider-js-1">
                 <div class="swiper-wrapper">
                     <?php foreach ($child_terms as $child_term) { ?>
                         <?php
                            $child_name = $child_term->name;
                            $child_description = $child_term->description;
                            $child_thumbnail_id = get_term_meta($child_term->term_id, 'thumbnail_id', true);
                            ?>
                         <div class="swiper-slide">
                             <div
                                 class="grid-section--inner rounded overflow-hidden background--color h-100 bg-decor bg-decor-1 overflow-hidden position-relative">
                                 <?php if ($child_thumbnail_id) { ?>
                                     <div class="image-box text-end image-style" style="--fit: contain;">
                                         <?= wp_get_attachment_image($child_thumbnail_id, 'large') ?>
                                     </div>
                                 <?php } ?>
                                 <div class="content-box px-5 pb-5 text-white position-relative">
                                     <h3><?= $child_name ?></h3>
                                     <?php if ($child_description) { ?>
                                         <div class="desc fw-medium mb-4 mt-4">
                                             <?= wpautop($child_description) ?>
                                         </div>
                                     <?php } ?>
                                     <a href="<?= get_term_link($child_term->term_id, $child_term->taxonomy) ?>" class="btn btn-primary">
                                         Browse <?= $child_name ?>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </div>
         </div>
     </section>
 <?php } ?>
 <?php $has_cta = get_field('has_cta', $term); ?>
 <?php if ($has_cta) {

        $heading = get_field('cta_heading', $term);
        $cta_description = get_field('cta_description', $term);
        $button = get_field('cta_button', $term);
        $button_text = $button['title'];
        $button_url = $button['url'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        $image = get_field('cta_image', $term);
    ?>
     <section class="cta-section text-white sm-margin-bottom">
         <div class="container">
             <div class="cta-section-inner background--color rounded-3 overflow-hidden">
                 <div class="row g-0">
                     <div class="col-lg-5 d-flex flex-column justify-content-between p-5">
                         <div class="content-box mb-5">
                             <h2><?= $heading ?></h2>
                             <?php if ($cta_description) { ?>
                                 <div class="desc-box">
                                     <?= wpautop($cta_description) ?>
                                 </div>
                             <?php } ?>
                         </div>
                         <div class="button-box">
                             <a target="<?= $button_target ?>" href="<?= $button_url ?>" class="btn btn-primary btn-lg"><?= $button_text ?></a>
                         </div>
                     </div>
                     <?php if ($image) { ?>
                         <div class="col-lg-7">
                             <div class="image-box">
                                 <?= wp_get_attachment_image($image, 'full', false, 'class=w-100') ?>
                             </div>
                         </div>
                     <?php } ?>

                 </div>
             </div>
         </div>
     </section>
 <?php } ?>
 <?php if ($level == 0) { ?>
     <section class="deals-tabs  sm-padding-bottom overflow-hidden">
         <div class="container">
             <div class="heading-icon mb-5">
                 <h2 class="d-flex align-items-center gap-3">
                     <svg xmlns="http://www.w3.org/2000/svg" width="36.887" height="59.014"
                         viewBox="0 0 36.887 59.014">
                         <g id="flame-svgrepo-com" transform="translate(-114.73 0.001)">
                             <path id="Path_1057" data-name="Path 1057"
                                 d="M124.5,58.935a.636.636,0,0,0,.832-.906,14.591,14.591,0,0,1-.84-14.459c4.82-10.775,7.752-16.355,7.752-16.355a38.793,38.793,0,0,0,5.788,12.3c4.07,5.573,6.3,12.582,2.706,18.42a.636.636,0,0,0,.83.9C146.011,56.565,151,52,151.56,42.927A31.056,31.056,0,0,0,149.9,31.37c-2-6.211-4.459-9.108-5.881-10.353a.636.636,0,0,0-1.052.522c.415,6.7-2.106,8.4-3.541,4.569a23.452,23.452,0,0,1-.907-7.4,25.312,25.312,0,0,0-4.991-15.383A17.422,17.422,0,0,0,130.392.134a.636.636,0,0,0-1.023.55c.264,3.639.025,14.067-9.124,26.526-8.3,11.557-5.081,20.433-3.94,22.837A18.814,18.814,0,0,0,124.5,58.935Z"
                                 transform="translate(0 0)" fill="#f2007d" />
                         </g>
                     </svg>
                     <?= $name ?> latest deals
                 </h2>
             </div>
             <div class="deals-swiper-holder">
                 <div class="tab-nav-holder mb-5">
                     <div class="container p-0">
                         <div class="nav-tabs-swiper swiper overflow-visible">
                             <ul class=" swiper-wrapper nav nav-tabs nav-tabs-style-2" id="myTabDeals-Swiper">
                                 <?php foreach ($child_terms as $key => $child_term) { ?>
                                     <?php
                                        $child_name = $child_term->name;
                                        $child_term_id = $child_term->term_id;
                                        $child_description = $child_term->description;
                                        $child_thumbnail_id = get_term_meta($child_term_id, 'thumbnail_id', true);
                                        ?>
                                     <li class="swiper-slide nav-item">
                                         <button class="nav-link <?= $key == 0  ? 'active' : '' ?>" id="Deals-<?= $child_term_id ?>-tab" data-bs-toggle="tab"
                                             data-bs-target="#Deals-<?= $child_term_id ?>-tab-pane" type="button" role="tab"
                                             aria-controls="Deals-<?= $child_term_id ?>-tab-pane"
                                             aria-selected="true">
                                             <?= $child_name ?>
                                         </button>
                                     </li>
                                 <?php } ?>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="tab-content-holder">
                     <div class="container p-0">
                         <div class="tab-content" id="myTabDeals-SwiperContent">
                             <?php foreach ($child_terms as $key => $child_term) { ?>
                                 <?php
                                    $child_term_id = $child_term->term_id;
                                    $child_name = $child_term->name;
                                    ?>
                                 <div class="tab-pane fade <?= $key == 0  ? 'active show' : '' ?>" id="Deals-<?= $child_term_id ?>-tab-pane" role="tabpanel"
                                     aria-labelledby="Deals-<?= $child_term_id ?>-tab" tabindex="0">
                                     <?= listing_slider($child_term_id) ?>
                                 </div>
                             <?php } ?>

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <?php
        $latest_post = get_posts(array(
            'post_type' => 'post',
            'numberposts' => 1,
            'fields' => 'ids',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_brand',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                ),
            ),
        ));
        $posts = get_posts(array(
            'post_type' => 'post',
            'numberposts' => 4,
            'fields' => 'ids',
            'exclude' => $latest_post,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_brand',
                    'field'    => 'term_id',
                    'terms'    => $term_id,
                ),
            ),
        ));
        ?>
     <section class="latest-news  sm-padding-bottom sm-padding-top">
         <div class="container">
             <div class="heading-icon mb-5">
                 <h2 class="d-flex align-items-center gap-3">
                     <svg xmlns="http://www.w3.org/2000/svg" width="44.015" height="36" viewBox="0 0 44.015 36">
                         <g id="Q3_icons" data-name="Q3 icons" transform="translate(-1.998 -6)">
                             <g id="Group_717" data-name="Group 717">
                                 <path id="Path_1060" data-name="Path 1060"
                                     d="M34,6h-.6l-30,8.8a2,2,0,0,0-1.4,2v9a2.2,2.2,0,0,0,1.4,2l30,8.8H34a2,2,0,0,0,2-2V8A2,2,0,0,0,34,6ZM19.1,34.2,8.4,31l1.3,8.4A2.9,2.9,0,0,0,12.6,42h4.5a2.8,2.8,0,0,0,2.1-1,3.4,3.4,0,0,0,.8-2.6Z"
                                     fill="#f2007d" />
                                 <path id="Path_1061" data-name="Path 1061"
                                     d="M40,15.3a1.5,1.5,0,0,0,.9-.2l4-2a2.012,2.012,0,1,0-1.8-3.6l-4,2a2,2,0,0,0-.9,2.7A2.1,2.1,0,0,0,40,15.3Z"
                                     fill="#f2007d" />
                                 <path id="Path_1062" data-name="Path 1062"
                                     d="M44.9,29.6l-4-2a2.1,2.1,0,0,0-2.7.8,2,2,0,0,0,.9,2.7l4,2a1.5,1.5,0,0,0,.9.2,2.1,2.1,0,0,0,1.8-1.1,1.9,1.9,0,0,0-.9-2.6Z"
                                     fill="#f2007d" />
                                 <path id="Path_1063" data-name="Path 1063"
                                     d="M40,23.3h4a2,2,0,0,0,0-4H40a2,2,0,0,0,0,4Z" fill="#f2007d" />
                             </g>
                         </g>
                     </svg>
                     Latest news and updates
                 </h2>
             </div>
             <div class="blogs--holder">
                 <div class="row blogs-row g-sm">
                     <div class="col-lg-6">
                         <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                             <div class="row g-sm h-100">
                                 <?php foreach ($posts as $post) { ?>
                                     <div class="col-lg-6 blog-grid-insert">
                                         <?= blog_grid($post) ?>
                                     </div>
                                 <?php } ?>
                             </div>
                             <div class="swiper-pagination swiper-pagination-dark d-block d-lg-none mt-4 text-center position-static"></div>

                         </div>
                     </div>
                     <div class="col-lg-6 d-none d-lg-block">
                         <?= blog_grid_featured($latest_post[0]) ?>
                     </div>
                 </div>
             </div>

             <div class="button-box text-center mt-5">
                 <a type="submit" class="btn btn-primary btn-lg" href="https://caravancompare.theprogressteam.com/blog-listing.html">Visit the blog</a>
             </div>
         </div>
     </section>
 <?php } ?>

 <?php if ($level == 1) { ?>
     <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args['post_type'] = 'product';
        $args['posts_per_page'] = '12';
        $args['paged'] = 'paged';
        $tax_query = array(
            'relation' => 'AND',

            // Add your existing product_brand query
            array(
                'taxonomy' => 'product_brand',
                'field'    => 'term_id',
                'terms'    => $term->term_id,
            ),

        );

        if (!isset($_GET['range'])) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'range',
            );
        } else {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'model',
            );

            $group_prod = wc_get_product($_GET['id']);

            if ($group_prod && $group_prod->is_type('grouped')) {
                $child_product_ids = $group_prod->get_children();
                $args['post__in'] = $child_product_ids;
            }
        }

        // Loop through all URL parameters (e.g., ?pa_axle=single-axle)
        if (isset($_GET) && !empty($_GET)) {
            foreach ($_GET as $key => $value) {
                // Check if the key starts with 'pa_' and has a non-empty value
                if (strpos($key, 'pa_') === 0 && !empty($value)) {

                    // This is a product attribute filter, add it to the query
                    $tax_query[] = array(
                        'taxonomy' => sanitize_key($key),       // The taxonomy name (e.g., 'pa_axle')
                        'field'    => 'slug',                   // We are using the slug from the URL
                        'terms'    => sanitize_text_field($value), // The term slug (e.g., 'single-axle')
                    );
                }
            }
        }
        $args['tax_query'] = $tax_query;

        $listings = new WP_Query($args);
        $total_posts_count = $listings->found_posts;
        ?>
     <section class="listing md-padding-bottom sm-padding-top position-relative bring-to-front">
         <div class="container">
             <div class="filter--mobile d-block d-lg-none fw-semibold">
                 <div class="row g-xxs">
                     <div class="col-6">
                         <button class="btn-with-icon btn btn-primary w-100" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasFilter" aria-controls="offCanvasFilter">
                             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
                                 <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5">
                                 </path>
                             </svg>
                             Filter
                         </button>
                     </div>
                     <div class="col-6">
                         <button class="btn-with-icon btn btn-light w-100 border">
                             <svg xmlns="http://www.w3.org/2000/svg" width="20.119" height="27.991" viewBox="0 0 20.119 27.991">
                                 <path id="Icon_awesome-sort" data-name="Icon awesome-sort" d="M2.883,20.25H19.617a1.69,1.69,0,0,1,1.2,2.883L12.445,31.5a1.681,1.681,0,0,1-2.384,0L1.688,23.133A1.69,1.69,0,0,1,2.883,20.25Zm17.93-7.383L12.445,4.5a1.681,1.681,0,0,0-2.384,0L1.688,12.867a1.69,1.69,0,0,0,1.2,2.883H19.617A1.69,1.69,0,0,0,20.813,12.867Z" transform="translate(-1.191 -4.004)" fill="#202020"></path>
                             </svg>
                             Sort
                         </button>
                     </div>
                 </div>
             </div>
             <div class="row g-sm">
                 <div class="col-lg-3 bring-to-front">
                     <div class="sidebar sticky-element">
                         <div class="listing-filter  accordion-style-1 background-white rounded overflow-hidden">
                             <div class="offcanvas offcanvas-end offcanvas-visible-desktop" tabindex="-1" id="offCanvasFilter" aria-labelledby="offCanvasFilterLabel">
                                 <div class="offcanvas-body">
                                     <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                     <div class="filter--heading d-flex gap-3 align-items-center justify-content-between p-20 flex-wrap">
                                         <span class="fs-25 fw-semibold">Filters</span>

                                     </div>
                                     <?php
                                        $attributes_to_include = array(
                                            'pa_axle',
                                            'pa_berths',
                                            'pa_chassis',
                                            'pa_gearbox'
                                        );
                                        display_category_attribute_filters($attributes_to_include);
                                        ?>
                                     <div class="filter--bottom p-20 background-pink text-white text-center">
                                         <span class="fs-25 fw-semibold">Show <span class="fw-semobold"><?= $total_posts_count ?></span>
                                             caravans</span>
                                     </div>
                                     <div class="reset-btn text-center mt-4 d-block d-lg-none">
                                         <a href="" class="reset-btn btn btn-link p-0 text-color d-inline-block"><u>Reset</u></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="reset-btn text-center mt-4 d-none d-lg-block">
                             <a href="" class="reset-btn btn btn-link p-0 text-color d-inline-block"><u>Reset</u></a>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-9">
                     <div class="sort-result d-flex gap-3 align-items-center justify-content-between mb-4">
                         <div class="result">
                             <span class="fw-semibold"><?= $total_posts_count ?></span> caravan deals
                         </div>
                         <div class="filter d-none d-lg-block">
                             <div class="form-control-holder">
                                 <select name="Type" id="Type" class="form-control form-control-lg background-transparent">
                                     <option value="">Sort by lowest price</option>
                                     <option value="Option 1">Option 1</option>
                                     <option value="Option 2">Option 2</option>
                                     <option value="Option 3">Option 3</option>
                                     <option value="Option 4">Option 4</option>
                                     <option value="Option 5">Option 5</option>
                                     <option value="Option 6"> Option 6</option>
                                 </select>
                             </div>
                         </div>
                     </div>

                     <div class="listing-grid-holder listing-grid-holder-responsive product--lists-container">
                         <div class="row g-sm product--lists">
                             <?php while ($listings->have_posts()) { ?>
                                 <?php $listings->the_post(); ?>
                                 <div class="col-sm-6 col-lg-4">
                                     <?= listing_grid(get_the_ID()); ?>
                                 </div>
                             <?php } ?>
                         </div>
                     </div>

                     <div class="button-box text-center mt-5 d-none">
                         <a href="#" class="btn btn-light border btn-lg ">
                             Load more deals
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 <?php } ?>


 <?php get_footer() ?>