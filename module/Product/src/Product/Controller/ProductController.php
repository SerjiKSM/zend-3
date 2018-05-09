<?php
namespace Product\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Product\Model\ProductTable;
//use Collect\Form\CollectForm;
use Product\Model\Product;
use Product\Service\ProductService;

class ProductController extends AbstractActionController
{
    private $table;

    public function __construct(ProductTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'products' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }

    public function importAction()
    {
        $this->importProducts();

        return new ViewModel([
            'products' => $this->table->fetchAll(),
        ]);
    }

    private function importProducts()
    {
        $productService = new ProductService();
        $products = $productService->getShopifyProducts();

        foreach ($products as $product){
            $data['body_html'] = $product->body_html;
            $data['id'] = $product->id;
            $data['product_type'] = $product->product_type;
            $data['title'] = $product->title;

            $this->saveProduction($data);

        }
    }

    private function saveProduction($data)
    {
        $product = new Product();
        $product->exchangeArray($data);
        $this->table->saveProduct($product);

        return $this;
    }

}