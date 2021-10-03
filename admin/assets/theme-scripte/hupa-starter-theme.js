jQuery(document).ready(function ($) {

    let mitte = 0;
    let newHtmlImg;
    let x = 0;
    let liArray = [];
    if (get_hupa_option.menu) {
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
    }

    for (let i = 0; i < liArray.length; i++) {
        if (i === mitte) {
            let newLi = document.createElement('li');
            newLi.classList.add('menu-logo');
            let newEl = liArray[i].insertAdjacentElement('beforebegin', newLi);
            newHtmlImg = `<a style="" class="mx-2" href="${get_hupa_option.site_url}"><img class="middle-img" src="${get_hupa_option.img}" alt="${get_hupa_option.site_url}" width="${get_hupa_option.img_width}"></a`;
            newEl.innerHTML = newHtmlImg;
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
        if(topArea[0]){

            isFixedHeader = true;
           header.removeClass('fixed-top');
        } else {
            isFixedHeader = false;
        }
        siteContent.css('margin-top', (header.outerHeight()  ) + 'px');
    }



    if (carousel.hasClass('carousel-margin-top')) {

        carousel.css('margin-top', -header.outerHeight() + 'px');
    }

    $(window).on("resize", function (event) {
        //console.log( $(this).width() );
        siteContent.css('margin-top', header.outerHeight() + 'px');
        if (header.hasClass('fixed-top')) {
            siteContent.css('margin-top', header.outerHeight() + 'px');
        }

        if (carousel.hasClass('carousel-margin-top')) {
            carousel.css('margin-top', -header.outerHeight() + 'px');
        }

        let scroll = $(window).scrollTop();
        if (scroll > 150) {
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

    $(window).scroll(function () {
        let scroll = $(window).scrollTop();
        if (topArea[0] && isFixedHeader){
            if(scroll > topArea.outerHeight()){
                header.addClass('fixed-top')
            } else {
                header.removeClass('fixed-top')
            }
        }

        if (scroll > 150) {
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



// Preloder script
    jQuery(window).load(function(){
        $(".preloader").delay(1600).fadeOut('easing').remove();
    });


});

