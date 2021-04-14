<?php


namespace App\Services\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ClientServiceInterface
{
    public function index(array $filter = []):Collection;

    public function store(array $dados): Model;

    public function show(string $id): Model;

    public function update(array $dados, string $id): bool;

    public function delete(string $id): bool;

}
