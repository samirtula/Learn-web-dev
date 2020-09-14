//let name = prompt ('Как вас зовут?');
//alert ('Вас зовут ' + name);

5 > 4 true
"ананас" > "яблоко" false
"2" > "12" true
undefined == null true
undefined === null false
null == "\n0\n" false
null === +"\n0\n" false



if ("0") {
    alert( 'Привет' );
  }
  //привет



  let value = prompt('Какое "официальное" название JavaScript?', '');

  if (value == 'ECMAScript') {
    alert('Верно!');
  } else {
    alert('Не знаете? ECMAScript!');
  }

   Используя конструкцию if..else, напишите код, который получает число через prompt, а затем выводит в alert:

1, если значение больше нуля,
-1, если значение меньше нуля,
0, если значение равно нулю.
Предполагается, что пользователь вводит только числа.

let yournumber = prompt("Введите ваше любимое число");
if (yournumber > 0) {
    alert (1);
}
else if (yournumber < 0) {
    alert (-1);
}
else  {
    alert (0);
}



Перепишите if с использованием условного оператора '?':

let result;

if (a + b < 4) {
  result = 'Мало';
} else {
  result = 'Много';
}

let a = 1;
let b = 4;

let result = (a + b < 4) ? 'Мало' : 'Много';
alert (result);









Перепишите if..else с использованием нескольких операторов '?'.

Для читаемости рекомендуется разбить код на несколько строк.

let message;

if (login == 'Сотрудник') {
  message = 'Привет';
} else if (login == 'Директор') {
  message = 'Здравствуйте';
} else if (login == '') {
  message = 'Нет логина';
} else {
  message = '';
}

let login = 'qweew'

let message = (login == 'Сотрудник') ? 'Привет':
(login == 'Директор') ? 'Здравствуйте':
(login == '') ? 'Нет логина':
'';

alert(message)


