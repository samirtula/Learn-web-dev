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
            items:4
        }
    }
});
