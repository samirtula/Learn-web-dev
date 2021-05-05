/* Задача №1
                    Запросить у пользователя год его рождения и вывести его текущий возраст.
                    Текущий год необходимо хранить в константе.



                       const YEAR = 2020;
                          let age = prompt("Введите год вашего рождения");
                          alert("Вам " + (year - age) + "лет");*/

/* Задача №2
                    Пользователь указывает объем флеш карты в Гб. Программа должна посчитать сколько файлов размером 820Мб поместиться на данную флешку.


                    let value = prompt("Введите объем памяти Вашего флэш накопителя в ГБ");
                    let message = "Ваш флеш накопитель может разместить ";
                    alert(message + Math.floor((value * 1024) / 820) + " файлов");

                    Второй вариант решения

                    let value = prompt("Введите объем памяти Вашего флэш накопителя в ГБ");
                    let message = "Ваш флеш накопитель может разместить ";
                    let size = value * 1024;
                    let commonvalue = size % 820;
                    let result = (size - commonvalue) / 820;
                    alert(message + result + " файлов по 820 мб.");*/

/* Задача №3
                    Реализовать обмен валют.
                    Обменник должен уметь обменивать рубли на доллары и доллары на рубли.

                    Как должен работать обменник:

                    В константах необходимо хранить курсы обмена валют;
                    Первым делом необходимо запросить у пользователя название валюты, которую он хочет обменять.
                    Далее пользователь должен иметь возможность ввести сумму, которую он хочет обменять;
                    Далее обменник должен ввести пользователю информацию об операции. А именно, показать сумму, которую получит клиент обратной валюте в случае обмена;
                    Далее пользователь должен иметь возможность согласиться или отказаться от обмена.
                    Если пользователь соглашается с обменом, то выводим на экран сообщение “Мы поменяли {кол-во денег, которые передал клиент} {валюта, которую передал пользователь} на {кол-во денег, которые вернул обменник} {валюта, которую вернул обменник}.
                     В противном случае выводим случае выводим сообщение “Увидимся в следующий раз”
                     */

// Курсы Валют на 18.09.20

// // ОБЪЯВЛЕНИЕ ПЕРЕМЕННЫХ И СОЗДАНИЕ ОБЪЕКТА
// let USA = "Доллар",
//   EUR = "Евро",
//   RUB = "Рубль",
//   result,
//   change,
//   byeMessage;

// let exchanger = {
//   accept: "Подтверждаете обмен?",
//   message: "Ваша сумма составит ",
//   currency: prompt("Валюта которую неоходимо обменять (Доллар, Евро, Рубль)"),
// };
// // ОГРАНИЧЕНИЕ ПО ВВОДИМОЙ ИНФОРМАЦИИ
// function errorMessage(currencyName) {
//   if (currencyName != USA && currencyName != EUR && currencyName != RUB) {
//     alert("Ошибка. Данная валюта не поддерживается");
//     throw new Error("Ошибка. Данная валюта не поддерживается");
//   }
// }
// errorMessage(exchanger.currency);
// /* if (
//   exchanger.currency != USA &&
//   exchanger.currency != EUR &&
//   exchanger.currency != RUB
// ) {
//   alert("Ошибка. Данная валюта не поддерживается");
//   throw new Error("Ошибка. Данная валюта не поддерживается");
// } */
// // ВВЕДЕНИЕ ЕЩЕ ОДНОГО КЛЮЧА/СВОЙСТВА В ОБЪЕКТ С ОДНОВРЕМЕННЫМ ВЫЗОВОМ ФУНКЦИИ
// exchanger.moneysum = prompt("Введите сумму валюты");
// // ОГРАНИЧЕНИЕ ПО ВВОДИМОЙ ИНФОРМАЦИИ
// if (exchanger.moneysum < 1) {
//   alert("Ошибка. Сумма не может быть равна 0 или отрицательной");
//   throw new Error("Ошибка. Сумма не может быть равна 0 или отрицательной");
// }
// // ВВЕДЕНИЕ ЕЩЕ ОДНОГО КЛЮЧА/СВОЙСТВА В ОБЪЕКТ С ОДНОВРЕМЕННЫМ ВЫЗОВОМ ФУНКЦИИ
// exchanger.toChangeMoney = prompt(
//   "Валюта на которую необходимо обменять (Доллар, Евро, Рубль)"
// );
// // ОГРАНИЧЕНИЕ ПО ВВОДИМОЙ ИНФОРМАЦИИ
// /* if (
//   exchanger.toChangeMoney != USA &&
//   exchanger.toChangeMoney != EUR &&
//   exchanger.toChangeMoney != RUB
// ) {
//   alert("Ошибка.Данная валюта не поддерживается");
//   throw new Error("Ошибка. Данная валюта не поддерживается");

