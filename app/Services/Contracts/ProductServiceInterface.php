<?php


namespace App\Services\Contracts;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function index(array $filter = []):Collection;

    public function store(Request $request);

    public function show(string $id): Model;

    public function update(Request $request, string $id): bool;

    public function delete(string $id): bool;

}
