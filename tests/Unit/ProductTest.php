<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }
    public function test_models_can_be_instantiated()
    {
        $product = Product::factory()->make();
        $this->assertInstanceOf(Product::class, $product);
    }


}