// } else  */
// errorMessage(exchanger.toChangeMoney);
// if (exchanger.currency == exchanger.toChangeMoney) {
//   alert("Ошибка.Валюта обмена совпадпет с меняемой валютой");
//   throw new Error("Ошибка.Валюта обмена совпадпет с меняемой валютой");
// }
// // КОНВЕРТАЦИЯ ВСЕХ ВИДОВ ВАЛЮТЫ К РУБЛЕВОМУ ЗНАЧЕНИЮ/
// exchanger.currency == USA
//   ? (result = 75.0319)
//   : exchanger.currency == EUR
//   ? (result = 88.9578)
//   : (result = 1);

// exchanger.toChangeMoney == USA
//   ? (change = 75.0319)
//   : exchanger.toChangeMoney == EUR
//   ? (change = 88.9578)
//   : (change = 1);
// //  КОЭФИЦЕНТ НА КОТОРЫЙ УМНОЖАЕТСЯ ВНОСИМАЯ ВАЛЮТА КОВЕРТИРОВАННАЯ В РУБЛИ
// let rate = 1 / change;
// // БЛОК КОДА ДЛЯ КОРРЕКТИРОВКИ ОКОНЧАНИЯ ФРАЗЫ В ЗАВИСИМОСТИ ОТ СУММЫ
// function moneyName(currency, moneysum) {
//   currency == USA && moneysum % 10 == 1
//     ? (currency = "доллар")
//     : currency == USA && moneysum % 10 >= 2 && moneysum % 10 < 5
//     ? (currency = "доллара")
//     : currency == USA && (moneysum % 10 > 4 || moneysum % 10 == 0)
//     ? (currency = "долларов")
//     : currency == RUB && moneysum % 10 == 1
//     ? (currency = "рубль")
//     : currency == RUB && moneysum % 10 >= 2 && moneysum % 10 < 5
//     ? (currency = "рубля")
//     : currency == RUB && (moneysum % 10 > 4 || moneysum % 10 == 0)
//     ? (currency = "рублей")
//     : (currency = "евро");
//   return currency;
// }

// exchanger.currency = moneyName(exchanger.currency, exchanger.moneysum);

