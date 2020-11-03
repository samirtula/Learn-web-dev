let searchPhrase = prompt(
  "Введите через запятую части или слова целиком",
  "rem,eme,or,am,a"
);
let wordSection = searchPhrase.split(",");

function wordChangeStyle(wordSection) {
  let word = document.querySelector(".text");
  let word2 = word.innerHTML.split(" ");
  let word3 = [];
  let i = 0;

  for (i = 0; i <= word2.length - 1; i++) {
    for (let j = 0; j <= wordSection.length - 1; j++) {
      if (
        word2[i].includes(wordSection[j]) &&
        word2[i].includes("span") == false
      ) {
        word2[i] =
          word2[i].substr(0, word2[i].indexOf(wordSection[j])) +
          "<span>" +
          wordSection[j] +
          "</span>" +
          word2[i].substr(
            word2[i].substr(0, word2[i].indexOf(wordSection[j])).length +
              wordSection[j].length
          );
      }
    }
  }
  word2 = word2.join(" ").toString();
  word.innerHTML = word2;
}

wordChangeStyle(wordSection);
