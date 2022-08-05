<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;

class PersonDescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person_description')->insert([
            'description'=>'abc',
            'person_id'=>Person::all()->random()->id,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);
    }
}
