let myPassword = prompt("Пожалуйста введите пароль.");

function getSecret(file, secretPassword) {
  //функция региструет попытку войти
  file.opened = file.opened + 1;
  if (secretPassword == file.password) {
    //сравнивает пароль с паролеме в объекте
    return file.contents; //возвращает содержимое объекта
  } else {
    return "Invalid password! No secret for you."; // если пароль не совпадает возвращает сообщение о некоррктности
  }
}

function setSecret(file, secretPassword, secret) {
  if (secretPassword == file.password) {
    file.opened = 0; //если пароль совпал сбрасывает количество попыток входа
    file.contents = secret; //присваивает свойству  contents  в объекте значение хранящееся в переменной secret
  }
}

let superSecretFile = {
  // объект
  level: "classified",
  opened: 0,
  password: 8,
  contents: "Dr. Khanysh's next meeting is in Tula.",
};

let secret = getSecret(superSecretFile, myPassword); //создали переменную и присвоили ей значение = вызванной первой функцию передали ей аргументы в апараметры переменную superSecretFile и пароль в secretPassword-8,
console.log(secret); // вывели результат функции т.е return file.contents;

setSecret(superSecretFile, myPassword, "Dr.Khanysh next meet is in New York."); //вызвали вторую функцию передали ей аргументы объект бпароль и строку которая сбросит количество попыток войти до 0 и подменит значение contents

secret = getSecret(superSecretFile, myPassword); // выводим сообщение как и ранее только с новым значением в свойстве contents объекта superSecretFile
console.log(secret);

