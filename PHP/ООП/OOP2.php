<?php



class HtmlBuilder
{
    protected $html = '';


    protected function addHtml($element)
    {
        $this->html .= $element . PHP_EOL;
    }

    public function createElements($elementName, $content = '', $attr = [])
    {
        $atterString = '';
        if (!empty($attr) && is_array($attr)) {
            foreach ($attr as $name => $value) {
                $atterString .= $name . '="' . $value . '" ';
            }
        }
        $element = '<' . $elementName . ' ' . $atterString . '>' . $content . '</' . $elementName . '>';
        $this->addHtml($element);
        echo $element;
    }
}



class FormCreator
{
    protected $elem = '';
    protected $formInner = '';
    protected $form = '';
    public function __construct($action, $method)
    {
        $this->form = '<form action="' . $action . '" ' . 'method="' . $method . '">';
    }

    protected function addToForm()
    {

        $this->formInner = $this->form . $this->elem . '</form>';
        echo $this->formInner;
    }


    public function createForm($element, $content = '', $attr = [])
    {

        $atribute = '';
        if (!empty($attr) && is_array($attr)) {
            foreach ($attr as $name => $value) {
                $atribute .= $name . '="' . $value . '" ';
            }
        }
        if ($element != 'input' && $element != 'option') {
            $this->elem = $this->elem . '<' . $element . ' ' . $atribute . '>' . $content . '</' . $element . '>';
        } elseif ($element === 'input') {
            $this->elem = $this->elem . '<' . $element . ' ' . $atribute . '>' . $content;
        }
    }
}
$attrForInput = [
    'type' => 'submit',
    'value' => 'Отправить'
];

$attrForSelect = [
    'size' => '3',
    'multiple name' => 'samir'
];

$obj2 = new FormCreator('ini.php', 'GET');
$obj2->createform('input', 'Мой инпут');
$obj2->createform('select');
$obj2->createform('input', "", $attrForInput);
$obj2->createform('option', 'Мой option');
$obj2->addToForm();
