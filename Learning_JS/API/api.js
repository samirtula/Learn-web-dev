
  let cities = {
    TULA: {
      name: "TULA",
      nameRU: "Тула",
      coordinates: "lat=54.197619&lon=37.620067",
    },
    VORONEJ: {
      name: "VORONEJ",
      nameRU: "Воронеж",
      coordinates: "lat=51.670239&lon=39.200320",
    },
    MSK: {
      name: "MSK",
      nameRU: "Москва",
      coordinates: "lat=55.761311&lon=37.624839",
    },
    BAKU: {
      name: "Baku",
      nameRU: "Баку",
      coordinates: "lat=40.388423&lon=49.842083",
    }
};
  

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
    function setCoordinates(obj) {
      for (let key in obj) {
        if (selName == key) {
          selCoorForApi = obj[key].coordinates
        }
      }
    }
    setCoordinates(cities)
    fetch(
      `http://194.58.122.219/test/weather-api-test2/?t=70752da4-1848-4f9e-8d31-92f26791cc45&${selCoorForApi}`
    )
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        console.log(data.data.fact.temp);
        let tempInfo = document.querySelector(".temp")
        tempInfo.innerHTML= data.data.fact.temp + "	&#8451;"
      })
    
  }); 



})