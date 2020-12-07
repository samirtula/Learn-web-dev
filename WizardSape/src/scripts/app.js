import 'owl.carousel'

$(document).ready(function () {
    $('.upper-slider').owlCarousel({
        items: 1,
        margin: 10,
        autoHeight: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 8000,
        pagination: true,
    });
    $('.bottom-slider').owlCarousel({
        items: 1.3,
        margin: 10,
        autoHeight: true,
        autoplay: true,
        loop: true,
        autoplayTimeout: 8000,
        pagination: true,
        autoWidth: true,
        responsive: {
            0: {
                items: 1,
                margin: 50,
            },
        }


    }
    );
    $('.midlle-slider').owlCarousel({
        responsive: {
            0: {
                items: 1,
                margin: 30,
                autoHeight: true,
                autoplay: true,
                loop: true,
                autoplayTimeout: 8000,
                pagination: true,
                autoWidth: true,
                center: true
            },
            768: {
                items: 1.5,
                margin: 10,
                autoHeight: true,
                autoplay: true,
                loop: true,
                autoplayTimeout: 8000,
                pagination: true,
                autoWidth: true,
            }
        }
    });



});

$(window).on('load resize', function () {

    if ($(this).width() > 1366) {
        $(".midlle-slider").trigger('destroy.owl.carousel');

    } else {
        $(".midlle-slider").owlCarousel({
            items: 2,
        });
    }
    if ($(window).width() < 768) {
        let dots = document.querySelector(".owl-dots");
        dots.style.top = "30px";
    }
    else {
        let dots = document.querySelector(".owl-dots");
        dots.style.top = "110px";
    }

})


$(".header-burger").hover(function (e) {
    e.preventDefault()
    $(".header-burger__item").css({ 'backgroundColor': '#0069FF' })

}, function (e) {
    e.preventDefault();
    $(".header-burger__item").css({ 'backgroundColor': '#333333' })
})



$(".white-link-to-blue").hover(function (e) {
    e.preventDefault()
    $(this).css({ 'backgroundColor': '#0069FF', 'color': '#ffffff' })
    $(this).children(".img-play-blue-to-white").attr('src', '../images/icons/playwhite.svg')
    $(this).children(".img-book-blue-to-white").attr('src', '../images/icons/present-white.svg')

}, function (e) {
    e.preventDefault();
    $(this).css({ 'backgroundColor': '#ffffff', 'color': '#0069FF' })
    $(this).children(".img-play-blue-to-white").attr('src', '../images/icons/play.svg')
    $(this).children(".img-book-blue-to-white").attr('src', '../images/icons/present.svg')

})
$(".blue-button-to-white").hover(function (e) {
    e.preventDefault()
    $(this).css({ 'backgroundColor': '#ffffff', 'color': '#0069FF', 'border': '2px solid #0069ff', 'borderRadius': '8px' })
    $(this).children(".img-play-white-to-blue").attr('src', '../images/icons/play.svg')
    $(this).children(".img-ask-white-to-blue").attr('src', '../images/icons/ask-blue.svg')

}, function (e) {
    e.preventDefault();
    $(this).css({ 'backgroundColor': '#0069FF', 'color': '#ffffff' })
    $(this).children(".img-play-white-to-blue").attr('src', '../images/icons/playwhite.svg')
    $(this).children(".img-ask-white-to-blue").attr('src', '../images/icons/ask.svg')

})
$(".inner__close-button").on("click", function (e) {
    e.preventDefault();
    $(".header__above").slideUp()
})
$(".header-burger").on("click", function (e) {

    $('.menu__wrapper').toggle("slow")
    let headerPosition = $('.header__above')
    if (headerPosition.css('display') === "block") {
        $('.menu__wrapper').css("top", "40px");

    } else {
        $('.menu__wrapper').css("top", "0");
    }

})

$(".menu__close-button").on("click", function (e) {
    e.preventDefault();
    $('.menu__wrapper').toggle("slow")
})
