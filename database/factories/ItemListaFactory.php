<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lista;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemLista>
 */
class ItemListaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lista_id' => Lista::all()->random()->id,
            'nome' => $this->faker->randomElements($array = array($this->faker->name, $this->faker->company, $this->faker->country))[0],
            'documento' => $this->faker->cpf,
            'motivo' => $this->faker->sentence,
            'created_at' => $this->faker->dateTimeThisYear,
            'updated_at' => $this->faker->dateTimeThisYear,
        ];
    }
}
