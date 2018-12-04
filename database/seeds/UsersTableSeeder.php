<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'shuvo',
            'email' => 'shuvoprosad@gmail.com',
            'password' => bcrypt('s306s306'),
        ]);
    }
}
