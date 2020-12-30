<?php
/*
 * 1. Создать класс Product с полями name, price, добавить к
классу конструктор, который принимает 2 параметра
(_name, _price) и заполняет соответствующие поля.
2. Создать метод getProduct(), который возвращает строку
вида (Name{name}; price{price})
3. В файле index.php создать массив объектов класса
Product и форму, которая состоит из двух текстовых
полей и кнопки Add. По клику на кнопку Add в массив
добавляется новый объект со значениями, которые
написаны в форме.
4. Вывести массив продуктов на страницу, используя
метод getProduct().
5. Создать метод searchByName(), который принимает 2
параметра (массив объектов класса Product и назва-
ние продукта), ищет по названию продукт в массиве
и возвращает его.
6. Создать форму для поиска, которая состоит из тек-
стового поля и кнопки. По клике на кнопку вызывать
метод searchByName() и вывести найденный продукт
на страницу.
 */
class Product {
    protected $name = '';
    protected $price = '';
    public function __construct($name,$price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    public function getName(){
    return $this->name;
    }
    public function getProduct() {
        $productNamePrice='Name ' . $this->name . 'Price ' . $this->price;
        return $productNamePrice;
    }
    public function searchByName($objsArr, $searchName) {
        $satisfyingObjs = [];
        foreach ($objsArr as $k => $value) {
            if($value->getName() === $searchName) { $satisfyingObjs[] = $value;
            }
        }
        echo '<pre>';
        print_r($satisfyingObjs);
        echo '<pre>';
        return $satisfyingObjs;

    }
}
