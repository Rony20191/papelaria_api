<?php


namespace App\Repositories;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements Contracts\ProductRepositoryInterface
{

    public function index(array $filter = []): Collection
    {
        $query = Product::query();
        if(!empty($filter)){
            foreach ($filter as $key => $value){
                $query->where($key,$value);
            }
        }
        return $query->get();
    }

    public function store(array $dados): Product
    {
        return Product::create($dados);
    }

    public function show(string $id): Product
    {
        return Product::find($id);
    }

    public function update(array $dados, string $id): bool
    {
        return Product::find($id)->update($dados);
    }

    public function delete(string $id): bool
    {
        return Product::find($id)->delete($id);
    }
}
