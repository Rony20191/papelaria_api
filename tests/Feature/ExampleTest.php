<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(400);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductstore()
    {
        $product = Product::factory()->make();
        $response = $this->post('/products',$product);
        dd($response->json());
        $response->assertStatus(200);
    }
}
