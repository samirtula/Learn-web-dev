let x = document.querySelector(".text_name");
let y = document.querySelector(".info");
let z = document.querySelector(".tel");
let e = document.querySelector(".info_tel");

let form = document.querySelector(".form");
let button1 = document.querySelector(".button1");

let messBlock = document.querySelector(".message");

let noNum = /['A-z','A-я',''\s']/;
let yratext = /['0-9',':']/;
let arr = [];
let messInner = document.querySelector(".message__text");

x.addEventListener("focus", function () {
  y.style.display = "flex";
  e.style.display = "none";
  if ((messBlock.style.display = "block")) messBlock.style.display = "none";
});
z.addEventListener("focus", function () {
  e.style.display = "flex";
  y.style.display = "none";
  if ((messBlock.style.display = "block")) messBlock.style.display = "none";
});

button1.addEventListener("click", function () {
  button1.style.display = "none";
  form.style.display = "flex";
  y.style.display = "none";
  e.style.display = "none";
});


form.addEventListener("submit", function (event) {
  event.preventDefault();
  let p = document.querySelector(".text_name");
  let tel = document.querySelector(".tel");
  let nameInX = p.value;
  let numInTel = tel.value;
  let i = 0;

  if (noNum.test(numInTel) || numInTel.length < 10 || numInTel == undefined) {
    arr[i] =
      "Необходимо ввести в поле телефон  не менее 10 чисел. Буквы не допускаются";
    messBlock.style.display = "flex";
  }
  if (yratext.test(nameInX) || nameInX.length < 2 || nameInX == undefined) {
    arr[++i] =
      "Необходимо ввести в поле имя не менее 2х букв. Цифры вводить не допускается";
    messBlock.style.display = "flex";
  }
  if (arr.length == 1) {
    messInner.innerHTML = arr[0];
  } else if (arr.length > 1) {
    messInner.innerHTML = arr[i] + "<br>" + "<br>" + arr[--i];
  }
});


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

/*  function noDigits(event) {
  if ("1234567890".indexOf(event.key) != -1) event.preventDefault();
} */

/* let s = document.querySelector("#button");
let k = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
let t;

function xyz() {
  t = x.value;
  t = t.split("");
  for (let i = 0; i <= t.length-1; i++) {
    for (let j = 0; j <= k.length-1; j++) {
      if (t[i] === k[j]) {
        console.log(t[i], k[j]);
        document.write("ошибка.Числа в имени не допускаются"); //Почему исполняется
      }
    }
  }
} */
/* let s = document.querySelector("#button");
function myFunc() {
  if (z.value.length < 10) alert("Номер должен состоять из 10 чисел");
} */


/* x.onclick = function () {
  let op = 0;
  while (op <= 1) {
    (function (_op) {
      setTimeout(function () {
        y.style.opacity = _op;
      }, 60 + op * 600);
    })(op);
    op += 0.1;
  }
}; */

/* z.onclick = function () {
  let op = 0;
  while (op <= 1) {
    (function (_op) {
      setTimeout(function () {
        e.style.opacity = _op;
      }, 60 + op * 600);
    })(op);
    op += 0.1;
  }
}; */

/* form.addEventListener("submit", function (event) {
  event.preventDefault(); */
//let p = document.querySelector(".text_name");
//let nameInX = p.value;
//let messInner = document.querySelector(".message__text");
/*  if (yratext.test(nameInX) || nameInX.length < 2 || nameInX == undefined) {
    messInner.innerHTML =
      "Необходимо ввести в поле имя не менее 2х букв.Цифры вводить не допускается";
    messBlock.style.display = "block";
  }
}); */

//form.addEventListener("submit", function (event) {
// event.preventDefault();
//let tel = document.querySelector(".tel");
//let numInTel = tel.value;
//let messInner = document.querySelector(".message__text");
/*  if (noNum.test(numInTel) || numInTel.length < 10 || numInTel == undefined) {
     messInner.innerHTML =
       "Необходимо ввести в поле телефон  не менее 10 чисел. Буквы не допускаются";
     messBlock.style.display = "block"; 
   }
 });*/
 

