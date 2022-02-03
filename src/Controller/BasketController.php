<?php

namespace App\Controller;

use App\Service\Helper\BasketHelper;
use App\Service\Helper\ProductHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{

    private BasketHelper $basketHelper;

    public function __construct(BasketHelper $basketHelper)
    {
        $this->basketHelper = $basketHelper;
    }

    /**
     * @Route("/basket", name="basket")
     */
    public function index(): Response
    {
        $products = $this->basketHelper->getProducts($this->getUser());
        return $this->render('basket/index.html.twig', [
            'products' => $products
        ]);
    }
}
