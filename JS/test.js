//let name = prompt ('Как вас зовут?');
//alert ('Вас зовут ' + name);

5 > 4 true
"ананас" > "яблоко" false // я по юникод идет позже буквы а
"2" > "12" true //не преобразуются в числа когда оба значения строки сравниваются как строки 2 позже чила 1
undefined == null true //только эти значения равны друг другу с другими нет
undefined === null false //строгое сравнение .учитывается тип данных
null == "\n0\n" false // равен только undefined
null === +"\n0\n" false//равен только undefined




"" + 1 + 0 // 10 конкатенация за счет знака +
"" - 1 + 0// -1 "" пустая строка это 0
true + false// 1
6 / "3"// 2 преобразование типа
"2" * "3"// 6
4 + 5 + "px"//9px
"$" + 4 + 5//$45 слева направо исполняется
"4" - 2//2
"4px" - 2//Nan из строки вычитается число оператор- пытается привести их к числу и выдает NAN
7 / 0// infinity
"  -9  " + 5// "-9 5"
"  -9  " - 5// -14
null + 1//1 Null=0
undefined + 1// undefined при приведении к числу выдает Nan
" \t \n" - 2//-2 не учитываются символы обозначающие перенос строки


let a = 1, b = 1;

let c = ++a; // 2 инкремент ++срабатывает до присвоения значения переменной с 
let d = b++; // 1 декримент ++ срабатывает после присвоения значения переменной d
a=2
b=2
c=2
d=1

+а//унарный плюс перед значением преобразует его в число все равно что функция Number


let a = 2;

let x = 1 + (a *= 2);// a=4 x=5 короткая запись a=a*2




if ("0") {
    alert( 'Привет' );
  }
  //привет



  let value = prompt('Какое "официальное" название JavaScript?', '');

  if (value == 'ECMAScript') {
    alert('Верно!');
  } else {                               // так не делать
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

let login = 'value'

let message = (login == 'Сотрудник') ? 'Привет':
(login == 'Директор') ? 'Здравствуйте':
(login == '') ? 'Нет логина':
'';

alert(message)





let name
let name
let name
let name 
let name
let name
let name
let name
let name
объявление переменной 


const stone 
const stone
const stone
const stone
const stone
const stone

объявление незменяемой переменной



if () {

}
else {

}



if () {

}
else {

}



if () {

}


else {
  
}



if () {

}
else if {

}


console.log()
console.log()
console.log()
console.log()




alert()
alert()
alert()
alert()
alert()



prompt()
prompt()
prompt()
prompt()
prompt()




confirm()
confirm()




Number(true)//1
Number(false)//0
Number('nenum')//NAN




Boolean(1)//true
Boolean(0)//false
Boolean('a')//true
Boolean(undefined)//false
Boolean(NaN)//false


String()
String()
String()
String()

