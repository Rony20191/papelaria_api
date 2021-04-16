<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @var ProductServiceInterface
     */
    private ProductServiceInterface $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $this->response['data'] = $this->productService->index($request->all());
        return response()->json($this->response, $this->response['status']);
    }

    public function store(ProductRequest $request)
    {
        $dados   = $request->validated();
        $this->response['data']  = $this->productService->store($dados);
        return response()->json($this->response, $this->response['status']);
    }

    public function show($id)
    {
        $this->response['data'] = $this->productService->show($id);
        return response()->json($this->response, $this->response['status']);
    }

    public function update(ProductRequest $request, $id)
    {
        $dados = $request->validated();
        $this->response['data'] = $this->productService->update($dados,$id);
        return response()->json($this->response, $this->response['status']);
    }

    public function delete($id)
    {
        $this->response['data'] = $this->productService->delete($id);
        return response()->json($this->response, $this->response['status']);
    }
}
