$(document).ready(function () {
    if (document.querySelector(".main-page-personal-info")) {

        $(".personal-account-menu__elem").click(function (e) {
            e.preventDefault();
            $(".personal-account-menu__elem").removeClass("active");
            $(this).addClass("active");
        });

        let selectDay = document.querySelector("select[name='day']");
        let optionsDay;


        optionsDay = selectDay.getElementsByTagName("option");
        for (let i = 2; i <= 32; i++) {
            let createOption = document.createElement('option');
            selectDay.append(createOption);
            optionsDay[i - 1].innerHTML = i - 1;



            let selectMonth = document.querySelector("select[name='month']");
            let optionsMonth = selectMonth.getElementsByTagName("option");

            for (let i = 2; i <= 13; i++) {
                createOption = document.createElement('option');
                selectMonth.append(createOption);
                optionsMonth[i - 1].innerHTML = i - 1;

            }

            let selectYear = document.querySelector("select[name='year']");
            let optionsYear = selectYear.getElementsByTagName("option");

            for (let i = 1961; i <= 2000; i++) {
                createOption = document.createElement('option');
                selectYear.append(createOption);
                optionsYear[i - 1960].innerHTML = i - 1;

            }
        }
        const mediaQueryCartDesktop = window.matchMedia('(min-width: 1024px)');
        const mediaQueryCartTablet = window.matchMedia('(max-width: 1024px)');
        const mediaQueryCartSmall = window.matchMedia('(max-width: 767px)');

        // функция смены заголовков и инпута "email"
        function titleChange() {
            if (mediaQueryCartDesktop.matches) {
                $(".newsletter .input--email").attr("placeholder", "Укажите свой адрес электронной почты");
                $(".newsletter .title").html('Подпишитесь, чтобы получать последние обновления');
            }
            if (mediaQueryCartTablet.matches) {
                $(".newsletter .input--email").attr("placeholder", "Введите  Email");
                $(".newsletter .title").html('Получайте новости обновлений коллекции');
            }
            if (mediaQueryCartSmall.matches) {
                $(".newsletter .input--email").attr("placeholder", "email");
            }
        }

        $(window).resize(function () {
            titleChange();
        });
        titleChange();
        
    }

});