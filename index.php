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
<?php if (is_archive()) { ?>
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
<?php } else if (is_home()) { ?>
    <section class="blog-listing md-padding-bottom">
        <div class="container">
            <div class="row g-sm">
                <div class="col-lg-3">
                    <div class="sidebar sidebar-style-2 sticky-element sm-padding-top">
                        <div class="sidebar--inner blog-navigation">
                            <p class="fw-semibold opacity-half">Explore</p>
                            <ul class="list-inline d-flex flex-column gap-4 fw-semibold fs-20 mb-0">
                                <li><a href="#Blog" class="text-decoration-none">Top industry news</a></li>
                                <li><a href="#Latest News" class="text-decoration-none">Latest News</a></li>
                                <li><a href="#Reviews" class="text-decoration-none">Reviews</a></li>
                                <li><a href="#Videos" class="text-decoration-none">Videos</a></li>
                            </ul>
                        </div>
                        <div class="sidebar--inner blog-search"><label class="mb-3 fw-semibold opacity-half" for="search">Search all news</label>
                            <form class="row g-xxs align-items-end ">
                                <div class="col">
                                    <div class="form-control-holder"><input id="search" class="form-control form-control-lg" placeholder="Search term, i.e Caravans" type="text" value="" name="search"></div>
                                </div>
                                <div class="col-auto"><button type="submit" class="btn btn-primary w-100 btn-lg px-3"><svg xmlns="http://www.w3.org/2000/svg" width="26.003" height="25.908" viewBox="0 0 26.003 25.908">
                                            <path id="Icon_awesome-search" data-name="Icon awesome-search" d="M24.565,21.534l-4.85-4.85a1.167,1.167,0,0,0-.827-.341H18.1A10.113,10.113,0,1,0,16.344,18.1v.793a1.167,1.167,0,0,0,.341.827l4.85,4.85a1.163,1.163,0,0,0,1.649,0l1.377-1.377A1.173,1.173,0,0,0,24.565,21.534Zm-14.447-5.19a6.226,6.226,0,1,1,6.226-6.226A6.223,6.223,0,0,1,10.118,16.344Z" transform="translate(0.5 0.5)" fill="#fff" stroke="#f2007d" stroke-width="1"></path>
                                        </svg></button></div>
                            </form>
                        </div>
                        <div class="sidebar--inner"><label class="mb-3 fw-semibold opacity-half">Stay connected on social</label>
                            <div class="row g-xxs align-items-end ">
                                <div class="socials-insert">
                                    <ul class="socials d-flex gap-3 list-inline mb-0 align-items-center"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <section id="Blog" class="latest-news row-swap sm-padding-bottom sm-padding-top">
                        <div class="container">
                            <div class="row g-3 align-items-center justify-content-between  mb-5">
                                <div class="col-auto heading-icon">
                                    <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="44.015" height="36" viewBox="0 0 44.015 36">
                                            <g id="Q3_icons" data-name="Q3 icons" transform="translate(-1.998 -6)">
                                                <g id="Group_717" data-name="Group 717">
                                                    <path id="Path_1060" data-name="Path 1060" d="M34,6h-.6l-30,8.8a2,2,0,0,0-1.4,2v9a2.2,2.2,0,0,0,1.4,2l30,8.8H34a2,2,0,0,0,2-2V8A2,2,0,0,0,34,6ZM19.1,34.2,8.4,31l1.3,8.4A2.9,2.9,0,0,0,12.6,42h4.5a2.8,2.8,0,0,0,2.1-1,3.4,3.4,0,0,0,.8-2.6Z" fill="#f2007d"></path>
                                                    <path id="Path_1061" data-name="Path 1061" d="M40,15.3a1.5,1.5,0,0,0,.9-.2l4-2a2.012,2.012,0,1,0-1.8-3.6l-4,2a2,2,0,0,0-.9,2.7A2.1,2.1,0,0,0,40,15.3Z" fill="#f2007d"></path>
                                                    <path id="Path_1062" data-name="Path 1062" d="M44.9,29.6l-4-2a2.1,2.1,0,0,0-2.7.8,2,2,0,0,0,.9,2.7l4,2a1.5,1.5,0,0,0,.9.2,2.1,2.1,0,0,0,1.8-1.1,1.9,1.9,0,0,0-.9-2.6Z" fill="#f2007d"></path>
                                                    <path id="Path_1063" data-name="Path 1063" d="M40,23.3h4a2,2,0,0,0,0-4H40a2,2,0,0,0,0,4Z" fill="#f2007d"></path>
                                                </g>
                                            </g>
                                        </svg>Top industry news</h2>
                                </div>
                                <div class="col-auto button-box text-center"><a class="btn btn-primary btn-lg" href="/blogs/category/Blog/3">View all blogs</a></div>
                            </div>
                            <div class="blogs-insert">
                                <div class="blogs--holder">
                                    <div class="row blogs-row g-sm">
                                        <div class="col-lg-12">
                                            <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                                                <div class="row g-sm h-100">
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/a-beginners-guide-to-owning-your-first-motorhome-68ed1c57e726d">
                                                            <div class="image-box image-style"><img alt="A Beginner’s Guide to Owning Your First Motorhome" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1750858249-685bfa0970ca2.png&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Blog</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">A Beginner’s Guide to Owning Your First Motorhome</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">27th November</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/top-10-motorhomes-for-2025-uk-edition-68ed2b8d46a6e">
                                                            <div class="image-box image-style"><img alt="Top 10 Motorhomes for 2025: UK Edition" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Blog</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">Top 10 Motorhomes for 2025: UK Edition</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">21st November</div>
                                                            </div>
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="Latest News" class="latest-news sm-padding-bottom sm-padding-top">
                        <div class="container">
                            <div class="row g-3 align-items-center justify-content-between  mb-5">
                                <div class="col-auto heading-icon">
                                    <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="36.887" height="59.014" viewBox="0 0 36.887 59.014">
                                            <g id="flame-svgrepo-com" transform="translate(-114.73 0.001)">
                                                <path id="Path_1057_deals" data-name="Path 1057" d="M124.5,58.935a.636.636,0,0,0,.832-.906,14.591,14.591,0,0,1-.84-14.459c4.82-10.775,7.752-16.355,7.752-16.355a38.793,38.793,0,0,0,5.788,12.3c4.07,5.573,6.3,12.582,2.706,18.42a.636.636,0,0,0,.83.9C146.011,56.565,151,52,151.56,42.927A31.056,31.056,0,0,0,149.9,31.37c-2-6.211-4.459-9.108-5.881-10.353a.636.636,0,0,0-1.052.522c.415,6.7-2.106,8.4-3.541,4.569a23.452,23.452,0,0,1-.907-7.4,25.312,25.312,0,0,0-4.991-15.383A17.422,17.422,0,0,0,130.392.134a.636.636,0,0,0-1.023.55c.264,3.639.025,14.067-9.124,26.526-8.3,11.557-5.081,20.433-3.94,22.837A18.814,18.814,0,0,0,124.5,58.935Z" transform="translate(0 0)" fill="#f2007d"></path>
                                            </g>
                                        </svg>Latest news</h2>
                                </div>
                                <div class="col-auto button-box text-center"><a class="btn btn-primary btn-lg" href="/blogs/category/Latest News/1">View all news</a></div>
                            </div>
                            <div class="blogs-insert">
                                <div class="blogs--holder">
                                    <div class="row blogs-row g-sm">
                                        <div class="col-lg-6">
                                            <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                                                <div class="row g-sm h-100">
                                                    <div class="col-lg-6 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/the-coachman-travel-master-motorhome-2026-experience-luxury-touring-690ccd342e064">
                                                            <div class="image-box image-style"><img alt="The Coachman Travel Master Motorhome 2026 - Experience Luxury Touring" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446480-690ccc907cc46.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Latest News</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">The Coachman Travel Master Motorhome 2026 - Experience Luxury Touring</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-6 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/the-swift-sprite-2026-the-uks-best-selling-touring-caravan-69136188bd35d">
                                                            <div class="image-box image-style"><img alt="The Swift Sprite 2026: The UK’s Best-Selling Touring Caravan" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877832-69136188be3a8.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Latest News</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">The Swift Sprite 2026: The UK’s Best-Selling Touring Caravan</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-6 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/alde-wet-central-heating-featured-in-coachmans-luxury-caravans-691368945d44d">
                                                            <div class="image-box image-style"><img alt="Alde Wet Central Heating Featured in Coachmans Luxury Caravans" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762879636-691368945ee3c.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Latest News</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">Alde Wet Central Heating Featured in Coachmans Luxury Caravans</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-6 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/british-manufacturing-just-keeps-getting-smarter-6914ad37dbdf6">
                                                            <div class="image-box image-style"><img alt="British Manufacturing Just Keeps Getting Smarter" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762962743-6914ad37dd35e.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Latest News</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">British Manufacturing Just Keeps Getting Smarter</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 blog-grid-large-insert d-none d-lg-block"><a class="cursor-pointer select-none blog-grid--holder--featured h-100 link-unstyled" href="/blogs/crafted-for-perfection-coachman-joins-comparegroup-with-its-exquisite-2026-range-690b3a3ca6989">
                                                <div class="blog-grid--holder--featured-inner background-text text-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                    <div class="image-box image-style h-full"><img alt="Crafted for Perfection: Coachman Joins Compare.group with Its Exquisite 2026 Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="object-cover" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762343461-690b3a2532eb7.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                    <div class="content-box p-5">
                                                        <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Latest News</span></div>
                                                        <div class="blog-grid--title mb-4 line-clamp-3">
                                                            <h3 class="h3 fw-semibold">Crafted for Perfection: Coachman Joins Compare.group with Its Exquisite 2026 Range</h3>
                                                        </div>
                                                        <div class="blog-grid--date fs-14 fw-semibold">7th November</div>
                                                    </div>
                                                </div>
                                            </a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="Reviews" class="latest-news row-swap sm-padding-bottom sm-padding-top">
                        <div class="container">
                            <div class="row g-3 align-items-center justify-content-between  mb-5">
                                <div class="col-auto heading-icon">
                                    <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="44.025" height="40.881" viewBox="0 0 44.025 40.881">
                                            <path id="Icon_ionic-ios-star_rec" data-name="Icon ionic-ios-star" d="M44.6,17.526H30.149L25.756,4.417a1.592,1.592,0,0,0-2.987,0L18.376,17.526H3.822A1.577,1.577,0,0,0,2.25,19.1a1.156,1.156,0,0,0,.029.265,1.511,1.511,0,0,0,.658,1.11l11.881,8.373L10.259,42.1a1.577,1.577,0,0,0,.54,1.769,1.521,1.521,0,0,0,.884.383,1.926,1.926,0,0,0,.983-.354l11.6-8.265,11.6,8.265a1.841,1.841,0,0,0,.983.354,1.412,1.412,0,0,0,.875-.383,1.558,1.558,0,0,0,.54-1.769L33.7,28.847,45.479,20.4l.285-.246a1.649,1.649,0,0,0,.511-1.051A1.664,1.664,0,0,0,44.6,17.526Z" transform="translate(-2.25 -3.375)" fill="#f2007d"></path>
                                        </svg>Latest Reviews</h2>
                                </div>
                                <div class="col-auto button-box text-center"><a class="btn btn-primary btn-lg" href="/blogs/category/Reviews/2">View all reviews</a></div>
                            </div>
                            <div class="blogs-insert">
                                <div class="blogs--holder">
                                    <div class="row blogs-row g-sm">
                                        <div class="col-lg-12">
                                            <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                                                <div class="row g-sm h-100">
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/coachman-2026-travel-master-motorhome-range-overview-video-690ccad5a3f64">
                                                            <div class="image-box image-style"><img alt="Coachman 2026 Travel Master Motorhome Range Overview Video" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446037-690ccad5a4eae.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Reviews</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">Coachman 2026 Travel Master Motorhome Range Overview Video</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/bailey-motorhome-tour-autograph-72-2-2026-690cce7ca33f5">
                                                            <div class="image-box image-style"><img alt="Bailey Motorhome tour: Autograph 72-2 (2026)" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762446972-690cce7ca455e.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Reviews</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">Bailey Motorhome tour: Autograph 72-2 (2026)</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/2026-swift-sprite-range-in-focus-69135f1932447">
                                                            <div class="image-box image-style"><img alt="2026 Swift Sprite - Range in Focus" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762877209-69135f1933927.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Reviews</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">2026 Swift Sprite - Range in Focus</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                            </div>
                                                        </a></div>
                                                    <div class="col-lg-3 blog-grid-insert"><a class="cursor-pointer select-none blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between link-unstyled" href="/blogs/2026-swift-challenger-caravan-range-in-focus-690cc96436ea3">
                                                            <div class="image-box image-style"><img alt="2026 Swift Challenger Caravan Range in Focus" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" class="blog-image object-top" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1762445589-690cc915f0d4b.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                            <div class="content-box h-full p-20 flex flex-col">
                                                                <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Reviews</span></div>
                                                                <div class="blog-grid--title mb-4 grow">
                                                                    <h3 class="fs-25 fw-semibold">2026 Swift Challenger Caravan Range in Focus</h3>
                                                                </div>
                                                                <div class="blog-grid--date fs-14 fw-semibold">21st November</div>
                                                            </div>
                                                        </a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="Videos" class="latest-news row-swap sm-padding-bottom sm-padding-top">
                        <div class="container">
                            <div class="row g-3 align-items-center justify-content-between  mb-5">
                                <div class="col-auto heading-icon">
                                    <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="42.261" height="26.6" viewBox="0 0 42.261 26.6">
                                            <path id="video-svgrepo-com" d="M31.355,13.867l5.62-3.041c1.73-.936,2.595-1.4,3.307-1.344a2.245,2.245,0,0,1,1.556.794c.423.519.423,1.429.423,3.248v8.551c0,1.819,0,2.729-.423,3.248a2.245,2.245,0,0,1-1.556.794c-.712.06-1.577-.408-3.307-1.344l-5.62-3.041M9.98,29.6h14.4c2.443,0,3.665,0,4.6-.429a4.173,4.173,0,0,0,1.906-1.719c.475-.841.475-1.943.475-4.146V12.293c0-2.2,0-3.3-.475-4.146a4.173,4.173,0,0,0-1.906-1.719C28.04,6,26.819,6,24.376,6H9.98c-2.443,0-3.665,0-4.6.429A4.173,4.173,0,0,0,3.475,8.148C3,8.989,3,10.09,3,12.293V23.307c0,2.2,0,3.3.475,4.146a4.173,4.173,0,0,0,1.906,1.719C6.315,29.6,7.537,29.6,9.98,29.6Z" transform="translate(-1.5 -4.5)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                        </svg>Latest Videos</h2>
                                </div>
                                <div class="col-auto button-box text-center"><a class="btn btn-primary btn-lg" href="/blogs/category/Videos/4">View all videos</a></div>
                            </div>
                            <div class="videos-insert">
                                <div class="videos--holder blog-grid--holder" style="--padding: 38% 0;">
                                    <div class="row g-sm h-100">
                                        <div class="col-lg-3 col-sm-6 video-grid-insert">
                                            <div class="cursor-pointer select-none video-grid--inner blog-grid--holder--featured background-dark rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                <div class="image-box image-style"><img alt="2026 Swift Sprite Caravan Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723105-69204761ec924.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                <div class="content-box p-20 text-white grow flex flex-col">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Videos</span></div>
                                                    <div class="blog-grid--title mb-4 grow">
                                                        <h3 class="fs-16 fw-semibold break-words">2026 Swift Sprite Caravan Range</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 video-grid-insert">
                                            <div class="cursor-pointer select-none video-grid--inner blog-grid--holder--featured background-dark rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                <div class="image-box image-style"><img alt="2026 Swift Kon-Tiki Motorhome Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723299-692048230ff2a.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                <div class="content-box p-20 text-white grow flex flex-col">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Videos</span></div>
                                                    <div class="blog-grid--title mb-4 grow">
                                                        <h3 class="fs-16 fw-semibold break-words">2026 Swift Kon-Tiki Motorhome Range</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 fw-semibold">1st December</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 video-grid-insert">
                                            <div class="cursor-pointer select-none video-grid--inner blog-grid--holder--featured background-dark rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                <div class="image-box image-style"><img alt="2026 Swift Challenger Caravan Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763724335-69204c2f09fa4.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                <div class="content-box p-20 text-white grow flex flex-col">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Videos</span></div>
                                                    <div class="blog-grid--title mb-4 grow">
                                                        <h3 class="fs-16 fw-semibold break-words">2026 Swift Challenger Caravan Range</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 fw-semibold">21st November</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 video-grid-insert">
                                            <div class="cursor-pointer select-none video-grid--inner blog-grid--holder--featured background-dark rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                <div class="image-box image-style"><img alt="2026 Swift Escape Motorhome Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723951-69204aafb71ab.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                <div class="content-box p-20 text-white grow flex flex-col">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Videos</span></div>
                                                    <div class="blog-grid--title mb-4 grow">
                                                        <h3 class="fs-16 fw-semibold break-words">2026 Swift Escape Motorhome Range</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 fw-semibold">21st November</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 video-grid-insert">
                                            <div class="cursor-pointer select-none video-grid--inner blog-grid--holder--featured background-dark rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
                                                <div class="image-box image-style"><img alt="2026 Swift Carrera Campervan Range" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=3840&amp;q=75 3840w" src="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1763723601-69204951a3cf1.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                                <div class="content-box p-20 text-white grow flex flex-col">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Videos</span></div>
                                                    <div class="blog-grid--title mb-4 grow">
                                                        <h3 class="fs-16 fw-semibold break-words">2026 Swift Carrera Campervan Range</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 fw-semibold">21st November</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="newsletter" class="newsletter pt-10">
                        <div class="container">
                            <div class="newsletter-insert">
                                <div class="newsletter--inner background-dark-2 p-4 text-white rounded">
                                    <div class="row g-3" style="margin-left: 72px;">
                                        <div class="col">
                                            <h3 class="fs-18 mb-4">Get the latest news, advice and offers straight to your inbox</h3>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-items-start">
                                        <div class="col-auto d-flex align-items-start">
                                            <div class="icon text-pink d-flex align-items-start justify-content-center" style="width: 64px; height: 64px;"><svg class="w-100 h-auto bi bi-envelope-fill" xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"></path>
                                                </svg></div>
                                        </div>
                                        <div class="col">
                                            <form action="#">
                                                <div class="row gx-2 gy-2 align-items-stretch">
                                                    <div class="col-md-9"><input id="email" placeholder="Enter email address" class="form-control form-control-lg h-100 " type="email" value="" name="email"></div>
                                                    <div class="col-md-3"><button type="submit" class="btn btn-primary w-100 h-100">Sign me up</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>