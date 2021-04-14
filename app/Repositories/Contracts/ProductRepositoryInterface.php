<?php


namespace App\Repositories\Contracts;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


interface ProductRepositoryInterface
{
    public function index(array $filter = []):Collection;

    public function store(array $dados): Product;

    public function show(string $id): Product;

    public function update(array $dados, string $id): bool;

    public function delete(string $id): bool;
}
