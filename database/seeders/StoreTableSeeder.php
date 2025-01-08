<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stores')->insert([
            [
               'name'=>'Ashley',
               'category_id'=>1,
                'image'=>'Ashley.jpg'
            ],
            [
                'name'=>'Höffner',
                'category_id'=>1,
                'image'=>'Höffner.jpg'
            ],
            [
                'name'=>'IKEA',
                'category_id'=>1,
                'image'=>'IKEA.jpg'
            ],
            [
                'name'=>'möma',
                'category_id'=>1,
                'image'=>'möma.jpg'
            ],
            //food
            [
                'name'=>'Abpabdo',
                'category_id'=>2,
                'image'=>'Abpabdo.jpg'
            ],
            [
                'name'=>'crispyWay',
                'category_id'=>2,
                'image'=>'crispyWay.jpg'
            ],



        ]);
    }
}
