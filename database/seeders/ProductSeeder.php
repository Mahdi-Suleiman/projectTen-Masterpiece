<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*
    {{-- $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->text('description');
            $table->float('price');
            $table->text('image_url');
            $table->integer('stock');
            $table->float('discount')->nullable(); --}}
            */

        DB::table('products')->insert([
            [
                'category_id' => 2,
                'name' => "Aviator Classic",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Aviator-Classic.jpg",
                'price' => 100,
                'stock' => 10,
                'discount' => 0
            ],
            [
                'category_id' => 2,
                'name' => "Round Metal",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Round-Metal.jpg",
                'price' => 120,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 2,
                'name' => "New Wayfarer Classic",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/New-Wayfarer-Classic.jpg",
                'price' => 140,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 2,
                'name' => "Original Wayfarer Classic",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Original-Wayfarer-Classic.jpg",
                'price' => 160,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 2,
                'name' => "Clubmaster Classic",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Clubmaster-Classic.jpg",
                'price' => 180,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 1,
                'name' => "Clubmaster Optics",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Clubmaster-Optics.jpg",
                'price' => 90,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 1,
                'name' => "Round Metal Optics",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Round-Metal-Optics.jpg",
                'price' => 110,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 1,
                'name' => "Hexagonal Optics",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Hexagonal-Optics.jpg",
                'price' => 130,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 1,
                'name' => "Aviator Optics",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Aviator-Optics.jpg",
                'price' => 150,
                'stock' => 10,
                'discount' => 0

            ],
            [
                'category_id' => 1,
                'name' => "Erika Optics",
                'description' =>
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam id dolor id nibh ultricies vehicula ut id elit.",
                'image_url' => "/images/Erika-Optics.jpg",
                'price' => 170,
                'stock' => 10,
                'discount' => 0

            ]
        ]);
    }
}