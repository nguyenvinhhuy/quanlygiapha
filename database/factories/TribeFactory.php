<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tribe>
 */
class TribeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Tribe::class;

    public function definition()
    {
        return [        
            'name' =>$this -> faker->name(),
            'address' => $this -> faker->text(10),          
        ];
    }
}
