<?php


namespace App\Services;


use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderService implements Contracts\OrderServiceInterface
{
    /**
     * @var OrderRepositoryInterface
     */
    private OrderRepositoryInterface $orderRepository;

    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
}
