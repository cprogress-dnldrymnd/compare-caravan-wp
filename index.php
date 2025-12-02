<?php get_header() ?>
<?php
if (is_archive()) {
    $title = get_the_archive_title();
} else {
    $title = 'Blogs';
}
?>
<section class="hero background--color position-relative ">
    <div class="container position-relative">
        <?= breadcrumbs() ?>
        <div class="hero-title-image md-margin-top ">

            <div class="row">
                <div class="col-lg-6 md-padding-bottom">
                    <h1 class="mb-4"><?= $title ?> ?></h1>
                </div>

            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>