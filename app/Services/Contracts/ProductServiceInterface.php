<?php


namespace App\Services\Contracts;


use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function index(array $filter = []);

    public function store(array $dados);

    public function show($id);

    public function update(array $dados, $id): bool;

    public function delete($id): bool;

}
