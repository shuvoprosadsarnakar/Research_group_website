<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'groupName' => 'web',
            'memberId'=> 1,
        ]);

        DB::table('groups')->insert([
            'groupName' => 'mbile',
            'memberId'=> 1,
        ]);

        DB::table('groups')->insert([
            'groupName' => 'iot',
            'memberId'=> 2,
        ]);
    }
}
