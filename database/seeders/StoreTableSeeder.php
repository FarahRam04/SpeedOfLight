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
                'image'=>asset('storage/images/Ashley.jpg')
            ],
            [
                'name'=>'Höffner',
                'category_id'=>1,
                'image'=>asset('storage/images/Höffner.jpg')
            ],
            [
                'name'=>'IKEA',
                'category_id'=>1,
                'image'=>asset('storage/images/IKEA.jpg')
            ],
            [
                'name'=>'möma',
                'category_id'=>1,
                'image'=>asset('storage/images/möma.jpg')
            ],
            //food
            [
                'name'=>'Abpabdo',
                'category_id'=>2,
                'image'=>asset('storage/images/Abpabdo.jpg')
            ],
            [
                'name'=>'crispyWay',
                'category_id'=>2,
                'image'=>asset('storage/images/möma.jpg')
            ],



        ]);
    }
}
