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
