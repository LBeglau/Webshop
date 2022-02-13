<?php

namespace App\Controller;

use App\Service\Helper\BasketHelper;
use App\Service\Helper\ProductHelper;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{

    private UserHelper $userHelper;
    private ProductHelper $productHelper;
    private BasketHelper $basketHelper;

    public function __construct(UserHelper $userHelper, ProductHelper $productHelper, BasketHelper $basketHelper)
    {
        $this->userHelper = $userHelper;
        $this->productHelper = $productHelper;
        $this->basketHelper = $basketHelper;
    }

    /**
     * @Route("/buy/{pId}", name="buy")
     */
    public function index(Request $request): Response
    {
        try {
            $this->userHelper->addBasketPrice($this->productHelper->getProductPrice($request->attributes->get('pId')), $this->getUser());
            $this->basketHelper->addProduct($this->productHelper->getProductbyID($request->attributes->get('pId')), $this->getUser());
        }catch (\Exception $exception){
            return $this->json('error');
        }
        return $this->json('success');
    }

    public function payProducts(){



    }
}
