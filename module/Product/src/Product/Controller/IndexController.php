<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Collection;
use Application\Entity\Product;
use Product\Service\ProductService;

class IndexController extends AbstractActionController
{
    private $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function indexAction()
    {
        $id = (int) $this->params()->fromRoute('id', -1);

        $queryBuilder = $this->entityManager->createQueryBuilder();
        $productService = new ProductService();
        $products = $productService->getProducts($queryBuilder, $id);

        return new ViewModel([
            'products' => $products
        ]);
    }

}