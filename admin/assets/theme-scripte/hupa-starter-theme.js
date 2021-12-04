document.addEventListener("DOMContentLoaded", function (event) {
   //document.addEventListener('mouseup', onMouseUp, true); // {passive: true, capture: true}
    let contBlueimp = document.getElementById("blueimp-gallery");


    (function ($) {

        // LOGO Mitte
        let mitte = 0;
        let newHtmlImg;
        let margin;
        let x = 0;
        $(window).on('resize');

        if (get_hupa_option.img) {
            const menuUl = document.querySelectorAll('#bootscore-navbar');
            if (menuUl[0].children.length) {
                x = menuUl[0].children.length;
                if (x % 2 === 0) {
                    mitte = x / 2;
                } else {
                    mitte = Math.floor(x / 2);
                }

                for (let i = 0; i < menuUl[0].children.length; i++) {
                    if (i === mitte) {
                        let newLi = document.createElement('li');
                        newLi.classList.add('menu-logo');

                        let newEl = menuUl[0].children[i].insertAdjacentElement('beforebegin', newLi);
                        newHtmlImg = `<a class="mx-2" href="${get_hupa_option.site_url}"><img class="middle-img logo md" src="${get_hupa_option.img}" alt="${get_hupa_option.site_url}" width="${get_hupa_option.img_width}"></a>`;
                        newEl.innerHTML = newHtmlImg;
                    }
                }
            }
        }

// To initially run the function:
        //$(window).resize();

        let header = $('#nav-main-starter');
        let siteContent = $('.site-content');
        let navLogo = $('.navbar-root .logo.md');
        let carouselWrapper = $('.header-carousel');
        let headerHeight = header.outerHeight();
        let carouselMargin;
        let middleLogo = $('.middle-img');
        let topArea = $('#top-area-wrapper');
        let isFixedHeader;
        let carouselItem = $('.header-carousel .carousel-item');
        let carouselImg = $('.header-carousel img.bgImage');
        let imgFullHeight = carouselImg.outerHeight() - topArea.outerHeight();

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


        if (carouselWrapper.hasClass('carousel-margin-top')) {
            if (topArea[0] && $(window).outerWidth() > 991) {
                carouselImg.css('height', carouselImg.outerHeight() - topArea.outerHeight() + 'px')
            }
            carouselWrapper.css('margin-top', -header.outerHeight() + 'px');
        }

        $(window).on("resize", function (event) {
            //console.log( $(this).width() );
            let scroll = $(window).scrollTop();
            carouselMargin = header.innerHeight() - header.innerHeight();
            if (topArea[0] && carouselWrapper.hasClass('carousel-margin-top')) {
                carouselItem.css('max-height', imgFullHeight + 'px')
                if ($(this).width() > 991) {
                    carouselItem.css('max-height', imgFullHeight + 'px')
                }

                if (scroll > topArea.outerHeight()) {
                    header.addClass('fixed-top');
                    carouselWrapper.css('margin-top', carouselMargin + 'px')
                } else {
                    carouselWrapper.css('margin-top', -headerHeight + 'px')
                    header.removeClass('fixed-top');
                }
            }

            if (header.hasClass('fixed-top') && carouselWrapper.hasClass('carousel-margin-top')) {
                if (topArea[0]) {
                    isFixedHeader = true;
                    header.removeClass('fixed-top');
                } else {
                    isFixedHeader = false;
                    siteContent.css('margin-top', (header.innerHeight()) + 'px');
                    siteContent.css('margin-top', (header.innerHeight() - offsetHCarHeader) + 'px');
                    header.addClass('fixed-top');
                }
            }

            if (topArea[0] && !carouselWrapper.hasClass('carousel-margin-top')) {
                if ($(this).width() > 991) {
                    if (scroll > topArea.outerHeight()) {
                        header.addClass('fixed-top');
                        carouselWrapper.css('margin-top', header.outerHeight() + 'px')
                    } else {
                        let topHeight = topArea.outerHeight() - topArea.outerHeight();
                        carouselWrapper.css('margin-top', -topHeight + 'px')
                        header.removeClass('fixed-top');
                    }
                } else {
                    topArea.removeClass('fixed-top');
                    header.addClass('fixed-top');
                    carouselWrapper.css('margin-top', header.outerHeight() + 'px');
                }
            }

        });

        $(window).on("scroll", function (event) {
            let scroll = $(window).scrollTop();
            carouselMargin = headerHeight - headerHeight;
            if (topArea[0] && carouselWrapper.hasClass('carousel-margin-top')) {
                if (scroll > topArea.outerHeight()) {
                    header.addClass('fixed-top');
                    carouselWrapper.css('margin-top', carouselMargin + 'px')
                } else {
                    carouselWrapper.css('margin-top', -headerHeight + 'px')
                    header.removeClass('fixed-top');
                }
            }

            if (topArea[0] && !carouselWrapper.hasClass('carousel-margin-top')) {
                if ($(this).width() > 991) {
                    if (scroll > topArea.outerHeight()) {
                        header.addClass('fixed-top');
                        carouselWrapper.css('margin-top', header.outerHeight() + 'px')
                    } else {
                        let topHeight = topArea.outerHeight() - topArea.outerHeight();
                        carouselWrapper.css('margin-top', -topHeight + 'px')
                        header.removeClass('fixed-top');
                    }
                } else {
                    topArea.removeClass('fixed-top');
                    header.addClass('fixed-top');
                    carouselWrapper.css('margin-top', headerHeight + 'px');
                }
            }

            let hupaTopArea = $('.hupa-top-area');
            if (hupaTopArea && !$('.header-carousel').length) {
                let siteContent = $('.site-content');
                let siteHeight = header.outerHeight() - header.outerHeight();
                if (scroll > topArea.outerHeight()) {
                    siteContent.css('padding-top', header.outerHeight() + 'px');
                } else {
                    siteContent.css('padding-top', -siteHeight + 'px');
                }
            }

            if (scroll > 200) {
                header.addClass("navbar-small");
                if (navLogo) {
                    navLogo.css('max-height', '25px')
                }
            } else {
                header.removeClass("navbar-small");
                if (navLogo) {
                    navLogo.css('max-height', '45px')
                    middleLogo.removeClass('middle-img-sm')
                }
            }
        });


        $(document).on('click', '.api-karte-check', function () {
            let check = $(this).children('input');
            let btn = $('.hupa-gmaps-btn');
            if (check.prop('checked')) {
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
            let check = $('.check' + code);
            let btn = $('.btn' + code);
            if (check.prop('checked')) {
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
            if ($('.check' + code).prop('checked')) {
                $.post(theme_ajax_obj.ajax_url, {
                    '_ajax_nonce': theme_ajax_obj.nonce,
                    'action': 'HupaStarterNoAdmin',
                    'method': 'get_iframe_card',
                    'code': code,
                    'width': $(this).attr('data-width'),
                    'height': $(this).attr('data-height'),
                }, function (data) {
                    if (data.status) {
                        sessionStorage.setItem('gmaps', true);
                        $('.iframe' + data.code).html(data.iframe);
                    }
                });
            }
        });

        // Preloader script
        jQuery(window).load(function () {
            $("#preloader-wrapper").delay(1600).fadeOut('easing').remove();
        });

        /**===============================================
         ========== CAROUSEL LAZY LOAD FUNCTION ===========
         ==================================================
         */
       $(function () {
            let carousel = $(".carousel .carousel-item.active");
            let ifSrc = carousel.find("img[data-src]");
            ifSrc.Lazy({
                enableThrottle: true,
                throttle: 250,
                combined: true,
                delay: 1000,
                effect: "fadeIn",
                effectTime: 1000,
                threshold: 0,
                beforeLoad: function (element) {
                    let imageSrc = element.data('src');
                    //console.log('image "' + imageSrc + '" is about to be loaded');
                },
                afterLoad: function (element) {
                    let imageSrc = element.data('src');
                    //console.log('image "' + imageSrc + '" was loaded successfully');
                },
                onError: function (element) {
                    let imageSrc = element.data('src');
                    //console.log('image "' + imageSrc + '" could not be loaded');
                },
                onFinishedAll: function () {
                    //console.log('finished loading all images');
                }
            });
        });

        let cHeight = 0;
        $('.carousel').on('slide.bs.carousel', function(e) {
            let $nextImage = $(e.relatedTarget).find('img');
            let $activeItem = $('.active.item', this);
            // prevents the slide decreasing in height before the image is loaded

            if (cHeight == 0) {
                cHeight = $(this).height();
                $activeItem.next('.item').height(cHeight);
            }
            $nextImage.Lazy({
                enableThrottle: true,
                throttle: 250,
                combined: true,
                delay: 1000,
                effect: "fadeIn",
                effectTime: 1000,
                //chainable: false,
                threshold: 0,
                beforeLoad: function (element) {
                    let imageSrc = element.data('src');

                },
                afterLoad: function (element) {
                    let imageSrc = element.data('src');
                    //console.log('image "' + imageSrc + '" was loaded successfully');
                }
            })
            // you might have more than one image per carousel item
            $nextImage.each(function(){
                let $this = $(this),
                src = $this.data('src');
                // skip if the image is already loaded
                if (typeof src !== "undefined" && src != "") {
                    $this.attr('src', src)
                    $this.data('src', '');
                }
            });
        });


        $.event.special.touchstart = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        $.event.special.touchmove = {
            setup: function( _, ns, handle ) {
                this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
            }
        };
        $.event.special.wheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("wheel", handle, { passive: true });
            }
        };
        $.event.special.mousewheel = {
            setup: function( _, ns, handle ){
                this.addEventListener("mousewheel", handle, { passive: true });
            }
        };

    })(jQuery);

});