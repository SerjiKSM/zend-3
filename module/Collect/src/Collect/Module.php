<?php

namespace Collect;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
//        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\CollectTable::class => function($container) {
                    $tableGateway = $container->get(Model\CollectTableGateway::class);
                    return new Model\CollectTable($tableGateway);
                },
                Model\CollectTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Collect());
                    return new TableGateway('collects', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\CollectController::class => function($container) {
                    return new Controller\CollectController(
                        $container->get(Model\CollectTable::class)
                    );
                },
            ],
        ];
    }

}