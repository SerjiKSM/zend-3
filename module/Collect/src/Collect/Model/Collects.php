<?php

namespace Collect\Model;

use Zend\Db\Adapter;

class Collects extends Zend_Db_Table_Abstract

{
    protected $_name            = 'collects';
    protected $_dependentTables = array('Bugs');
}