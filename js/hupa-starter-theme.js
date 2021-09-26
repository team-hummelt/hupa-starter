document.addEventListener("DOMContentLoaded", function (event) {

    let header = document.getElementById("nav-main-starter");
    if (header) {

        let navLogo = document.querySelector(".navbar-root .logo.md");
        window.onscroll = function () {
            if(header.classList.contains('has-sticky')) {
                nav_sticky_scroll();
            }
        };
        let sticky = header.offsetTop;

        function nav_sticky_scroll() {
            if (window.pageYOffset > sticky) {
                header.classList.add("fixed-top");
            } else {
                header.classList.remove("fixed-top");
            }

            if (window.pageYOffset > 150) {
                header.classList.add("navbar-small");
                if (navLogo) {
                    navLogo.classList.add('small-logo');
                }
            } else {
                header.classList.remove("navbar-small");
                if (navLogo) {
                    navLogo.classList.remove('small-logo');
                }
            }
        }
    }


});