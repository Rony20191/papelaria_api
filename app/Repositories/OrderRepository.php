<?php


namespace App\Repositories;


use App\Models\Order;
use Exception;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderRepository extends BaseRepository implements Contracts\OrderRepositoryInterface
{
    public function __construct(Order $model)
    {
        parent::__construct($model);
    }

    public function index(array $filter = [])
    {
        $query = $this->model::query();
        if (!empty($filter)) {
            foreach ($filter as $key => $value) {
                $query->where($key, $value);
            }
        }
        $orders = $query->get();
        foreach ($orders as $order) {
            $order->products = $order->products()->get();
        }

        return $orders;
    }

    public function show(string $id)
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new NotFoundHttpException('Modelo não encontrado');
        }
        $model->products = $model->products()->get();

        return $model;
    }

    public function store(array $dados)
    {
        try {
            DB::beginTransaction();
            $order = $this->model->create($dados);
            $order->products()->sync(array_values($dados["produtos"]), true);
            DB::commit();
        } catch (\Exception $x) {
            DB::rollBack();
            throw new \Exception('Erro ao Criar pedido');
        }

        return $order;
    }

    public function update(array $dados, string $id): bool
    {
        $order = $this->model->find($id);
        if (empty($order)) {
            throw new NotFoundHttpException('Pedido não encontrado');
        }
        try {
            DB::beginTransaction();

            $sucess = $order->update($dados);
            $order->products()->sync(array_values($dados["produtos"]), true);
            DB::commit();
        } catch (Exception $x) {
            DB::rollBack();
            throw new Exception('Erro ao atualizar o pedido');
        }

        return $sucess;
    }

    public function delete(string $id): bool
    {
        $order = $this->model->find($id);
        if (empty($order)) {
            throw new NotFoundHttpException('Pedido não encontrado');
        }
        try {
            DB::beginTransaction();
            $order->products()->detach();
            $sucess = $order->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            throw new Exception('Erro ao excluir pedido');
        }

        return $sucess;
    }
}
