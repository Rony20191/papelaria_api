<?php

namespace Tests\Unit;

use App\Models\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{

    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_models_can_be_instantiated()
    {
        $client = Client::factory()->make();
        $this->assertInstanceOf(Client::class, $client);
    }
}
