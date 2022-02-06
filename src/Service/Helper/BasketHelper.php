<?php

namespace App\Service\Helper;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\BasketRepository;

class BasketHelper
{
    private ProductHelper $productHelper;
    private BasketRepository $basketRepository;

    public function __construct(ProductHelper $productHelper, BasketRepository $basketRepository)
    {
        $this->productHelper = $productHelper;
        $this->basketRepository = $basketRepository;
    }

    public function newProduct(){

    }

    public function getProducts($user){
        $products = $this->basketRepository->getBasketByUser($user);
        return $products;
    }
}