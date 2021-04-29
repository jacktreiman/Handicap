<?php

namespace Database\Factories;

use App\Models\Scores;
use Illuminate\Database\Eloquent\Factories\Factory;
require_once 'vendor/autoload.php';

class ScoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Scores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            //
            'strokes' => $this->faker->randomFloat($nbMaxDecimals = 0, $min = 80, $max = 100),
            'course' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 60, $max = 80),
            'slope' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 105, $max = 120),
            'differential' => $this->faker->randomFloat($nbMaxDecimals = 1, $min = 15, $max = 25),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            
        ];
    }
}
