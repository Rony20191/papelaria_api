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

    public function index(array $filter = []): Collection
    {
        return $this->productRepository->index($filter);
    }

    public function store(Request $request)
    {
        $product = null;
        $path = null;
        $dados = $request->validated();
        try{
            DB::beginTransaction();

            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $path = $request->file('foto')->store('produtos');
            }

            $dados['foto'] = $path;
            $product = $this->productRepository->store($dados);
            DB::commit();
        }catch (\Exception $ex){
            if($path)
             Storage::delete($path);
            DB::rollBack();
        }
        return $product;
    }

    public function show(string $id): Model
    {
        return $this->productRepository->show($id);
    }

    public function update(Request $request, string $id): bool
    {
        $dados = $request->validated();
        $product = null;
        $path = null;
        try{
            DB::beginTransaction();

            if($request->hasFile('foto') && $request->file('foto')->isValid()){
                $path = $request->file('foto')->store('produtos');
            }
            $dados['foto'] = $path;
            $product = $this->productRepository->update($request->all(),$id);
            DB::commit();
        }catch (\Exception $ex){
            if($path)
                Storage::delete($path);
            DB::rollBack();
        }
        return $product;
    }

    public function delete(string $id): bool
    {
        return $this->productRepository->delete($id);
    }
}
