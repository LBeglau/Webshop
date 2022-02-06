<?php

namespace App\Controller;

use App\Service\Helper\BasketHelper;
use App\Service\Helper\ProductHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\Collection;

class BasketController extends AbstractController
{

    private BasketHelper $basketHelper;
    private ProductHelper $productHelper;

    public function __construct(BasketHelper $basketHelper, ProductHelper $productHelper)
    {
        $this->basketHelper = $basketHelper;
        $this->productHelper = $productHelper;
    }

    /**
     * @Route("/basket", name="basket")
     */
    public function index(): Response
    {
        $lagerbestandt = [];
        $products = $this->basketHelper->getProducts($this->getUser());
        foreach ($products as $productRow){
            $product = $this->productHelper->getProductbyID($productRow->getProducts()->getID());
            $lagerbestandt[] = $product[0]->getStock();
        }
        return $this->render('basket/index.html.twig', [
            'products' => $products,
            'user' => $this->getUser()
        ]);
    }

    /**
     * @Route("/basket", name="basket.product.delete")
     */
    public function deleteBasketProduct(){

    }
}
