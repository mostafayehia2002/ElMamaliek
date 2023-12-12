document.addEventListener("DOMContentLoaded", function(event) {

    var isValid = function (el) {
        return el.length ? true : false;
    }

    var toggleBodyScroll = function(state = true) {
        state ? $('body').addClass('nav-open') : $('body').removeClass('nav-open');
    }

    $('.sub-nav__menu').on('click', function (e) {
        e.preventDefault();
        $('.sub-nav-content').toggleClass('is-active');
        $('.nav-overlay').toggleClass('is-active');
        toggleBodyScroll();
    })

    $('.sub-nav__close').on('click', function () {
        $('.sub-nav-content').removeClass('is-active');
        $('.nav-overlay').removeClass('is-active');
        toggleBodyScroll(false);
    })

    $('.nav-overlay').on('click', function () {
        $('.sub-nav-content').removeClass('is-active');
        $('.nav-overlay').removeClass('is-active');
        toggleBodyScroll(false);
    })

    $('.main-slider').slick({
        arrows: false,
        autoplay: true,
        dots: true,
        rtl: true,
        autoplaySpeed: 6000,
    });

    // $('.main-slider .slick-slide').on('focus', function() {
    //     this.blur();
    // });

    $('.products-listing').slick({
        autoplay: true,
        arrows: false,
        dots: false,
        rtl: true,
        autoplaySpeed: 6000,
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 700,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.testimonails-listing').slick({
        autoplay: true,
        arrows: false,
        dots: true,
        rtl: true,
        autoplaySpeed: 6000,
        slidesToShow: 2,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // product listing controls ---
    if (isValid($('.products-listing'))) {
        $('.products-listing').each(function () {
            var slider = $(this),
                nextBtn = slider.parent().find('.button-next'),
                prevBtn = slider.parent().find('.button-prev');
            prevBtn.on('click', function (e) {
                e.preventDefault();
                slider.slick('slickPrev');
            })
            nextBtn.on('click', function (e) {
                e.preventDefault();
                slider.slick('slickNext');
            })
        })
    }

    $(".main-menu > li .theme-icon-arrow-left").on("click", function () {

        var otherMenuItems = $(".main-menu > li i").not($(this));
        otherMenuItems.removeClass('active')
        var thisAccordion = $(this);
        if (thisAccordion.hasClass('active')) {
            thisAccordion.removeClass('active');
        } else {
            thisAccordion.addClass('active');
        }
    });

    // equalize testimonials blocks ---
    if (isValid($('.testimonails-listing'))) {
        var maxHeight;
        testimonialBq = $(".testimonials-item blockquote .testimonials-item__content");
        $(window).on('resize', function () {
            maxHeight = 0;
            testimonialBq.each(function () {
                $(this).find('p').height() + 10 > maxHeight ? maxHeight = $(this).find('p').height() + 10 : null;
            });
            testimonialBq.css('height', maxHeight + 'px');
            $('.testimonails-listing').slick('refresh');
        }).resize();
    }

    // upload file ---
    if (isValid($('.upload.form-control'))) {
        $('.upload.form-control').each(function () {
            var $input = $(this),
                $label = $input.next('label'),
                labelVal = $label.html();

            $input.on('change', function (e) {
                var fileName = '';

                if (this.files && this.files.length > 1)
                    fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                else if (e.target.value)
                    fileName = e.target.value.split('\\').pop();

                if (fileName)
                    $label.find('span').html(fileName);
                else
                    $label.html(labelVal);
            });

            // Firefox bug fix
            $input
                .on('focus', function () {
                    $input.addClass('has-focus');
                })
                .on('blur', function () {
                    $input.removeClass('has-focus');
                });
        });
    }
});
