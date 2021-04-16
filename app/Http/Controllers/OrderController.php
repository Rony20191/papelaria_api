<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\Contracts\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    private OrderServiceInterface $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $this->response['data'] = $this->orderService->index($request->all());
        return response()->json($this->response, $this->response['status']);
    }

    public function store(OrderRequest $request)
    {
        $dados = $request->validated();
        $this->response['data']  = $this->orderService->store($dados);
        return response()->json($this->response, $this->response['status']);
    }

    public function show($id)
    {
        $this->response['data'] = $this->orderService->show($id);
        return response()->json($this->response, $this->response['status']);
    }

    public function update(OrderRequest $request, $id)
    {
        $dados = $request->validated();
        $this->response['data'] = $this->orderService->update($dados,$id);
        return response()->json($this->response, $this->response['status']);
    }

    public function delete($id)
    {
        $this->response['data'] = $this->orderService->delete($id);
        return response()->json($this->response, $this->response['status']);
    }
}
