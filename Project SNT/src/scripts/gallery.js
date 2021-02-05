$('.owl-carousel').owlCarousel({
    items: 1,
    margin: 10,
    autoHeight: true,
    autoplay: true,
    loop: true,
    autoplayTimeout: 6000,
    pagination: true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});
$('.gallery__images .item').on('click', function (e) {
    e.preventDefault();
    let imgPath =  $(this).css('background-image');
    let pathStart = imgPath.indexOf('images');
    let imgPathCSS = imgPath.substring(pathStart,imgPath.length-2);
    console.log(imgPathCSS);
    $('.popup__image').attr("src",imgPathCSS);
    let popup = $('.popup');
    popup.toggle('fast');

    });
$('.popup__close-button').on('click', function (e) {
    e.preventDefault();
    let popup = $('.popup');
    popup.toggle('fast');
});