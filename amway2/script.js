const menu = document.getElementById("menu");

menu.onclick = function myFunction() {
  var x = document.getElementById("myTopnav"),
    y = document.getElementById("menu_wrap");
  var isContainX = x.classList.contains("responsive"),
    isContainY = y.classList.contains("wrap");
  isContainX ? x.classList.remove("responsive") : x.classList.add("responsive");
  isContainY ? y.classList.remove("wrap") : y.classList.add("wrap");
};
