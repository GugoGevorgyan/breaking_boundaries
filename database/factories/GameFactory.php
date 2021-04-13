<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'league_id' => random_int(1,6),
            'start_date' => $this->faker->date('Y-m-d H:i:s'),
            'end_date' => $this->faker->date('Y-m-d H:i:s'),
        ];
    }
}
