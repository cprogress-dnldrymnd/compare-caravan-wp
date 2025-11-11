 <?php
/*--------------------------------------------------*/
/* Template Name: Manufacturer 
/*--------------------------------------------------*/
get_header();
$term = get_queried_object();
?>
 
 <section class="hero">
            <div class="container">
                <div class="breadcrumbs fs-16 mt-3">
                    <ul class="list-inline">
                        <li><a href="/">Home</a></li>
						<li><span>Manufacturer</span></li>
                        <li><span><?= $term->name ?></span></li>
						
                    </ul>
                </div>
                <div class="hero-title-image md-margin-top">
                    <div class="row">
                        <div class="col-lg-6 md-padding-bottom">
                            <h1 class="mb-4"><?= $term->name ?></h1>
                            <div class="desc mb-4">
                                <p>The 2025 season has arrived at Swift with continued focus on creating the finest
                                    award-winning leisure products, designed to give you unforgettable holiday
                                    experiences year after year.</p>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="image-box">
                                <img src="./images/hero-img-swift.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="grid-section  sm-padding-top sm-padding-bottom">
            <div class="container">
                <div class="heading-icon mb-5">
                    <h2 class="d-flex align-items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="42.568"
                            height="42.576" viewBox="0 0 42.568 42.576">
                            <path id="Icon_awesome-search" data-name="Icon awesome-search"
                                d="M41.989,36.809,33.7,28.52a1.994,1.994,0,0,0-1.414-.582H30.931a17.287,17.287,0,1,0-2.993,2.993v1.355A1.994,1.994,0,0,0,28.52,33.7l8.29,8.29a1.987,1.987,0,0,0,2.819,0l2.353-2.353A2,2,0,0,0,41.989,36.809ZM17.295,27.938A10.643,10.643,0,1,1,27.938,17.295,10.637,10.637,0,0,1,17.295,27.938Z"
                                fill="#f2007d" />
                        </svg>Discover the perfect Swift leisure vehicle to suit your needs</h2>
                </div>
                <div class="swiper swiper-grid-slider swiper-grid-slider-js-1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div
                                class="grid-section--inner rounded overflow-hidden background-darkgreen h-100 bg-decor bg-decor-1 overflow-hidden position-relative">
                                <div class="image-box text-end image-style" style="--fit: contain;">
                                    <img src="./images/img-caravans.png" alt="">
                                </div>
                                <div class="content-box px-5 pb-5 text-white position-relative">
                                    <h3>Caravans</h3>
                                    <div class="desc fw-medium mb-4 mt-4">
                                        <p>2,382 caravans from leading dealerships.</p>
                                    </div>
                                    <a href="https://caravancompare.theprogressteam.com/listing--caravans.html" class="btn btn-primary">
                                        Browse caravans
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="grid-section--inner rounded overflow-hidden background-darkgreen h-100 bg-decor bg-decor-2 overflow-hidden position-relative">
                                <div class="image-box text-end image-style" style="--fit: contain;">
                                    <img src="./images/img-motorhomes.png" alt="">
                                </div>
                                <div class="content-box px-5 pb-5 text-white position-relative">
                                    <h3>Motorhomes</h3>
                                    <div class="desc fw-medium mb-4 mt-4">
                                        <p>6,622 motorhomes from leading dealerships.</p>
                                    </div>
                                    <a href="https://caravancompare.theprogressteam.com/listing--motorhomes.html" class="btn btn-primary">
                                        Browse motorhomes
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div
                                class="grid-section--inner rounded overflow-hidden background-darkgreen h-100 bg-decor bg-decor-3 overflow-hidden position-relative">
                                <div class="image-box text-end image-style" style="--fit: contain;">
                                    <img src="./images/img-campervans.png" alt="">
                                </div>
                                <div class="content-box px-5 pb-5 text-white position-relative">
                                    <h3>Campervans</h3>
                                    <div class="desc fw-medium mb-4 mt-4">
                                        <p>1,903 campervans from leading dealerships.</p>
                                    </div>
                                    <a href="https://caravancompare.theprogressteam.com/listing--campervans.html" class="btn btn-primary">
                                        Browse campervans
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cta-section text-white sm-margin-bottom">
            <div class="container">
                <div class="cta-section-inner background-darkgreen rounded-3 overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-5 d-flex flex-column justify-content-between p-5">
                            <div class="content-box mb-5">
                                <h2>Discover the All New 2025 Swift Sprite</h2>
                                <div class="desc-box">
                                    <p>Browse 2025 stock.</p>
                                </div>
                            </div>
                            <div class="button-box">
                                <a href="" class="btn btn-primary btn-lg">Discover Swift Sprite</a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="image-box">
                                <img src="./images/img-cta.png" alt="" class="w-100">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                        Swift latest deals
                    </h2>
                </div>
                <div class="deals-swiper-holder">
                    <div class="tab-nav-holder mb-5">
                        <div class="container p-0">
                            <div class="nav-tabs-swiper swiper overflow-visible">
                                <ul class=" swiper-wrapper nav nav-tabs nav-tabs-style-2" id="myTabDeals-Swiper">
                                    <li class="swiper-slide nav-item">
                                        <button class="nav-link active" id="Deals-Caravans-tab" data-bs-toggle="tab"
                                            data-bs-target="#Deals-Caravans-tab-pane" type="button" role="tab"
                                            aria-controls="Deals-Caravans-tab-pane"
                                            aria-selected="true">Caravans</button>
                                    </li>
                                    <li class="swiper-slide nav-item">
                                        <button class="nav-link" id="Deals-Motorhomes-tab" data-bs-toggle="tab"
                                            data-bs-target="#Deals-Motorhomes-tab-pane" type="button" role="tab"
                                            aria-controls="Deals-Motorhomes-tab-pane" aria-selected="false"
                                            tabindex="-1">Motorhomes</button>
                                    </li>
                                    <li class="swiper-slide nav-item">
                                        <button class="nav-link" id="Deals-Campervans-tab" data-bs-toggle="tab"
                                            data-bs-target="#Deals-Campervans-tab-pane" type="button" role="tab"
                                            aria-controls="Deals-Campervans-tab-pane" aria-selected="false"
                                            tabindex="-1">Campervans</button>
                                    </li>
                                    <li class="swiper-slide nav-item">
                                        <button class="nav-link " id="Deals-Static-Caravans-tab" data-bs-toggle="tab"
                                            data-bs-target="#Deals-Static-Caravans-tab-pane" type="button" role="tab"
                                            aria-controls="Deals-Static-Caravans-tab-pane" aria-selected="false"
                                            tabindex="-1">Static
                                            Caravans</button>
                                    </li>
                                    <li class="swiper-slide nav-item">
                                        <button class="nav-link " id="Deals-Holiday-Homes-tab" data-bs-toggle="tab"
                                            data-bs-target="#Deals-Holiday-Homes-tab-pane" type="button" role="tab"
                                            aria-controls="Deals-Holiday-Homes-tab-pane" aria-selected="false"
                                            tabindex="-1">Holiday
                                            Homes</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content-holder">
                        <div class="container p-0">
                            <div class="tab-content" id="myTabDeals-SwiperContent">
                                <div class="tab-pane fade active show" id="Deals-Caravans-tab-pane" role="tabpanel"
                                    aria-labelledby="Deals-Caravans-tab" tabindex="0">
                                    <div class="swiper-holder">
    <div class="swiper swiper-listing" style="--fit: contain">
        <div class="swiper-wrapper">
            <div class="swiper-slide listing-grid-slider-insert"></div>
            <div class="swiper-slide listing-grid-slider-insert-2"></div>
            <div class="swiper-slide listing-grid-slider-insert-3"></div>
            <div class="swiper-slide listing-grid-slider-insert-4"></div>
            <div class="swiper-slide listing-grid-slider-insert"></div>
            <div class="swiper-slide listing-grid-slider-insert-2"></div>
            <div class="swiper-slide listing-grid-slider-insert-3"></div>
        </div>
        <div class="swiper-pagination swiper-pagination-dark mt-4 mt-lg-5 mb-4 mb-lg-0 text-center position-static">
        </div>
    </div>
