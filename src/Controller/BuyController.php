<?php

namespace App\Controller;

use App\Service\Helper\BasketHelper;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{

    private UserHelper $userHelper;
    private BasketHelper $basketHelper;

    public function __construct(UserHelper $userHelper, BasketHelper $basketHelper)
    {
        $this->userHelper = $userHelper;
        $this->basketHelper = $basketHelper;
    }

    /**
     * @Route("/buy/{pId}", name="buy")
     */
    public function index(Request $request): Response
    {
        dump($request->attributes->get('pId'));
        try {
            $this->userHelper->addBasketPrice($this->basketHelper->getProductPrice($request->attributes->get('pId')));
        }catch (\Exception $exception){

        }
        /** Hier Service Klasse aufrufen in der Query gebaut werden soll -> $request an die Service Klasse übergeben und die ProductId wie unten zu sehen rausziehen **/
        $productIdForQuery = $request->attributes->get('pId');

        return $this->json('success');
    }
}
