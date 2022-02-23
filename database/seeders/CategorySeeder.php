<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'name' => 'eyeglasses',
                'description' => 'eyeglasses desciption',
                'image_url' => 'eyeglasses image url',
            ],
            [
                'name' => 'sunglasses',
                'description' => 'sunglasses desciption',
                'image_url' => 'sunglasses image url',
            ],
            [
                'name' => 'contact lenses',
                'description' => 'contact lenses desciption',
                'image_url' => 'contact lenses image url',
            ],
        ]);
    }
}