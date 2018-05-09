<?php

namespace CustomCollection\Model;


class CustomCollection
{
    public $id_custom_collection;
    public $title;

    public function exchangeArray(array $data)
    {
        $this->id_custom_collection = !empty($data['id_custom_collection']) ? $data['id_custom_collection'] : null;
        $this->title = !empty($data['title']) ? $data['title'] : null;
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