<?php

namespace Product\Service;

use Shopify;
use Admin\Constants\ShopifyParams;

class ProductService
{
    public function getShopifyProducts()
    {
        $shopifyParams = new ShopifyParams();
        $params = $shopifyParams->getParams();

        $client = new Shopify\PrivateApi(array(
            'api_key' => $params['api_key'],
            'password' => $params['password'],
            'shared_secret' => $params['shared_secret'],
            'myshopify_domain' => $params['myshopify_domain']
        ));

        $serviceProduct = new Shopify\Service\ProductService($client);
        $products = $serviceProduct->all();

        return $products;
    }

    public function getProducts($queryBuilder, $id)
    {
        $query = $queryBuilder->select('c.collectionId,c.productId, p.id, p.title, p.productType, p.bodyHtml')
            ->from('Application\Entity\Collection', 'c')
            ->innerJoin('Application\Entity\Product', 'p',\Doctrine\ORM\Query\Expr\Join::INNER_JOIN, 'c.productId = p.id')
            ->where('c.collectionId = :collectionId')
            ->setParameter('collectionId', $id);

        $products = $query->getQuery()->getArrayResult();

        return $products;
    }

}