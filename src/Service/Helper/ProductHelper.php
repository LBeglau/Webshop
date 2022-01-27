<?php

namespace App\Service\Helper;

use App\Entity\Product;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProductHelper
{

    private EntityManagerInterface $em;
    public ProductsRepository $prodRepository;
    private Product $product;

    public function __construct(EntityManagerInterface $em , ProductsRepository $prodRepository, Product $product)
    {
        $this->em = $em;
        $this->prodRepository = $prodRepository;
        $this->product = $product;
    }

    public function getProducts(){
        $products = $this->prodRepository->findAll();
        return $products;
    }

    public function getProductbyID($id){
        $product = $this->prodRepository->findBy([
            'id'=>$id
        ]);
        return $product;
    }

    public function saveProductDb(Product $input){
        dump($input);
        $this->em->persist($input);
        $this->em->flush();
        return true;
    }


}