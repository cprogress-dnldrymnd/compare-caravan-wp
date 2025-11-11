jQuery(document).ready(function () {
    templates();
    password_input();
    menu_responsive();
    sell_leisure_vehicle_form();
    setTimeout(function () {
        swiper_sliders();
        header();
        menu_responsive();
    }, 1000);

});

function sell_leisure_vehicle_form() {
    jQuery('#add-technical-details').click(function (e) {
        $input = jQuery('<input type="text" name="TechnicalDetails[]" class="form-control form-control-lg" placeholder="Enter Technical Details">');
        $input.appendTo('#technical-details-holder');
        jQuery('#technical-details-holder').addClass('mb-4');
        e.preventDefault();
    });
    jQuery('#add-more-interior-features').click(function (e) {
        $input = jQuery('<div class="col-lg-6"><input type="text" name="Interior-Features[]" class="form-control form-control-lg" placeholder="Enter feature"></div>');
        $input.appendTo('#interior-features-holder');
        e.preventDefault();
    });

    jQuery('#add-more-exterior-features').click(function (e) {
        $input = jQuery('<div class="col-lg-6"><input type="text" name="Exterior-Features[]" class="form-control form-control-lg" placeholder="Enter feature"></div>');
        $input.appendTo('#Exterior-features-holder');
        e.preventDefault();
    });

    jQuery('#sell-vehicle-next-step').click(function (e) {
        $step = jQuery('#myTab-SellVehicle .nav-link.active').parent().next().attr('step');

        if ($step == '5') {
            jQuery('.sell-vehicle-form-holder').addClass('hide-navigations');
        } else {
            jQuery('.sell-vehicle-form-holder').removeClass('hide-navigations');
        }
        jQuery('#myTab-SellVehicle .nav-link.active').parent().next().find('.nav-link').click();
        jQuery('.sell-vehicle-form-holder').removeClass('hide-go-back');
        e.preventDefault();
    });
    jQuery('#sell-vehicle-previous-step').click(function (e) {
        $step = jQuery('#myTab-SellVehicle .nav-link.active').parent().prev().attr('step');
        if ($step == '1') {
            jQuery('.sell-vehicle-form-holder').addClass('hide-go-back');
        }
        jQuery('.sell-vehicle-form-holder').removeClass('hide-navigations');

        jQuery('#myTab-SellVehicle .nav-link.active').parent().prev().find('.nav-link').click();

        e.preventDefault();
    });

    jQuery('#edit-price').click(function (e) {
        $text = jQuery(this).text();
        if ($text == 'Edit Price') {
            jQuery('.price-box').addClass('editing');
            jQuery(this).text('Save Price');
            jQuery('#sell-vehicle-price').focus()
        } else {
            $val = jQuery('#sell-vehicle-price').val();
            jQuery('.price-box').removeClass('editing');
            jQuery(this).text('Edit Price');
            jQuery('.price-text').text($val);
        }
        e.preventDefault();
    });

    jQuery('.character-count-input').on('keyup', function () {
        // 'this' refers to the specific input field that triggered the event.
        // Get the current value of the input field.
        var text = jQuery(this).val();

        // Get the length of the text (character count).
        var charCount = text.length;
        console.log(charCount);
        // Find the closest parent 'input-group' div to the current input,
        // then find the 'span' element with the class 'count' within that group.
        // Update its text with the calculated character count.
        jQuery(this).next().find('.count').text(charCount);
    });


}

function menu_responsive() {
    if (window.innerWidth < 992) {
        jQuery('#main-navbar').insertAfter('#offCanvasMenu .button-box');
    }
}

function fetch___template($location, $element) {
    fetch($location) // Path to the HTML file you want to insert
        .then(response => response.text())
        .then(data => {
            jQuery($element).html(data);
        })
        .catch(error => {
            console.error('Error fetching the HTML file:', error);
            jQuery($element).html('<p>Error loading content.</p>');
        });
}
function password_input() {
    jQuery(document).on('click', ".password---hidden", function () {
        $input = jQuery(this).prev();
        $input.attr('type', 'text');
        jQuery(this).addClass('password---show').removeClass('password---hidden');
    });

    jQuery(document).on('click', ".password---show", function () {
        $input = jQuery(this).prev();
        $input.attr('type', 'password');
        jQuery(this).addClass('password---hidden').removeClass('password---show');
    });
}

function templates() {
    fetch___template('template-parts/--topbar.html', '#top-bar-insert');
    fetch___template('template-parts/--header.html', '#header-insert');
    fetch___template('template-parts/offcanvas/--offcanvas-menu.html', '#offcanvas-menu');
    fetch___template('template-parts/--footer.html', '#footer-insert');

}

function header() {
    jQuery('.header').removeClass('overflow-hidden');
    $height = jQuery('#main-header').outerHeight();
    $top_bar = jQuery('.top-bar').outerHeight();
    if ($height != undefined) {
        jQuery('body').css('--header-height', $height + 'px');
    }
    if ($top_bar != undefined) {
        jQuery('body').css('--top-bar-height', $top_bar + 'px');
    }
}


