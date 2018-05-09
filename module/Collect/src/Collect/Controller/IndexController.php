<?php

namespace Collect\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Collection;
use Collect\Service\CollectService;

class IndexController extends AbstractActionController
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $collectService = new CollectService();
        $collects = $collectService->getCollects($queryBuilder);

        return new ViewModel([
            'collects' => $collects
        ]);
    }

}