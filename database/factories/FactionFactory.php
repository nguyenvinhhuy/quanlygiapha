<?php

namespace Database\Factories;

use App\Models\Tribe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faction>
 */
class FactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Faction::class;
    public function definition()
    {
        return [
            'name' =>$this -> faker->name(),
            'address' => $this -> faker->text(20),
            'tribe_id' => Tribe::all()->random()->id,
        ];
    }
}
