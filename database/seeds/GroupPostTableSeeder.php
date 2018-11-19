<?php

use Illuminate\Database\Seeder;

class GroupPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groupposts')->insert([
            'groupId' => 1,
            'postId'=> 1,
        ]);
        DB::table('groupposts')->insert([
            'groupId' => 2,
            'postId'=> 1,
        ]);
        DB::table('groupposts')->insert([
            'groupId' => 3,
            'postId'=> 1,
        ]);
        DB::table('groupposts')->insert([
            'groupId' => 1,
            'postId'=> 2,
        ]);
        DB::table('groupposts')->insert([
            'groupId' => 2,
            'postId'=> 2,
        ]);
    }
}
