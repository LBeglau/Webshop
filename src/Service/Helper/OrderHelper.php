<?php

namespace App\Service\Helper;


use App\Entity\Order;
use App\Entity\User;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManagerInterface;

class OrderHelper
{
    private OrderRepository $orderRepository;
    private Order $order;
    private EntityManagerInterface $em;

    public function __construct(OrderRepository $orderRepository, EntityManagerInterface $em)
    {
        $this->orderRepository = $orderRepository;
        $this->order = new Order();
        $this->em = $em;
    }

    public function getOrders($user){
        $orders = $this->orderRepository->findAll();
        return $orders;
    }

    public function addOrder(User $user){
        $this->order->setBuyer($user->getId());
        $this->order->setPrice($user->getBasketPrice());
        $this->order->setStatus(0);

        $this->em->persist($this->order);
        $this->em->flush();

        return $this->order;
    }

    public function updateOrderStatusToInProgress(){

    }

    public function updateOrderStatusToInProduction(){

    }

    public function updateOrderStatusToInSendingOut(){

    }

}