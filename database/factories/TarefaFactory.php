<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tarefa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tarefa>
 */
class TarefaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Tarefa::class;
    public function definition(): array
    {
        return [
            "task" => $this->faker->text(),
            "description" => $this->faker->paragraph(),
            'data_criacao' => date("Y-m-d H:i:s")
        ];
    }
}
