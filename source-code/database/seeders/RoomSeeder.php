<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
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
            $table->string('title');
            $table->text('description');
            $table->text('image_url');
            $table->float('price');
         */
        DB::table('rooms')->insert([
            [
                'name' => 'eye examination room',
                'description' => 'A room where you can get your eyes checked',
                'image_url' => 'room 1 image',
                'price' => '10'
            ],
        ]);
    }
}