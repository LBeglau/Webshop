<?php

namespace App\Service\Helper;

use App\Entity\Product;
use App\Entity\User;

class BasketHelper
{
    private ProductHelper $productHelper;

    public function __construct(ProductHelper $productHelper)
    {
        $this->productHelper = $productHelper;
    }

    public function newProduct(){

    }

    public function getProducts($user): ?Product{



        return $products;
    }
}