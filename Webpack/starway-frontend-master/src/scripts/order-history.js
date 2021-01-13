$(document).ready(function () {
    if (document.querySelector(".order-history")) {

    // цвет статуса доставки 
        $(".order-status").each(function (ind, elem) {
            if ($(elem).html() === "в пути") {
                $(elem).css("color", "#B57701");
            } else {
                $(elem).css("color", "#377819");
            }
        });
        // разворачивание заказа
        let orderNums = document.querySelectorAll(".order-num");
        let orderDates = document.querySelectorAll(".order-date");
        let orderTracknums = document.querySelectorAll(".order-tracknum");

        $(".orders__elem--item").each(function (ind, order) {
            order.addEventListener("click", function (e) {
                console.log(e.target);
                console.log(order);
                if (e.target === order) {
                    if (!order.className.includes("order-expanded")) {
                        order.classList.add("order-expanded");
                        orderNums[ind].innerHTML = "Заказ " + orderNums[ind].getAttribute("value");
                        orderDates[ind].innerHTML = "Заказано " + orderDates[ind].getAttribute("value");
                        orderTracknums[ind].innerHTML = "Трек-номер: " + orderTracknums[ind].getAttribute("value");


                    } else {
                        order.classList.remove("order-expanded");
                        orderNums[ind].innerHTML = orderNums[ind].getAttribute("value");
                        orderDates[ind].innerHTML = orderDates[ind].getAttribute("value");
                        orderTracknums[ind].innerHTML = orderTracknums[ind].getAttribute("value");
                    }
                }
            });
        });
    }
});