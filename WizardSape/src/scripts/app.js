import { valHooks } from 'jquery';
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
});


$(".header-burger").on("click", function (e) {

    $('.menu__wrapper').toggle("slow")
    let headerPosition = $('.header__above')
    if (headerPosition.css('display') === "block") {
        $('.menu__wrapper').css("top", "40px");

    } else {
        $('.menu__wrapper').css("top", "0");
    }
});


$(".menu__close-button").on("click", function (e) {
    e.preventDefault();
    $('.menu__wrapper').toggle("slow")
});



$(".book__email").submit(function (e) {

    e.preventDefault()
    const regEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    const regTel = /^([+]?[0-9]{1,25})*$/;
    let emailInput = $("#email");
    let email = emailInput.val();
    let telInput = $("#tel");
    let tel = telInput.val();
    emailInput.css("background", "#EBF3FF");
    telInput.css("background", "#EBF3FF");

    if (!tel.match(regTel) || (tel.length == 0))
        telInput.css("background", "#FCE6E6");
    if (!email.match(regEmail) || (email.length == 0)) {
        emailInput.css("background", "#FCE6E6")
    };

});

$(".promotion").submit(function (e) {
    e.preventDefault()
    const regURL = /^(https?:\/\/)?([\w\.]+)\.([a-z]{2,6}\.?)(\/[\w\.]*)*\/?$/
    let url = $("#promotion-url")
    let urlAddres = url.val()
    url.css("background", "#FFFFFF")
    if (!urlAddres.match(regURL))
        url.css("background", "#FCE6E6");
});

$(".call").submit(function (e) {
    e.preventDefault()
    const regTel = /^([+]?[0-9]{1,25})*$/;
    let telInput = $("#call-back")
    let tel = telInput.val()
    telInput.css("background", "#EBF3FF")
    if (!tel.match(regTel) || tel.length == 0)
        telInput.css("background", "#FCE6E6");
});

$("#promotion-region").each(function () {
    let $this = $(this),
        selectOption = $this.find('option'),
        selectOptionLength = selectOption.length,
        selectedOption = selectOption.filter(':selected'),
        dur = 500;
    $this.hide();
    $this.wrap('<div class="select"></div>');
    $('<div>', {
        class: 'select__gap',
        text: 'Регион продвижения'
    }).insertAfter($this);

    let selectGap = $this.next('.select__gap'),
        caret = selectGap.find('.caret');
    $('<ul>', {
        class: 'select__list'
    }).insertAfter(selectGap);

    let selectList = selectGap.next('.select__list');
    for (let i = 0; i < selectOptionLength; i++) {
        $('<li>', {
            class: 'select__item',
            html: $('<span>', {
                text: selectOption.eq(i).text()
            })
        })
            .attr('data-value', selectOption.eq(i).val())
            .appendTo(selectList);

    }
    let selectItem = selectList.find('li');

    selectList.slideUp(0);
    selectGap.on('click', function () {
        if (!$(this).hasClass('on')) {
            $(this).addClass('on');
            selectList.slideDown(dur);

            selectItem.on('click', function () {
                let chooseItem = $(this).data('value');

                $('select').val(chooseItem).attr('selected', 'selected');
                selectGap.text($(this).find('span').text());

                selectList.slideUp(dur);
                selectGap.removeClass('on');
            });

        } else {
            $(this).removeClass('on');
            selectList.slideUp(dur);
        }
    });

});