function swiper_sliders() {


    if (window.innerWidth < 1400) {
        var swiper_icon_lists = new Swiper(".swiper-icons-lists", {
            slidesPerView: 'auto',
            breakpoints: {

                0: {
                    slidesPerView: 'auto',
                    spaceBetween: 5,
                },
                992: {
                    spaceBetween: 20,
                },

            },

        });

    }
    $key = 0;
    if (jQuery('.swiper-thumbnails').length > 0) {

        if (window.innerWidth > 991) {
            $height = jQuery('.swiper-gallery').outerHeight();

            jQuery('.swiper-thumbnails').css('height', $height + 'px');
            var swiper_thumb = new Swiper(".swiper-thumbnails", {
                direction: "vertical",
                spaceBetween: 10,
                slidesPerView: 'auto',
                freeMode: true,
                watchSlidesProgress: true,
            });
        } else {
            var swiper_thumb = new Swiper(".swiper-thumbnails", {
                spaceBetween: 5,
                slidesPerView: 4,
                freeMode: true,
                watchSlidesProgress: true,
            });
        }



        var swiper_gallery = new Swiper('.swiper-gallery', {
            loop: true,
            slidesPerView: 1,
            spaceBetween: 0,
            thumbs: {
                swiper: swiper_thumb,
            },
            navigation: {
                nextEl: '.swiper-gallery-next',
                prevEl: '.swiper-gallery-prev',
            },
            pagination: {
                el: '.swiper-gallery-pagination',
                type: "fraction",
            },
        });
        $key++;
    } else {
        jQuery('.swiper-gallery').each(function (index, element) {
            var $id = 'swiper' + $key;
            jQuery(this).attr('id', $id);
            jQuery(this).find('.swiper-button-next').attr('id', $id + '-next');
            jQuery(this).find('.swiper-button-prev').attr('id', $id + '-prev');
            jQuery(this).find('.swiper-pagination').attr('id', $id + '-pagination');

            var $id = new Swiper('#' + $id, {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 0,
                navigation: {
                    nextEl: '#' + $id + '-next',
                    prevEl: '#' + $id + '-prev',
                },
                pagination: {
                    el: '#' + $id + '-pagination',
                    type: "fraction",
                },
            });
            $key++;
        });
    }

    var swiper = new Swiper(".swiper-hero", {
        slidesPerView: 1,

        pagination: {
            el: '.swiper-pagination',
        },
    });

    var swiper_listing = new Swiper(".swiper-listing", {

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            992: {
                slidesPerView: 3,
                spaceBetween: 20,
            },

            1200: {
                slidesPerView: 4,
                spaceBetween: 22,
            },

        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        pagination: {
            el: '.swiper-pagination',
        },
    });

    var swiper_listing_related = new Swiper(".swiper-listing-related", {

        breakpoints: {
            0: {
                slidesPerView: 'auto',
                spaceBetween: 12,
                freeMode: true,
            },


            992: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

        },
        pagination: {
            el: '.swiper-pagination',
        },
    });


    jQuery('.nav-tabs-swiper .swiper-slide').each(function (index, element) {
        $width = jQuery(this).find('.nav-link').outerWidth();
        jQuery(this).css('width', $width + 'px');
    });
    var swiper_nav_tabs = new Swiper('.nav-tabs-swiper', {
        slidesPerView: 'auto',
        spaceBetween: 40,
        freeMode: true,
    });


    var swiper_gallery_slider = new Swiper('.swiper-gallery-slider', {
        slidesPerView: 1,
        spaceBetween: 0,

        pagination: {
            el: '.swiper-pagination',
        },
    });


    var swiper_logo_slider = new Swiper(".swiper-logo-slider", {
        spaceBetween: 20,
        speed: 5000,
        loop: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
            },

            576: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 5,
            },

            1200: {
                slidesPerView: 6,
            },

        },

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        pagination: {
            el: '.swiper-pagination',
        },
    });


    var swiper_grid_slider_1 = new Swiper(".swiper-grid-slider-js-1", {
        pagination: {
            el: '.swiper-pagination',
        },
        breakpoints: {
            0: {
                slidesPerView: 'auto',
                spaceBetween: 12,
                freeMode: true,
            },


            992: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

            1200: {
                slidesPerView: 3,
                spaceBetween: 22,
            },

        },

    });
    var swiper_grid_slider_2 = new Swiper(".swiper-grid-slider-js-2", {
        freeMode: true,

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            992: {
                slidesPerView: 'auto',
                spaceBetween: 20,
            },
        },

    });

    var swiper_testimonials = new Swiper(".swiper-testimonials", {
        freeMode: true,

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 12,
            },

            992: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
        },

        pagination: {
            el: '.swiper-pagination',
        },

    });


    $key = 0;
    jQuery('.swiper-listing-grid-gallery').each(function (index, element) {
        var $id = 'swiper' + $key;
        jQuery(this).attr('id', $id);
        jQuery(this).find('.swiper-button-next').attr('id', $id + '-next');
        jQuery(this).find('.swiper-button-prev').attr('id', $id + '-prev');

        var $id = new Swiper('#' + $id, {
            slidesPerView: 1,
            navigation: {
                nextEl: '#' + $id + '-next',
                prevEl: '#' + $id + '-prev',
            },
        });
        $key++;
    });




    var swiper_dealer_reviews = new Swiper(".swiper-dealer-reviews", {
        freeMode: true,

        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 12,
            },

            992: {
                slidesPerView: 2,
                spaceBetween: 20,
            },

        },

        pagination: {
            el: '.swiper-pagination',
        },

    });

    if (window.innerWidth < 992) {
        jQuery('.swiper-on-mobile-js').addClass('swiper');
        jQuery('.swiper-on-mobile-js > div').addClass('swiper-wrapper').removeClass('row g-sm h-100');
        jQuery('.swiper-on-mobile-js > div > div').addClass('swiper-slide').removeClass('col-lg-6');

        var swiper_on_mobile = new Swiper(".swiper-on-mobile-js", {
            slidesPerView: 1,
            spaceBetween: 12,
            pagination: {
                el: '.swiper-pagination',
            },

        });
    }
}
