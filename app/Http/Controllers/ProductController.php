<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\Contracts\ProductServiceInterface;
use Illuminate\Http\Response;
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
        $product = $this->productService->store($request);
        if($product) {
            $this->response['data'] = $product ;
        }else{
            $this->response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        return response()->json($this->response, $this->response['status']);
    }

    public function show(string $id)
    {
        $this->response['data'] = $this->productService->show($id);
        return response()->json($this->response, $this->response['status']);
    }

    public function update(ProductRequest $request, string $id)
    {
        $product = $this->productService->update($request,$id);
        if($product) {
            $this->response['data'] = $product ;
        }else{
            $this->response['status'] = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        return response()->json($this->response, $this->response['status']);
    }

    public function delete(string $id)
    {
        $this->response['data'] = $this->productService->delete($id);
        return response()->json($this->response, $this->response['status']);
    }
}
