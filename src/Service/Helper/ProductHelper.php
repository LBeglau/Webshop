<?php

namespace App\Service\Helper;

use App\Entity\Product;
use App\Repository\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;

class ProductHelper
{

    public ProductsRepository $prodRepository;
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em, ProductsRepository $prodRepository)
    {
        $this->em = $em;
        $this->prodRepository = $prodRepository;
    }

    public function getProductbyID($id): array
    {
        return $this->prodRepository->findBy([
            'id' => $id
        ]);
    }

    public function saveProductDb(Product $input): bool
    {
        $this->em->persist($input);
        $this->em->flush();
        return true;
    }

    public function deleteProduct(int $id): array
    {
        $product = $this->prodRepository->findBy([
            'id' => $id
        ]);
        $this->em->remove($product[0]);
        $this->em->flush();
        return $this->getProducts();
    }

    public function getProducts(): array
    {
        return $this->prodRepository->findAll();
    }

}