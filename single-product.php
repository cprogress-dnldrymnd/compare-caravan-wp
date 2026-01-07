<?php get_header() ?>
<?php
$product = wc_get_product(get_the_ID());
$product_gallery_ids = $product->get_gallery_image_ids();
array_unshift($product_gallery_ids, $product->get_image_id());
$highlights = get_field('highlights');
$interior_features = get_field('interior_features');
$exterior_features = get_field('exterior_features');
$warranty = get_field('warranty');
$layout_type = get_field('layout_type');
$layout = get_field('layout');
$day_layout = get_field('day_layout');
$night_layout = get_field('night_layout');
$video = get_field('video');
$virtual_tour = get_field('virtual_tour');
$pill_specs = get_field('pill_specs');

$manufacturer_slug = get_product_brand_slugs_by_id(get_the_ID());
$manufacturer_term = get_term_by('slug', $manufacturer_slug, 'product_brand');
$manufacturer_logo = get_field('logo', $manufacturer_term);


$vehicle_type = outputFoundValues(get_product_vehicle_type(get_the_ID()));

$berths = get_the_terms(get_the_ID(), 'pa_berths');
if ($berths) {
    $pa_berths = $berths[0]->name;
}

$seats = get_the_terms(get_the_ID(), 'pa_seats');
if ($seats) {
    $pa_seats = $seats[0]->name;
}
?>
<section class="listing-single">
    <div class="container-fluid g-0">
        <div class="listing-inner-holder">
            <div class="row g-0">
                <div class="col-lg-8">
                    <div class="listing-single--left">
                        <div class="row g-3 align-items-center justify-content-between mb-4">
                            <div class="col-auto">
                                <?= breadcrumbs() ?>
                            </div>
                            <div class="col-auto">
                                <div class="listing-grid--action">
                                    <ul class="list-inline d-flex gap-2 mb-0">
                                        <li>
                                            <a href="#" class="action d-flex align-items-center justify-content-center text-color share">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5m-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3">
                                                    </path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="listing-single--details listing-single--details-pill-specs text-center fs-14 fw-semibold">
                            <h1><?= $product->get_name() ?></h1>
                            <div class="mb-5 pill-specs mt-3">
                                <?php
                                if ($pill_specs) {
                                    echo $pill_specs;
                                }
                                ?>
                            </div>

                        </div>

                        <div class="listing-inner--tabs xs-margin-bottom border-bottom pb-5">
                            <div class="tab-content mb-3" id="listingInner--Tab">
                                <div class="tab-pane fade active show" id="gallery-tab-pane" role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                    <div class="row g-xs flex-column-reverse flex-lg-row gallery-row align-items-stretch">
                                        <div class="col-lg-2">
                                            <div class="swiper-gallery-thumbnails">
                                                <div class="listing-grid--gallery h-auto h-lg-100">
                                                    <div class="swiper swiper-thumbnails" style="height: 518.375px;">
                                                        <div class="swiper-wrapper ">
                                                            <?php foreach ($product_gallery_ids as $product_gallery) { ?>
                                                                <div class="swiper-slide bg-white rounded">
                                                                    <a href="<?= wp_get_attachment_image_url($product_gallery, 'large') ?>" class="d-block image-box image-style ">
                                                                        <?= wp_get_attachment_image($product_gallery, 'medium') ?>
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="listing-inner--gallery-grid-holder position-relative rounded overflow-hidden">
                                                <div class="listing-grid--gallery h-auto h-lg-100">

                                                    <div class="swiper swiper-gallery h-auto h-lg-100">
                                                        <div class="swiper-wrapper h-auto h-lg-100">
                                                            <?php foreach ($product_gallery_ids as $product_gallery) { ?>
                                                                <div class="swiper-slide h-100 swiper-slide-active bg-white rounded">
                                                                    <a href="<?= wp_get_attachment_image_url($product_gallery, 'large') ?>" data-fancybox="gallery-listing" class="d-block image-box image-style h-auto h-lg-100">
                                                                        <?= wp_get_attachment_image($product_gallery, 'large') ?>
                                                                    </a>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                        <div class="swiper-button-next swiper-gallery-next swiper-button">
                                                        </div>
                                                        <div class="swiper-button-prev swiper-gallery-prev swiper-button">
                                                        </div>
                                                        <div class="swiper-pagination swiper-gallery-pagination">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($virtual_tour) { ?>
                                    <div class="tab-pane fade" id="virtual-tour-tab-pane" role="tabpanel" aria-labelledby="virtual-tour-tab" tabindex="0">
                                        <div class="iframe-holder rounded overflow-hidden">
                                            <iframe src="<?= $virtual_tour ?> " frameborder="0"></iframe>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($video) { ?>
                                    <div class="tab-pane fade" id="video-tab-pane" role="tabpanel" aria-labelledby="video-tab" tabindex="0">
                                        <div class="iframe-holder rounded overflow-hidden">
                                            <iframe src="<?= get_video_embed_url($video) ?> " frameborder="0"></iframe>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="nav-tabs-holder text-center mt-5">
                                <ul class="nav nav-tabs nav-tabs-style-3 flex-nowrap" id="myTab" role="tablist">
                                    <button class="nav-link active" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery-tab-pane" type="button" role="tab" aria-controls="gallery-tab-pane" aria-selected="true">
                                        <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="34.635" height="31.019" viewBox="0 0 34.635 31.019">
                                                <g id="gallery-svgrepo-com" transform="translate(1.756 1.25)">
                                                    <path id="Path_68" data-name="Path 68" d="M2,16.259C2,9.537,2,6.176,4.316,4.088S10.359,2,17.814,2,29,2,31.313,4.088s2.316,5.449,2.316,12.171,0,10.083-2.316,12.171-6.044,2.088-13.5,2.088-11.183,0-13.5-2.088S2,22.981,2,16.259Z" transform="translate(-2 -2)" fill="none" stroke="currentColor" stroke-width="2.5"></path>
                                                    <ellipse id="Ellipse_9" data-name="Ellipse 9" cx="3.327" cy="3" rx="3.327" ry="3" transform="translate(18.854 5.519)" fill="none" stroke="currentColor" stroke-width="2.5">
                                                    </ellipse>
                                                    <path id="Path_69" data-name="Path 69" d="M2,13.4,4.77,11.21a3.931,3.931,0,0,1,4.967.149l6.784,6.117a3.424,3.424,0,0,0,4.055.317l.472-.3a5.15,5.15,0,0,1,5.9.32l5.1,4.137" transform="translate(-2 1.577)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2.5">
                                                    </path>
                                                </g>
                                            </svg>
                                        </span> <span class="text d-none d-sm-block">Gallery</span>
                                    </button>
                                    <?php if ($virtual_tour) { ?>

                                        <button class="nav-link" id="virtual-tour-tab" data-bs-toggle="tab" data-bs-target="#virtual-tour-tab-pane" type="button" role="tab" aria-controls="virtual-tour-tab-pane" aria-selected="false" tabindex="-1">
                                            <span class="icon"><svg id="google-streetview-svgrepo-com" xmlns="http://www.w3.org/2000/svg" width="38.783" height="34.969" viewBox="0 0 38.783 34.969">
                                                    <path id="Path_70" data-name="Path 70" d="M5,5.828C5,2.609,7.894,0,11.464,0s6.464,2.609,6.464,5.828-2.894,5.828-6.464,5.828S5,9.047,5,5.828Z" transform="translate(7.928)" style="
                                    fill: currentColor;
                                "></path>
                                                    <path id="Path_71" data-name="Path 71" d="M13.049,6C8.052,6,4,9.653,4,14.159v4.663a1.234,1.234,0,0,0,1.293,1.166H20.806A1.234,1.234,0,0,0,22.1,18.822V14.159C22.1,9.653,18.047,6,13.049,6Z" transform="translate(6.342 7.988)" style="
                                    fill: currentColor;
                                "></path>
                                                    <path id="Path_72" data-name="Path 72" d="M3.605,13.029A2.631,2.631,0,0,0,2.586,14.9a2.657,2.657,0,0,0,1.05,1.9A11.165,11.165,0,0,0,7.1,18.779a35.415,35.415,0,0,0,12.288,1.954A35.416,35.416,0,0,0,31.68,18.779a11.165,11.165,0,0,0,3.468-1.971,2.657,2.657,0,0,0,1.05-1.9,2.631,2.631,0,0,0-1.02-1.876,10.894,10.894,0,0,0-3.376-1.95l1.036-2.136A13.454,13.454,0,0,1,37.031,11.4a4.829,4.829,0,0,1,1.752,3.5,4.858,4.858,0,0,1-1.795,3.541,13.726,13.726,0,0,1-4.29,2.476,38.2,38.2,0,0,1-13.307,2.143A38.2,38.2,0,0,1,6.085,20.922a13.723,13.723,0,0,1-4.29-2.476A4.857,4.857,0,0,1,0,14.9a4.829,4.829,0,0,1,1.752-3.5A13.451,13.451,0,0,1,5.946,8.942l1.036,2.136A10.9,10.9,0,0,0,3.605,13.029Z" transform="translate(0 11.905)" style="
                                    fill: currentColor;
                                "></path>
                                                </svg></span> <span class="text d-none d-sm-block">Virtual
                                                tour</span>
                                        </button>
                                    <?php } ?>
                                    <?php if ($video) { ?>
                                        <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video-tab-pane" type="button" role="tab" aria-controls="video-tab-pane" aria-selected="false" tabindex="-1">
                                            <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="42.261" height="26.6" viewBox="0 0 42.261 26.6">
                                                    <path id="video-svgrepo-com" d="M31.355,13.867l5.62-3.041c1.73-.936,2.595-1.4,3.307-1.344a2.245,2.245,0,0,1,1.556.794c.423.519.423,1.429.423,3.248v8.551c0,1.819,0,2.729-.423,3.248a2.245,2.245,0,0,1-1.556.794c-.712.06-1.577-.408-3.307-1.344l-5.62-3.041M9.98,29.6h14.4c2.443,0,3.665,0,4.6-.429a4.173,4.173,0,0,0,1.906-1.719c.475-.841.475-1.943.475-4.146V12.293c0-2.2,0-3.3-.475-4.146a4.173,4.173,0,0,0-1.906-1.719C28.04,6,26.819,6,24.376,6H9.98c-2.443,0-3.665,0-4.6.429A4.173,4.173,0,0,0,3.475,8.148C3,8.989,3,10.09,3,12.293V23.307c0,2.2,0,3.3.475,4.146a4.173,4.173,0,0,0,1.906,1.719C6.315,29.6,7.537,29.6,9.98,29.6Z" transform="translate(-1.5 -4.5)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                                                    </path>
                                                </svg>
                                            </span> <span class="text d-none d-sm-block">Video</span>
                                        </button>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <div class="listing-inner--description xs-margin-bottom">
                            <h4 class="fs-35 heading mb-3 mb-lg-4 d-none">Description</h4>
                            <div class="desc">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <?php if ($highlights) { ?>
                            <div class="listing-inner--hightlights sm-margin-bottom">
                                <div class="inner-box-style rounded">
                                    <h4 class="mb-3">Highlights</h4>
                                    <div class="desc-box list--checkbox hightlights">
                                        <?= wpautop($highlights) ?>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($exterior_features || $interior_features || $warranty) { ?>
                            <div class="listing-inner--specifications sm-margin-bottom">
                                <h4 class="fs-35 headingmb-3 mb-lg-4">Specification and Features</h4>
                                <div class="listing-filter listing--features accordion-style-2">
                                    <div class="accordion overflow-hidden inner-box-style rounded" id="accordionSpecs">
                                        <?php if ($interior_features) { ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInterior" aria-expanded="false" aria-controls="collapseInterior">
                                                        <span class="accordion-button-inner">
                                                            <span class="icon-text">
                                                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="31.892" height="19.135" viewBox="0 0 31.892 19.135">
                                                                        <path id="bed-svgrepo-com_1_" data-name="bed-svgrepo-com (1)" d="M9.77,12.968A3.986,3.986,0,1,0,5.784,8.981,3.991,3.991,0,0,0,9.77,12.968ZM27.311,6.589H16.149a.8.8,0,0,0-.8.8v7.176H4.189V4.2a.8.8,0,0,0-.8-.8H1.8a.8.8,0,0,0-.8.8V21.738a.8.8,0,0,0,.8.8H3.392a.8.8,0,0,0,.8-.8V19.346H29.7v2.392a.8.8,0,0,0,.8.8h1.595a.8.8,0,0,0,.8-.8V12.17A5.581,5.581,0,0,0,27.311,6.589Z" transform="translate(-1 -3.4)" fill="#202020">
                                                                        </path>
                                                                    </svg>
                                                                </span>
                                                                Interior Features
                                                            </span>
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseInterior" class="accordion-collapse collapse" data-bs-parent="#accordionSpecs">
                                                    <div class="accordion-body  pt-0">
                                                        <?= wpautop($interior_features) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($exterior_features) { ?>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExterior" aria-expanded="false" aria-controls="collapseExterior">
                                                        <span class="accordion-button-inner">
                                                            <span class="icon-text">
                                                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="31.892" height="22.84" viewBox="0 0 31.892 22.84">
                                                                        <g id="caravan-trailer-svgrepo-com" transform="translate(0 -72.663)">
                                                                            <g id="Group_288" data-name="Group 288" transform="translate(0 72.663)">
                                                                                <path id="Path_118" data-name="Path 118" d="M28.772,72.663H9.36a3.123,3.123,0,0,0-3.12,3.12V89.3H1.04a1.04,1.04,0,0,0,0,2.08H19.393a4.169,4.169,0,0,0,8.337,0h1.043a3.123,3.123,0,0,0,3.12-3.12V75.783A3.123,3.123,0,0,0,28.772,72.663ZM16.639,89.3h-4.16V78.9h4.16Zm6.922,4.121a2.091,2.091,0,1,1,2.091-2.091A2.094,2.094,0,0,1,23.561,93.423Zm6.251-10.36h-6.24V78.9h6.24Z" transform="translate(0 -72.663)" fill="#202020"></path>
                                                                            </g>
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                Exterior Features
                                                            </span>
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseExterior" class="accordion-collapse collapse" data-bs-parent="#accordionSpecs">
                                                    <div class="accordion-body  pt-0">
                                                        <?= wpautop($exterior_features) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php if ($warranty) { ?>

                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWarranty" aria-expanded="false" aria-controls="collapseWarranty">
                                                        <span class="accordion-button-inner">
                                                            <span class="icon-text">
                                                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="19.201" height="20.479" viewBox="0 0 19.201 20.479">
                                                                        <path id="Icon_awesome-shield-alt" data-name="Icon awesome-shield-alt" d="M19.146,3.349l-7.68-3.2a1.926,1.926,0,0,0-1.476,0l-7.68,3.2A1.918,1.918,0,0,0,1.125,5.121c0,7.94,4.58,13.429,8.861,15.213a1.926,1.926,0,0,0,1.476,0c3.428-1.428,8.865-6.36,8.865-15.213A1.921,1.921,0,0,0,19.146,3.349Zm-8.417,14.5,0-15.241,7.036,2.932C17.63,11.6,14.478,15.99,10.73,17.854Z" transform="translate(-1.125 -0.002)" fill="#202020"></path>
                                                                    </svg>
                                                                </span>
                                                                Warranty
                                                            </span>
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapseWarranty" class="accordion-collapse collapse" data-bs-parent="#accordionSpecs">
                                                    <div class="accordion-body  pt-0">
                                                        <?= wpautop($warranty) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if ($layout || $day_layout || $night_layout) {  ?>

                            <div class="listing-inner--layouts sm-margin-bottom rounded overflow-hidden">
                                <h3 class="mb-4">Layout</h3>
                                <div class="listing-inner--layouts-holder">
                                    <div class="decor decor-top"></div>
                                    <div class="decor decor-bottom"></div>
                                    <div class="decor decor-left"></div>
                                    <div class="decor decor-right"></div>
                                    <div class="listing-inner-box">
                                        <div class="inner-box-style p-0 rounded">
                                            <div class="row g-0">
                                                <?php if ($layout_type == 'Single' && $layout) { ?>
                                                    <div class="col-md-6">
                                                        <div class="layouts--inner">
                                                            <div class="listing-grid__image image-style" style="--fit: contain; --padding: 20%;">
                                                                <a href="<?= wp_get_attachment_image_url($layout, 'large') ?>" data-fancybox="gallery-layout" class="d-block">
                                                                    <?= wp_get_attachment_image($layout, 'large') ?>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <?php if ($layout_type == 'Day-Night' && $day_layout) { ?>
                                                    <div class=" col-md-6">
                                                        <div class="layouts--inner">
                                                            <div class="layout-icon">
                                                                <img src="<?= get_template_directory_uri() . '/assets/images/icon--day.svg' ?> ?>" alt="Day Layout">
                                                            </div>
                                                            <div class="listing-grid__image image-style" style="--fit: contain; --padding: 20%;">
                                                                <a href="<?= wp_get_attachment_image_url($day_layout, 'large') ?>" data-fancybox="gallery-layout" class="d-block">
                                                                    <?= wp_get_attachment_image($day_layout, 'large') ?>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <?php if ($layout_type == 'Day-Night' && $night_layout) { ?>
                                                    <div class="col-md-6">
                                                        <div class="layouts--inner">
                                                            <div class="layout-icon">
                                                                <img src="<?= get_template_directory_uri() . '/assets/images/icon--night.svg' ?> ?>" alt="Night Layout">
                                                            </div>
                                                            <div class="listing-grid__image image-style" style="--fit: contain; --padding: 20%;">
                                                                <a href="<?= wp_get_attachment_image_url($night_layout, 'large') ?>" data-fancybox="gallery-layout" class="d-block">
                                                                    <?= wp_get_attachment_image($night_layout, 'large') ?>
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <?php if ($pa_berths || $pa_seats) { ?>
                                                    <div class="<?= $layout_type == 'Single' ? 'col-md-6' : 'col-12' ?>">
                                                        <div class="layouts--inner d-flex flex-column gap-3 pt-0 <?= $layout_type == 'Single' ? 'justify-content-center' : '' ?>">
                                                            <?php if ($pa_berths) { ?>
                                                                <div class="d-flex gap-3 align-items-center">
                                                                    Berths
                                                                    <div class="icons d-flex gap-1 align-items-center">
                                                                        <?php
                                                                        for ($i = 0; $i < intval($pa_berths); $i++) {
                                                                            echo '<img src="' . get_template_directory_uri() . '/assets/images/berths-layout.svg" alt="berths.svg">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if ($pa_seats) { ?>
                                                                <div class="d-flex gap-3 align-items-center">
                                                                    Seats
                                                                    <div class="icons d-flex gap-1 align-items-center">
                                                                        <?php
                                                                        for ($i = 0; $i < intval($pa_seats); $i++) {
                                                                            echo '<img src="' . get_template_directory_uri() . '/assets/images/seats-layout.svg" alt="seats.svg">';
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>
                        <?php
                        $related_listings = get_posts(array(
                            'post_type' => 'product',
                            'posts_per_page' => 6,
                            'post__not_in' => array(get_the_ID()),
                            'fields' => 'ids',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_brand',
                                    'field'    => 'term_id',
                                    'terms'    => wp_get_post_terms(get_the_ID(), 'product_brand', array('fields' => 'ids')),
                                ),
                            ),
                        ));

                        ?>


                        <div class="other-caravans md-padding-bottom">
                            <h3 class="mb-4">Other <?= $vehicle_type ?> from this dealer</h3>
                            <div class="swiper-holder">
                                <div class="swiper swiper-listing-related swiper-mobile-style">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($related_listings as $related_listing) { ?>
                                            <div class="swiper-slide">
                                                <?= listing_grid($related_listing); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-pagination swiper-pagination-dark mt-5 text-center position-static">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="listing--single-right position-sticky top-0 overflow-auto background-white">
                        <div class="listing--single--right-inner">
                            <div class="dealer-details">
                                <div class="delear-details--inner">
                                    <div class="row g-3 justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h3 class="fs-32"><?= $product->get_name() ?></h3>
                                        </div>
                                        <div class="col-auto">
                                            <div class="logo-box">
                                                <?= wp_get_attachment_image($manufacturer_logo, 'medium') ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="find-dealer">
                                <div class="heading-icon mb-3">
                                    <h3 class="d-flex align-items-center gap-3 fs-25">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 42.568 42.576">
                                            <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M41.989,36.809,33.7,28.52a1.994,1.994,0,0,0-1.414-.582H30.931a17.287,17.287,0,1,0-2.993,2.993v1.355A1.994,1.994,0,0,0,28.52,33.7l8.29,8.29a1.987,1.987,0,0,0,2.819,0l2.353-2.353A2,2,0,0,0,41.989,36.809ZM17.295,27.938A10.643,10.643,0,1,1,27.938,17.295,10.637,10.637,0,0,1,17.295,27.938Z" fill="#f2007d"></path>
                                        </svg>
                                        Find dealers in your area <?= $manufacturer_term_vehicle_type_slug ?>
                                    </h3>
                                </div>
                                <?= do_shortcode('[wpsl category="' . get_product_brand_slugs_by_id($product->get_id(), false, true) . '" ]') ?>
                            </div>

                            <div class="listing-pricing background-text text-white">
                                <div class="row g-3 justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <h3 class="fs-32"><?= $product->get_name() ?></h3>
                                    </div>

                                    <div class="col-auto">
                                        <div class="price">
                                            <?= $product->get_price_html() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnquireDealer" aria-labelledby="offcanvasEnquireDealerLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasEnquireDealerLabel"><span></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            <?= do_shortcode('[contact-form-7 id="e44c382" title="Dealer Enquiry"]') ?>
        </div>
    </div>
</div>
<?php get_footer() ?>