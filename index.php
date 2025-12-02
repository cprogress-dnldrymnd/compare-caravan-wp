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
<?php get_footer() ?>