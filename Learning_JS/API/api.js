let cities = {
  TULA: {
    name: "TULA",
    coordinates: "lat=54.197619&lon=37.620067",
  },
  VORONEJ: {
    name: "VORONEJ",
    coordinates: "lat=51.670239&lon=39.200320",
  },
  MSK: {
    name: "MSK",
    coordinates: "lat=55.761311&lon=37.624839",
  },
};

const BTN = document.querySelector(".save");
let selected;

BTN.addEventListener("click", function () {
  let sel = document.querySelector(".sel");

  if (sel.value == "MSK") {
    selected = MSK;
  } else if (sel.value == "TULA") {
    selected = TULA;
  } else if (sel.value == "VORONEJ") {
    selected = VORONEJ;
  }
  fetch(
    `http://194.58.122.219/test/weather-api-test2/?t=70752da4-1848-4f9e-8d31-92f26791cc45&${selected}`
  )
    .then((response) => {
      return response.json();
    })
    .then((data) => {
      console.log(data.data.fact.temp);
    });
});
