document.addEventListener("DOMContentLoaded", function (event) {

    window.onscroll = function () {
        windows_scroll_events('fixed-top');
    };


    function windows_scroll_events(event, value = false) {
        let header = document.getElementById("nav-main-starter");
        let navLogo = document.querySelector(".navbar-root .logo.md");
        switch (event) {
            case 'fixed-top':
                if (header) {
                    let sticky = header.offsetTop;
                    if (header.classList.contains('has-sticky')) {
                        if (window.pageYOffset > sticky) {
                            header.classList.add("fixed-top");
                        } else {
                            header.classList.remove("fixed-top");
                        }
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
                break;
        }
    }

});