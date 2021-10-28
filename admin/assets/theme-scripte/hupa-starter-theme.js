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
    //let carouselWrapper = $('.carousel-wrapper');
    let middleLogo = $('.middle-img');
    let topArea = $('#top-area-wrapper');
    let isFixedHeader;
    //let carOffset = carouselWrapper.offset();
   // let offsetHCarHeader = carOffset.top - header.outerHeight();
    if (header.hasClass('fixed-top')) {
        if (topArea[0]) {
            isFixedHeader = true;
            header.removeClass('fixed-top');
        } else {
            isFixedHeader = false;
            //siteContent.css('margin-top', (header.outerHeight() - offsetHCarHeader) + 'px');
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
                //siteContent.css('margin-top', (header.outerHeight() - offsetHCarHeader) + 'px');
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


    /**===============================================
    ========== CAROUSEL LAZY LOAD FUNCTION ===========
    ==================================================
    */
    let themeCarouselTimeout;
    $(function() {
        let carousel =  $(".carousel");
        let ifSrc = carousel.find("img[data-src]");
         if(ifSrc.length){
           $('> button.carousel-control-prev', carousel).css('pointer-events','none');
           $('> button.carousel-control-next', carousel).css('pointer-events','none');
           $('> .carousel-indicators button', carousel).css('pointer-events','none');
           clearTimeout(themeCarouselTimeout);
           themeCarouselTimeout = setTimeout(function () {
               let firstNext = $('.carousel-item',carousel).next().first()
               let nextSrx = firstNext.find("img[data-src]");
               nextSrx.attr("src", nextSrx.data('src'));
               nextSrx.removeAttr("data-src");
           }, 2500);
       }

        return carousel.on("slid.bs.carousel", function(ev) {
            let next;
            next = $(ev.relatedTarget).next().find("img[data-src]");
            let prev = $(ev.relatedTarget.previousElementSibling);
            if(next.length == 0) {
              $('> button.carousel-control-next', this).css('pointer-events','auto');
            } else {
                $('> button.carousel-control-next', carousel).css('pointer-events','none');
            }
            let srcDot = $(carousel).find("img[data-src]");
            if(prev.length || srcDot.length == 0) {
                $('> button.carousel-control-prev', carousel).css('pointer-events','auto');
            } else {
               $('> button.carousel-control-prev', carousel).css('pointer-events','none');
            }
            next.attr("src", next.data('src'));
            next.removeAttr("data-src");

            if(srcDot.length == 0) {
             $('> .carousel-indicators button', carousel).css('pointer-events','auto');
            }
        });
    });

});
