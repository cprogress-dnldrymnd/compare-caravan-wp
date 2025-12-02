<?php get_header() ?>
<section class="hero background--color position-relative <?= $is_range == true ? 'is-range-hero' : '' ?>">
    <?php
    if ($is_range == true) {
        echo '<div class="background-image">';
        echo wp_get_attachment_image($thumbnail_id, 'large');
        echo '</div>';
    }
    ?>
    <div class="container position-relative">
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
<?php get_footer() ?>