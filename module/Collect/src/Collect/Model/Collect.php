<?php

namespace Collect\Model;


class Collect
{
    public $collection_id;
    public $id_customer;
    public $product_id;

    public function exchangeArray(array $data)
    {
        $this->collection_id = !empty($data['collection_id']) ? $data['collection_id'] : null;
        $this->id_customer   = !empty($data['id_customer']) ? $data['id_customer'] : null;
        $this->product_id    = !empty($data['product_id']) ? $data['product_id'] : null;
    }

    /**
     * @return mixed
     */
    public function getCollectionId()
    {
        return $this->collection_id;
    }

    /**
     * @param mixed $collection_id
     */
    public function setCollectionId($collection_id)
    {
        $this->collection_id = $collection_id;
    }

    /**
     * @return mixed
     */
    public function getIdCustomer()
    {
        return $this->id_customer;
    }

    /**
     * @param mixed $id_customer
     */
    public function setIdCustomer($id_customer)
    {
        $this->id_customer = $id_customer;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }


}