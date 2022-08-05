<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('person')->insert([
            'name'=>'Nguyễn Vinh Huy',
            'gender'=>'Nam',
            'address'=>'Đà Nẵng',
            'dob'=>'1999-06-14',
            'job'=>'It',
            'ordinal'=>'1',
            'faction_id'=>'4',
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => now(),
        ]);
    }
}
