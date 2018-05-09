<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="collects")
 */
class Collection
{

    /**
     * @ORM\Column(name="id_num")
     */
    protected $idNum;

    /**
     * @ORM\Column(name="collection_id")
     */
    protected $collectionId;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_customer")
     */
    public $idCustomer;

    /**
     * @ORM\Column(name="product_id")
     */
    protected $productId;

//    /**
//     * @ORM\ManyToOne(targetEntity="\Application\Entity\CustomCollection", inversedBy="collects")
//     * @ORM\JoinColumn(name="collection_id", referencedColumnName="id_custom_collection")
//     */
    protected $title;

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
    public function getCollectionId()
    {
        return $this->collectionId;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @param mixed $productId
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return mixed
     */
    public function getIdCustomer()
    {
        return $this->idCustomer;
    }

    /**
     * @param mixed $idCustomer
     */
    public function setIdCustomer($idCustomer)
    {
        $this->idCustomer = $idCustomer;
    }




}