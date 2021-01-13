$(document).ready(function () {
    if (document.querySelector(".catalog")) {

        const mediaQueryCartSmall = window.matchMedia('(max-width: 767px)');

        $(".collection").click(function (e) {
            e.preventDefault();
            if (mediaQueryCartSmall.matches) {

                $(".catalog__part--menu").addClass("catalog-menu-active");
                $(".breadcrumbs").addClass("breadcrumbs-fixed");
                $("body").css("position", "fixed");
                $(".close").addClass("close-active");

            }
        });

        function menuDeactivator() {
            $(".catalog__part--menu").removeClass("catalog-menu-active");
            $(".close").removeClass("close-active");
            $(".breadcrumbs").removeClass("breadcrumbs-fixed");
            $("body").css("position", "relative");
        }

        $(".close").click(function () {
            menuDeactivator();
        });

        $(window).resize(function () {
            if (!mediaQueryCartSmall.matches) {
                menuDeactivator();
            }
        });
    }
});