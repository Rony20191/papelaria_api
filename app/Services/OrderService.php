<?php


namespace App\Services;


use App\Repositories\Contracts\OrderRepositoryInterface;
use Illuminate\Http\Request;

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


    public function index(array $filter = [])
    {
        return $this->orderRepository->index($filter);
    }

    public function store(array $dados)
    {
        return $this->orderRepository->store($dados);
    }

    public function show(string $id)
    {
        return $this->orderRepository->show($id);
    }

    public function update(array $dados, string $id): bool
    {
        return $this->orderRepository->update($dados, $id);
    }

    public function delete(string $id): bool
    {
        return $this->orderRepository->delete($id);
    }
}
