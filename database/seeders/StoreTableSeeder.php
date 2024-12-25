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
                'image'=>'images/Ashley.jpg'
            ],
            [
                'name'=>'Höffner',
                'category_id'=>1,
                'image'=>'images/Höffner.jpg'
            ],
            [
                'name'=>'IKEA',
                'category_id'=>1,
                'image'=>'images/IKEA.jpg'
            ],
            [
                'name'=>'möma',
                'category_id'=>1,
                'image'=>'images/möma.jpg'
            ],
            //food
            [
                'name'=>'Abpabdo',
                'category_id'=>2,
                'image'=>'images/Abpabdo.jpg'
            ],
            [
                'name'=>'crispyWay',
                'category_id'=>2,
                'image'=>'images/möma.jpg'
            ],



        ]);
    }
}
