<?php get_header() ?>
<?php
if (is_archive()) {
    $title = get_the_archive_title();
    $description = get_the_archive_description();
} else {
    $title = 'Leisure Vehicle News';
    $description = "Whether you're seeking expert advice or just a bit of information, you've come to the right place. We cover all kinds of caravan and motorhome related topics and insights to keep you up to date.";
}
?>
<section class="hero background--color background-dark-color-2 position-relative ">
    <div class="container position-relative">
        <?= breadcrumbs() ?>
        <div class="hero-title-image md-margin-top ">

            <div class="row">
                <div class="col-lg-6 md-padding-bottom">
                    <h1 class="mb-4"><?= $title ?></h1>
                    <?php if ($description) { ?>
                        <div class="desc mb-4">
                            <?= wpautop($description) ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="Blog" class="latest-news row-swap sm-padding-bottom sm-padding-top">
    <div class="container">
        <div class="blogs-insert">
            <div class="blogs--holder">
                <div class="row blogs-row g-sm">
                    <div class="col-lg-12">
                        <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                            <div class="row g-sm h-100">
                                <?php while (have_posts()) { ?>
                                    <?php the_post(); ?>
                                    <div class="col-6 col-lg-4 col-xl-3">
                                        <?= blog_grid(get_the_ID()) ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>