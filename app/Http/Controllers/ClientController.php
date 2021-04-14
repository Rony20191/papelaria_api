<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Services\Contracts\ClientServiceInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientServiceInterface
     */
    private ClientServiceInterface $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index(Request $request)
    {
        $this->response['data'] = $this->clientService->index($request->all());
        return response()->json($this->response, $this->response['status']);
    }

    public function store(ClientRequest $request)
    {
        $dados = $request->validated();
        $this->response['data'] = $this->clientService->store($dados);
        return response()->json($this->response, $this->response['status']);
    }

    public function show(string $id)
    {
        $this->response['data'] = $this->clientService->show($id);
        return response()->json($this->response, $this->response['status']);
    }

    public function update(ClientRequest $request, string $id)
    {
        $dados = $request->validated();
        $this->response['data'] = $this->clientService->update($dados,$id);
        return response()->json($this->response, $this->response['status']);
    }

    public function delete(string $id)
    {
        $this->response['data'] = $this->clientService->delete($id);
        return response()->json($this->response, $this->response['status']);
    }
}
