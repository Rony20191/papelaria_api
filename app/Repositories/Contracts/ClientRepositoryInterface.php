<?php


namespace App\Repositories\Contracts;


use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

interface ClientRepositoryInterface
{
    public function index(array $filter = []):Collection;

    public function store(array $dados): Client;

    public function show(string $id): Client;

    public function update(array $dados, string $id): bool;

    public function delete(string $id): bool;
}
