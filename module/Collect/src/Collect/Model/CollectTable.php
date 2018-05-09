<?php

namespace Collect\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CollectTable
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

    public function getCollect($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id_customer' => $id]);
        $row = $rowset->current();

        return $row;
    }

    public function saveCollect(Collect $collect)
    {
        $data = [
            'collection_id' => $collect->collection_id,
            'id_customer'  => $collect->id_customer,
            'product_id'  => $collect->product_id,
        ];

        $id = (int) $collect->id_customer;

        if ($id !== 0 && !$this->getCollect($id)) {
            $this->tableGateway->insert($data);
            return;
        }elseif ($id !== 0 && $this->getCollect($id)){
            $this->tableGateway->update($data, ['id_customer' => $id]);
        }else{
            throw new RuntimeException(sprintf(
                'Could not save row with identifier %d',
                $id
            ));
        }
    }

    public function deleteCollect($id)
    {
        $this->tableGateway->delete(['id_customer' => (int) $id]);
    }

}