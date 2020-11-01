/*
Написать функцию, которая будет принимать на вход название элемента html, и посчитать кол-во найденных элементов на странице.
*/
let elemQuanitity = [];

function elemSearch(SelectorAll) {
  elemQuanitity = document.querySelectorAll(SelectorAll);
  console.log(elemQuanitity);
  console.log(
    "Количество элементов удовлетворяющих вашему запросу равно " +
      elemQuanitity.length
  );
}

elemSearch("section");

////////////////////////////////////

let list = prompt(
  "Введите через запятую список Ваших дел",
  "помыть голову,сделать дз,купить еду коту,помыть голову,сделать дз,купить еду коту,помыть голову,сделать дз,купить еду коту,помыть голову,сделать дз,купить еду коту,помыть голову,сделать дз,купить еду коту,сделать дз,купить еду коту,сделать дз"
);
let arr = [];
let unorderedList;
let mainSection = document.querySelector("section");

function fromStringToArr(affairsList) {
  arr = affairsList.split(",");
  unorderedList = document.createElement("ul");
  mainSection.append(unorderedList);
  unorderedList.innerHTML = "Список дел:";

  for (let i = 0, j = 7; i < arr.length && j <= 12; i++, j++) {
    let listN = document.createElement("li");
    unorderedList.append(listN);
    listN.append(j + ":00 " + arr[i]);
    if (j === 12) {
      j++;
      let unorderedList2 = document.createElement("ul");
      unorderedList2.innerHTML =
        "А эти дела, пожалуй, лучше перенести на завтра:";
      unorderedList.after(unorderedList2);
      for (; i < arr.length && j < 24; i++, j++) {
        let listN = document.createElement("li");
        unorderedList2.append(listN);
        listN.append(j + ":00 " + arr[i]);
      }
      if (j > 12) {
        let redBlock = document.querySelector("ul:last-child");
        redBlock.setAttribute("style", "color :red");
      }
    }
  }
  let firstLi = document.querySelector("ul>li:first-child");
  let secondLi = document.querySelector("ul:last-child>li:first-child");
  firstLi.setAttribute("style", "margin-top:10px");
  secondLi.setAttribute("style", "margin-top:10px");
}

fromStringToArr(list);

console.log(arr);

/* Написать функционал записной книжки. Нужно запросить у пользователя список дел(через функцию alert()). Дела должны быть отделены запятой (помыть голову,сделать дз,купить еду коту). После того как пользователь закончил ввод, нужно в окне браузере отобразить данный список при помощи тэга <ul>. Также необходимо в каждом пункте отобразить время, когда именно запланировано дело. Время устанавливаться автоматически, т.е. первое дело планируем на 7:00, второе на 8:00. третье на 9:00. Также введем ограничение - если дела не укладываеться до 12:00 нужно оповестить об это пользователя, выведем на страницу блок “а эти дела, пожалуй, лучше перенести на завтра:” и далее список дел, которые не удовлетворяют ограничению.  */
