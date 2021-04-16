<?php


namespace App\Services;


use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService implements Contracts\ProductServiceInterface
{

    /**
     * @var ProductRepositoryInterface
     */
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(array $filter = [])
    {
        return $this->productRepository->index($filter);
    }

    public function store(array $dados)
    {
        $product = null;
        try{
            $dados['foto'] = $dados['foto']->store('produtos');
            $product       = $this->productRepository->store($dados);

        }catch (\Exception $ex){
            if ($dados['foto'] && empty($product)) {
                Storage::delete($dados['foto']);
            }
            throw new \Exception('Erro ao gravar o produto');
        }

        return $product;
    }

    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    public function update(array $dados, $id): bool
    {
        $product = null;
        try{
        $dados['foto'] = $dados['foto']->store('produtos');
        $product       = $this->productRepository->update($dados, $id);
        } catch (\Exception $ex) {
            if ($dados['foto'] && empty($product)) {
                Storage::delete($dados['foto']);
            }
            throw new \Exception('Erro ao gravar o produto');
        }

        return $product;
    }

    public function delete($id): bool
    {
        return $this->productRepository->delete($id);
    }
}
