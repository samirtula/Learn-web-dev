$(document).ready(function () {
    if (document.querySelector(".main-page-cart")) {
        
        console.log("cart");
        let cartResult = document.querySelector(".cart-result");
        let cartFlexContainer = document.querySelector(".flex-container");
        let cartProducts = document.querySelector(".cart-products");

        const mediaQueryCartDesktop = window.matchMedia('(min-width: 1024px)');
        const mediaQueryCartTablet = window.matchMedia('(max-width: 1023px)');
        const mediaQueryCartSmall = window.matchMedia('(max-width: 767px)');

        let cartProductsItem = document.querySelectorAll(".cart-products__item");

        if (cartProductsItem.length === 0) {
            cartResult.style.display = "none";
            let emptyCart = document.querySelector(".empty-cart");
            emptyCart.classList.toggle("empty-cart-active");
        }

        document.addEventListener("scroll", function () {

            console.log(window.pageYOffset);
            if (window.pageYOffset >= 330 && !mediaQueryCartTablet.matches && !mediaQueryCartSmall.matches) {
                cartResult.classList.add("cart-result-fixed");
                cartFlexContainer.style.display = "block";
                cartProducts.style.marginTop = "0px";
            } else {
                cartResult.classList.remove("cart-result-fixed");
                cartFlexContainer.style.display = "flex";
                cartResult.style.alignSelf = "flex-start";
            }

            if (window.pageYOffset >= (341 * cartProductsItem.length) && !mediaQueryCartTablet.matches && !mediaQueryCartSmall.matches) {
                cartFlexContainer.style.display = "flex";
                cartResult.classList.remove("cart-result-fixed");
                cartResult.style.alignSelf = "flex-end";
            }

            if (window.pageYOffset >= 230 && mediaQueryCartTablet.matches) {
                cartResult.classList.add("cart-result-fixed");
                cartProducts.style.marginTop = "240px";
            }

            if (window.pageYOffset < 230 && mediaQueryCartTablet.matches) {
                cartResult.classList.remove("cart-result-fixed");
                cartProducts.style.marginTop = "0px";
                cartResult.style.alignSelf = "center ";
            }

            window.addEventListener("resize", function () {
                if (mediaQueryCartTablet.matches) {
                    cartResult.style.alignSelf = "center ";
                }
                if (mediaQueryCartDesktop.matches) {
                    cartResult.style.alignSelf = "flex-start ";
                }
            });

            if (window.pageYOffset >= 163 && mediaQueryCartSmall.matches) {
                cartResult.classList.add("cart-result-fixed");
                cartProducts.style.marginTop = "240px";
            }


            // код для перемешения кнопки "оформить вниз на мобильных устройствах"
            // if (mediaQueryCartUltraSmall.matches) {
            //     cartResult.classList.remove("cart-result-fixed");
            //     cartProducts.style.marginTop = "0px";

            // } 

            // let placeOrderBtn = document.querySelector(".place-order");

            // if (window.pageYOffset >= 420 && mediaQueryCartUltraSmall.matches) {
            //     placeOrderBtn.classList.add("place-order-fixed");
            // } else {
            //     placeOrderBtn.classList.remove("place-order-fixed");
            // }

            // if (window.pageYOffset >= (200 * cartProductsItem.length) && mediaQueryCartUltraSmall.matches) {
            //     placeOrderBtn.classList.add("place-order-abs");
            //     placeOrderBtn.style.bottom = -400 * cartProductsItem.length + "px";
            //     placeOrderBtn.classList.remove("place-order-fixed");
            // } else {
            //     placeOrderBtn.classList.remove("place-order-abs");
            //     placeOrderBtn.style.bottom = "0px";
            // }

        });


        let counterValue = document.getElementsByClassName("counter__value");
        let infoPrice = document.getElementsByClassName("info-price--product");
        let gift = document.querySelector(".cart-products__item--gift");
        let cartResultPrice = document.querySelector(".cart-result-price");

        cartProductsItem.forEach(function (elem, i) {
            elem.addEventListener("click", function (e) {
                let ind;
                if (gift !== null) {
                    ind = 1;
                } else {
                    ind = 0;
                }

                if (e.target.innerHTML === "-" && counterValue[i - ind].innerHTML > 1) {
                    counterValue[i - ind].innerHTML = +counterValue[i - ind].innerHTML - 1;
                }

                if (e.target.innerHTML === "+") {
                    counterValue[i - ind].innerHTML = +counterValue[i - ind].innerHTML + 1;
                }

                const price = infoPrice[i - ind].getAttribute("price");
                infoPrice[i - ind].innerHTML = +price * counterValue[i - ind].innerHTML + "₽";

                total();
            });
        });

        total();

        function total() {
            let total = 0;
            for (let k = 0; k <= cartProductsItem.length; k++) {
                total += parseFloat(infoPrice[k].innerHTML);
                cartResultPrice.innerHTML = total + "₽";
            }
        }
    }
});