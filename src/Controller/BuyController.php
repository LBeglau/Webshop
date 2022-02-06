<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BuyController extends AbstractController
{

    /**
     * @Route("/buy/{pId}", name="buy")
     */
    public function index(Request $request): Response
    {
        /** Hier Service Klasse aufrufen in der Query gebaut werden soll -> $request an die Service Klasse übergeben und die ProductId wie unten zu sehen rausziehen **/
        $productIdForQuery = $request->attributes->get('pId');

        return $this->json('success');
    }
}
