$(document).ready(function () {
    if (document.querySelector(".authorization")) {
        
        const mediaQueryCartTablet = window.matchMedia('(max-width: 1023px)');
        const mediaQueryCartSmall = window.matchMedia('(max-width: 767px)');

        $(window).resize(function () {
            if (mediaQueryCartTablet.matches && !mediaQueryCartSmall.matches) {
                $(".authorization input[type='email").attr("placeholder", "Введите адрес Email");
            } else {
                $(".authorization input[type='email").attr("placeholder", "Введите адрес электронной почты");
            }
        });
    }
});