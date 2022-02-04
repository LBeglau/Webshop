<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{

    private UserHelper $userHelper;
    private User $user;

    public function __construct(UserHelper $userHelper)
    {
        $this->userHelper = $userHelper;
        $this->user = new User();
    }

    /**
     * @Route("/register", name="register")
     */
    public function index(Request $request): Response
    {
        $userForm = $this->createForm(UserType::class, $this->user);
        $userForm->handleRequest($request);

        if ($userForm->isSubmitted()) {

            $this->user = $userForm->getData();
            $this->user = $this->userHelper->setNewUser($this->user);
            $this->userHelper->saveUserDb($this->user);

            return $this->redirectToRoute('app_login');
        }

        return $this->render('register/index.html.twig', [
            'userForm' => $userForm->createView()
        ]);
    }
}
