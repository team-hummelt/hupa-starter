jQuery(document).ready(function ($) {

    // LOGO Mitte
    let mitte = 0;
    let newHtmlImg;
    let x = 0;
    let liArray = [];
    if (get_hupa_option.img) {
        const menuUl = document.querySelectorAll('#bootscore-navbar li');
        let menuNodes = Array.prototype.slice.call(menuUl, 0);
        menuNodes.forEach(function (menu) {
            if (!menu.parentElement.classList.contains('dropdown-menu')) {
                liArray.push(menu);
                x++;
            }
        });

        if (x % 2 === 0) {
            mitte = x / 2;
        } else {
            mitte = Math.floor(x / 2);
        }

        for (let i = 0; i < liArray.length; i++) {
            if (i === mitte) {
                let newLi = document.createElement('li');
                newLi.classList.add('menu-logo');
                let newEl = liArray[i].insertAdjacentElement('beforebegin', newLi);
                newHtmlImg = `<a class="mx-2" href="${get_hupa_option.site_url}"><img class="middle-img" src="${get_hupa_option.img}" alt="${get_hupa_option.site_url}" width="${get_hupa_option.img_width}"></a`;
                newEl.innerHTML = newHtmlImg;
            }
        }
    }

    let header = $('#nav-main-starter');
    let siteContent = $('.site-content');
    let navLogo = $('.navbar-root .logo.md');
    let carousel = $('.carousel');
    let middleLogo = $('.middle-img');
    let topArea = $('#top-area-wrapper');
    let isFixedHeader;
    if (header.hasClass('fixed-top')) {
        if (topArea[0]) {
            isFixedHeader = true;
            header.removeClass('fixed-top');
        } else {
            isFixedHeader = false;
            siteContent.css('margin-top', (header.outerHeight()) + 'px');
            header.addClass('fixed-top');
        }
    }

    if (carousel.hasClass('carousel-margin-top')) {
        carousel.css('margin-top', -header.outerHeight() + 'px');
        header.css('z-index', 1);
    } else {
       // header.css('z-index', 'unset');
    }

    $(window).on("resize", function (event) {
        //console.log( $(this).width() );
        if (header.hasClass('fixed-top')) {
            if (topArea[0]) {
                isFixedHeader = true;
                header.removeClass('fixed-top');
            } else {
                isFixedHeader = false;
                siteContent.css('margin-top', (header.outerHeight()) + 'px');
                header.addClass('fixed-top');
            }
        }

        if (carousel.hasClass('carousel-margin-top')) {
            carousel.css('margin-top', -header.outerHeight() + 'px');
            header.css('z-index', 1);
        } else {
           // header.css('z-index', 'unset');
        }
    });

    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (topArea[0] && isFixedHeader) {
            if (scroll > topArea.outerHeight()) {
                header.addClass('fixed-top');
                header.css('z-index', 1);
            } else {
                header.removeClass('fixed-top');
            }
        }

        if (scroll > 200) {
            header.addClass("navbar-small");
            if (navLogo) {
                navLogo.addClass('small-logo');
                middleLogo.addClass('middle-img-sm')
            }
        } else {
            header.removeClass("navbar-small");
            if (navLogo) {
                navLogo.removeClass('small-logo');
                middleLogo.removeClass('middle-img-sm')
            }
        }
    });

    $(document).on('click', '.api-karte-check', function () {
        let check = $(this).children('input');
        let btn = $('.hupa-gmaps-btn');
        if(check.prop('checked')){
            check.prop('checked', false);
            btn.addClass('disabled');
            return false;
        } else {
            check.prop('checked', true);
            btn.removeClass('disabled');
            return false;
        }
    });

    $(document).on('click', '.iframe-karte-check', function () {
        let code = $(this).attr('data-id');
        let check = $('.check'+code);
        let btn = $('.btn'+code);
        if(check.prop('checked')){
            check.prop('checked', false);
            btn.addClass('disabled');
            return false;
        } else {
            check.prop('checked', true);
            btn.removeClass('disabled');
            return false;
        }
    });

    $(document).on('click', '.hupa-iframe-btn', function () {
        $(this).trigger('blur');
        let code = $(this).attr('data-id');
        if($('.check'+code).prop('checked')) {
            $.post(theme_ajax_obj.ajax_url, {
                '_ajax_nonce': theme_ajax_obj.nonce,
                'action': 'HupaStarterNoAdmin',
                'method': 'get_iframe_card',
                'code': code,
                'width': $(this).attr('data-width'),
                'height': $(this).attr('data-height'),
            }, function (data) {
                if(data.status){
                    sessionStorage.setItem('gmaps', true);
                    $('.iframe'+data.code).html(data.iframe);
                }
            });
        }
    });

// Preloader script
    jQuery(window).load(function () {
        $(".preloader").delay(1600).fadeOut('easing').remove();
    });

    // Load Social Media ICON
    /*$(function() {
        return $(".carousel.lazy").on("slid.bs.carousel", function(ev) {
            //let lazy;
            let next;
            //lazy = $(ev.relatedTarget).find("img[data-src]");
           // next = $(ev.relatedTarget.nextElementSibling).find("img[data-src]");
           // lazy.attr("src", lazy.data('src'));
           // next.attr("src", next.data('src'));
            //lazy.removeAttr("data-src");
          //  next.removeAttr("data-src");
        });
    });
    */
});

/*===============================================
========== CAROUSEL LAZY LOAD FUNCTION ==========
=================================================
*/
document.addEventListener('DOMContentLoaded', function () {
    let themeCarouselTimeout;
    let themeCarouselEvents = document.querySelectorAll(".carousel.lazy .carousel-item");
    if (themeCarouselEvents) {
        let themeCarouselNextEvents = document.querySelectorAll(".carousel.lazy");
        let carouselNextNodes = Array.prototype.slice.call(themeCarouselNextEvents, 0);
        let nextElm;
        let nextCarousel;
        let carouselNodes = Array.prototype.slice.call(themeCarouselEvents, 0);
        carouselNodes.forEach(function (carouselNodes) {
            let carousel = new bootstrap.Carousel(carouselNodes);
            let active = carousel._element;
            if (active.classList.contains('active')) {
                clearTimeout(themeCarouselTimeout);
                themeCarouselTimeout = setTimeout(function () {
                    nextElm = carouselNodes.nextElementSibling.children[0];
                    let lazy = nextElm.getAttribute('data-src');
                    nextElm.setAttribute('src', lazy);
                    nextElm.removeAttribute('data-src');
                }, 2500);
            }
        });

        carouselNextNodes.forEach(function (carouselNextNodes) {
            carouselNextNodes.addEventListener("slid.bs.carousel", function (e) {
                if (e.relatedTarget.nextElementSibling) {
                    nextCarousel = e.relatedTarget.nextElementSibling.children[0];
                    let lazy = nextCarousel.getAttribute('data-src');
                    if(lazy){
                        nextCarousel.setAttribute('src', lazy);
                        nextCarousel.removeAttribute('data-src');
                    }
                }
            })
        });
    }
})