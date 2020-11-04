/* let x = document.querySelector(".button1");
let y = document.querySelector(".block");
x.onclick = function () {
  y.classList.add("active");
  document.body.style.background = "grey";
};

let z = document.querySelector(".block__close_button");
z.onclick = function () {
  y.classList.remove("active");
  document.body.style.background = "white";
}; */

let x = document.querySelector(".text_name");
let y = document.querySelector(".info");
x.onclick = function () {
  let op = 0;
  while (op <= 1) {
    (function (_op) {
      setTimeout(function () {
        y.style.opacity = _op;
      }, 60 + op * 600);
    })(op);
    op += 0.1;
  }
};

let z = document.querySelector(".tel");
let e = document.querySelector(".info_tel");
z.onclick = function () {
  let op = 0;
  while (op <= 1) {
    (function (_op) {
      setTimeout(function () {
        e.style.opacity = _op;
      }, 60 + op * 600);
    })(op);
    op += 0.1;
  }
};

/* function noDigits(event) {
  if ("1234567890".indexOf(event.key) != -1) event.preventDefault();
}
 */

/* let s = document.querySelector("#button");
let k = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
let t;

function xyz() {
  t = x.value;
  t = t.split("");
  for (let i = 0; i <= t.length; i++) {
    for (let j = 0; j <= k.length; j++) {
      if (t[i] === k[j]) {
        document.write("ошибка.Числа в имени не допускаются"); //Почему исполняется
      }
    }
  }
} */
let s = document.querySelector("#button");
function myFunc() {
  if (z.value.length < 10) alert("Номер должен состоять из 10 чисел");
}
