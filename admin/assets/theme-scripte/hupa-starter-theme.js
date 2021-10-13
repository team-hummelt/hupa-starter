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
        header.css('z-index', 'unset');
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
            header.css('z-index', 'unset');
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


// Preloader script
    jQuery(window).load(function () {
        $(".preloader").delay(1600).fadeOut('easing').remove();
    });

 // Load Social Media ICON
    $(function() {
        return $(".carousel.lazy").on("slid.bs.carousel", function(ev) {
            let lazy;
            let next;
            lazy = $(ev.relatedTarget).find("img[data-src]");
            next = $(ev.relatedTarget.nextElementSibling).find("img[data-src]");
            lazy.attr("src", lazy.data('src'));
            next.attr("src", next.data('src'));
            lazy.removeAttr("data-src");
            next.removeAttr("data-src");
        });
    });

});


