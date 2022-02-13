<?php

namespace App\Service\Helper;

use App\Entity\Basket;
use App\Repository\BasketRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class BasketHelper
{
    private BasketRepository $basketRepository;
    private Basket $basket;
    private EntityManagerInterface $em;

    public function __construct(BasketRepository $basketRepository, EntityManagerInterface $em)
    {
        $this->basketRepository = $basketRepository;
        $this->basket = new Basket();
        $this->em = $em;
    }

    public function getProducts($user){
        $products = $this->basketRepository->getBasketByUser($user);
        return $products;
    }

    public function getOneProduct($basketID){
        $basket = $this->basketRepository->findBy([
            'id' => $basketID
        ]);
        dump($basket);
        $productID = $basket[0]->getProducts();
        return $productID;
    }

    public function deleteProducts($basketId){
        $basket = $this->basketRepository->findBy([
            'id' => $basketId
        ]);
        $this->em->remove($basket[0]);
        $this->em->flush();
    }

    public function addProduct($products, $user){
        //dump($products);
        $product = $products[0];
        $this->basket->setOwner($user);
        $this->basket->setAmount(1);
        $this->basket->setItem($product->getName());
        $this->basket = $this->basket->addProduct($product);
        //dump($this->basket);
        $input = $this->basket;
        $this->em->persist($input);
        //dd($this->basket);
        $this->em->flush();
    }
}