<?php

namespace Database\Factories;

use App\Models\group_usr;
use Illuminate\Database\Eloquent\Factories\Factory;

class group_usrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = group_usr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'group_id' => \App\Models\Groups::inRandomOrder()->first()->id,
        ];
    }
}
