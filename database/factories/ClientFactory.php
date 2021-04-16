<?php

namespace Database\Factories;

use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Rony',
            'email' => 'test@gmail.com',
            'telefone' => '65999402889',
            'data_nascimento' => '2020-11-30',
            'endereco' => 'Rua 5',
            'complemento' => 'rua 1',
            'bairro' => 'Centro',
            'cep' => '64082-130',
            'data_cadastro' => Carbon::now()
        ];
    }
}
