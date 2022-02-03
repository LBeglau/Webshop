<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{

    /**
     * @Route("/buy/{product}", name="buy", requirements={"page"="/d+"})
     */
    public function index(): Response
    {
        return $this->redirect($this->generateUrl('/'));
    }
}
