<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function index(array $filter = [])
    {
        $query = $this->model::query();
        if (!empty($filter)) {
            foreach ($filter as $key => $value) {
                $query->where($key, $value);
            }
        }

        return $query->get();
    }

    public function store(array $dados)
    {
        return $this->model::create($dados);
    }

    public function show(string $id)
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new NotFoundHttpException('Modelo não encontrado');
        }

        return $model;
    }

    public function update(array $dados, string $id): bool
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new NotFoundHttpException('Modelo não encontrado');
        }

        return $model->update($dados);
    }

    public function delete(string $id): bool
    {
        $model = $this->model->find($id);
        if (empty($model)) {
            throw new NotFoundHttpException('Modelo não encontrado');
        }

        return $model->destroy($id);
    }

    public function paginate($pages)
    {
        return $this->model->paginate($pages);
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        $model = $this->model;

        if (count($criteria) == 1) {
            foreach ($criteria as $c) {
                $model = $model->where($c[0], $c[1], $c[2]);
            }
        } elseif (count($criteria > 1)) {
            $model = $model->where($criteria[0], $criteria[1], $criteria[2]);
        }

        if (count($orderBy) == 1) {
            foreach ($orderBy as $order) {
                $model = $model->orderBy($order[0], $order[1]);
            }
        } elseif (count($orderBy > 1)) {
            $model = $model->orderBy($orderBy[0], $orderBy[1]);
        }

        if (count($limit)) {
            $model = $model->take((int)$limit);
        }

        if (count($offset)) {
            $model = $model->skip((int)$offset);
        }

        return $model->get();
    }

    public function findOneBy(array $criteria)
    {
        return $this->findBy($criteria)->first();
    }
}