<?php

namespace CustomCollection\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class CustomCollectionTable
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

    public function getCustomCollection($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id_custom_collection' => $id]);
        $row = $rowset->current();

        return $row;
    }

    public function saveCustomCollect(CustomCollection $collect)
    {
        $data = [
            'id_custom_collection'  => $collect->id_custom_collection,
            'title'  => $collect->title,
        ];

        $id = (int) $collect->id_custom_collection;

        if ($id !== 0 && !$this->getCustomCollection($id)) {
            $this->tableGateway->insert($data);
            return;
        }elseif ($id !== 0 && $this->getCustomCollection($id)){
            $this->tableGateway->update($data, ['id_custom_collection' => $id]);
        }else{
            throw new RuntimeException(sprintf(
                'Could not save row with identifier %d',
                $id
            ));
        }
    }

    public function deleteCustomCollect($id)
    {
        $this->tableGateway->delete(['id_custom_collection' => (int) $id]);
    }

}