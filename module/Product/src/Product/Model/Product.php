<?php

namespace Product\Model;


class Product
{
    public $body_html;
    public $id;
    public $product_type;
    public $title;

    public function exchangeArray(array $data)
    {
        $this->body_html = !empty($data['body_html']) ? $data['body_html'] : null;
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->product_type = !empty($data['product_type']) ? $data['product_type'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
    }

    /**
     * @return mixed
     */
    public function getBodyHtml()
    {
        return $this->body_html;
    }

    /**
     * @param mixed $body_html
     */
    public function setBodyHtml($body_html)
    {
        $this->body_html = $body_html;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getProductType()
    {
        return $this->product_type;
    }

    /**
     * @param mixed $product_type
     */
    public function setProductType($product_type)
    {
        $this->product_type = $product_type;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }



}