<?php

namespace CustomCollection\Controller;

use CustomCollection\Service\CustomCollectionService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use CustomCollection\Model\CustomCollectionTable;
use CustomCollection\Model\CustomCollection;

class CustomCollectionController extends AbstractActionController
{
    private $table;

    public function __construct(CustomCollectionTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'custom_collects' => $this->table->fetchAll(),
        ]);
    }

    public function importAction()
    {
        $this->importCustomCollection();

        return new ViewModel();
    }

    private function importCustomCollection()
    {
        $customCollectionService = new CustomCollectionService();
        $customCollections = $customCollectionService->getShopifyCustomCollections();

        foreach ($customCollections as $customCollection){
            $data['id_custom_collection'] = $customCollection->id;
            $data['title'] = $customCollection->title;

            $this->saveCustomCollection($data);
        }
    }

    private function saveCustomCollection($data)
    {
        $collection = new CustomCollection();
        $collection->exchangeArray($data);
        $this->table->saveCustomCollect($collection);

        return $this;
    }
}