// /* exchanger.currency == USA && exchanger.moneysum % 10 == 1
//   ? (exchanger.currency = "доллар")
//   : exchanger.currency == USA &&
//     exchanger.moneysum % 10 >= 2 &&
//     exchanger.moneysum % 10 < 5
//   ? (exchanger.currency = "доллара")
//   : exchanger.currency == USA &&
//     (exchanger.moneysum % 10 > 4 || exchanger.moneysum % 10 == 0)
//   ? (exchanger.currency = "долларов")
//   : exchanger.currency == RUB && exchanger.moneysum % 10 == 1
//   ? (exchanger.currency = "рубль")
//   : exchanger.currency == RUB &&
//     exchanger.moneysum % 10 >= 2 &&
//     exchanger.moneysum % 10 < 5
//   ? (exchanger.currency = "рубля")
//   : exchanger.currency == RUB &&
//     (exchanger.moneysum % 10 > 4 || exchanger.moneysum % 10 == 0)
//   ? (exchanger.currency = "рублей")
//   : (exchanger.currency = "евро"); */
// // ВЫЧИСЛЕНИЕ КОНЕЧНОЙ СУММЫ
// let changedSum = (exchanger.moneysum * result * rate).toFixed(2);
// // БЛОК КОДА ДЛЯ КОРРЕКТИРОВКИ ОКОНЧАНИЯ ФРАЗЫ В ЗАВИСИМОСТИ ОТ СУММЫ
// exchanger.toChangeMoney = moneyName(exchanger.toChangeMoney, changedSum);
// /* exchanger.toChangeMoney == USA && changedSum % 10 == 1
//   ? (exchanger.toChangeMoney = "доллар")
//   : exchanger.toChangeMoney == USA &&
//     changedSum % 10 >= 2 &&
//     changedSum % 10 < 5
//   ? (exchanger.toChangeMoney = "доллара")
//   : exchanger.toChangeMoney == USA &&
//     (changedSum % 10 > 4 || changedSum % 10 == 0)
//   ? (exchanger.toChangeMoney = "долларов")
//   : exchanger.toChangeMoney == RUB && changedSum % 10 == 1
//   ? (exchanger.toChangeMoney = "рубль")
//   : exchanger.toChangeMoney == RUB &&
//     changedSum % 10 >= 2 &&
//     changedSum % 10 < 5
//   ? (exchanger.toChangeMoney = "рубля")
//   : exchanger.toChangeMoney == RUB &&
//     (changedSum % 10 > 4 || changedSum % 10 == 0)
//   ? (exchanger.toChangeMoney = "рублей")
//   : (exchanger.toChangeMoney = "евро"); */
// //ПРЕДВАРИТЕЛЬНОЕ СООБЩЕНИЕ С СУММОЙ В РУБЛЯХ
// let final = exchanger.message + changedSum + " " + exchanger.toChangeMoney;
// alert(final);
// // ИЗМЕНЕНИЕ ОКАОНЧАНИЯ ФРАЗЫ ИСПОЛЬЗОВАННОЙ НА 312 СТРОКЕ
// exchanger.message = "Ваша сумма составила ";
// final = exchanger.message + changedSum + " " + exchanger.toChangeMoney;
// //ПОДТВЕРЖДЕНИЕ ОПЕРАЦИИ И ЗАКЛЮЧИТЕЛЬНОЕ СООБЩЕНИЕ
// confirm(exchanger.accept)
//   ? (byeMessage =
//       "Мы обменяли " +
//       exchanger.moneysum +
//       " " +
//       exchanger.currency +
//       " и " +
//       final)
//   : (byeMessage = "Увидимся в следующий раз");
// alert(byeMessage);

// Задание 3 Конечный вариант

// Курсы Валют на 18.09.20

// ОБЪЯВЛЕНИЕ ПЕРЕМЕННЫХ И СОЗДАНИЕ ОБЪЕКТА
let USA = "Доллар",
  EUR = "Евро",
  RUB = "Рубль",
  result,
  change,
  byeMessage;

let exchanger = {
  accept: "Подтверждаете обмен?",
  message: "Ваша сумма составит ",
  currency: prompt(
    "Валюта которую неоходимо обменять (Доллар, Евро, Рубль)",
    "Евро"
  ),
};
// ОГРАНИЧЕНИЕ ПО ВВОДИМОЙ ИНФОРМАЦИИ
function errorMessage(currencyName) {
  if (
    currencyName != USA &&
    currencyName != EUR &&
    currencyName != RUB &&
    currencyName != null
  ) {
    alert("Ошибка. Данная валюта не поддерживается");
    throw new Error("Ошибка. Данная валюта не поддерживается");
  } else if (currencyName == null) {
    alert("Спасибо. Увидимся в следующий раз");
    throw new Error("Не подтверждено клиентом");
  }
}

errorMessage(exchanger.currency);

// ВВЕДЕНИЕ ЕЩЕ ОДНОГО КЛЮЧА/СВОЙСТВА В ОБЪЕКТ С ОДНОВРЕМЕННЫМ ВЫЗОВОМ ФУНКЦИИ
exchanger.moneysum = prompt("Введите сумму валюты", "100");

if (typeof exchanger.moneysum !== "number") {
  alert("Ошибка. Введите число");
  throw new Error("Ошибка. Тип данных не число");
}