</div>
                                </div>
                                <div class="tab-pane fade" id="Deals-Motorhomes-tab-pane" role="tabpanel"
                                    aria-labelledby="Deals-Motorhomes-tab" tabindex="0">

                                </div>
                                <div class="tab-pane fade" id="Deals-Campervans-tab-pane" role="tabpanel"
                                    aria-labelledby="Deals-Campervans-tab" tabindex="0">

                                </div>
                                <div class="tab-pane fade" id="Deals-Static-Caravans-tab-pane" role="tabpanel"
                                    aria-labelledby="Deals-Static-Caravans-tab" tabindex="0">

                                </div>
                                <div class="tab-pane fade" id="Deals-Holiday-Homes-tab-pane" role="tabpanel"
                                    aria-labelledby="Deals-Holiday-Homes-tab" tabindex="0">

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


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
                        Swift latest news and updates
                    </h2>
                </div>
                <div class="blogs--holder">
                    <div class="row blogs-row g-sm">
                        <div class="col-lg-6">
                            <div class="blog-grid--holder h-auto h-lg-100 swiper-on-mobile-js">
                                <div class="row g-sm h-100">
                                    <div class="col-lg-6 blog-grid-insert">
                <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
    <div class="image-box image-style">
        <img src="./images/img1 (2).png" alt="">
    </div>
    <div class="content-box p-20">
        <div class="blog-grid--category fs-14 fw-semibold mb-3">
            <span>News</span>
        </div>
        <div class="blog-grid--title mb-4">
            <h3 class="fs-25 fw-semibold">Best kept dealership in the UK: A great day out for
                the family
                lorem ipssum</h3>
        </div>
        <div class="blog-grid--date fs-14 fw-semibold">
            14th April
        </div>
    </div>
