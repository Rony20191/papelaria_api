<?php


namespace App\Repositories\Contracts;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


interface ProductRepositoryInterface
{
    public function index(array $filter = []);

    public function store(array $dados);

    public function show(string $id);

    public function update(array $dados, string $id): bool;

    public function delete(string $id): bool;
}