// ОГРАНИЧЕНИЕ ПО ВВОДИМОЙ ИНФОРМАЦИИ
if (exchanger.moneysum < 1) {
  alert("Ошибка. Сумма не может быть равна 0 или отрицательной");
  throw new Error("Ошибка. Сумма не может быть равна 0 или отрицательной");
}
// ВВЕДЕНИЕ ЕЩЕ ОДНОГО КЛЮЧА/СВОЙСТВА В ОБЪЕКТ С ОДНОВРЕМЕННЫМ ВЫЗОВОМ ФУНКЦИИ
exchanger.toChangeMoney = prompt(
  "Валюта на которую необходимо обменять (Доллар, Евро, Рубль)"
);

errorMessage(exchanger.toChangeMoney);
if (exchanger.currency == exchanger.toChangeMoney) {
  alert("Ошибка.Валюта обмена совпадпет с меняемой валютой");
  throw new Error("Ошибка.Валюта обмена совпадпет с меняемой валютой");
}
// КОНВЕРТАЦИЯ ВСЕХ ВИДОВ ВАЛЮТЫ К РУБЛЕВОМУ ЗНАЧЕНИЮ/
function calc(currency, res) {
  currency == USA
    ? (res = 75.0319)
    : currency == EUR
    ? (res = 88.9578)
    : (res = 1);
  return res;
}

result = calc(exchanger.currency, result);
change = calc(exchanger.toChangeMoney, change);

//  КОЭФИЦЕНТ НА КОТОРЫЙ УМНОЖАЕТСЯ ВНОСИМАЯ ВАЛЮТА КОВЕРТИРОВАННАЯ В РУБЛИ
let rate = 1 / change;
// БЛОК КОДА ДЛЯ КОРРЕКТИРОВКИ ОКОНЧАНИЯ ФРАЗЫ В ЗАВИСИМОСТИ ОТ СУММЫ
function moneyName(currency, moneysum) {
  currency == USA && moneysum % 10 == 1
    ? (currency = "доллар")
    : currency == USA && moneysum % 10 >= 2 && moneysum % 10 < 5
    ? (currency = "доллара")
    : currency == USA && (moneysum % 10 > 4 || moneysum % 10 == 0)
    ? (currency = "долларов")
    : currency == RUB && moneysum % 10 == 1
    ? (currency = "рубль")
    : currency == RUB && moneysum % 10 >= 2 && moneysum % 10 < 5
    ? (currency = "рубля")
    : currency == RUB && (moneysum % 10 > 4 || moneysum % 10 == 0)
    ? (currency = "рублей")
    : (currency = "евро");
  return currency;
}

exchanger.currency = moneyName(exchanger.currency, exchanger.moneysum);

// ВЫЧИСЛЕНИЕ КОНЕЧНОЙ СУММЫ
let changedSum = (exchanger.moneysum * result * rate).toFixed(2);
// БЛОК КОДА ДЛЯ КОРРЕКТИРОВКИ ОКОНЧАНИЯ ФРАЗЫ В ЗАВИСИМОСТИ ОТ СУММЫ
exchanger.toChangeMoney = moneyName(exchanger.toChangeMoney, changedSum);
//ПРЕДВАРИТЕЛЬНОЕ СООБЩЕНИЕ С СУММОЙ В РУБЛЯХ
let final = exchanger.message + changedSum + " " + exchanger.toChangeMoney;
alert(final);
// ИЗМЕНЕНИЕ ОКАОНЧАНИЯ ФРАЗЫ ИСПОЛЬЗОВАННОЙ НА 312 СТРОКЕ
exchanger.message = "Ваша сумма составила ";
final = exchanger.message + changedSum + " " + exchanger.toChangeMoney;
//ПОДТВЕРЖДЕНИЕ ОПЕРАЦИИ И ЗАКЛЮЧИТЕЛЬНОЕ СООБЩЕНИЕ
confirm(exchanger.accept)
  ? (byeMessage =
      "Мы обменяли " +
      exchanger.moneysum +
      " " +
      exchanger.currency +
      " и " +
      final)
  : (byeMessage = "Увидимся в следующий раз");
alert(byeMessage);

