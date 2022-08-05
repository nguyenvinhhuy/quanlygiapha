<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Factory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->times(10)->create();
    }
}
