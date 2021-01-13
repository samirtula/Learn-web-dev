$(document).ready(function () {
    if (document.querySelector(".popular")) {

        let alsoLikeSliderBtns = document.querySelectorAll(".popular__buttons div");
        alsoLikeSliderBtns.forEach((elem, i) => {
            elem.addEventListener("click", function () {
                console.log("www");
                let photoPosition = parseFloat($(".popular__element").css("left"));
                if ((i === 0) && (photoPosition <= -270)) {
                    $(".popular__element").animate({
                        "left": "+=270"
                    });
                }
                if ((i === 1) && (photoPosition >= -540)) {
                    $(".popular__element").animate({
                        "left": "-=270"
                    });
                }
                if (photoPosition == -810) {
                    $(".popular__element").animate({
                        "left": "0px"
                    });
                }
            });
        });
        
    }
});