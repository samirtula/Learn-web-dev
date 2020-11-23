
  let cities = {
    TULA: {
      name: "TULA",
      nameRU: "Тула",
      coordinates: "lat=54.197619&lon=37.620067",
      imageUrl: "url(https://cdn.tripzaza.com/ru/destinations/files/2018/07/Dostoprimechatelnosti-Tulyi-e1531637143917.jpg)",
    },
    VORONEJ: {
      name: "VORONEJ",
      nameRU: "Воронеж",
      coordinates: "lat=51.670239&lon=39.200320",
      imageUrl:"url(https://www.votpusk.ru/country/ctimages/new/ru4024.jpg)"
    },
    MSK: {
      name: "MSK",
      nameRU: "Москва",
      coordinates: "lat=55.761311&lon=37.624839",
      imageUrl: "url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAw8OLIrFU3geY6ta6tg7kOedU7mtR6Ncctg&usqp=CAU)",
    },
    BAKU: {
      name: "BAKU",
      nameRU: "Баку",
      coordinates: "lat=40.388423&lon=49.842083",
      imageUrl: "url(https://media.tacdn.com/media/attractions-splice-spp-674x446/09/12/ea/68.jpg)",
    }
};
  
/* let wheatherIcons = {
  rainy:,
  sunnny:,
  cloudy:,
  snowly:,
}; */
document.addEventListener('DOMContentLoaded', function () {



  function createElements(obj) {
    for (let key in obj) {
      let option = document.createElement("option")
      option.className = "city_name"
      option.setAttribute("value", obj[key].name)
      option.setAttribute("coordinates",obj[key].coordinates)
      option.innerHTML = obj[key].nameRU
      let citySelector = document.querySelector(".sel")
      citySelector.append(option)
  }
}

createElements(cities)

  const BTN = document.querySelector(".save");
  BTN.addEventListener("click", function () {
    let sel = document.querySelector(".sel");
    let selName = sel.value
    let selCoorForApi;
    let imageRoot;
    let image = document.querySelector(".wheather")
    function setCoordinates(obj) {
      for (let key in obj) {
        if (selName == key) {
          selCoorForApi = obj[key].coordinates
          imageRoot=obj[key].imageUrl
         image.style.backgroundImage = imageRoot
        }
      }
    }
    setCoordinates(cities)
    fetch(
      `http://194.58.122.219/test/weather-api-test2/?t=04640705-85d4-4828-86c5-41cecbc7776f&${selCoorForApi}`
    )
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        console.log(data.data.fact.temp);
        let tempInfo = document.querySelector(".temp")
        tempInfo.innerHTML = data.data.fact.temp + "	&#8451;"
    /*     let icon = document.querySelector(".wheather_icon")
        icon.style.backgroundImage = "" */
      })
    
  }); 



})