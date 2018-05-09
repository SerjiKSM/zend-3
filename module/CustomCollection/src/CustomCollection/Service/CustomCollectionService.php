<?php

namespace CustomCollection\Service;

use Shopify;
use Admin\Constants\ShopifyParams;

class CustomCollectionService
{
    public function getShopifyCustomCollections()
    {
        $shopifyParams = new ShopifyParams();
        $params = $shopifyParams->getParams();

        $client = new Shopify\PrivateApi(array(
            'api_key' => $params['api_key'],
            'password' => $params['password'],
            'shared_secret' => $params['shared_secret'],
            'myshopify_domain' => $params['myshopify_domain']
        ));

        $serviceCustomCollection = new Shopify\Service\CustomCollectionService($client);
        $customCollection = $serviceCustomCollection->all();

        return $customCollection;
    }

}