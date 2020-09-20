/*
function makeCar() {
  let makes = ["Chevy", "GM", "Fiat", "Webville Motors", "Trucker"];
  let models = ["Cadillac", "500", "Bela-Air", "Taxi", "Torpedo"];
  let years = ["1955", "1957", "1948", "1954", "1961"];
  let colors = ["red", "blue", "tan", "yellow", "white"];
  let convertible = ["true", "false"];

  let rand1 = Math.floor(Math.random() * makes.length);
  let rand2 = Math.floor(Math.random() * models.length);
  let rand3 = Math.floor(Math.random() * years.length);
  let rand4 = Math.floor(Math.random() * colors.length);
  let rand5 = Math.floor(Math.random() * 5) + 1;
  let rand6 = Math.floor(Math.random() * 2);

  let car = {
    make: makes[rand1],
    model: models[rand2],
    year: years[rand3],
    color: colors[rand4],
    passengers: rand5,
    convertible: convertible[rand6],
    mileage: 0,
  };
  return car; // функция отработала и вернула рандомную машину car
}

function displayCar(car) {
  //функция формирует сообщение об авто и тянет данные из результата функции  makeCar
  console.log(
    "Your new car is a " + car.year + " " + car.make + " " + car.model
  );
}

let carToSell = makeCar();
displayCar(carToSell);
*/
let fiat = {
  make: "Fiat",
  model: "500",
  year: "1957",
  color: "medium blue",
  passengers: 2,
  convertible: false,
  mileage: 88000,
  started: false,
  start: function () {
    this.started = true;
  },
  stop: function () {
    this.started = false;
  },
  drive: function () {
    if (this.started == true) {
      alert("Zoom zoom!");
    } else {
      alert("You need to start the engine first");
    }
  },
};
fiat.drive();
fiat.start();
fiat.drive();
fiat.stop();
