document.querySelector('.nav__burger-menu').addEventListener('click', function () {
    document.querySelector('.nav__burger-menu span').classList.toggle('active');
});

/*document.querySelector('.nav__burger-menu').addEventListener('click', function () {
    document.querySelector('.nav__burger-wrapper').classList.toggle('clicked');
});*/


$(".nav__burger-menu").on("click", function (e) {

    $('.nav__burger-wrapper').toggle("slow");
  });