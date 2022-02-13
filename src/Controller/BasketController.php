<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\Helper\BasketHelper;
use App\Service\Helper\OrderHelper;
use App\Service\Helper\ProductHelper;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\Collection;

class BasketController extends AbstractController
{

    private BasketHelper $basketHelper;
    private ProductHelper $productHelper;
    private UserHelper $userHelper;
    private OrderHelper $orderHelper;

    public function __construct(BasketHelper $basketHelper, ProductHelper $productHelper, UserHelper $userHelper, OrderHelper $orderHelper)
    {
        $this->basketHelper = $basketHelper;
        $this->productHelper = $productHelper;
        $this->userHelper = $userHelper;
        $this->orderHelper = $orderHelper;
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
     * @Route("/basket/{id}", name="basket.product.delete")
     */
    public function deleteBasketProduct($id){
        $this->userHelper->substractBasketPrice($this->productHelper->getProductbyID($this->basketHelper->getOneProduct($id)), $this->getUser());
        $this->basketHelper->deleteProducts($id);

        return $this->redirect($this->generateUrl('basket'));
    }

    /**
     * @Route("/basket/payment/{email}", name="payment")
     */
    public function basketPayment($userEmail){
        $user = $this->userHelper->getUserbyEmail($userEmail);
        $this->orderHelper->addOrder($user[0]);
        return $this->redirect($this->generateUrl('order.display'));
    }

}
