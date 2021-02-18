<?php

namespace Eshop;


class Admin
{
    protected $orders ='';
    protected $db = null;
    public function __construct($orders_table)
    {
        $this->orders = $orders_table;
        $this->db = new Db();
    }

    public function getAllOrders()
    {
        $query = "SELECT $this->orders.address, $this->orders.phone, $this->orders.email, $this->orders.statusId, $this->orders.clientName, $this->orders.deliveryTypeId, $this->orders.paymentTypeId, $this->orders.cart_id, delivery_types.deliveryType, payment_types.paymentType, status_types.status FROM $this->orders INNER JOIN payment_types ON payment_types.id = $this->orders.paymentTypeId INNER JOIN delivery_types ON delivery_types.id = $this->orders.deliveryTypeId INNER JOIN status_types ON status_types.id = $this->orders.statusId ORDER BY $this->orders.id ASC";
        $data =  $this->db->query($query);
        $dataAssocArr = $data->fetch_all(MYSQLI_ASSOC);
        return $dataAssocArr;
    }
    public function getAllOrdersFilter($header)
    {
        $query = "SELECT $this->orders.address, $this->orders.phone, $this->orders.email, $this->orders.statusId, $this->orders.clientName, $this->orders.deliveryTypeId, $this->orders.paymentTypeId, $this->orders.cart_id, delivery_types.deliveryType, payment_types.paymentType, status_types.status FROM $this->orders INNER JOIN payment_types ON payment_types.id = $this->orders.paymentTypeId INNER JOIN delivery_types ON delivery_types.id = $this->orders.deliveryTypeId INNER JOIN status_types ON status_types.id = $this->orders.statusId ORDER BY $header ASC";
        $data =  $this->db->query($query);
        $dataAssocArr = $data->fetch_all(MYSQLI_ASSOC);
        return $dataAssocArr;
    }
}