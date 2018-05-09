<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Application\Entity\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="custom_collections")
 */
class CustomCollection
{

    /**
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_num")
     */
    protected $idNum;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(name="id_custom_collection")
     */
    protected $id_custom_collection;

    /**
     * @ORM\Column(name="title")
     */
    protected $title;

    /**
     * Конструктор.
     */
    public function __construct()
    {
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
    public function getIdCustomCollection()
    {
        return $this->id_custom_collection;
    }

    /**
     * @param mixed $id_custom_collection
     */
    public function setIdCustomCollection($id_custom_collection)
    {
        $this->id_custom_collection = $id_custom_collection;
    }


}