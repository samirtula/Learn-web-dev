<?php


namespace Eshop;


class Product
{
    protected $db = null;
    protected $requireFields = [
        'id',
        'name',
        'description',
        'price',
        'active',
        'img_path'
    ];
    public function __construct()
    {
        $this->db = new Db();
    }
    protected function clearNotRequire($data)
    {
        foreach ($data as $k => $item) {
            if (!in_array($k, $this->requireFields)) {
                unset($data[$k]);
            }
        }

        return $data;
    }

    public function addProduct($fields)
    {
        //INSERT INTO `products` (`id`, `name`, `description`, `price`, `img_path`, `active`) VALUES (NULL, '1213', '123', '111', '123', '1');
        if (!isset($fields['id'])) {
            //$fields['id'] = '';
        }

        if (empty($fields) || !is_array($fields)) {
            throw new \Exception('Передали неверные данные');
        }

        // file
        $dbFilePath = '';
        $arFileName = explode('.', $fields['file']['name']);
        $allowExt = ['png', 'jpg', 'jpeg'];
        $extValue = end($arFileName);
        if (in_array(strtolower($extValue), $allowExt)) {
            $newFileName = md5('dima'. $fields['file']['name'] . time()) . '.' . $extValue;
            $filePath = $_SERVER['DOCUMENT_ROOT'] . '/images/'. $newFileName;

            $copyFile = move_uploaded_file($fields['file']['tmp_name'], $filePath);
            if ($copyFile) {
                $dbFilePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $filePath);
            }

        }

        $fields['img_path'] = $dbFilePath;


        //var_dump($filePath);

        foreach ($fields as $k => &$field) {
            if (!in_array($k, $this->requireFields)) {
                unset($fields[$k]);
            }

            $field = "'" . $field . "'";
        }

        $fieldsKeys = implode(',', array_keys($fields));
        $fieldsValues = implode(',', $fields);

        $strQuery = "INSERT INTO `products` ({$fieldsKeys}) VALUES ({$fieldsValues});";
        var_dump($strQuery);
        $this->db->query($strQuery);
    }

    public function updateProduct($id, $fields)
    {
        $temp = [];
        $fields = $this->clearNotRequire($fields);
        unset($fields['id']);
        foreach ($fields as $k => $value) {
            $string = "`" . $k . "`" . "=" . "'" . $value ."'";
            $temp[] = $string;
        }

        $setString = implode(',',$temp);
        $updateStr = "UPDATE `products` SET {$setString} WHERE `id` = {$id}";
        $result = $this->db->query($updateStr);
        //var_dump($updateStr);

        if (!$result) {
            throw new \Exception('Проблема с обновлением.');
        }
    }

    public function deleteProduct($id)
    {
        //"DELETEFROM `products` WHERE `products`.`id` = 5"
        $str = "DELETE FROM `products` WHERE `products`.`id` = {$id}";
        echo"<pre>";
        print_r($str);
        echo"<pre>";
        $this->db->query($str);
    }
    public function deleteProducts($id)
    {
        foreach ($id as $x)
        {
            $this->deleteProduct($x);
        }
    }

    public function getProducts($select = ['*'], $filter = [])
    {
        $selectStr = implode(',', $select);
        $filterStr = '1';
        if (!empty($filter)) {
            $temp = [];
            foreach ($filter as $k => $value) {
                $string = "`" . $k . "`" . "=" . "'" . $value . "'";
                $temp[] = $string;
            }
            $filterStr = implode(' AND ', $temp);
        }

        $str = "SELECT {$selectStr} FROM `products` WHERE {$filterStr}";
        // SELECT * FROM `products` WHERE `price` = 2000 AND `active` = 0

        $result = $this->db->query($str);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function sumQuantity()
    {
        $query = 'SELECT products.id, products.name, SUM(quantity.quantity) AS sum_quantity FROM products INNER JOIN quantity ON products.id = quantity.product_id GROUP BY products.id';
        $result = $this->db->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}