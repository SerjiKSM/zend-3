<?php

namespace Collect\Controller;

use Collect\Service\CollectService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Collect\Model\CollectTable;
use Collect\Model\Collect;


class CollectController extends AbstractActionController
{
    private $table;

    public function __construct(CollectTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'collects' => $this->table->fetchAll(),
        ]);
    }

    public function importAction()
    {
        $this->importCollects();

        return new ViewModel();
    }

    private function importCollects()
    {
        $collectService = new CollectService();
        $collects = $collectService->getShopifyCollects();

        foreach ($collects as $collect){
            $data['id_customer'] = $collect->id;
            $data['product_id'] = $collect->product_id;
            $data['collection_id'] = $collect->collection_id;

            $this->saveCollection($data);
        }
    }

    private function saveCollection($data)
    {
        $collection = new Collect();
        $collection->exchangeArray($data);
        $this->table->saveCollect($collection);

        return $this;
    }

}