</div>
                                    </div>
                                    <div class="col-lg-6 blog-grid-insert">
                <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
    <div class="image-box image-style">
        <img src="./images/img1 (2).png" alt="">
    </div>
    <div class="content-box p-20">
        <div class="blog-grid--category fs-14 fw-semibold mb-3">
            <span>News</span>
        </div>
        <div class="blog-grid--title mb-4">
            <h3 class="fs-25 fw-semibold">Best kept dealership in the UK: A great day out for
                the family
                lorem ipssum</h3>
        </div>
        <div class="blog-grid--date fs-14 fw-semibold">
            14th April
        </div>
    </div>
</div>
                                    </div>
                                    <div class="col-lg-6 blog-grid-insert">
                <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
    <div class="image-box image-style">
        <img src="./images/img1 (2).png" alt="">
    </div>
    <div class="content-box p-20">
        <div class="blog-grid--category fs-14 fw-semibold mb-3">
            <span>News</span>
        </div>
        <div class="blog-grid--title mb-4">
            <h3 class="fs-25 fw-semibold">Best kept dealership in the UK: A great day out for
                the family
                lorem ipssum</h3>
        </div>
        <div class="blog-grid--date fs-14 fw-semibold">
            14th April
        </div>
    </div>
</div>
                                    </div>
                                    <div class="col-lg-6 blog-grid-insert">
                <div class="blog-grid--inner background-white rounded overflow-hidden h-100 d-flex flex-column justify-content-between">
    <div class="image-box image-style">
        <img src="./images/img1 (2).png" alt="">
    </div>
    <div class="content-box p-20">
        <div class="blog-grid--category fs-14 fw-semibold mb-3">
            <span>News</span>
        </div>
        <div class="blog-grid--title mb-4">
            <h3 class="fs-25 fw-semibold">Best kept dealership in the UK: A great day out for
                the family
                lorem ipssum</h3>
        </div>
        <div class="blog-grid--date fs-14 fw-semibold">
            14th April
        </div>
    </div>
</div>
                                    </div>
                                </div>
                                <div class="swiper-pagination swiper-pagination-dark d-block d-lg-none mt-4 text-center position-static"></div>
                
                            </div>
                        </div>
                        <div class="col-lg-6 blog-grid-large-insert d-none d-lg-block">
                
                        </div>
                    </div>
                </div>

                <div class="button-box text-center mt-5">
                    <a type="submit" class="btn btn-primary btn-lg" href="https://caravancompare.theprogressteam.com/blog-listing.html">Visit the blog</a>
                </div>
            </div>
        </section>
        
        <?php get_footer() ?>