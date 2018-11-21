<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => str_random(10),
            'typeId'=> 3,
            'status'=> 'incomplete',
            'description'=> str_random(50),
            'startDate'=>'2018-11-15',
            'finishDate'=>'2018-11-20',
        ]);
        DB::table('posts')->insert([
            'title' => str_random(10),
            'typeId'=> 3,
            'status'=> 'incomplete',
            'description'=> str_random(50),
            'startDate'=>'2018-11-15',
            'finishDate'=>'2018-11-20',
        ]);
        DB::table('posts')->insert([
            'title' => str_random(10),
            'typeId'=> 3,
            'status'=> 'incomplete',
            'description'=> str_random(50),
            'startDate'=>'2018-11-15',
            'finishDate'=>'2018-11-20',
        ]);
        DB::table('posts')->insert([
            'title' => str_random(10),
            'typeId'=> 3,
            'status'=> 'incomplete',
            'description'=> str_random(50),
            'startDate'=>'2018-11-15',
            'finishDate'=>'2018-11-20',
        ]);
    }
}
