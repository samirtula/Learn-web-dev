$("#arrowButton").on('click', (function (e) {
    e.preventDefault()
    if (this.classList.contains('active')) {
        $(".circle2").hide(2400);
        $(".circle3").hide(1800);
        $(".circle4").hide(1200);
        $(".circle5").hide(600);
        $("#arrowButton").toggleClass("active");
    } else {
        $(".circle2").show(600);
        $(".circle3").show(1200);
        $(".circle4").show(1800);
        $(".circle5").show(2400);
        $("#arrowButton").toggleClass("active");
    }
}))
    fetch(
        `http://194.58.122.219/test/weather-api-test2/?t=04640705-85d4-4828-86c5-41cecbc7776f&lat=54.197619&lon=37.620067`
    )
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            let tempInfo = $(".date_temp")
            let tempInfoInner = data.data.fact.temp + "&#8451;"
            tempInfo.append(tempInfoInner)

        });
    

