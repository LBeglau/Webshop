<?php

namespace App\Controller;

use App\Entity\User;
use App\Service\Helper\ProductHelper;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private UserHelper $userHelper;
    private ProductHelper $productHelper;
    private User $user;

    public function __construct(UserHelper $userHelper, ProductHelper $productHelper)
    {
        $this->userHelper = $userHelper;
        $this->productHelper = $productHelper;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        try {
            if(!empty($this->getUser())){
                dd($this->getUser());
                $this->user = $this->getUser();
            }
        }catch(\Exception $exception){
            return $this->render('home/home.html.twig', [
            ]);
        }

        $products = $this->productHelper->getProducts();

        return $this->render('home/home.html.twig', [
            'user' => $this->user,
            'products'=> $products
        ]);
    }
}
