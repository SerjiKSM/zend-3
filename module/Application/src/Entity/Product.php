<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
 */
class Product
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_num")
     */
    protected $idNum;

    /**
     * @ORM\Column(name="body_html")
     */
    protected $bodyHtml;

    /**
     * @ORM\Column(name="id")
     */
    protected $id;

    /**
     * @ORM\Column(name="product_type")
     */
    protected $productType;

    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * @return mixed
     */
    public function getIdNum()
    {
        return $this->idNum;
    }

    /**
     * @param mixed $idNum
     */
    public function setIdNum($idNum)
    {
        $this->idNum = $idNum;
    }

    /**
     * @return mixed
     */
    public function getBodyHtml()
    {
        return $this->bodyHtml;
    }

    /**
     * @param mixed $bodyHtml
     */
    public function setBodyHtml($bodyHtml)
    {
        $this->bodyHtml = $bodyHtml;
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
        return $this->productType;
    }

    /**
     * @param mixed $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
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