/*
              const dollarRub = 74.83,
                dollarEuro = 0.85,
                rublDollar = 0.013,
                rubEuro = 0.011,
                euroDollar = 1.18,
                euroRubl = 88.66;

              let money = prompt("Введите наименование валюты которую хотите обменять");

              if (money == "Dollar") {
                //Блок Доллар
                let changeDollar = prompt("Введите сумму валюты");
                let toChangeMoney = prompt(
                  "На какую валюту вы хотите поменять Вашу валюту"
                );
                if (toChangeMoney == "Rubl") {
                  let changeMessage = "Ваша сумма в рублях ";
                  let accept = "Подтверждаете обмен";
                  let finalChange = changeMessage + changeDollar * dollarRub;
                  alert(finalChange);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " + changeDollar + " долларов США и " + finalChange
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                } else if (toChangeMoney == "Euro") {
                  let changeMessageEuro = "Ваша сумма в евро ";
                  let accept = "Подтверждаете обмен";
                  let finalChangeEuro = changeMessageEuro + changeDollar * dollarEuro;
                  alert(finalChangeEuro);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " +
                        changeDollar +
                        " долларов США и " +
                        finalChangeEuro
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                }
              } else if (money == "Rubl") {
                // Блок Рубль
                let changeRubl = prompt("Введите сумму валюты");
                let toChangeMoney = prompt(
                  "На какую валюту вы хотите поменять Вашу валюту"
                );
                if (toChangeMoney == "Dollar") {
                  let changeMessageDollar = "Ваша сумма в долларах ";
                  let accept = "Подтверждаете обмен";
                  let finalChangeRubl = changeMessageDollar + changeRubl * rublDollar;
                  alert(finalChangeRubl);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " + changeRubl + " рублей РФ и " + finalChangeRubl
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                } else if (toChangeMoney == "Euro") {
                  let changeMessageEuro = "Ваша сумма в Евро ";
                  let accept = "Подтверждаете обмен";
                  let finalChangeRublEuro = changeMessageEuro + changeRubl * rubEuro;
                  alert(finalChangeRublEuro);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " +
                        changeRubl +
                        " рублей РФ и " +
                        finalChangeRublEuro
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                }
              } else if (money == "Euro") {
                // Блок Евро
                let changeEuro = prompt("Введите сумму валюты");
                let toChangeMoney = prompt(
                  "На какую валюту вы хотите поменять Вашу валюту"
                );
                if (toChangeMoney == "Dollar") {
                  let changeMessageDollar = "Ваша сумма в долларах ";
                  let accept = "Подтверждаете обмен";
                  let finalChangeEuroDollar =
                    changeMessageDollar + changeEuro * euroDollar;
                  alert(finalChangeEuroDollar);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " + changeEuro + " Евро и " + finalChangeEuroDollar
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                } else if (toChangeMoney == "Rubl") {
                  let changeMessageRubl = "Ваша сумма в рублях ";
                  let accept = "Подтверждаете обмен";
                  let finalChangeEuroRubl = changeMessageRubl + changeEuro * euroRubl;
                  alert(finalChangeEuroRubl);
                  if (confirm(accept)) {
                    alert(
                      "Мы поменяли " + changeEuro + " Евро и " + finalChangeEuroRubl
                    );
                  } else {
                    alert("Увидимся в следующий раз");
                  }
                }
              }

              let money = prompt("Введите наименование валюты которую хотите обменять");
              let moneysum = prompt("Введите сумму валюты");
              let toChangeMoney = prompt(
                "На какую валюту вы хотите поменять Вашу валюту"
              );
              let accept = "Подтверждаете обмен?";
              let result;
              let change;
              let message = "Ваша сумма составляет ";
              let byeMessage = "Увидимся в следующий раз";

              const USA = "Доллар",
                EUR = "Евро",
                RUB = "Рубль";

              if (money == USA) {
                result = 75.1941;
              } else if (money == EUR) {
                result = 88.6313;
              } else {
                result = 1;
              }

              if (toChangeMoney == USA) {
                change = 75.1941;
              } else if (toChangeMoney == EUR) {
                change = 88.6313;
              } else {
                change = 1;
              }
              let rate = 1 / change;
              let final =
                message + Math.floor(moneysum * result * rate) + " " + toChangeMoney;
              alert(final);
              if (confirm(accept)) {
                alert("Мы поменяли " + moneysum + " " + money + " и " + final);
              } else {
                alert(byeMessage);
              } */
