<?php get_header() ?>
<?php while (have_posts()) { ?>
    <?php the_post() ?>
    <section class="hero mb-0!">
        <div class="container">
            <div class="breadcrumbs fs-16 mt-3">
                <ul class="list-inline">
                    <li><a href="<?= get_site_url() ?>">Home</a></li>
                    <li><a href="<?= get_home_url() ?>">Blogs</a></li>
                    <li><span><?php the_title() ?></span></li>
                </ul>
            </div>
            <div class="hero-title-image md-margin-top">
                <div class="row">
                    <div class="col-12 md-padding-bottom">
                        <h1 class="mb-4"><?php the_title() ?></h1>
                        <ul class="blog-meta d-flex gap-3 list-inline align-items-center flex-wrap">
                            <li class="d-flex gap-4 align-items-center">
                                <span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"></path>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"></path>
                                    </svg>
                                </span>
                                <?php the_date() ?>
                            </li>
                            <li class="d-flex gap-3 align-items-center">
                                <span class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                    </svg></span>
                                Caravan
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-inner md-padding-bottom sm-padding-top">
        <div class="container">
            <div class="row g-sm">
                <div class="col-lg-9">
                    <section class="blog--content">
                        <div class="container">
                            <div class="image-box mb-4 overflow-hidden blog-image rounded-3">
                                <?php the_post_thumbnail('large') ?>
                            </div>
                            <div class="blog-content--inner">
                                <?php the_content() ?>
                            </div>
                            <div class="blog--inner-footer sm-margin-bottom sm-margin-top sm-padding-top">
                                <div class="row g-5">
                                    <div class="col-12 d-flex flex-column justify-content-between text-center">
                                        <div class="share mb-5">
                                            <p class="mb-3 fw-semibold opacity-half">Share this post</p>
                                            <div class="text-[rgb(32,31,31)]! socials d-inline-flex gap-3 list-inline mb-0 align-items-center">

                                                <!-- Twitter / X -->
                                                <a class="text-inherit!" href="https://twitter.com/intent/tweet?url=<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer" aria-label="twitter">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                                        <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"></path>
                                                    </svg>
                                                </a>

                                                <!-- Instagram -->
                                                <a class="text-inherit!" href="https://www.instagram.com/?url=<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"></path>
                                                    </svg>
                                                </a>

                                                <!-- Facebook -->
                                                <a class="text-inherit!" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer" aria-label="facebook">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"></path>
                                                    </svg>
                                                </a>

                                                <!-- LinkedIn -->
                                                <a class="text-inherit!" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer" aria-label="linkedin">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                        <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"></path>
                                                    </svg>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="contact-us">
                                            <h3 class="fs-18 opacity-half mb-3">Contact us</h3><a href="mailto:ste@digitallydisruptive.co.uk" class="btn btn-primary btn-lg">Contact Us</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar sidebar-style-2 sticky-element">
                        <div class="sidebar--blog--inner related-post">
                            <h5 class="opacity-half mb-4">Related posts</h5>
                            <div class="row g-3">
                                <div class="col-12 related-post-insert">
                                    <div class="cursor-pointer select-none related--post-grid rounded background-white overflow-hidden">
                                        <div class="row g-0">
                                            <div class="col-6">
                                                <div class="image-box image-style h-100 blog-image"><img alt="Top 10 Motorhomes for 2025: UK Edition image" loading="lazy" width="0" height="0" decoding="async" data-nimg="1" sizes="100vw" srcset="/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=320&amp;q=75 320w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=384&amp;q=75 384w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=480&amp;q=75 480w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=640&amp;q=75 640w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=750&amp;q=75 750w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=828&amp;q=75 828w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1080&amp;q=75 1080w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1200&amp;q=75 1200w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=1920&amp;q=75 1920w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=2048&amp;q=75 2048w, /_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=3840&amp;q=75 3840w" src="https://compare.group/_next/image?url=https%3A%2F%2Fd1d1xzu5l8rgop.cloudfront.net%2Fleisure-vehicle%2Fblogs%2F1760373645-68ed2b8d46a9d.webp&amp;w=3840&amp;q=75" style="color: transparent;"></div>
                                            </div>
                                            <div class="col-6">
                                                <div class="content-box p-20">
                                                    <div class="blog-grid--category fs-14 fw-semibold mb-3"><span>Blog</span></div>
                                                    <div class="blog-grid--title mb-4">
                                                        <h3 class="fs-16 fw-semibold line-clamp-4">Top 10 Motorhomes for 2025: UK Edition</h3>
                                                    </div>
                                                    <div class="blog-grid--date fs-14 ">21st November</div>
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
        </div>
    </section>
<?php } ?>
<?php get_footer() ?>