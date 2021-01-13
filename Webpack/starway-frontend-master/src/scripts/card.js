$(document).ready(function () {
    if (document.querySelector(".main-page-card")) {
        
        let scrollBlock = document.querySelector(".card-main__element--photo ");
        let galleryItems = document.querySelectorAll(".card-main__element--gallery div");


        scrollBlock.addEventListener("scroll", function (e) {
            for (let i = 0; i < galleryItems.length; i++) {
                if (this.scrollTop >= (750 * i)) {
                    for (let item of galleryItems) {
                        item.classList.remove("gallery-active");
                    }
                    galleryItems[i].classList.add("gallery-active");
                }
            }
        });


        galleryItems.forEach(function (item, i) {
            item.addEventListener("click", function () {
                scrollBlock.scrollTop = 850 * i;
                item.classList.remove("gallery-active");
                this.classList.add("gallery-active");
            });
        });


        $(".accordeon h4").click(function () {
            if ($(this).next(".accordeon__content").css("display") === "none") {
                $(this).next(".accordeon__content").slideDown("slow");
            } else {
                $(this).next(".accordeon__content").slideUp("slow");
            }
        });


        let sizeBlock = document.querySelector(".size");
        const mediaQuery = window.matchMedia('(max-width: 767px)');
        let newSpan = document.createElement("span");
        $(window).resize(function () {
            if (mediaQuery.matches) {
                newSpan.classList.add("size-selected");
                newSpan.innerHTML = $(".size-active").html();
                sizeBlock.prepend(newSpan);
            } else {
                newSpan.remove();
                newSpan.classList.remove("size-selected");
            }
        });


        sizeBlock.addEventListener("click", function (e) {
            this.classList.toggle("hidden");
            if (!e.target.closest("a")) return;
            $(".size a").removeClass("size-active");
            e.target.classList.add("size-active");
            $(".size-selected").html($(".size-active").html());
            $(".info-size__value").html($(".size-active").html());
        });


        let colorBlockElems = document.querySelectorAll(".wrap-colors div");
        let infoColor = document.querySelector(".info-color-value");

        colorBlockElems.forEach(function (item, i) {
            item.addEventListener("click", function () {
                for (let elem of colorBlockElems) {
                    elem.classList.remove("color-active");
                }
                this.classList.add("color-active");
                if (item.className.includes("color-active")) {
                    infoColor.style.background = getComputedStyle(item, '::after').backgroundColor;
                }
            });

        });



        let buyBtn = document.querySelector(".buy-btn");
        if (buyBtn) {
            buyBtn.addEventListener("click", function (e) {
                e.preventDefault();
                $(".add-to-cart-menu").css("display", "flex");

                // заблокировать скролл страницы
                if ($(".add-to-cart-menu").css("display") === "flex") {
                    $("body").css("position", "fixed").css("width", "100%").css("overflow-y", "scroll");
                }


            });
        }
        let closeBtn = document.querySelector(".close");
        document.addEventListener("click", function (e) {
            e.preventDefault();
            if (e.target.className.includes("btn-block__button--view-cart-btn")) return;
            if ((e.target.className === "close") || (e.target.closest(".btn-block__button--continue-shopping-btn"))) {
                $(".add-to-cart-menu").css("display", "none");
            }
            if ($(".add-to-cart-menu").css("display") === "none") {
                console.log("static");
                $("body").css("position", "static");
            }
        });


        document.addEventListener("keydown", function (e) {
            if (e.key === "Escape") {
                $(".add-to-cart-menu").css("display", "none");
            }
        })


        let price = document.querySelector(".price");
        let counterValue = document.querySelector(".counter__value");
        let counterSpan = document.querySelectorAll(".counter span");
        let infoPrice = document.querySelector(".info-price");


        counterSpan.forEach(function (item, i) {
            item.addEventListener("click", function () {
                if (item.innerHTML == "-" && counterValue.innerHTML > 1) {
                    counterValue.innerHTML = +counterValue.innerHTML - 1;
                }
                if (item.innerHTML == "+") {
                    counterValue.innerHTML = +counterValue.innerHTML + 1;
                }
                infoPrice.innerHTML = parseFloat(price.innerHTML) * counterValue.innerHTML + "₽";
            });
        });

        let mainSliderBtns = document.querySelectorAll(".arrow-btn-block__item");

        mainSliderBtns.forEach((elem, i) => {
            elem.addEventListener("click", function () {
                let photoPosition = parseFloat($(".photo").css("left"));
                if ((i === 0) && (photoPosition <= -375)) {
                    $(".photo").animate({
                        "left": "+=375px"
                    });
                }
                if ((i === 1) && (photoPosition >= -750)) {
                    $(".photo").animate({
                        "left": "-=375px"
                    });
                }
                if (photoPosition == -1125) {
                    $(".photo").animate({
                        "left": "0px"
                    });
                }
            });
        });
    }
});