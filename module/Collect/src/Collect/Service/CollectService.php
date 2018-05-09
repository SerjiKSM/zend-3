<?php

namespace Collect\Service;

use Shopify;
use Admin\Constants\ShopifyParams;

class CollectService
{
    public function getShopifyCollects()
    {
        $shopifyParams = new ShopifyParams();
        $params = $shopifyParams->getParams();

        $client = new Shopify\PrivateApi(array(
            'api_key' => $params['api_key'],
            'password' => $params['password'],
            'shared_secret' => $params['shared_secret'],
            'myshopify_domain' => $params['myshopify_domain']
        ));

        $serviceCollect = new Shopify\Service\CollectService($client);
        $collects = $serviceCollect->all();

        return $collects;
    }

    public function getCollects($queryBuilder)
    {
        $query = $queryBuilder->select('u, g.title, g.id_custom_collection')
            ->from('Application\Entity\Collection', 'u')
            ->leftJoin('Application\Entity\CustomCollection', 'g',\Doctrine\ORM\Query\Expr\Join::WITH, 'u.collectionId = g.id_custom_collection');

        $collects = $query->getQuery()->getArrayResult();

        return $collects;
    }

}