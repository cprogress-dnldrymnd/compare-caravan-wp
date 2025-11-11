<?= $layout_type ?>
                        <?php if ($layout || $day_layout || $night_layout) {  ?>

                            <div class="listing-inner--layouts sm-margin-bottom rounded overflow-hidden">
                                <h3 class="mb-4">Available Layouts</h3>
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
                                                            <div class="listing-grid__image image-style" style="--fit: contain">
                                                                <?= wp_get_attachment_image($layout, 'large') ?>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 fs-16 fw-medium">
                                                                    <?php if ($attribute_pa_berths) { ?>
                                                                        <div class="d-flex justify-content-end gap-3 align-items-center">
                                                                            Berths
                                                                            <div class="icons d-flex gap-1 align-items-center">
                                                                                <?php
                                                                                for ($i = 0; $i < intval($attribute_pa_berths); $i++) {
                                                                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/berths-layout.svg" alt="berths.svg">';
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        <?php } ?>