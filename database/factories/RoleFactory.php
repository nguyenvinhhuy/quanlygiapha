<?php

namespace Database\Factories;

use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    protected $model = \App\Models\Role::class;
    public function definition()
    {
        return [
            'name' =>$this-> faker->name,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
            'deleted_at' => new DateTime(),
        ];
    }
    
}


