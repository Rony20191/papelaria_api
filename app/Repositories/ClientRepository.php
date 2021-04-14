<?php


namespace App\Repositories;


use App\Models\Client;
use Illuminate\Database\Eloquent\Collection;

class ClientRepository implements Contracts\ClientRepositoryInterface
{

    public function index(array $filter = []): Collection
    {
        $query = Client::query();
        if(!empty($filter)){
            foreach ($filter as $key => $value){
                $query->where($key,$value);
            }
        }
        return $query->get();
    }

    public function store(array $dados): Client
    {
        return Client::create($dados);
    }

    public function show(string $id): Client
    {
        return Client::find($id);
    }

    public function update(array $dados, string $id): bool
    {
        return Client::find($id)->update($dados);
    }

    public function delete(string $id): bool
    {
        return Client::find($id)->delete($id);
    }
}
