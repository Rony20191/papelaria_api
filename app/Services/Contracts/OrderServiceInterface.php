<?php


namespace App\Services\Contracts;


interface OrderServiceInterface
{
    public function index(array $filter = []);

    public function store(array $dados);

    public function show(string $id);

    public function update(array $dados, string $id): bool;

    public function delete(string $id): bool;
}
