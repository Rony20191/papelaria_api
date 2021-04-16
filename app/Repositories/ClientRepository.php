<?php


namespace App\Repositories;


use App\Models\Client;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ClientRepository extends BaseRepository implements Contracts\ClientRepositoryInterface
{

    public function __construct(Client $model)
    {
        parent::__construct($model);
    }

    public function showOrders($id)
    {
        $client = $this->model->find($id);
        if (empty($client)) {
            throw new NotFoundHttpException('Modelo não encontrado');
        }
        $orders = $client->orders;
        foreach ($orders as $order) {
            $order->products = $order->products()->get();
        }

        return $orders;
    }
}
