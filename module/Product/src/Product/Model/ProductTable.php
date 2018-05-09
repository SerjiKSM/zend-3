<?php

namespace Product\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class ProductTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getProduct($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();

        return $row;
    }

    public function saveProduct(Product $product)
    {
        $data = [
            'body_html' => $product->body_html,
            'id' => $product->id,
            'product_type'  => $product->product_type,
            'title' => $product->title,
        ];

        $id = (int) $product->id;

        if ($id !== 0 && !$this->getProduct($id)) {
            $this->tableGateway->insert($data);
            return;
        }elseif ($id !== 0 && $this->getProduct($id)){
            $this->tableGateway->update($data, ['id' => $id]);
        }else{
            throw new RuntimeException(sprintf(
                'Could not save row with identifier %d',
                $id
            ));
        }
    }

    public function deleteProduct($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}