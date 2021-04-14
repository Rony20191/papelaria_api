<?php


namespace App\Services;


use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ClientService implements Contracts\ClientServiceInterface
{
    /**
     * @var ClientRepositoryInterface
     */
    private ClientRepositoryInterface $clientRepository;

    public function __construct(ClientRepositoryInterface $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index(array $filter = []): Collection
    {
        return $this->clientRepository->index($filter);
    }

    public function store(array $dados): Model
    {
        return $this->clientRepository->store($dados);
    }

    public function show(string $id): Model
    {
        return $this->clientRepository->show($id);
    }

    public function update(array $dados, string $id): bool
    {
        return $this->clientRepository->update($dados,$id);
    }

    public function delete(string $id): bool
    {
        return $this->clientRepository->delete($id);
    }
}
