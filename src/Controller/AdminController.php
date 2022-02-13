<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\ProductType;
use App\Service\Helper\ProductHelper;
use App\Service\Helper\UserHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin", name="admin.")
 */
class AdminController extends AbstractController
{

    private UserHelper $userHelper;
    private ProductHelper $productHelper;
    private User $user;
    private Product $product;

    public function __construct(UserHelper $userHelper, ProductHelper $productHelper)
    {

        $this->userHelper = $userHelper;
        $this->productHelper = $productHelper;
        $this->user = new User();
        $this->product = new Product();
    }

    /**
     * @Route("/", name="admin")
     */
    public function index(): Response
    {
        $products = $this->productHelper->getProducts();
        return $this->render('admin/products.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/product/anlegen", name="product.anlegen")
     */
    public function produkteAnlegen(Request $request)
    {
        $productForm = $this->createForm(ProductType::class, $this->product);
        $productForm->handleRequest($request);

        if ($productForm->isSubmitted()) {
            $this->product = $productForm->getData();
            $this->productHelper->saveProductDb($this->product);

            $products = $this->productHelper->getProducts();

            return $this->render('admin/products.html.twig', [
                'products' => $products
            ]);
        }

        return $this->render('admin/index.html.twig', [
            'productForm' => $productForm->createView()
        ]);
    }

    /**
     * @Route("/product/delete/{id}", name="product.delete")
     */
    public function produktDelete($id){
        $this->productHelper->deleteProduct($id);
        return $this->redirect($this->generateUrl('admin.admin'));
    }
}
